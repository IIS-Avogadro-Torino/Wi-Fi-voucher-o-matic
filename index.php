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

Header::spawn('index');

?>
<section class="mbr-section mbr-section__container mbr-after-navbar" id="video2-8" style="background-color: rgb(0, 0, 0); padding-top: 80px; padding-bottom: 0px;">
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

<section class="mbr-section mbr-section-hero mbr-section-full mbr-parallax-background mbr-section-with-arrow" id="header1-5" style="background-image: url(<?php echo STATIC_ROOT ?>/images/sfonfoavowifi-2000x1333.jpg);">

    <div class="mbr-overlay" style="opacity: 0.6; background-color: rgb(0, 0, 0);"></div>

    <div class="mbr-table-cell">

        <div class="container">
            <div class="row">
                <div class="mbr-section col-md-10 col-md-offset-1 text-xs-center">

                    <h1 class="mbr-section-title display-1">Wireless per tutti</h1>
                    <p class="mbr-section-lead lead">Il nostro istituto vi offre una copertura wireless al 90% della superficie della scuola.<br>Studenti, docenti e personale possono accedervi senza costi e senza limitazioni di tempo.<br>Cerchiamo di fare in modo che l'informazione sia per tutti quelli che vogliono imparare.&nbsp;</p>
                    <div class="mbr-section-btn"><a class="btn btn-lg btn-danger" href="<?php echo get_menu_entry('lista_richieste')->url ?>">Richiedi Accesso</a> <a class="btn btn-lg btn-danger-outline btn-danger" href="<?php echo get_menu_entry('condizioni')->url ?>">Condizioni</a></div>
                </div>
            </div>
        </div>
    </div>

    <div class="mbr-arrow mbr-arrow-floating" aria-hidden="true"><a href="#header3-e"><i class="mbr-arrow-icon"></i></a></div>

</section>

<section class="mbr-section mbr-section__container article" id="header3-e" style="background-color: rgb(255, 255, 255); padding-top: 20px; padding-bottom: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="mbr-section-title display-2">Come funziona il servizio</h3>
                <small class="mbr-section-subtitle">Due informazioni per un anno di navigazione libera.</small>
            </div>
        </div>
    </div>
</section>

<section class="mbr-section article mbr-section__container" id="content1-f" style="background-color: rgb(255, 255, 255); padding-top: 20px; padding-bottom: 20px;">

    <div class="container">
        <div class="row">
            <div class="col-xs-12 lead"><p>57 dispositivi di ultima generazione sono connessi a una rete Internet da 1Gbps per coprire la quasi totalità dell' Istituto.</p><p><br></p><p>Gli accesspoint offrono due reti wi-fi (Avo_spot e Avo_internal) che permettono una connettività wireless sui protocolli 802.11 N e AC per tutti gli utenti della scuola.</p><p><br></p><p>La rete Avo_spot è configurata in modo da permettere l'accesso alla rete internet ma non permette la comunicazione tra dispositivi interni , questo per garantire la massima sicurezza degli utenti che la utilizzano.</p><p><br></p><p>La rete Avo_Internal invece è una rete wireless che connette i dispositivi direttamente alla rete interna, come se fossero connessi con il filo.</p><p><br></p><p>Per accedere alla rete Avo_spot basta disporre di un voucher , ovvero un codice di accesso che va inserito una sola volta e registra il dispositivo per tutta la durata del voucher stesso.</p><p>Per la rete Avo_internal bisogna registrare il dispositivo tramite compilazione del form apposito.</p><p><br></p><p><strong>Buona navigazione !</strong></p></div>
        </div>
    </div>

</section>

<section class="mbr-section article mbr-parallax-background" id="msg-box8-g" style="background-image: url(<?php echo STATIC_ROOT ?>/images/mbr-2000x1334.jpg); padding-top: 120px; padding-bottom: 120px;">

    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(34, 34, 34);">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-xs-center">
                <h3 class="mbr-section-title display-2">Tipologie di accesso</h3>
                <div class="lead"><p>Tante esigenze, tante soluzioni</p></div>
                
            </div>
        </div>
    </div>

</section>

