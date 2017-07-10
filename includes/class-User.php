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

class User extends Queried {

	const T = 'user';

	const NAME    = 'user_name';
	const SURNAME = 'user_surname';
	const UID     = 'user_uid';
	const TYPE    = 'user_type';

	/**
	 * User factory.
	 *
	 * @return Query
	 */
	static function factory() {
		return Query::factory( __CLASS__ )->from( self::T );
	}

	/**
	 * User factory.
	 *
	 * @param string $user_uid User::UID
	 * @return Query
	 */
	static function factoryByUID($user_uid) {
		$user_uid = luser_input($user_uid, 128);

		return self::factory()->whereStr(self::UID, $user_uid);
	}
}
