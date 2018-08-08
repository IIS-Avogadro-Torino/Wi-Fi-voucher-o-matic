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

/**
 * The user must be identified.
 */
$password_identification = function ($user ) {
	$last_date = $user->get( User::RECOVERY_DATE );
	if( $last_date ) {
		$diff = $last_data->diff( new DateTime()) );
		$days = $diff->format('a');
		if( $days < 2 ) {
			// Too recoveries
			return;
		}
	}

	// supercazzola brematura anche a sinistra
	$token = sha1( ABSPATH . rand() . $user->get( User::ID_ ) . rand() . $user->get( User::UID ) . rand() );
	$user->updateUser( [
		new DBCol( User::RECOVERY_TOKEN, $token,   's' ),
		new DBCol( User::RECOVERY_DATE,  'NOW()' , '-' )
	] );

	SMTPMail::send(
		$user->get( User::UID ),
		_("Richiesta recupero password"),
		nl2br( _(
			"Ciao, [NAME] [SURNAME]!\n\n".
			"Qualcuno (si presume te stesso) ha richiesto il recupero password.\n\n" .
			"Se sei stato tu, clicca su questo indirizzo:\n".
			<a href="[RECOVERY_URL]">[RECOVERY_URL]</a>\n\n".
			"In caso contrario, elimina pure questo messaggio."
		) ) , [
			'NAME'         => $user->get( User::NAME ),
			'SURNAME'      => $user->get( User::SURNAME ),
			'RECOVERY_URL' => URL . '/password-lost.php?' . http_build_query(
				'action'   => 'recovery',
				'token'    => $token,
				'uid'      => $user->get( User::UID )
			)
		]
	);
};

/**
 * The user can recover the password.
 */
$password_recovery = function ($user) {
	// TODO, do something
	$user->updateUser( [
		new DBCol( User::RECOVERY_TOKEN, null, null ),
		new DBCol( User::RECOVERY_DATE,  null, null )
	] );
};

if( isset( $_POST['action'] ) {

	$user = User::factoryByUID( $_POST['user_uid'] )
		->select( [
			User::ID_,
			User::UID,
			User::NAME,
			User::SURNAME,
			User::RECOVERY_TOKEN,
			User::RECOVERY_DATE
		] )
		->queryRow();

	if( $user ) {
		switch( $_POST['action'] ) {
			case 'password_identification':
				$password_identification( $user );
				break;
			case 'password_recovery':
				$password_reset( $user );
				break;
			default:
				error_die("Unknown error");
	}
}

Header::spawn('password-recovery');
?>

<?php if( $submit ): ?>
	<p><?php _e("Se l'utente esiste riceverai a breve le istruzioni via e-mail.") ?></p>
<?php else: ?>
<section class="mbr-section article">
	<div class="mbr-table-cell">
		<div class="container">
			<form method="post" class="row">
				<input type="hidden" name="action" value="<?php
					echo isset( $_GET['action'] )
						? 'password_recovery'
						: 'password_identification'
				?>" />
				<div class="mbr-section col-md-12 text-xs-center">
					<h1><?php _e("Recupero password") ?></h1>
				</div>
				<div class="mbr-section col-md-12">
					<label for="user_uid"><?php _e("Indirizzo e-mail") ?></label>
					<input type="email" name="user_uid" id="user_uid" required="required" <?php
						if( isset( $_POST['user_uid'] ) ) {
							_esc_attr( $_POST['user_uid'] );
						}
					?> />
				</div>
				<div class="mbr-section col-md-12">
					<button type="submit"><?php _e("Invio") ?></button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php endif ?>

<?php
Footer::spawn();
