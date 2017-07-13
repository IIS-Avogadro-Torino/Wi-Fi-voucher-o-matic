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

$TIPO_2_TYPE = [
	'God_AVO'          => 'god',
	'Prof_AVO'         => 'menthor',
	'Studenti_AVO'     => 'student',
	'Guest_Access_AVO' => 'alien'
];

$handle = fopen( $argv[1] , 'r');

$first = true;
$rows = 1;
while( $voucher = fgetcsv($handle) ) {
	if( $first ) {
		$first = false;
		continue;
	}

	list($id, $code, $tipo, $attivato) = $voucher;

	$existing_voucher = Activationcode::factory()
		->select(1)
		->whereStr(Activationcode::CODE, $code)
		->queryRow();

	if( $existing_voucher ) {
		printf("Skipped '%s'\n", $code);
		continue;
	}

	if( ! isset( $TIPO_2_TYPE[ $tipo ] ) ) {
		error_die( sprintf("Tipo '%s' non esiste", $tipo) );
	}

	$type = $TIPO_2_TYPE[ $tipo ];

	Activationcode::insert($code, $type);

	$rows++;
}

printf( "Imported %d vouchers.\n", $rows );
