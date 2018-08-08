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

trait UserTrait {
	function updateUser( $cols ) {
		return User::update( $this->get(User::ID), $cols );
	}

	function normalizeUser() {
		$this->integers(
			User::ID,
			User::ACTIVE,
			User::IS_PUBLIC
		);
		$this->datetimes( User::RECOVERY_DATE );
	}
}

class User extends Queried {
	use UserTrait;

	const T = 'user';

	const ID        = 'user_ID';
	const NAME      = 'user_name';
	const SURNAME   = 'user_surname';
	const UID       = 'user_uid';
	const TYPE      = 'user_type';
	const ROLE      = 'user_role';
	const ACTIVE    = 'user_active';
	const IS_PUBLIC = 'user_public';
	const PASSWORD  = 'user_password';
	const RECOVERY_TOKEN = 'user_recovery_token';
	const RECOVERY_DATE  = 'user_recovery_date';

	const ID_     = self::T . DOT . self::ID;

	function __construct() {
		$this->normalizeUser();
	}

	/**
	 * User factory.
	 *
	 * @return Query
	 */
	static function factory() {
		return Query::factory( __CLASS__ )->from( self::T );
	}

	static function factoryByID( $user_ID ) {
		return self::factory()
			->whereInt( self::ID, $user_ID );
	}

	/**
	 * User factory.
	 *
	 * @param string $user_uid User::UID
	 * @return Query
	 */
	static function factoryByUID($user_uid) {
		$user_uid = luser_input($user_uid, 128);

		return self::factory()
			->whereStr(self::UID, $user_uid);
	}

	static function filterType( $user_type ) {
		$types = ['ata', 'menthor', 'student'];
		if( in_array( $user_type, $types, true ) ) {
			return $user_type;
		}
		if( $user_type === 'god' && has_permission('register_god') ) {
			return 'god';
		}
		return 'alien';
	}

	static function update( $user_ID, $cols = [] ) {
		query_update(self::T, $cols, sprintf(
			'%s = %d',
			self::ID,
			$user_ID
		) );
	}
}
