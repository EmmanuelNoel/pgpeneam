<?php

session_start();
if (empty($_SESSION)) {
	# code...
	header('location:index.php');
}
include('connexionDB.php');

$enseignant_permanent = $bdd->query('SELECT count(*) as enseignant_permanent FROM agent where statut_id = 1 AND categorie_id = 1');

$enseignant_vacataire = $bdd->query('SELECT count(*) as enseignant_vacataire FROM agent where statut_id = 2 AND categorie_id = 1');

$personnel_enseignant = $bdd->query('SELECT count(*) as personnel_enseignant FROM agent where categorie_id = 1');

$personnel_administratif = $bdd->query('SELECT count(*) as personnel_administratif FROM agent where categorie_id = 2');

$administrateurs_conventionnes = $bdd->query('SELECT count(*) as administrateurs_conventionnes FROM agent where statut_id = 3 AND categorie_id = 2');

$administrateurs_contractuels =  $bdd->query('SELECT count(*) as administrateurs_contractuels FROM agent where statut_id = 4 AND categorie_id = 2');

$administrateurs_permanents = $bdd->query('SELECT count(*) as administrateurs_permanents FROM agent where statut_id = 1 AND categorie_id = 2');
?>

<!DOCTYPE html>

<head>
	<title>Plateforme de gestion du personnel de l'ENEAM</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
        Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- bootstrap-css -->
	<link rel="stylesheet" href="css/b1ootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<!-- //bootstrap-css -->
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/style-responsive.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<!-- font CSS -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<!-- font-awesome icons -->
	<link rel="stylesheet" href="css/font.css" type="text/css" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="css/morris.css" type="text/css" />
	<!-- calendar -->
	<link rel="stylesheet" href="css/monthly.css">
	<!-- //calendar -->
	<!-- //font-awesome icons -->
	<script src="js/jquery2.0.3.min.js"></script>
	<script src="js/raphael-min.js"></script>
	<script src="js/morris.js"></script>

	<!--//MDI Icons-->
	<link rel="stylesheet" href="mdi/css/materialdesignicons.min.css">

	<!-- icones bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
	<link rel="stylesheet" href="bootstrap-icons-1.9.1/bootstrap-icons.css">
</head>

<body>
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
							<span class="username"> <?php echo '' . $_SESSION['prenom'] . ' ' . $_SESSION['nom'] ?></span>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu extended logout">
							<li><a href="profilagent.php"><i class="bi bi-person-circle"></i>Profil</a></li>

							<li><a href="deconnexion.php"><i class="fa fa-sign-out"></i>Déconnexion</a></li>
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
							<a href="matiere.php">
								<i class="fa fa-plus"></i>
								<span>Ajouter UE/ECUE</span>
							</a>
						</li>

						<li>
							<a href="filiere.php">
								<i class="fa fa-plus"></i>
								<span>Ajouter département/filière</span>
							</a>
						</li>


						<li class="sub-menu dcjq-parent-li">
							<a href="javascript:;">
								<i class="fa fa-file-text-o"></i>
								<span>Editer contrat</span>
								<span class="dcjq-icon"></span></a>
							<ul class="sub" style="display: block;">
								<li><a href="contratl.php">Contrat Licence</a></li>
								<li><a href="contratm.php">Contrat Master</a></li>
							</ul>
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
							<div class="col-md-3 market-update-right">
								<i class="fa  fa-info"> </i>
							</div>
							<div class="col-md-9 market-update-left">
								<h4>Personnel <br> administratif</h4>
								<?php
								$donnees_administration = $personnel_administratif->fetch();
								?>
								<h3><?php echo $donnees_administration['personnel_administratif'];  ?></h3>
								<p>Membres enregistrés</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>

					<div class="col-md-3 market-update-gd">
						<div class="market-update-block clr-block-1">
							<div class="col-md-3 market-update-right">
								<i class="fa fa-info"></i>
							</div>
							<div class="col-md-9 market-update-left">
								<h4>Personnel <br> enseignant</h4>
								<?php
								$donnees_enseignant = $personnel_enseignant->fetch();
								?>
								<h3><?php echo $donnees_enseignant['personnel_enseignant'];  ?></h3>
								<p>Membres enregistrés</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>

					<div class="col-md-3 market-update-gd">
						<div class="market-update-block clr-block-3">
							<div class="col-md-3 market-update-right">
								<i class="fa fa-info"></i>
							</div>
							<div class="col-md-9 market-update-left">
								<h4>Enseignants <br> permanents</h4>
								<?php

								$donnees_ens_permanent = $enseignant_permanent->fetch();
								?>
								<h3><?php echo $donnees_ens_permanent['enseignant_permanent'];  ?></h3>
								<p>Membres enregistrés</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>

					<div class="col-md-3 market-update-gd">
						<div class="market-update-block clr-block-4">
							<div class="col-md-3 market-update-right">
								<i class="fa fa-info" aria-hidden="true"></i>
							</div>
							<div class="col-md-9 market-update-left">
								<h4>Enseignants <br> vacataires</h4>
								<?php

								$donnees_ens_vacataire = $enseignant_vacataire->fetch();
								?>
								<h3><?php echo $donnees_ens_vacataire['enseignant_vacataire'];  ?></h3>
								<p>Membres enregistrés</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>

					<div class="clearfix"> </div>
				</div>

			</section>
			<!-- footer -->
			<div class="footer" style="background: wheat;
    padding: 25px;
    position: relative;
    top: 58px;">
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