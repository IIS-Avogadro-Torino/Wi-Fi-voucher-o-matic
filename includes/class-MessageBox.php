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
 * Message box
 */
class MessageBox {

	const SUCCESS = 'info';
	const INFO    = 'info';
	const WARNING = 'warning';
	const ERROR   = 'danger';

	/**
	 * Spawn a message box
	 *
	 * @param $message string Message
	 * @param $type Warning level
	 */
	public static function spawn( $message, $type = 'primary' ) { ?>
		<div class="alert alert-<?php echo $type ?>" role="alert">
			<?php echo $message ?>
		</div>
	<?php }

	public static function info( $message ) {
		self::spawn( $message, self::INFO );
	}

	public static function warning( $message ) {
		self::spawn( $message, self::WARNING );
	}

	public static function error( $message ) {
		self::spawn( $message, self::ERROR );
	}

	public static function success( $message ) {
		self::spawn( $message, self::SUCCESS );
	}

}
