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

class Voucher extends Queried {

	const T = 'voucher';

	const ID            = 'voucher_ID';
	const CODE          = 'voucher_code';
	const TYPE          = 'voucher_type';
	const DURATION      = 'voucher_duration';

	function __construct() {
		$this->integers(self::ID);
	}

	/**
	 * RelUserVoucher factory.
	 *
	 * @return Query
	 */
	static function factory() {
		return Query::factory( __CLASS__ )
			->from( self::T );
	}

	static function insert($code, $type, $duration) {
		insert_row(self::T, [
			new DBCol(self::CODE,     $code,     's'),
			new DBCol(self::TYPE,     $type,     's'),
			new DBCol(self::DURATION, $duration, 'd')
		] );
	}

	static function filterType( $user_type ) {
		$types = ['menthor', 'student'];
		if( in_array( $user_type, $types, true ) ) {
			return $user_type;
		}
		if( $user_type === 'ata' ) {
			return 'menthor';
		}
		return 'alien';
	}
}
