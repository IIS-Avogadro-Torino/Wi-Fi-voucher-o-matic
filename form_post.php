m<?php
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

var_dump($_POST);exit;

require 'load.php';

Header::spawn('form_post');

if( isset(
	$_POST['user_name'],
	$_POST['user_surname'],
	$_POST['user_uid'],
	$_POST['user_type']
) ) {
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

		$voucher = query_row(
			sprintf(
				"SELECT voucher_ID, voucher_code FROM {$JOIN('voucher')} WHERE voucher_duration = %d AND NOT EXISTS (".
					"SELECT * FROM {$JOIN('rel_user_voucher')} WHERE rel_user_voucher.voucher_ID = voucher.voucher_ID ".
				") LIMIT 1",
				$duration
			),
			'Voucher'
		);

		if( ! $voucher ) {
			die("Voucher terminati. Contattare Ivan.");
		}

		RelUserVoucher::insertUserVoucher( $user_ID, $voucher->voucher_ID );

		$done = true;
	}
}

?>
<section class="mbr-section mbr-section-nopadding" id="video1-l">

    <div class="mbr-figure">
        <div><img src="<?php echo STATIC_ROOT ?>/images/avowifiok-1400x602.png"></div>
        <div class="mbr-figure-caption">
            <div class="container"><p><h1>Ottimo!</h1></p><br><p>Leggi la posta.</p>
            Ti abbiamo inviato il codice per iniziare da subito a navigare.
            
            <br>
            <b>Buona navigazione ! </b>
            
            
            </div>
            
        </div>
    </div>

</section>

<?php
Footer::spawn();
