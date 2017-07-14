<?php
######################################################################
# Wi-Fi-voucher-o-matic - Wi-Fi voucher manager
# Copyright (C) 2017 Valerio Bozzolan, Ivan Bertotto, ITIS Avogadro
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
# along with this program.If not, see <http://www.gnu.org/licenses/>.
######################################################################

require 'load.php';

enqueue_js('jquery');

Header::spawn();

$voucher = null;
$done = false;

if( isset(
	$_POST['user_name'],
	$_POST['user_surname'],
	$_POST['user_uid'],
	$_POST['user_type']
) ) {
	$exists = User::factoryByUID( $_POST['user_uid'] )
		->queryRow();

	if( $exists ) {

	} else {
		$_POST['user_name']    = luser_input($_POST['user_name'],    32);
		$_POST['user_surname'] = luser_input($_POST['user_surname'], 32);
		$_POST['user_uid']     = luser_input($_POST['user_uid'],     32);

		insert_row('user', [
			new DBCol('user_name',    $_POST['user_name'],    's'),
			new DBCol('user_surname', $_POST['user_surname'], 's'),
			new DBCol('user_uid',     $_POST['user_uid'],     's'),
			new DBCol('user_type',    $_POST['user_type'],    's')
		] );

		$user_ID = last_inserted_ID();

		$duration = DEFAULT_DURATION;

		if( $_POST['user_type'] === 'alien' || $_POST['user_type'] === 'guest' ) {
			$duration = 10080;
		}

		$voucher = query_row(
			sprintf(
				"SELECT voucher_ID, voucher_code FROM {$JOIN('voucher')} WHERE voucher_duration = %d AND NOT EXISTS (".
					"SELECT * FROM {$JOIN('rel_user_voucher')} WHERE rel_user_voucher.voucher_ID = voucher.voucher_ID ".
				") LIMIT 1",
				$duration
			)
		);

		if( ! $voucher ) {
			die("Voucher terminati. Contattare Ivan.");
		}

		RelUserVoucher::insertUserVoucher( $user_ID, $voucher->voucher_ID );

		$done = true;
	}
}

?>

<?php if( $done ): ?>
	<p><?php printf(
		_("Non riceverai il codice sulla tua e-mail: %s."),
		esc_html( $_POST['user_uid'] )
	) ?></p>
<?php else: ?>
	<form method="post">
		<p>
			<input type="email" name="user_uid" placeholder="E-mail" />
		</p>
		<p>
			<input type="text" name="user_name" placeholder="Nome" />
		</p>
		<p>
			<input type="text" name="user_surname" placeholder="Cognome" />
		</p>
		<p>
			<select name="user_type">
				<option value="master">Docente</option>
				<option value="ata">ATA</option>
				<option value="student">Studente</option>
				<option value="guest">Ospite</option>
				<option value="alien">Altro</option>
			</select>
		</p>
		<p>
			<button type="submit">Invia</button>
		</p>
	</form>

<?php endif ?>

<?php Footer::spawn();
