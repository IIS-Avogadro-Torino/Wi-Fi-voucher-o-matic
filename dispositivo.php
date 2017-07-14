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

Header::spawn('dispositivo');

?>

<section class="mbr-section article mbr-parallax-background mbr-after-navbar" id="msg-box8-1g" style="background-image: url(<?php echo STATIC_ROOT ?>/images/mbr-1-2000x1333.jpg); padding-top: 120px; padding-bottom: 120px;">
    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(34, 34, 34);">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-xs-center">
                <h3 class="mbr-section-title display-2">Richiesta account per dispositivo</h3>
                <div class="lead"><h4>solo responsabili di laboratorio</h4></div>
            </div>
        </div>
    </div>

</section>

<section class="mbr-section article mbr-section__container" id="content1-1h" style="background-color: rgb(255, 255, 255); padding-top: 20px; padding-bottom: 20px;">

    <div class="container">
        <div class="row">
            <div class="col-xs-12 lead"><p>Registrando un dispositivo potrete accedere alla rete "Avo_internal" e connettere il computer come se fosse connesso alla lan di Istituto.</p></div>
        </div>
    </div>

</section>

<section class="mbr-section" id="form1-1i" style="background-color: rgb(255, 255, 255); padding-top: 40px; padding-bottom: 120px;">
    
    <div class="mbr-section mbr-section__container mbr-section__container--middle">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-xs-center">
                    <h3 class="mbr-section-title display-2">Richiesta account dispositivo</h3>
                    <small class="mbr-section-subtitle">serve la mail @itisavogadro per le comunicazioni di avvenuta attivazione&nbsp;</small>
                </div>
            </div>
        </div>
    </div>
    <div class="mbr-section mbr-section-nopadding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-10 col-lg-offset-1" data-form-type="formoid">


                    <div data-form-alert="true">
                        <div hidden="" data-form-alert-success="true" class="alert alert-form alert-success text-xs-center">Thanks for filling out form!</div>
                    </div>


                    <form action="https://mobirise.com/" method="post" data-form-title="Richiesta account dispositivo">

                        <input type="hidden" value="VIu8qBwY8zZ02QeUcyBH44szsda4WW56+LbgNe63uIHld2NJAyRefFVSRPwjQN8BGwWQuZCscCQ3c0sTy54kevq5L1VJujQ10yXhCodZ+5pxqF/V+S5HIXKWopa3l/os" data-form-email="true">

                        <div class="row row-sm-offset">

                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="form1-1i-name">Name<span class="form-asterisk">*</span></label>
                                    <input type="text" class="form-control" name="name" required="" data-form-field="Name" id="form1-1i-name">
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="form1-1i-email">Email<span class="form-asterisk">*</span></label>
                                    <input type="email" class="form-control" name="email" required="" data-form-field="Email" id="form1-1i-email">
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="form1-1i-phone">Phone</label>
                                    <input type="tel" class="form-control" name="phone" data-form-field="Phone" id="form1-1i-phone">
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="form1-1i-message">Message</label>
                            <textarea class="form-control" name="message" rows="7" data-form-field="Message" id="form1-1i-message"></textarea>
                        </div>

                        <div><button type="submit" class="btn btn-primary">CONTACT US</button></div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
Footer::spawn();
