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
 * To query users
 */
class Users extends Query {

	/**
 	 * Constructor
	 */
	public function __construct() {
		parent::__construct();
		$this->defaultClass( 'User' );
		$this->from( User::T );
	}

	/**
	 * Search an incomplete user name
	 *
	 * @param $name string
	 * @return self
	 */
	public function whereUserNameLike( $name ) {
		return $this->whereLike( User::NAME, $name );
	}

	/**
	 * Search an incomplete user surname
	 *
	 * @param $surname string
	 * @return self
	 */
	public function whereUserSurnameLike( $surname ) {
		return $this->whereLike( User::SURNAME, $surname );
	}

	/**
	 * Search a certain user UID
	 *
	 * @param $uid
	 * @return self
	 */
	public function whereUserUID( $uid ) {
		return $this->whereStr( User::UID, $uid );
	}

	/**
	 * Search a certain voucher
	 *
	 * @param $code string
	 * @return self
	 */
	public function whereVoucher( $code ) {
		$this->joinVouchers();
		return $this->whereStr( Voucher::CODE, $code );
	}

	/**
	 * Join users and vouchers
	 *
	 * It can be safetly called multiple time.
	 *
	 * return self
	 */
	protected function joinVouchers() {
		if( empty( $this->_joinedVouchers ) ) {
			$this->from( RelUserVoucher::T );
			$this->from( Voucher       ::T );
			$this->equals( RelUserVoucher::USER_,    User::ID_    );
			$this->equals( RelUserVoucher::VOUCHER_, Voucher::ID_ );

			$this->_joinedVouchers = true;
		}
		return $this;
	}

}
