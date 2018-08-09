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
				<h3 class="mbr-section-title display-2">Richiesta account Studente</h3>
				<div class="lead"><p>Per un anno di accesso a internet dai tuoi dispositivi.</p></div>
			</div>
		</div>
	</div>
</section>

<section class="mbr-section article mbr-section__container" id="content1-u" style="background-color: rgb(255, 255, 255); padding-top: 20px; padding-bottom: 20px;">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 lead">
				<p>Puoi richieder subito un voucher da utilizzare per navigare un anno dal tuo dispositivo all' interno della scuola alla velocità di 8 megabit.</p>
				<p>Se hai una casella di posta @itisavogadro.it oppure hai già avuto in passato voucher associati alla tua mail , basta compilae il form per avere un nuovo accesso.<br> Se sei nuovo al servizio, il tuo voucher verrà inviato al Prof Pietro Rausa (prausa@itisavogadro.it) docente di matematica, rivolgiti a lui per averlo. .</p>
			</div>
		</div>
	</div>
</section>

<section class="mbr-section" id="form1-t" style="background-color: rgb(255, 255, 255); padding-top: 40px; padding-bottom: 120px;">
	<div class="mbr-section mbr-section__container mbr-section__container--middle">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 text-xs-center">
					<h3 class="mbr-section-title display-2">Richiesta account Studente</h3>
					<small class="mbr-section-subtitle"></small>
				</div>
			</div>
		</div>
	</div>
	<div class="mbr-section mbr-section-nopadding">
		<div class="container">
			<form action="<?php echo get_menu_entry('form_post')->url ?>" method="post" data-form-title="Richiesta account Studente">
				<input type="hidden" name="<?php echo User::TYPE ?>" value="<?php echo User::TYPE_STUDENT ?>" />
				<div class="row row-sm-offset">
					<div class="col-xs-12 col-md-4">
						<div class="form-group">
							<label class="form-control-label" for="form1-t-name"><?php _e("Nome") ?><span class="form-asterisk">*</span></label>
							<input type="text" class="form-control" name="<?php echo User::NAME ?>" required="required" data-form-field="Name" id="form1-t-name">
						</div>
					</div>
					<div class="col-xs-12 col-md-4">
						<div class="form-group">
							<label class="form-control-label" for="form1-t-surname"><?php _e("Cognome") ?><span class="form-asterisk">*</span></label>
							<input type="text" class="form-control" name="<?php echo User::SURNAME ?>" required="required" data-form-field="Surname" id="form1-t-surname">
						</div>
					</div>
					<div class="col-xs-12 col-md-4">
						<div class="form-group">
							<label class="form-control-label" for="form1-t-email"><?php _e("Email") ?><span class="form-asterisk">*</span></label>
							<input type="email" class="form-control" name="<?php echo User::UID ?>" required="required" data-form-field="Email" id="form1-t-email">
						</div>
					</div>
				</div>
				<div class="row row-sm-offset">
					<div class="col-xs-12 col-md-2">
						<div class="form-group">
							<label class="form-control-label" for="form1-t-classe"><?php _e("Classe") ?><span class="form-asterisk">*</span></label>
							<select class="form-control" name="<?php echo User::CLASS_NUMBER ?>" id="form1-t-classe">
								<option disabled="disabled" selected="selected"><?php _e("...") ?></option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</div>
					</div>
					<div class="col-xs-12 col-md-2">
						<div class="form-group">
							<label class="form-control-label" for="form1-t-sezione"><?php _e("Sezione") ?><span class="form-asterisk">*</span></label>
							<select class="form-control" name="<?php echo User::CLASS_SECTION ?>" id="form1-t-sezione">
								<option disabled="disabled" selected="selected"><?php _e("...") ?></option>
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="C">C</option>
								<option value="D">D</option>
								<option value="E">E</option>
								<option value="F">F</option>
								<option value="G">G</option>
								<option value="H">H</option>
								<option value="I">I</option>
								<option value="L">L</option>
								<option value="M">M</option>
								<option value="N">N</option>
								<option value="O">O</option>
								<option value="P">P</option>
							</select>
						</div>
					</div>
					<div class="col-xs-12 col-md-2">
						<div class="form-group">
							<label class="form-control-label" for="form1-t-specializzazione"><?php _e("Specializzazione") ?><span class="form-asterisk">*</span></label>
							<select class="form-control" name="<?php echo User::SPECIALIZATION ?>" id="form1-t-specializzazione">
								<option disabled="disabled" selected="selected"><?php _e("...") ?></option>
								<?php foreach( User::$SPECIALIZATIONS as $specialization ): ?>
									<option value="<?php _esc_attr( $specialization ) ?>"><?php _esc_html( $specialization ) ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="col-xs-12 col-md-2">
						<div class="form-group">
							<label class="form-control-label" for="form1-t-corso"><?php _e("Corso") ?><span class="form-asterisk">*</span></label>
							<select class="form-control" name="user_daytype" id="form1-t-corso">
								<option disabled="disabled" selected="selected"><?php _e("...") ?></option>
								<option value="diurno"><?php _e("biennio") ?></option>
								<option value="serale"><?php _e("liceo") ?></option>
							</select>
						</div>
					</div>
					<div class="col-xs-12 col-md-4">
						<div class="form-group">
							<label class="form-control-label" for="form1-t-dispositivo"><?php _e("Dispositivo") ?><span class="form-asterisk">*</span></label>
							<select class="form-control" name="dispositivo_type" id="form1-t-dispositivo">
								<option disabled="disabled" selected="selected"><?php _e("...") ?></option>
								<option value="PC / tablet Microsoft Windows"><?php _e("PC / tablet Microsoft Windows") ?></option>
								<option value="PC GNU/Linux"><?php _e("PC GNU/Linux") ?></option>
								<option value="mac"><?php _e("Mac") ?></option>
								<option value="iPad"><?php _e("iPad") ?></option>
								<option value="iPhone"><?php _e("iPhone") ?></option>
								<option value="tablet Android"><?php _e("tablet Android") ?></option>		
								<option value="smartphone Android"><?php _e("smartphone Android") ?></option>	
								<option value="altro"><?php _e("altro") ?></option>
							</select>
						</div>
					</div>
				</div>
				<div><button type="submit" class="btn btn-primary"><?php _e( "Richiedi" ) ?></button></div>
			</form>
		</div>
		<!-- /.container -->
	</div>
	<!-- /.mbr-section -->
</section>


<?php
Footer::spawn();
