# WI-Fi voucher-o-matic

This project serves the Wi-Fi vouchers for the ITIS Avogadro of Turin (Italy).

## Installation

    apt install php-mysql apache2 php-mysql

    # You know where to install your Apache VirtualHost
    cd /var/www
    git clone https://github.com/ITIS-Avogadro-Torino/Wi-Fi-voucher-o-matic.git

Copy the default configuration:

    cd Wi-Fi-voucher-o-matic
    cp -a load-example.php load.php

Insert your database credentials:

    nano load.php

Install Boz-PHP wherever you want (as default `/usr/share/`):

    apt install bzr
    bzr branch lp:boz-php-another-php-framework /usr/share/boz-php-another-php-framework
    apt remove bzr

Then:
* Install the `database-schema.sql`.
* Run the `cli/import.php`
* Have fun!

## License
Copyright (C) 2017 Valerio Bozzolan, Ivan Bertotto, ITIS Avogadro

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version. This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the [GNU General Public License](LICENSE.md) for more details.

You should have received a copy of the GNU General Public License along with this program.If not, see <http://www.gnu.org/licenses/>.
