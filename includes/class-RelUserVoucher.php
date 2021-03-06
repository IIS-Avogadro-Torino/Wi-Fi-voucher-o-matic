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

trait RelUserVoucherTrait {
	function formatRelUserVoucherDate($f) {
		return $this->get( RelUserVoucher::CREATION_DATE )
			->format($f);
	}
}

class_exists('User');

class RelUserVoucher extends Queried {
	use RelUserVoucherTrait;
	use UserTrait;

	const T = 'rel_user_voucher';

	const USER          = 'user_ID';
	const VOUCHER       = 'voucher_ID';
	const DEVICE_NAME   = 'rel_user_voucher_device';
	const CREATION_DATE = 'rel_user_voucher_creation_date';
	const CREATION_USER = 'rel_user_voucher_creation_user';

	const USER_         = self::T . DOT . self::USER;
	const VOUCHER_      = self::T . DOT . self::VOUCHER;

	function __construct() {
		$this->integers ( self::CREATION_USER );
		$this->datetimes( self::CREATION_DATE );

		$this->normalizeUser();
	}

	static function factoryUser() {
		return self::factory()
			->from( User::T )
			->equals( User::ID_, self::USER_ );
	}

	static function factoryVoucher() {
		return self::factory()
			->from( Voucher::T )
			->equals( Voucher::ID_, self::VOUCHER_ );
	}

	static function factoryUserVoucher() {
		return self::factoryUser()
			->from( Voucher::T )
			->equals( Voucher::ID_, self::VOUCHER_ );
	}

	/**
	 * Insert a new RelUserVoucher.
	 *
	 * @param int $user_ID User::ID
	 * @param int $voucher_ID Voucher::ID
	 */
	static function insertUserVoucher($user_ID, $voucher_ID) {

		$creation_user = is_logged()
			? get_user('user_ID')
			: $user_ID;

		insert_row(self::T, [
			new DBCol(self::USER,          $user_ID,       'd'),
			new DBCol(self::VOUCHER,       $voucher_ID,    'd'),
			new DBCol(self::CREATION_DATE, 'NOW()',        '-'),
			new DBCol(self::CREATION_USER, $creation_user, 'd')
		] );
	}
}
