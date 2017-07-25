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

Header::spawn('lista_richieste');

?>

<section class="mbr-section mbr-section__container mbr-after-navbar" id="video2-1q" style="background-color: rgb(0, 0, 0); padding-top: 0px; padding-bottom: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="mbr-figure">
                    <div><img src="<?php echo STATIC_ROOT ?>/images/avowifiok-1400x602.png"></div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="mbr-section article mbr-parallax-background" id="msg-box8-1u" style="background-image: url(<?php echo STATIC_ROOT ?>/images/mbr-2000x1334.jpg); padding-top: 120px; padding-bottom: 120px;">

    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(34, 34, 34);">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-xs-center">
                <h3 class="mbr-section-title display-2">Dimmi chi sei ...</h3>
                <div class="lead"><p>Ti connetterò :-)</p></div>
                
            </div>
        </div>
    </div>

</section>

<section class="mbr-section" id="pricing-table2-2f" style="background-color: rgb(255, 255, 255); padding-top: 40px; padding-bottom: 120px;">

    

    <div class="mbr-section mbr-section__container mbr-section__container--middle">
      <div class="container">
          <div class="row">
              <div class="col-xs-12 text-xs-center">
                  <h3 class="mbr-section-title display-2">Scegli tra...</h3>
                  <small class="mbr-section-subtitle"></small>
              </div>
          </div>
      </div>
    </div>

    <div class="mbr-section mbr-section-nopadding mbr-price-table">
      <div class="row">
            <div class="col-xs-12  col-md-6 col-xl-3">
                <div class="mbr-plan card text-xs-center">
                    <div class="mbr-plan-header card-block">
                      
                      <div class="card-title">
                        <h3 class="mbr-plan-title">DOCENTE / ATA</h3>
                        <small class="mbr-plan-subtitle">Un anno senza limiti</small>
                      </div>
                      <div class="card-text">
                          <div class="mbr-price">
                            <span class="mbr-price-value"></span>
                            <span class="mbr-price-figure">365 giorni</span><small class="mbr-price-term"></small>
                          </div>
                          <small class="mbr-plan-price-desc"></small>
                      </div>
                    </div>
                    <div class="mbr-plan-body card-block">
                      <div class="mbr-plan-list"><ul class="list-group list-group-flush"><li class="list-group-item">8 megabit</li><li class="list-group-item">Fino a 10 dispositivi&nbsp;</li></ul></div>
                      <div class="mbr-plan-btn"><a href="<?php echo get_menu_entry('docente')->url ?>" class="btn btn-black btn-black-outline">Chiedi</a></div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12  col-md-6 col-xl-3">
                <div class="mbr-plan card text-xs-center">
                    <div class="mbr-plan-header card-block">
                      
                      <div class="card-title">
                        <h3 class="mbr-plan-title">STUDENTE</h3>
                        <small class="mbr-plan-subtitle">Un anno senza limiti</small>
                      </div>
                      <div class="card-text">
                          <div class="mbr-price">
                            <span class="mbr-price-value"></span>
                            <span class="mbr-price-figure">365 giorni</span><small class="mbr-price-term"></small>
                          </div>
                          <small class="mbr-plan-price-desc"></small>
                      </div>
                    </div>
                    <div class="mbr-plan-body card-block">
                      <div class="mbr-plan-list"><ul class="list-group list-group-flush"><li class="list-group-item">5 megabit</li><li class="list-group-item">Fino a 5 dispositivi&nbsp;</li></ul></div>
                      <div class="mbr-plan-btn"><a href="<?php echo get_menu_entry('studente')->url ?>" class="btn btn-black btn-black-outline">Chiedi</a></div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12  col-md-6 col-xl-3">
                <div class="mbr-plan card text-xs-center">
                    <div class="mbr-plan-header card-block">
                      
                      <div class="card-title">
                        <h3 class="mbr-plan-title">OSPITE</h3>
                        <small class="mbr-plan-subtitle">Benvenuti all' Avo</small>
                      </div>
                      <div class="card-text">
                          <div class="mbr-price">
                            <span class="mbr-price-value"></span>
                            <span class="mbr-price-figure">6 ore</span><small class="mbr-price-term"></small>
                          </div>
                          <small class="mbr-plan-price-desc"></small>
                      </div>
                    </div>
                    <div class="mbr-plan-body card-block">
                      <div class="mbr-plan-list"><ul class="list-group list-group-flush"><li class="list-group-item">4 megabit</li><li class="list-group-item">1 Gigabyte</li></ul></div>
                      <div class="mbr-plan-btn"><a xxxhref="<?php echo get_menu_entry('ospite')->url ?>" class="btn btn-black btn-black-outline">Presto disponibile</a></div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12  col-md-6 col-xl-3">
                <div class="mbr-plan card text-xs-center">
                    <div class="mbr-plan-header card-block">
                      
                      <div class="card-title">
                        <h3 class="mbr-plan-title">DISPOSITIVO</h3>
                        <small class="mbr-plan-subtitle">Registra il computer della scuola</small>
                      </div>
                      <div class="card-text">
                          <div class="mbr-price">
                            <span class="mbr-price-value"></span>
                            <span class="mbr-price-figure">5 anni</span><small class="mbr-price-term"></small>
                          </div>
                          <small class="mbr-plan-price-desc"></small>
                      </div>
                    </div>
                    <div class="mbr-plan-body card-block">
                      <div class="mbr-plan-list"><ul class="list-group list-group-flush"><li class="list-group-item">banda illimitata</li><li class="list-group-item">Connesso alla lan</li></ul></div>
                      <div class="mbr-plan-btn"><a href="http://www.grupporete.itisavogadro.org/index.php/servizi/avo-wifi/richiesta-dispositivo" class="btn btn-black btn-black-outline">Chiedi</a></div>
                    </div>
                </div>
            </div>
          </div>
    </div>

</section>

<?php
Footer::spawn();
