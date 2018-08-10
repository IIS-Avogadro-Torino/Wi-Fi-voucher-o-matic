<?php
######################################################################
# Wi-Fi-voucher-o-matic - Wi-Fi voucher manager
# Copyright (C) 2017, 2018 Valerio Bozzolan, Ivan Bertotto, IIS Avogadro
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
# along with this program. If not, see <http://www.gnu.org/licenses/>.
######################################################################

require '../load.php';

require_permission('administrate');

$count = function ( $voucher_type ) {
	return (int) RelUserVoucher::factoryVoucher()
		->select('COUNT(*) as count')
		->whereStr( Voucher::TYPE, $voucher_type )
		->queryValue('count');
};

$count_available = function ( $voucher_type ) {
	return (int) Voucher::factory()
		->select('COUNT(*) as count')
		->whereStr( Voucher::TYPE, $voucher_type )
		->where(
			'NOT EXISTS (' .
				RelUserVoucher::factory()
					->equals( RelUserVoucher::VOUCHER_, Voucher::ID_ )
					->getQuery() .
			')'
		)
		->queryValue('count');
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
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
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
				<ul>
					<li><?php echo esc_html( get_user( User::UID ) ) ?></li>
					<li><a href="<?php echo get_menu_entry('logout')->url ?>"><?php _e("Esci") ?></a></li>
				</ul>
			</div>

			<div class="sidebar-wrapper">
				<ul class="nav">
					<li class="active">
						<a href="#">
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
									<p class="category"><?php $a_on_b( $VOUCHERS_ALIEN, $VOUCHERS_ALIEN_FREE ) ?></p>
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
						<form class="form" method="post" action="<?php echo get_menu_entry('form_post')->url ?>">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group label-floating">
										<label class="control-label">Nome</label>
										<input type="text" class="form-control" name="user_name" />
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group label-floating">
										<label class="control-label">Cognome</label>
										<input type="text" class="form-control" name="user_surname" />
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group label-floating">
										<label class="control-label">Email</label>
										<input type="email" class="form-control" name="user_uid" />
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
										<select name="user_type" class="form-control">
  											<option value="<?php echo Voucher::MENTHOR ?>">Docente</option>
  											<option value="<?php echo Voucher::ATA ?>">ATA</option>
  											<!--<option value="<?php echo Voucher::STUDENT ?>">Studente</option>-->
  											<!--<option value="<?php echo Voucher::ALIEN ?>">Ospite</option>-->
  											<option value="<?php echo Voucher::GOD ?>"<?php
												if( ! has_permission('register_god') ) {
													echo ' disabled="disabled"';
												}
											?>>GOD</option>
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

				<?php if( has_permission('view-all-users') ): ?>

				<?php
				$pager = new UsersPager();
				$pager->setElementsPerPage( 50 );
				$pager->setDefaultOrderBy( UsersPager::ARG_NAME );
				?>

						<div class="card">
							<div class="card-header">
								<h4 class="title"><?php _e( "Utenti Attivati" ) ?></h4>
							</div>
							<div class="card-content">
								<form method="get">
									<p><?php _e( "Cerca per:" ) ?></p>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label" for="by-name"><?php _e( "Nome" ) ?></label>
												<input type="text" class="form-control" name="<?php echo UsersPager::ARG_NAME ?>" id="by-name"<?php
													_value( $pager->getArg( UsersPager::ARG_NAME ) )
												?> />
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label" for="by-surname"><?php _e( "Cognome" ) ?></label>
												<input type="text" class="form-control" name="<?php echo UsersPager::ARG_SURNAME ?>" id="by-surname"<?php
													_value( $pager->getArg( UsersPager::ARG_SURNAME ) )
												?> />
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label" for="by-uid"><?php _e( "e-mail" ) ?></label>
												<input type="text" class="form-control" name="<?php echo UsersPager::ARG_UID ?>" id="by-uid"<?php
													_value( $pager->getArg( UsersPager::ARG_UID ) )
												?> />
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label" for="by-voucher"><?php _e( "Voucher" ) ?></label>
												<input type="text" class="form-control" name="<?php echo UsersPager::ARG_VOUCHER ?>" id="by-voucher"<?php
													_value( $pager->getArg( UsersPager::ARG_VOUCHER ) )
												?> />
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<button type="submit" class="btn"><?php _e( "Filtra" ) ?></button>
											</div>
										</div>
									</div>
									<!-- /.row -->
								</form>

								<?php if( isset( $_POST['action'], $_POST['uid'] ) ): ?>
									<?php switch( $_POST['action'] ) {
										case 'send-password':
											$user = User::factoryFromUID( $_POST['uid'] )
												->select( [
													User::ID_,
													User::UID,
													User::NAME,
													User::SURNAME,
													User::ACTIVE
												] )
												->queryRow();

											$user or error_die("Unexisting user");

											$pwd = substr(
												sha1( rand() . rand() . rand()  ),
												0,
												10
											);

											SMTPMail::send(
												$user->get( User::UID ),
												_("Accesso pannello Voucher"),
												file_get_contents( STATIC_PATH . __ . 'email_new_account.html' ),
												[
													'PASSWORD'  => $pwd,
													'NOME'      => esc_html( $user->get( User::NAME ) ),
													'COGNOME'   => esc_html( $user->get( User::SURNAME ) ),
													'UID'       => esc_html( $user->get( User::UID ) ),
													'URL_PANEL' => site_page( get_menu_entry('panel')->url )
												]
											);

											$pwd = Session::encryptUserPassword( $pwd );

											$cols = [
												new DBCol( User::ACTIVE,   1,       'd'),
												new DBCol( User::PASSWORD, $pwd,    's')
											];

											if( ! $user->get( User::ACTIVE ) ) {
												$cols[] = new DBCol( User::ROLE, 'admin', 's');
											}

											$user->updateUser( $cols );
											break;
										case 'publish-user':
											$user = User::factoryFromUID( $_POST['uid'] )
												->select( User::ID_ )
												->queryRow();

											$user or error_die("Unexisting user");

											$user->updateUser( [
												new DBCol(User::IS_PUBLIC, $_POST['value'], 'd')
											] );

											break;
										case 'disable-user':
											$user = User::factoryFromUID( $_POST['uid'] )
												->select( User::ID_ )
												->queryRow();

											$user or error_die("Unexisting user");

											$user->updateUser( [
												new DBCol(User::ACTIVE, 0, 'd')
											] );

											break;
									}
									?>
								<?php endif ?>

							<div class="table-responsive" id="actived-users">

								<?php $pagination = function ( $pager ) { ?>
									<?php $page  = $pager->getPage() ?>
									<p>
										<?php if( ! $pager->isFirstPage() ): ?>
											<a href="<?php echo $pager->getSpecificPageURL( $page - 1 ) ?>#actived-users"><?php _e("Indietro") ?></a>
										<?php endif ?>

										<?php if( ! $pager->isFirstPage() && ! $pager->isLastPage() ): ?>
											|
										<?php endif ?>

										<?php if( ! $pager->isLastPage() ): ?>
											<a href="<?php echo $pager->getSpecificPageURL( $page + 1 ) ?>#actived-users"><?php _e("Avanti") ?></a>
										<?php endif ?>
									</p>
								<?php } ?>

								<?php $pagination( $pager ) ?>

								<table class="table table-hover">
									<thead>
										<tr>
											<th colspan="3"></th>
											<th><?php $pager->printOrderToggler( __( "Nome"    ), UsersPager::ARG_NAME    ) ?></th>
											<th><?php $pager->printOrderToggler( __( "Cognome" ), UsersPager::ARG_SURNAME ) ?></th>
											<th><?php $pager->printOrderToggler( __( "E-mail"  ), UsersPager::ARG_UID     ) ?></th>
										</tr>
									</thead>
									<tbody>
										<?php $usersGenerator =	$pager
											->createPagedQuery()
											->select( [
												User::ID_,
												User::NAME,
												User::SURNAME,
												User::UID,
												User::ACTIVE,
												User::IS_PUBLIC,
											] )
											->queryGenerator();
										?>
										<?php foreach( $usersGenerator as $user ): ?>
										<tr>
											<td>
												<form method="post">
													<input type="hidden" name="action" value="send-password" />
													<input type="hidden" name="uid" value="<?php echo $user->get( User::UID ) ?>" />
													<button class="btn waves-effect waves-light" type="submit" title="<?php
														$user->get( User::ACTIVE )
															? _e("Pwd Reset")
															: _e("Abilita")
													?>"><i class="material-icons">account_circle</i></button>
												</form>
											</td>
											<td>
												<?php if( $user->get( User::ACTIVE ) ): ?>
												<form method="post">
													<input type="hidden" name="action" value="disable-user" />
													<input type="hidden" name="uid" value="<?php echo $user->get( User::UID ) ?>" />
													<button class="btn waves-effect waves-light" type="submit" title="<?php _e("Turn OFF") ?>"> <i class="material-icons">check_circle</i></button>
												</form>
												<?php endif ?>
											</td>
											<td><form method="post">
												<input type="hidden" name="action" value="publish-user" />
												<input type="hidden" name="uid" value="<?php echo $user->get( User::UID ) ?>" />
												<input type="hidden" name="value" value="<?php
													echo $user->get( User::IS_PUBLIC )
														? 0
														: 1
												?>" />
												<button class="btn waves-effect waves-light" type="submit" title="<?php
													$user->get( User::IS_PUBLIC )
														? _e("Turn Site OFF")
														: _e("Turn Site ON")
												?>"><i class="material-icons">language</i></button>
											</form></td>
											<td><?php echo enfatize_substr(
												esc_html( $user->get( User::NAME ) ),
												$pager->getArg( UsersPager::ARG_NAME )
											) ?></td>
											<td><?php echo enfatize_substr(
												esc_html( $user->get( User::SURNAME ) ),
												$pager->getArg( UsersPager::ARG_SURNAME )
											) ?></td>
											<td><?php echo enfatize_substr(
												esc_html( $user->get( User::UID ) ),
												$pager->getArg( UsersPager::ARG_UID )
											) ?></td>
											<td><div style="max-height:300px; overflow-y:auto;"><?php
											$vouchers = new Vouchers();
											$vouchers->whereUserID( $user->get( User::ID ) );
											$vouchers->orderBy( RelUserVoucher::CREATION_DATE, 'DESC' );

											foreach( $vouchers->queryGenerator( 'RelUserVoucher' ) as $voucher ) {

												echo $voucher->formatRelUserVoucherDate( _('Y/m/d') );
												echo "<br />";
												echo "<code>" . enfatize_substr(
													$voucher->get( Voucher::CODE ),
													$pager->getArg( UsersPager::ARG_VOUCHER )
												) . "</code>";
												echo "<br />";
												echo $voucher->get( Voucher::TYPE );
												echo "<br />";

												$creation_user_ID = $voucher->get( RelUserVoucher::CREATION_USER );

												if( $creation_user_ID !== $voucher->get( User::ID ) ) {
													$created_by = User::factoryByID( $creation_user_ID )
														->select( [
															User::ID_,
															User::UID,
															User::NAME,
															User::SURNAME
														] )
														->queryRow();

													echo "<small>";
													printf(
														_("da %s %s"),
														esc_html( $created_by->get( User::NAME    ) ),
														esc_html( $created_by->get( User::SURNAME ) )
													);
													echo "</small>";
												}
												echo "<hr />";
											}
											?>
											</div></td>
										</tr>
										<?php endforeach ?>
									</tbody>
								</table>

								<?php $pagination( $pager ) ?>

							</div>
							<!-- end .card-content -->
						</div>
						<!-- end .card -->

				<?php endif ?>
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
	<script src="assets/js/jquery-3.1.0.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/material.min.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src="assets/js/bootstrap-notify.js"></script>

	<!-- Material Dashboard javascript methods -->
	<script src="assets/js/material-dashboard.js"></script>

	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	<script>
	$( function () {
		// Javascript method's body can be found in assets/js/demos.js
        	demo.initDashboardPageCharts();
	} );
	</script>

</body>
</html>
