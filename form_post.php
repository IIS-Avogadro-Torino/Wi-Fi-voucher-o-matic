<?php
######################################################################
# Wi-Fi-voucher-o-matic - Wi-Fi voucher manager
# Copyright (C) 2017, 2018 Valerio Bozzolan, Ivan Bertotto, IIS Avogadro
#
# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program. If not, see <http://www.gnu.org/licenses/>.
######################################################################

require 'load.php';

Header::spawn('form_post');

?>
<section class="mbr-section mbr-section-nopadding" id="video1-l">
	<div class="mbr-figure">
		<div><img src="<?php echo STATIC_ROOT ?>/images/avowifiok-1400x602.png"></div>
		<div class="mbr-figure-caption">
			<div class="container">
<?php

if( isset(
	$_POST['user_name'],
	$_POST['user_surname'],
	$_POST['user_uid'],
	$_POST['user_type']
) ) {
	$_POST['user_name']    = luser_input(      $_POST['user_name'],    32  );
	$_POST['user_surname'] = luser_input(      $_POST['user_surname'], 32  );
	$_POST['user_uid']     = luser_input(      $_POST['user_uid'],     128 );
	$_POST['user_type']    = User::filterType( $_POST['user_type']         );

	$existing_user = User::factoryFromUID( $_POST['user_uid'] )
		->queryRow();

	// An administrator should send manually a voucher to the registered user?
	$rausa_must_send_voucher = false;

	// create if not exists
	if( ! $existing_user ) {

		$create = true;
		if( $type === User::TYPE_ATA || $type === User::TYPE_MENTHOR ) {
			if( ! has_permission('register_whatever_ata_mail') ) {
				if( ! User::filterCompanyEmail( $_POST['user_uid'] ) ) {
					$create = false;
				}
			}
		} elseif( $type === User::TYPE_STUDENT ) {
			if( ! User::filterCompanyEmail( $_POST['user_uid'] ) ) {
				// It's OK to create this user, but it's not OK to send directly the voucher
				$rausa_must_send_voucher = true;
			}
		}
		if( $create ) {
			insert_row( User::T, [
				new DBCol( User::NAME,    $_POST['user_name'],    's' ),
				new DBCol( User::SURNAME, $_POST['user_surname'], 's' ),
				new DBCol( User::UID,     $_POST['user_uid'],     's' ),
				new DBCol( User::TYPE,    $type,                  's' ),
			] );

			$existing_user = User::factoryFromID( last_inserted_ID() )
				->queryRow();
		} else {
			MessageBox::error( __( "Non hai i permessi per registrare personale interno." ) );
		}
	}

	// send if it exists
	if( $existing_user ) {
		$voucher_type = Voucher::filterType( $existing_user->get(User::TYPE) );

		$yet_obtained_vouchers = 0;
		$MAX_VOUCHERS          = 5;

		if( $voucher_type === User::TYPE_MENTHOR ) {
			$MAX_VOUCHERS = 10;
		}

		$yet_obtained_vouchers = (int) RelUserVoucher::factory()
			->whereInt( RelUserVoucher::USER_, $existing_user->get( User::ID ) )
			->select('COUNT(*) as count')
			->queryValue('count');

		if( $yet_obtained_vouchers > $MAX_VOUCHERS ) {
			MessageBox::warning( __( "Hai raggiunto il massimo numero di voucher a tua disposizione." ) );
		}

		$voucher = Voucher::factory()
			->whereStr( Voucher::TYPE, $voucher_type )
			->where( 'NOT EXISTS (' .
				RelUserVoucher::factory()
					->equals( RelUserVoucher::VOUCHER_, Voucher::ID_ )
					->getQuery() .
			')' )
			->limit( 1 )
			->queryRow();

		$yet_obtained_vouchers++;

		if( $voucher ) {
			RelUserVoucher::insertUserVoucher(
				$existing_user->get( User::ID    ),
				$voucher      ->get( Voucher::ID )
			);

			$email = $rausa_must_send_voucher
				? RAUSA_EMAIL
				: $existing_user->get( User::UID );

			$subject = $rausa_must_send_voucher
				? sprintf(
					__( "L'utente %s chiede un voucher %s" ),
					esc_html( $existing_user->get( User::UID ) ),
					$existing_user->get( User::TYPE )
				),
				__("Il tuo voucher IIS Avogadro")
			);

			SMTPMail::send(
				$email,
				$subject,
				file_get_contents( STATIC_PATH . __ . 'email.html' ),
				[
					'CODICE'  => esc_html( $voucher->get(Voucher::CODE) ),
					'Nome'    => esc_html( $_POST['user_name'] ),
					'Cognome' => esc_html( $_POST['user_surname'] ),
					'numero'  => $yet_obtained_vouchers,
					'numeri'  => $MAX_VOUCHERS
				]
			);

			$done = true;
		} else {
			MessageBox::error( __( "Voucher terminati. Contattare Ivan." ) );
		}
	}
}

?>
				<?php if( $done ): ?>
					<p><h1><?php _e( "Ottimo!" ) ?></h1></p>
					<p><?php _e( "Leggi la posta." ) ?></p>
					<?php _e( "Ti abbiamo inviato il codice per iniziare da subito a navigare." ) ?>
					<br />
					<b><?php _e( "Buona navigazione!" ) ?></b>
				<?php endif ?>
	 		</div>
			<!-- /.container -->
		</div>
		<!-- /.figure-caption -->
	</div>
</section>

<?php
Footer::spawn();
