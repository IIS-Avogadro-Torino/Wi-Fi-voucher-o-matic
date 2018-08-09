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

// Default voucher duration
defined('DEFAULT_DURATION')
	or define('DEFAULT_DURATION', 525600);

// Images and other files. Because of "static" is a reserved word...
defined('STITIC')
	or define('STITIC', 'static');

define('STATIC_ROOT', ROOT    . _  . STITIC);
define('STATIC_URL',  URL     . _  . STITIC);
define('STATIC_PATH', ABSPATH . __ . STITIC);

// Classes folder
define('INCLUDES', 'includes');

// Autoload classes
spl_autoload_register( function($c) {
	$path = ABSPATH . __ . INCLUDES . __ . "class-$c.php";
	if( is_file( $path ) ) {
		require $path;
	}
} );

defined('SITE_NAME')
	or define('SITE_NAME', _("Gruppo rete Avogadro") );

defined('RAUSA_EMAIL')
	or define('RAUSA_EMAIL', 'prausa@itisavogadro.it');

defined('NET_SMTP_PATH')
	or define('NET_SMTP_PATH', '/usr/share/php/Net/SMTP.php');

defined('JQUERY')
	or define('JQUERY', '/javascript/jquery/jquery.min.js');

register_js('jquery', JQUERY);

add_menu_entries( [
	new MenuEntry('index',           ROOT,                          _("Home") ),
	new MenuEntry('lista_richieste', ROOT . '/lista_richieste.php', _("Richiedi" )         ),
	new MenuEntry('condizioni',      ROOT . '/#header3-b',          _("Condizioni")        ),
	new MenuEntry('panel',           ROOT . '/Panel',               _("Admin")             ),
	new MenuEntry('docente',         ROOT . '/docente.php',         _("Docente"),          'hidden'),
	new MenuEntry('studente',        ROOT . '/studente.php',        _("Studente"),         'hidden'),
	new MenuEntry('ospite',          ROOT . '/ospite.php',          _("Ospite"),           'hidden'),
	new MenuEntry('dispositivo',     ROOT . '/dispositivo.php',     _("Dispositivo"),      'hidden'),
	new MenuEntry('form_post',       ROOT . '/form_post.php',       _("Invio dati"),       'hidden'),
	new MenuEntry('logout',          ROOT . '/login.php?logout=1',  _("Esci"),             'hidden'),
	new MenuEntry('password-lost',   ROOT . '/password-lost.php',   _("Password dimenticata"), 'hidden'),
	new MenuEntry('privacy',   'http://privacy.itisavogadro.org',   _("Privacy"),          null    , [
		'intag' => 'target="_blank"',
	] ),

] );

register_permissions('admin', [
	'administrate'
] );

inherit_permissions('superadmin', 'admin', [
	'view-all-users',
	'register_whatever_ata_mail',
	'register_god',
] );

require ABSPATH . __ . INCLUDES . __ . 'functions.php';
