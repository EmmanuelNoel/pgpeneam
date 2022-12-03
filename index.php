<?php
	include('header.php');
?>
	<section id="container">
		<!--header start-->
		<header class="header fixed-top clearfix">
			<!--logo start-->
			<div class="brand">
				<a href="index.php" class="logo">
					PERSONNEL ENEAM
				</a>
				<div class="sidebar-toggle-box">
					<div class="fa fa-bars"></div>
				</div>
			</div>
			<!--logo end-->
			<div class="top-nav clearfix">
				<!--search & user info start-->
				<ul class="nav pull-right top-menu">
					<li>
						<input type="text" class="form-control search" placeholder=" Rechercher">
					</li>
					<!-- user login dropdown start-->
					<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#">

							<span class="username">Lorriane Cooke</span>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu extended logout">
							<li><a href="profilagent.php"><i class="bi bi-person-circle"></i>Profil</a></li>

							<li><a href="login.php"><i class="fa fa-sign-out"></i>Déconnexion</a></li>
						</ul>
					</li>
					<!-- user login dropdown end -->

				</ul>
				<!--search & user info end-->
			</div>
		</header>
		<!--header end-->
		<!--sidebar start-->
		<aside class="">
			<div id="sidebar" class="nav-collapse">
				<!-- sidebar menu start-->
				<div class="leftside-navigation">
					<ul class="sidebar-menu" id="nav-accordion">
						<li>
							<a class="active" href="index.php">
								<i class="fa fa-home"></i>
								<span>Accueil</span>
							</a>
						</li>

						<li class="sub-menu dcjq-parent-li">
							<a href="javascript:;">
								<i class="fa fa-th"></i>
								<span>Liste du personnel</span>
								<span class="dcjq-icon"></span></a>
							<ul class="sub" style="display: block;">
								<li><a href="tableadmin.php">Administration</a></li>
								<li><a class="" href="tablens.php">Enseignant</a></li>
							</ul>
						</li>

						<li>
							<a href="eagent.php">
								<i class="fa fa-check-square"></i>
								<span>Enregistrer agent</span>
							</a>
						</li>

						<li>
							<a href="contrat.php">
								<i class="fa fa-file-text-o"></i>
								<span>Editer contrat</span>
							</a>
						</li>

					</ul>
				</div>
				<!-- sidebar menu end-->
			</div>
		</aside>
		<!--sidebar end-->
		<!--main content start-->
		<section id="main-content">
			<section class="wrapper">
				<!--Banner start-->
				<div class="main-content" id="banner">
					<div class="wrapper">
						<div class="col-12" id="banner-text" style="margin-right: 0px; margin-left: 0px; padding-right: 0px;padding-left: 0px; width: 100%; max-width: none;">
							<h1 class="text-center">Bienvenue sur la plateforme de gestion du personnel de l'ENEAM</h1>
							<center>
								<hr class="banner-hr" style="width: 250px; 
						height: 3px; color: 
						wheat; 
						border-top: none; 
						opacity: 100; 
						margin-top:30px">
							</center>
						</div>
					</div>
				</div>
				<!--Banner end-->
				<!-- //market-->
				<div class="clearfix"> </div>
				<div class="market-updates">
					<div class="col-md-3 market-update-gd">
						<div class="market-update-block clr-block-2">
							<div class="col-md-4 market-update-right">
								<i class="fa  fa-info"> </i>
							</div>
							<div class="col-md-8 market-update-left">
								<h4>Personnel administratif</h4>
								<h3>8</h3>
								<p>Membres enregistrés</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="col-md-3 market-update-gd">
						<div class="market-update-block clr-block-1">
							<div class="col-md-4 market-update-right">
								<i class="fa fa-info"></i>
							</div>
							<div class="col-md-8 market-update-left">
								<h4>Personnel enseignant</h4>
								<h3>8</h3>
								<p>Membres enregistrés</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="col-md-3 market-update-gd">
						<div class="market-update-block clr-block-3">
							<div class="col-md-4 market-update-right">
								<i class="fa fa-info"></i>
							</div>
							<div class="col-md-8 market-update-left">
								<h4>Enseignants permanents</h4>
								<h3>5</h3>
								<p>Membres enregistrés</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="col-md-3 market-update-gd">
						<div class="market-update-block clr-block-4">
							<div class="col-md-4 market-update-right">
								<i class="fa fa-info" aria-hidden="true"></i>
							</div>
							<div class="col-md-8 market-update-left">
								<h4>Enseignants vacataires</h4>
								<h3>3</h3>
								<p>Membres enregistrés</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>

			</section>
			<!-- footer -->
			<div class="footer">
				<div class="wthree-copyright">
					<p>© Copyright ENEAM 2022</p>
				</div>
			</div>
			<!-- / footer -->
		</section>
		<!--main content end-->
	</section>

	<script src="js/bootstrap.js"></script>
	<script src="js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="js/scripts.js"></script>
	<script src="js/jquery.slimscroll.js"></script>
	<script src="js/jquery.nicescroll.js"></script>
	<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
	<script src="js/jquery.scrollTo.js"></script>
	<!-- morris JavaScript -->

</body>

</html>