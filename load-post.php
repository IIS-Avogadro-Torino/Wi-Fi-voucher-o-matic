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

// default voucher duration
define_default( 'DEFAULT_DURATION', 525600 );

// images and other files. Because of "static" is a reserved word...
define_default( 'STITIC', 'static' );
define( 'STATIC_ROOT', ROOT    . _  . STITIC );
define( 'STATIC_URL',  URL     . _  . STITIC );
define( 'STATIC_PATH', ABSPATH . __ . STITIC );

// classes folder
define( 'INCLUDES', 'includes' );

// autoload classes
spl_autoload_register( function($c) {
	$path = ABSPATH . __ . INCLUDES . __ . "class-$c.php";
	if( is_file( $path ) ) {
		require $path;
	}
} );

// site identity
define_default( 'SITE_NAME', _("Gruppo rete Avogadro") );
define_default( 'COMPANY_DOMAIN', 'itisavogadro.it' );

// burocratic administrator
define_default( 'RAUSA_EMAIL', 'prausa@itisavogadro.it' );
define_default( 'RAUSA_NAME', 'Prof. Pietro Rausa' );

// SMTP class
define_default( 'NET_SMTP_PATH', '/usr/share/php/Net/SMTP.php' );

// jQuery pathname (provided by the libjs-jquery package as default)
define_default( 'JQUERY', '/javascript/jquery/jquery.min.js' );

// register jQuery
register_js( 'jquery', JQUERY );

// menu entries
add_menu_entries( [
	new MenuEntry( 'index',           ROOT,                          __( "Home" )                           ),
	new MenuEntry( 'lista_richieste', ROOT . '/lista_richieste.php', __( "Richiedi" )                       ),
	new MenuEntry( 'condizioni',      ROOT . '/#header3-b',          __( "Condizioni" )                     ),
	new MenuEntry( 'panel',           ROOT . '/Panel',               __( "Admin" )                          ),
	new MenuEntry( 'docente',         ROOT . '/docente.php',         __( "Docente" ),              'hidden' ),
	new MenuEntry( 'studente',        ROOT . '/studente.php',        __( "Studente" ),             'hidden' ),
	new MenuEntry( 'ospite',          ROOT . '/ospite.php',          __( "Ospite" ),               'hidden' ),
	new MenuEntry( 'dispositivo',     ROOT . '/dispositivo.php',     __( "Dispositivo" ),          'hidden' ),
	new MenuEntry( 'form_post',       ROOT . '/form_post.php',       __( "Invio dati" ),           'hidden' ),
	new MenuEntry( 'logout',          ROOT . '/login.php?logout=1',  __( "Esci" ),                 'hidden' ),
	new MenuEntry( 'password-lost',   ROOT . '/password-lost.php',   __( "Password dimenticata"),  'hidden' ),
	new MenuEntry( 'privacy',   'http://privacy.itisavogadro.org',   __( "Privacy" ),               null,   [
		'intag' => 'target="_blank"',
	] ),

] );

// administrator permissions
register_permissions( 'admin', [
	'administrate',
] );

// super administrator permissions
inherit_permissions( 'superadmin', 'admin', [
	'view-all-users',
	'register_whatever_ata_mail',
	'register_god',
] );

// load some site functions
require ABSPATH . __ . INCLUDES . __ . 'functions.php';