<section class="mbr-section" id="testimonials2-h" style="background-color: rgb(255, 255, 255); padding-top: 0px; padding-bottom: 40px;">

    

        <div class="mbr-section mbr-section__container mbr-section__container--middle">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-xs-center">
                        
                        
                    </div>
                </div>
            </div>
        </div>


    <div class="mbr-section mbr-section-nopadding">
        <div class="container">
            <div class="row">

                <div class="col-xs-12">

                    <div class="mbr-testimonial card mbr-testimonial-lg">
                        <div class="card-block"><p><span style="font-size: 1.125rem; line-height: 2; text-align: left;"><strong>Accesso Gold</strong></span></p><p><span style="font-size: 1.125rem; line-height: 2; text-align: left;">Ogni utente che dispone di una casella di posta @itisavogadro.it può da subito richiedere un voucher della durata di un anno che permette di navigare liberamente da un dispositivo.</span><br></p><div><span style="font-size: 1.125rem; line-height: 2;">Chi non dispone di una mail @itisavogadro dovrà prima passare a ritirare un codice di attivazione, disponibile al centralino della scuola.</span><br></div><div><span style="font-size: 1.125rem; line-height: 2;">Ora è semplicissimo: basta connettersi alla rete Avo_spot e inserire il voucher, il dispositivo verrà identificato e per 365 giorni potrà navigare senza inserire di nuovo password o altro.</span><br></div><p></p></div>
                        <div class="mbr-author card-footer">
                            <div class="mbr-author-img"><img src="<?php echo STATIC_ROOT ?>/images/mbr-2-160x106.jpg" class="img-circle"></div>
                            <div class="mbr-author-name"><br><br></div>
                            <small class="mbr-author-desc"></small>
                        </div>
                    </div><div class="mbr-testimonial card mbr-testimonial-lg">
                        <div class="card-block"><p><strong>Accesso Device</strong></p><p><span style="font-size: 1.125rem; line-height: 2;">Se serve registrare sulla rete un dispositivo di utilizzo pubblico (computer registro elettronico, dispositivi di laboratorio, pc lim eccetera) è possibile richiedere un assegnazione permanente alla rete "Avo_internal" che permetterà al dispositivo di essere in rete esattamente come se la connessione fosse a filo.</span><br></p><p></p><div><span style="font-size: 1.125rem; line-height: 2;">La richiesta va fatta dal responsabile del dispositivo o del laboratorio tramite l'apposito form.</span><br></div><p></p></div>
                        <div class="mbr-author card-footer">
                            <div class="mbr-author-img"><img src="<?php echo STATIC_ROOT ?>/images/mbr-3-160x106.jpg" class="img-circle"></div>
                            <div class="mbr-author-name"></div>
                            <small class="mbr-author-desc"></small>
                        </div>
                    </div><div class="mbr-testimonial card mbr-testimonial-lg">
                        <div class="card-block"><p><strong>Accesso Guest</strong></p><p>Siete all' Avo per un convegno, una visita o semplicemente perchè vi siete diplomati e vi manca tanto la vostra scuola?</p><p><span style="font-size: 1.125rem; line-height: 2;">Navigate gratis... offriamo noi:-)</span></p><p><span style="font-size: 1.125rem; line-height: 2;">Con l'accesso guest vi diamo sei ore di navigazione in cui avete a disposizione ben un Gigabyte di dati tutti per voi.</span><br></p></div>
                        <div class="mbr-author card-footer">
                            <div class="mbr-author-img"><img src="<?php echo STATIC_ROOT ?>/images/mbr-160x107.jpg" class="img-circle"></div>
                            <div class="mbr-author-name"></div>
                            <small class="mbr-author-desc"></small>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>

<section class="mbr-section mbr-section__container article" id="header3-b" style="background-color: rgb(255, 255, 255); padding-top: 20px; padding-bottom: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="mbr-section-title display-2">Condizioni di utilizzo</h3>
                <small class="mbr-section-subtitle">Aggiornate a Luglio 2017</small>
            </div>
        </div>
    </div>
</section>

