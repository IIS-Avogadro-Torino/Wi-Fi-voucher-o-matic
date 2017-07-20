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

require '../load.php';

require_permission('administrate');

$count = function ( $voucher_type ) {
	$count = RelUserVoucher::factoryVoucher()
		->select('COUNT(*) as count')
		->whereStr( Voucher::TYPE, $voucher_type )
		->queryRow();

	return $count ? (int)$count->count : 0;
};

$count_available = function ( $voucher_type ) {
	$count = Voucher::factory()
		->select('COUNT(*) as count')
		->whereStr( Voucher::TYPE, $voucher_type )
		->where(
			'NOT EXISTS (' .
				RelUserVoucher::factory()
					->equals( RelUserVoucher::VOUCHER_, Voucher::ID_ )
					->getQuery() .
			')'
		)
		->queryRow();

	return $count ? (int)$count->count : 0;
};

$a_on_b = function ($a, $b) {
	printf(
		_("%d su <small>%d</small>"),
		$a,
		$b
	);
};

$VOUCHERS_ATA          = $count(           Voucher::ATA     );
$VOUCHERS_ATA_FREE     = $count_available( Voucher::ATA     );
$VOUCHERS_STUDENT      = $count(           Voucher::STUDENT );
$VOUCHERS_STUDENT_FREE = $count_available( Voucher::STUDENT );
$VOUCHERS_MENTHOR      = $count(           Voucher::MENTHOR );
$VOUCHERS_MENTHOR_FREE = $count_available( Voucher::MENTHOR );
$VOUCHERS_ALIEN        = $count(           Voucher::ALIEN   );
$VOUCHERS_ALIEN_FREE   = $count_available( Voucher::ALIEN   );
$VOUCHERS_GOD          = $count(           Voucher::GOD     );
$VOUCHERS_GOD_FREE     = $count_available( Voucher::GOD     );
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>AvoWifi Panel</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />

	<!-- Bootstrap core CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />

	<!--  Material Dashboard CSS -->
	<link href="assets/css/material-dashboard.css" rel="stylesheet"/>

	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<link href="assets/css/demo.css" rel="stylesheet" />

	<!-- Fonts and icons -->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="wrapper">
		<div class="sidebar" data-color="orange" data-image="assets/img/sidebar-1.jpg">
			<!--
			Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
			Tip 2: you can also add an image using data-image tag
			-->
			<div class="logo">
				<a href="<?php echo ROOT ?>" class="simple-text">
					AvoWiFi
				</a>
			</div>

			<div class="sidebar-wrapper">
				<ul class="nav">
					<li class="active">
						<a href="dashboard.php">
							<i class="material-icons">dashboard</i>
							<p>Pannello di controllo</p>
						</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="main-panel">
			<nav class="navbar navbar-transparent navbar-absolute">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Dashboard Amministrazione</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
						</ul>
					</div>
				</div>
			</nav>

			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="card card-stats">
								<div class="card-header" data-background-color="orange">
									<i class="material-icons">account_box</i>
								</div>
								<div class="card-content">
									<p class="category"><b>Docenti:</b></p>
									<p class="category"><?php $a_on_b( $VOUCHERS_MENTHOR, $VOUCHERS_MENTHOR_FREE ) ?></p>
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="card card-stats">
								<div class="card-header" data-background-color="blue">
									<i class="material-icons">account_box</i>
								</div>
								<div class="card-content">
									<p class="category"><b>Studenti:</b></p>
									<p class="category"><?php $a_on_b( $VOUCHERS_STUDENT, $VOUCHERS_STUDENT_FREE ) ?></p>
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="card card-stats">
								<div class="card-header" data-background-color="green">
									<i class="material-icons">account_box</i>
								</div>
								<div class="card-content">
									<p class="category"><b>Ospiti:</b></p>
									<p class="category"><?php $a_on_b( $VOUCHERS_STUDENT, $VOUCHERS_STUDENT_FREE ) ?></p>
								</div>
								<?php /*
								<div class="card-footer">
									<div class="stats">
										<i class="material-icons text-danger">info</i> Ne rimangono <b>[numero]</b>
									</div>
								</div>
								*/ ?>
							</div>
						</div>

						<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="card card-stats">
								<div class="card-header" data-background-color="red">
									<i class="material-icons">account_box</i>
								</div>
								<div class="card-content">
									<p class="category"><b>God:</b></p>
									<p class="category"><?php $a_on_b( $VOUCHERS_GOD, $VOUCHERS_GOD_FREE ) ?></p>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<hr />
							<p><a class="navbar-brand">Invia un voucher al volo</a></p>
						</div>
					</div>

					<div class="card-content">
						<form class="form" method="post">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group label-floating">
										<label class="control-label">Nome</label>
										<input type="text" class="form-control" />
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group label-floating">
										<label class="control-label">Cognome</label>
										<input type="text" class="form-control" />
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group label-floating">
										<label class="control-label">Email</label>
										<input type="email" class="form-control" />
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">Note</label>
										<input type="text" class="form-control" />
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">Tipo</label>
										<select class="form-control">
  											<option value="Docente">Docente</option>
  											<option value="ATA">ATA</option>
  											<option value="Studente">Studente</option>
  											<option value="Ospite">Ospite</option>
  											<option value="GOD">GOD</option>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<button type="submit" class="btn btn-primary pull-right">Crea</button>
								</div>
							</div>
							<!-- end .row -->
						</form>
					</div>
					<!-- end .card-content -->
				</div>
				<!-- end .container-fluid -->

				<div class="row">
					<div class="col-md-12">
						<div class="card card-plain">
							<div class="card-header" data-background-color="blue">
								<h4 class="title">Utenti Attivati</h4>
								<p class="category">Intestazione della tabella sortable</p>
							</div>
							<div class="card-content table-responsive">
								<table class="table table-hover">
									<thead>
										<tr>
											<th><a href="#">Nome</a></th>
											<th><a href="#">Cognome</a></th>
											<th><a href="#">E-mail</a></th>
											<th><a href="#">Data</a></th>
											<th><a href="#">Voucher</a></th>
											<th><a href="#">Tipo</a></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Mario</td>
											<td>Rossi</td>
											<td>mario.rossi@gmail.com</td>
											<td>2017-08-08</td>
											<td>56842578</td>
											<td>Docente</td>
										</tr>
									</tbody>
								</table>
							</div>
							<!-- end .card-content -->
						</div>
						<!-- end .card -->
					</div>
					<!-- end .col -->
				</div>
				<!-- end .row -->
			</div>
			<!-- end .content -->
		</div>
		<!-- end .main-panel -->

	</div>
	<!-- end .wrapper -->

	<footer class="footer">
		<div class="container-fluid">
			<nav class="pull-left">
				<ul>
					<li>
						<a href="#">
							Grupporete
						</a>
					</li>
					<li>
						<a href="#">
							Sito Scuola
						</a>
					</li>
					<li>
						<a href="#">
							Pagina AvoWiFi
						</a>
					</li>
					<li>
						<a href="#">
						   Blog
						</a>
					</li>
				</ul>
			</nav>
			<p class="copyright pull-right">
				&copy; <script>document.write(new Date().getFullYear())</script> <a href="http://grupporete.itisavogadro.it">Grupporete Avogadro</a>, La rete del nostro Istituto
			</p>
		</div>
	</footer>

	<!--   Core JS Files   -->
	<script src="assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="assets/js/bootstrap-notify.js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="assets/js/material-dashboard.js"></script>

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	<script type="text/javascript">
	$(document).ready( function () {
		// Javascript method's body can be found in assets/js/demos.js
        	demo.initDashboardPageCharts();
	} );
	</script>

</body>
</html>
