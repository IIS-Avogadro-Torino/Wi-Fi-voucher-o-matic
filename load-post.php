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

// Default voucher duration
defined('DEFAULT_DURATION')
	or define('DEFAULT_DURATION', 525600);

// Images and other files. Because of "static" is a reserved word...
defined('STITIC')
	or define('STITIC', 'static');

// Classes folder
define('INCLUDES', 'includes');

// Autoload classes
spl_autoload_register( function($c) {
	$path = ABSPATH . __ . INCLUDES . __ . "class-$c.php";
	if( is_file( $path ) ) {
		require $path;
	}
} );

defined('JQUERY')
	or define('JQUERY', '/javascript/jquery/jquery.min.js');

register_js('jquery', JQUERY);
