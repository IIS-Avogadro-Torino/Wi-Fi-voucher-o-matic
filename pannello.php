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

enqueue_js('jquery');

Header::spawn('pannello');

?>
<section class="mbr-section mbr-section-nopadding" id="video1-l">

    <div class="mbr-figure">
        <div><img src="assets/images/avowifiok-1400x602.png"></div>
        <div class="mbr-figure-caption">
            <div class="container"><p>Pannello di controllo</p><br>
           
   <div>     Voucher <b>ospite</b> utilizzati:    <progress value="22" max="100"> </progress> (ne rimangono [numero)]   </div> 
    <div>     Voucher <b>docente</b> utilizzati:    <progress value="77" max="100"> </progress> (ne rimangono [numero)] </div>
    <div>     Voucher <b>studente</b> utilizzati:    <progress value="54" max="100"> </progress> (ne rimangono [numero)] </div>
    <div>     Voucher <b>god</b> utilizzati:    <progress value="44" max="100"> </progress> (ne rimangono [numero)] </div>
    
    <hr noshade />
    
    <form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Admin_Panel</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="Nome">Nome</label>  
  <div class="col-md-6">
  <input id="Nome" name="Nome" type="text" placeholder="" class="form-control input-md" required="">
  <span class="help-block">Inserire il nome</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="Cognome">Cognome</label>  
  <div class="col-md-6">
  <input id="Cognome" name="Cognome" type="text" placeholder="" class="form-control input-md" required="">
  <span class="help-block">Inserire il cognome</span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-6 control-label" for="email">e-mail</label>  
  <div class="col-md-6">
  <input id="email" name="email" type="text" placeholder="" class="form-control input-md" required="">
  <span class="help-block">inserire l'e-mail</span>  
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-6 control-label" for="tipo">tipo voucher</label>
  <div class="col-md-6">
    <select id="tipo" name="tipo" class="form-control">
      <option value="Studente">Studente</option>
      <option value="Docente">Docente</option>
      <option value="ATA">ATA</option>
      <option value="GOD">GOD</option>
      <option value="Ospite">Ospite</option>
    </select>
  </div>
</div>
 
<!-- Button -->
<div class="form-group">
  <div class="col-md-6 col-md-offset-6">
    <button id="Invia" name="Invia" class="btn btn-primary">Invia</button>
  </div>
</div>

</fieldset>
</form>


            
            </div>
            
        </div>
    </div>

</section>

<?php
Footer::spawn();