<?php
######################################################################
# Wi-Fi-Activationcode-o-matic - Wi-Fi Activationcode manager
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

class Header {
	static function spawn( $page_uid, $args = [] ) {

		$args = array_replace( [
			'navbar' => true
		], $args );

		header( 'Content-Type: text/html; charset=' . CHARSET );
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?php echo STATIC_ROOT ?>/images/logo.png" type="image/x-icon">
  <meta name="description" content="" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;subset=latin">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link rel="stylesheet" href="<?php echo STATIC_ROOT ?>/bootstrap-material-design-font/css/material.css" />
  <link rel="stylesheet" href="<?php echo STATIC_ROOT ?>/tether/tether.min.css" />
  <link rel="stylesheet" href="<?php echo STATIC_ROOT ?>/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo STATIC_ROOT ?>/animate.css/animate.min.css" />
  <link rel="stylesheet" href="<?php echo STATIC_ROOT ?>/dropdown/css/style.css" />
  <link rel="stylesheet" href="<?php echo STATIC_ROOT ?>/socicon/css/styles.css" />
  <link rel="stylesheet" href="<?php echo STATIC_ROOT ?>/theme/css/style.css" />
  <link rel="stylesheet" href="<?php echo STATIC_ROOT ?>/mobirise/css/mbr-additional.css" type="text/css" />
</head>
<body>

<?php if( $args['navbar'] ): ?>
<section id="ext_menu-2g">

    <nav class="navbar navbar-dropdown navbar-fixed-top">
        <div class="container">

            <div class="mbr-table">

                <div class="mbr-table-cell">

                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>

		<?php Printmenu::spawn() ?>

                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>

                </div>
            </div>

        </div>
    </nav>

</section>
<?php endif ?>

<?php
	}
}
