#!/usr/bin/php
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

##
# Import vouchers exported from Ubiquiti
##

// only CLI allowed
empty( $argv )
	and exit;

// must specify the first argument (that is the CSV filename)
empty( $argv[ 1 ] )
	and die( "RTFM" );

require '..' . DIRECTORY_SEPARATOR . 'load.php';

// association between Ubiquiti voucher note and user roles
$NOTE_2_TYPE = [
	'God_AVO'          => 'god',
	'Prof_AVO'         => 'menthor',
	'Studenti_AVO'     => 'student',
	'Voucher studenti' => 'student',
	'Guest_Access_AVO' => 'alien',
];

$handle = fopen( $argv[ 1 ] , 'r' );

$first = true;
$i = 0; // imported
$j = 0; // skippeds
while( $voucher = fgetcsv( $handle ) ) {

	if( $first ) {
		$first = false;
		continue;
	}

	list(
		         , // _id
		         , // admin_name
		$code    , // code
		         , // creation_time
		$duration, // duration
		         , // for_hotspot
		$note    , // note
		         , // qos_overwrite
		         , // qos_rate_max_down
		         , // qos_rate_max_up
		         , // qos_usage_quota
	 	         , // quota
	 	         , // site_id
	 	$used      // used
	) = $voucher;

	if( ! isset( $code, $duration ) ) {
		echo "Error importing:\n";
		print_r( $voucher );
		exit( 1 );
	}

	if( ! $NOTE_2_TYPE[ $note ] ) {
		printf( "Unknown note '%s'\n", $note );
		$j++;
		continue;
	}

	$type = $NOTE_2_TYPE[ $note ];

	$voucher_exists = Voucher::factory()
		->select( 1 )
		->whereStr( Voucher::CODE, $code )
		->queryRow();

	if( $voucher_exists ) {
		printf( "Skip duplicated: '%s'\n", $code );
		$j++;
		continue;
	} elseif( $used ) {
		printf( "Skip used: '%s'\n", $code );
		$j++;
		continue;
	}

	Voucher::insert( $code, $type, $duration );

	$i++;
}

printf( "Imported %d vouchers.\n", $i );
