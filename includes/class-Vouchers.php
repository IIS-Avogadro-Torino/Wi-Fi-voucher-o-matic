<?php
######################################################################
# Wi-Fi-voucher-o-matic - Wi-Fi voucher manager
# Copyright (C) 2018 Valerio Bozzolan, Ivan Bertotto, IIS Avogadro
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

/**
 * To query vouchers
 */
class Vouchers extends Query {

	/**
 	 * Constructor
	 */
	public function __construct() {
		parent::__construct();
		$this->defaultClass( 'Voucher' );
		$this->from( Voucher::T );
	}

	/**
	 * Search a voucher assigned to a certain user ID
	 *
	 * @param $ID int
	 * @return self
	 */
	public function whereUserID( $ID ) {
		$this->joinRelUserVoucher();
		return $this->whereInt( User::ID, $ID );
	}

	/**
	 * Search a specific voucher code
	 *
	 * @param $code string
	 * @return self
	 */
	public function whereVoucherCode( $code ) {
		return $this->whereStr( Voucher::CODE, $code );
	}

	/**
	 * Join vouchers and users
	 *
	 * It can be safetly called multiple time.
	 *
	 * return self
	 */
	protected function joinRelUserVoucher() {
		if( empty( $this->_joinedRelUserVoucher ) ) {
			$this->from( RelUserVoucher::T );
			$this->equals( RelUserVoucher::VOUCHER_, Voucher::ID_ );

			$this->_joinedRelUserVoucher = true;
		}
		return $this;
	}

}
