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
 * Pager for Users results
 */
class UsersPager extends QueryPager {

	const ARG_NAME    = 'name';
	const ARG_SURNAME = 'surname';
	const ARG_UID     = 'uid';
	const ARG_VOUCHER = 'voucher';

	/**
	 * Create a query to match all the records from some arguments
	 *
	 * You should not apply any ORDER BY statement.
	 *
	 * @param $args array Arguments
	 * @return Query
	 */
	protected function createQuery() {
		$query = new Users();

		// search user name
		if( $this->hasArg( self::ARG_NAME ) ) {
			$query->whereUserNameLike( $this->getArg( self::ARG_NAME ) );
		}

		// search user surname
		if( $this->hasArg( self::ARG_SURNAME ) ) {
			$query->whereUserSurnameLike( $this->getArg( self::ARG_SURNAME ) );
		}

		// search user uid
		if( $this->hasArg( self::ARG_UID ) ) {
			$query->whereUserUID( $this->getArg( self::ARG_UID ) );
		}

		// search by voucher
		if( $this->hasArg( self::ARG_VOUCHER ) ) {
			$query->whereVoucher( $this->getArg( self::ARG_VOUCHER ) );
		}

		return $query;
	}

	/**
	 * Apply a certain order to a query object
	 *
	 * @param $query Query
	 * @param $order_by string
	 * @param $direction string
	 * @return bool Success or not
	 */
	protected function applyOrder( & $query, $order_by, $direction ) {

		switch( $order_by ) {
			case self::ARG_NAME:
				$query->orderBy( User::NAME, $direction );
				break;
			case self::ARG_SURNAME:
				$query->orderBy( User::SURNAME, $direction );
				break;
			case self::ARG_UID:
				$query->orderBy( User::UID, $direction );
				break;
			default:
				return false;
		}

		return true;
	}

}
