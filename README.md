# WI-Fi voucher-o-matic

![Wi-Fi voucher-o-matic IIS Avogadro](static/avowifiok600.png)

This project serves the Wi-Fi vouchers in the IIS Avogadro of Turin (Italy).

Get a voucher!

* https://grupporete.itisavogadro.org/avo-wifi/

## Installation

From a Debian GNU/Linux environment:

    apt install php-mysql apache2 php-mysql

    # You know where to install your Apache VirtualHost
    cd /var/www
    git clone https://github.com/ITIS-Avogadro-Torino/Wi-Fi-voucher-o-matic.git
    cd Wi-Fi-voucher-o-matic

Copy the default configuration:

    cp -a documentation/load-example.php load.php

Insert your database credentials in your configuration:

    nano load.php

Install Boz-PHP wherever you want (as default `/usr/share/`):

    apt install bzr
    bzr branch lp:boz-php-another-php-framework /usr/share/boz-php-another-php-framework
    apt remove bzr

Then:
* Install the `documentation/database-schema.sql`.
* Run the import scripts from the `cli/` directory
* Have fun!

## License
Copyright (C) 2017, 2018 Valerio Bozzolan, Ivan Bertotto, IIS Avogadro

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version. This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the [GNU General Public License](LICENSE.md) for more details.

You should have received a copy of the GNU General Public License along with this program. If not, see <http://www.gnu.org/licenses/>.
