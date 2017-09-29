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

Header::spawn('studente');

?>

<section class="mbr-section article mbr-parallax-background mbr-after-navbar" id="msg-box8-1b" style="background-image: url(<?php echo STATIC_ROOT ?>/images/mbr-2000x1339.jpg); padding-top: 120px; padding-bottom: 120px;">

    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(34, 34, 34);">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-xs-center">
                <h3 class="mbr-section-title display-2">Richiesta account studente</h3>
                <div class="lead"><h4>un anno per voi</h4></div>
                
            </div>
        </div>
    </div>

</section>

<section class="mbr-section article mbr-section__container" id="content1-1c" style="background-color: rgb(255, 255, 255); padding-top: 20px; padding-bottom: 20px;">

    <div class="container">
        <div class="row">
            <div class="col-xs-12 lead"><p>In questa pagina trovate l'elenco dei docenti e del personale della scuola che possono crearvi un account.<br>Contattate quello di competenza per la vostra area tramite una mail avente come oggetto "Richiesta accesso WiFi" (Scrivete essattamente così altrimenti la mail non viene processata) uno e chiedetegli di poter avere l'accesso per un anno, indicando : <br> <b>Cognome, Nome e-mail, classe di appartenenza.
            
            <h3> &nbsp; </h3>
            
            <h4> Docenti per area: </h4>
            
            
            </b></p>
            <p>
            <ul>
            <li><b>Biennio ITT</b> &nbsp; Paolo Nesi , Ivan Bertotto , Enrica Bricchetto </li>
            <li><b>Triennio Mecc + Ele</b> &nbsp; Nicola Noviello , Paolo Bilewski </li>
            <li><b>Triennio Inf:</b> &nbsp; Emanuela Mormile , Massimo Papa </li>
            <li><b>Liceo</b> &nbsp; Gianpietro Rausa </li>
            <li><b>Serale</b> &nbsp; Lorenzo Nazario, Vittorio Ferreri </li>
            </ul>       
            </p>  <br>                                       
            
            
            
            <p>Usate bene quello che vi offriamo, noi ce la mettiamo tutta per darvi tutti i servizi possibili, vi chiediamo solo di usarli per crescere .</p></div>
        </div>
    </div>

</section>

<section class="mbr-section" id="form1-1d" style="background-color: rgb(255, 255, 255); padding-top: 40px; padding-bottom: 120px;">
    
    <div class="mbr-section mbr-section__container mbr-section__container--middle">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-xs-center">
                    <h3 class="mbr-section-title display-2">Elenco personale abilitato</h3>
                    <small class="mbr-section-subtitle">Elenco in continuo aggiornamento</small>
                </div>
            </div>
        </div>
    </div>
    <div class="mbr-section mbr-section-nopadding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-10 col-lg-offset-1" data-form-type="formoid">


	<table class="table table-hover">
		<thead>
			<tr>
				<th><?php _e("Nome") ?></th>
				<th><?php _e("Cognome") ?></th>
				<th><?php _e("E-mail") ?></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$users = User::factory()
				->select(
					User::NAME,
					User::SURNAME,
					User::UID
				)
				->whereStr( User::IS_PUBLIC, 1 )
				->orderBy( User::NAME )
				->queryResults();
			?>

			<?php foreach($users as $user): ?>
			<tr>
				<td><?php echo $user->get( User::NAME    ) ?></td>
				<td><?php echo $user->get( User::SURNAME ) ?></td>
				<td><?php echo $user->get( User::UID     ) ?></td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>






                </div>
            </div>
        </div>
    </div>
</section>

<?php
Footer::spawn();

