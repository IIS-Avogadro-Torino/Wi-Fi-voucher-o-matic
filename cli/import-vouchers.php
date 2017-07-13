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

// Only CLI allowed
empty( $argv )
	and exit;

empty( $argv[1] )
	and die("RTFM");

require '..' . DIRECTORY_SEPARATOR . 'load.php';

$NOTE_2_TYPE = [
	'God_AVO'          => 'god',
	'Prof_AVO'         => 'menthor',
	'Studenti_AVO'     => 'student',
	'Guest_Access_AVO' => 'alien'
];

$handle = fopen( $argv[1] , 'r');

$first = true;
$i = 0;
while( $voucher = fgetcsv($handle) ) {

	if( $first ) {
		$first = false;
		continue;
	}

	// "_id","admin_name","code","create_time","duration","for_hotspot","note"
	list(   ,            ,$code ,             ,$duration,              , $note) = $voucher;

	if( ! isset( $code, $duration ) ) {
		echo "Error importing:\n";
		var_dump($voucher);
		sleep(1);
	}

	if( ! $NOTE_2_TYPE[ $note ] ) {
		error_die( sprintf("Wrong note '%s'", $note) );
	}

	$type = $NOTE_2_TYPE[ $note ];

	$voucher_exists = Voucher::factory()
		->select(1)
		->whereStr(Voucher::CODE, $code)
		->queryRow();

	if( $voucher_exists ) {
		printf("Duplicated: '%s'\n", $code);
	}

	Voucher::insert($code, $type, $duration);

	$i++;
}

printf( "Imported %d vouchers.\n", $i );

