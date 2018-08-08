<?php
######################################################################
# Wi-Fi-Activationcode-o-matic - Wi-Fi Activationcode manager
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

class Printmenu {
	static function spawn($uid = null, $level = 0, $args = [] ) {

		$args = array_replace( [
			'max-level' => 99
		], $args );

		if( $level > $args['max-level'] ) {
			return;
		}
		$menuEntries = get_children_menu_entries($uid);
		if( ! $menuEntries ) {
			return;
		}
		?>

		<?php if($level === 0): ?>
			<div class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
		<?php else: ?>
			<div>
		<?php endif ?>

			<?php foreach($menuEntries as $menuEntry): ?>

				<li class="nav-item">
					<?php echo HTML::a(
						$menuEntry->url,
						$menuEntry->name,
						$menuEntry->get('title'),
						'nav-link link'
					) ?>

					<?php self::spawn( $menuEntry->uid, $level + 1, $args ) ?>

				</li>

				<?php endforeach ?>

			</ul>
		<?php
	}

}
