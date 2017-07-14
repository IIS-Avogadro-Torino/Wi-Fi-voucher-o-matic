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

Header::spawn('docente');

?>


<section class="mbr-section article mbr-parallax-background mbr-after-navbar" id="msg-box8-s" style="background-image: url(<?php echo STATIC_ROOT ?>/images/william-iven-2000x1328.jpg); padding-top: 120px; padding-bottom: 120px;">

    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(34, 34, 34);">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-xs-center">
                <h3 class="mbr-section-title display-2">Richiesta account docente e ata</h3>
                <div class="lead"><p>Per utilizzarlo dovete avere una casella di posta itisavogadro.it</p></div>
                
            </div>
        </div>
    </div>

</section>

<section class="mbr-section article mbr-section__container" id="content1-u" style="background-color: rgb(255, 255, 255); padding-top: 20px; padding-bottom: 20px;">

    <div class="container">
        <div class="row">
            <div class="col-xs-12 lead"><p>Se avete una mail itisavogadro.it potete compilare questo form e ottenere subito un voucher per navigare 365 giorni con la rete della scuola.</p><p>Avrete a disposizione 8 megabit ciascuno.</p></div>
        </div>
    </div>

</section>

<section class="mbr-section" id="form1-t" style="background-color: rgb(255, 255, 255); padding-top: 40px; padding-bottom: 120px;">
    <div class="mbr-section mbr-section__container mbr-section__container--middle">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-xs-center">
                    <h3 class="mbr-section-title display-2">Richiesta account Docente e ATA</h3>
                    <small class="mbr-section-subtitle"></small>
                </div>
            </div>
        </div>
    </div>
    <div class="mbr-section mbr-section-nopadding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-10 col-lg-offset-1" data-form-type="formoid">


                    <div data-form-alert="true">
                        <div hidden="" data-form-alert-success="true" class="alert alert-form alert-success text-xs-center">TGrazie per aver compilato il form.</div>
                    </div>


                    <form action="<?php echo get_menu_entry('form_post')->url ?>" method="post" data-form-title="Richiesta account docente e Ata">

                <div class="row row-sm-offset">
                      <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="form1-t-name"><?php _e("Nome") ?><span class="form-asterisk">*</span></label>
                                </div>
                        	    <div class="col-xs-12 col-md-4">
                                     <input type="text" class="form-control" name="user_name" required="required" data-form-field="Name" id="form1-t-name">
                                </div>
                       </div>
                 </div>      
                          
                <div class="row row-sm-offset">
                      <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="form1-t-surname"><?php _e("Cognome") ?><span class="form-asterisk">*</span></label>
                                </div>
                        	    <div class="col-xs-12 col-md-4">
                                     <input type="text" class="form-control" name="user_name" required="required" data-form-field="Surname" id="form1-t-surname">
                                </div>
                       </div>
                 </div>                             
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                           
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="form1-t-surname"><?php _e("Cognome") ?><span class="form-asterisk">*</span></label>
                                    <input type="text" class="form-control" name="user_surname" required="required" data-form-field="Name" id="form1-t-surname">
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">
					<select name="user_type">
						<option disabled="disabled" selected="selected"><?php _e("Scegli un'opzione") ?></option>
						<option value="ata"><?php _e("Personale ATA") ?></option>
						<option value="menthor"><?php _e("Docente") ?></option>
					</select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="form1-t-email">Email (solo quella @itisavogadro.org)<span class="form-asterisk">*</span></label>
                                    <input type="email" class="form-control" name="user_uid" required="required" data-form-field="Email" id="form1-t-email">
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
Footer::spawn();
