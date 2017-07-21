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

require 'load.php';

if( empty( $_POST ) && ! empty( $_GET['logout'] ) ) {
	logout();
} else {
	login();
}

if( is_logged() ) {
	http_redirect( get_menu_entry('panel')->url );
}

Header::spawn('login');

?>

<section class="mbr-section article">
	<div class="mbr-table-cell">
		<div class="container">
			<div class="row">
				<div class="mbr-section col-md-12 text-xs-center">
					<h1><?php _e("Autenticazione") ?></h1>

					<?php if( is_logged() ): ?>
						<p><?php _e("Sei autenticato.") ?></p>
					<?php else: ?>
						<form method="post">
							<p>
								<input type="text" name="user_uid" placeholder="<?php _e("Username") ?>" />
							</p>
							<p>
								<input type="password" name="user_password" placeholder="<?php _e("Password") ?>" />
							</p>
							<p>
								<button type="submit"><?php _e("Login") ?></button>
							</p>
						</form>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
Footer::spawn();
