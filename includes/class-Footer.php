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

class Footer {
	static function spawn() {
?>
<section class="mbr-section mbr-section-md-padding mbr-footer footer1" id="contacts1-7" style="background-color: rgb(46, 46, 46); padding-top: 90px; padding-bottom: 90px;">
    <div class="container">
        <div class="row">
            <div class="mbr-footer-content col-xs-12 col-md-3">
                <div><a href="http://grupporete.itisavogadro.org" target="_blank"><img src="<?php echo STATIC_ROOT ?>/images/avowifioksmall-128x55.png"></a></div>
            </div>
            <div class="mbr-footer-content col-xs-12 col-md-3">
                <p><strong>Istituto Avogadro</strong><br>Corso San Maurizio 8&nbsp;<br>10124 Torino<br></p>
            </div>
            <div class="mbr-footer-content col-xs-12 col-md-3">
                <p><strong>Contatto:</strong><br>
Email: <?php echo CONTACT_EMAIL ?><br><br></p>
            </div>
            <div class="mbr-footer-content col-xs-12 col-md-3">
                <p><strong>Links</strong><br><a href="http://www.itisavogadro.it">sito scuola</a><br><a href="http://grupporete.itisavogadro.org">grupporete</a><br><br></p>
            </div>

        </div>
    </div>
</section>

<footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-2" style="background-color: rgb(50, 50, 50); padding-top: 1.75rem; padding-bottom: 1.75rem;">
    
    <div class="container">
        <p class="text-xs-center">Copyright (c) <?php echo date('Y') ?> Grupporete.</p>
    </div>
</footer>


  <script src="<?php echo STATIC_ROOT ?>/web/assets/jquery/jquery.min.js"></script>
  <script src="<?php echo STATIC_ROOT ?>/tether/tether.min.js"></script>
  <script src="<?php echo STATIC_ROOT ?>/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo STATIC_ROOT ?>/smooth-scroll/smooth-scroll.js"></script>
  <script src="<?php echo STATIC_ROOT ?>/viewport-checker/jquery.viewportchecker.js"></script>
  <script src="<?php echo STATIC_ROOT ?>/dropdown/js/script.min.js"></script>
  <script src="<?php echo STATIC_ROOT ?>/touch-swipe/jquery.touch-swipe.min.js"></script>
  <script src="<?php echo STATIC_ROOT ?>/jarallax/jarallax.js"></script>
  <script src="<?php echo STATIC_ROOT ?>/social-likes/social-likes.js"></script>
  <script src="<?php echo STATIC_ROOT ?>/theme/js/script.js"></script>
  
  <!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//grupporete.itisavogadro.org/Piwik/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '1']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Piwik Code -->
  
  <input name="animation" type="hidden">
  </body>
</html>
<?php
	}
}