<section class="mbr-section article mbr-section__container" id="content6-d" style="background-color: rgb(255, 255, 255); padding-top: 20px; padding-bottom: 20px;">

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6 lead"><ul><li>L'accesso alla rete WiFi dell'Istituto (da ora AvoWiFi) è consentito solo per finalità strettamente connesse alla didattica e in nessun caso è consentito accedervi per finalità contrastanti con quelle della scuola.</li><li><span style="font-size: 1.07rem; line-height: 1.5;">Non è consentito l'accesso a siti e servizi che prevedano un traffico di dati sulla AvoWiFi tali da pregiudicarne il funzionamento.</span></li><li><span style="font-size: 1.07rem; line-height: 1.5;">Sono vietati collegamenti a servizi P2P (torrent, e-mule, file sharing) o lo scaricamento di contenuti multimediali per finalità ludiche e per gioco online.</span></li><li><span style="font-size: 1.07rem; line-height: 1.5;">L'accesso alla AvoWiFi potrà essere oggetto di interruzioni tecniche, dovute ad assenza di connessione, manutenzione, malfunzionamenti o guasti agli apparati, sul portale <strong>http://grupporete.itisavogadro.org</strong> verranno indicati gli eventuali interventi manutentivi che potrebbero interrompere o rallentare il servizio.</span></li></ul></div>
            <div class="col-xs-12 col-md-6 lead"><ul><li>L'Istituto non garantisce la connessione o un minimo di banda dati ma in linea di massima ogni utente avrà una connettività di 5 mbps simmetrica,</li><li><span style="font-size: 1.07rem; line-height: 1.5;">L'Istituto non è assolutamente responsabile di eventuali danni e guasti causati dall'utilizzo dei dispositivi mobili durante la connessione alla AvoWiFi.</span></li><li><span style="font-size: 1.07rem; line-height: 1.5;">L'Istituto non è responsabile in merito ai contenuti visitati con l'accesso alla AvoWiFi, alle conseguenze penali e civili derivanti da un uso fraudolento della medesima AvoWiFi. Ogni responsabilità civile e penale è in capo ai singoli utilizzatori della AvoWiFi.</span></li><li><span style="font-size: 1.07rem; line-height: 1.5;">L'Istituto può disporre dei filtri per contenuti ritenuti non pertinenti alle finalità educative bloccando l'accesso a risorse esterne inappropriate</span></li><li><span style="font-size: 1.07rem; line-height: 1.5;">La tracciatura degli accessi alla AvoWiFi con contestuale acquisizione delle informazioni legate alle connessioni al servizio erogato, sarà utilizzata unicamente allo scopo di prevenire abusi nell'uso della AvoWiFi.</span></li></ul></div>
        </div>
    </div>

</section>

<section class="mbr-section mbr-section__container" id="map2-6" style="background-color: rgb(239, 239, 239); padding-top: 80px; padding-bottom: 80px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="mbr-map"><iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0Dx_boXQiwvdz8sJHoYeZNVTdoWONYkU&amp;q=place_id:ChIJTQwThXttiEcRrvXIKUhkYPQ" allowfullscreen=""></iframe></div>
            </div>
        </div>
    </div>
</section>

<section class="mbr-section mbr-section-md-padding mbr-parallax-background" id="social-buttons1-i" style="background-image: url(<?php echo STATIC_ROOT ?>/images/mbr-2000x1333.jpg); padding-top: 30px; padding-bottom: 60px;">
    <div class="mbr-overlay" style="opacity: 0.2; background-color: rgb(34, 34, 34);">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-xs-center">
                <h3 class="mbr-section-title display-2">Condividi questa pagina</h3>
                <div>

                  <div class="mbr-social-likes" data-counters="false">
                    <span class="btn btn-social facebook" title="Share link on Facebook">
                        <i class="socicon socicon-facebook"></i>
                    </span>
                    <span class="btn btn-social twitter" title="Share link on Twitter">
                        <i class="socicon socicon-twitter"></i>
                    </span>
                    <span class="btn btn-social plusone" title="Share link on Google+">
                        <i class="socicon socicon-googleplus"></i>
                    </span>
                    
                    
                  </div>

                </div>
            </div>
        </div>
    </div>
</section>


<?php Footer::spawn();
