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

$vouchers = file_get_contents( $argv[1] );

$stupid_non_json_fields = [
	'ObjectId',
	'NumberLong',
	'NumberInt',
	')',
	'('
];

$vouchers = str_replace($stupid_non_json_fields, '', $vouchers);

$vouchers = rtrim($vouchers, ",\n ");

$vouchers = "[$vouchers]";

file_put_contents('voucher.clean.json', $vouchers);

$vouchers = json_decode($vouchers);

$rows = [];
foreach($vouchers as $voucher) {
	$rows[] = [
		$voucher->code,
		$voucher->duration
	];
}

insert_values('voucher', [
	'voucher_code' => 's',
	'voucher_duration' => 'd'
], $rows);

printf( "Imported %d vouchers.\n", count($vouchers) );
