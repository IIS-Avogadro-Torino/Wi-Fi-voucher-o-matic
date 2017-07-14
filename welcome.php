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

Header::spawn('welcome', [
	'navbar' => false
] );

?>
<section class="mbr-section mbr-section-nopadding" id="video1-l">

    <div class="mbr-figure">
        <div><img src="assets/images/avowifiok-1400x602.png"></div>
        <div class="mbr-figure-caption">
            <div class="container"><p>Benvenuto!</p><br><p>Login avvenuto con successo.</p>
            Puoi tornare al sito dell' <a href="http://www.itisavogadro.it">Avogadro</a>
            <br>
            Oppure fatti un giro nel sito <a href="http://grupporete.itisavogadro.org"> del Gruppo Rete </a>.
            <br> <br>
            <b>Buona navigazione ! </b>
            
            
            </div>
            
        </div>
    </div>

</section>

<?php
Footer::spawn();
