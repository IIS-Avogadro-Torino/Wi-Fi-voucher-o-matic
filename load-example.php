<?php
######################################################################
# Wi-Fi-voucher-o-matic - Wi-Fi voucher manager
# Copyright (C) 2017 Valerio Bozzolan, Ivan Bertotto, ITIS AVogadro
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

// Database credentials
$username = '';
$password = '';
$database = '';
$location = 'localhost';

// Table prefix, if any!
$prefix = 'registrazioni_';

// This folder
define('ABSPATH', __DIR__ );

// The URL relative folder of this project without trailing slash (e.g. '/vouchers')
define('ROOT', '');

define('CONTACT_EMAIL', 'staff@itisavogadro.org');

// Insert here your Boz-PHP framework path
require '/usr/share/boz-php-another-php-framework/load.php';
