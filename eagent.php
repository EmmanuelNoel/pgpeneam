<?php
include('connexionDB.php');
$banque = $bdd->query('SELECT * FROM banque');
$categorie = $bdd->query('SELECT * FROM categorie');
$grade = $bdd->query('SELECT * FROM grade');
$roles = $bdd->query('SELECT * FROM role');
$statut = $bdd->query('SELECT * FROM statut');



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
	<!-- //bootstrap-css -->
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/style-responsive.css" rel="stylesheet" />
	<!-- font CSS -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<!-- font-awesome icons -->
	<link rel="stylesheet" href="css/font.css" type="text/css" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome icons -->
	<script src="js/jquery2.0.3.min.js"></script>

</head>

<body class="body">

	<section class="first">

		<section class="mx-auto col-8">
			<form action="traitement.php" method="post" name="enregistrer">
				<p class="text-light">ENREGISTREMENT AGENT </p>

				<section class="third">


					<div class="row">

						<div class="col-md-6">
							<label for="">Matricule</label>
							<input type="text" class="form-control" placeholder="" name="matricule" value="">
						</div>

						<div class="col-md-6">
							<label for="">Nom</label>
							<input type="text" class="form-control" placeholder="" name="nom" value="">
						</div>

					</div>

					<div class="row">

						<div class="col-md-6">
							<label for="">Prénom</label>
							<input type="text" class="form-control" placeholder="" name="prenom" value="">
						</div>


						<div class="col-md-6">
							<label for="">Sexe</label>
							<select class="form-control " name="sexe">
								<option value="" disabled="" selected="" hidden=""> </option>
								<option value="homme">Homme</option>
								<option value="femme">Femme</option>
							</select>
						</div>

					</div>

					<div class="row">

						<div class="col-md-6">
							<label for="">Nationalité</label>
							<input type="text" class="form-control" placeholder="" name="nationalite" value="">
						</div>

						<div class="col-md-6">
							<label for="">Adresse</label>
							<input type="text" class="form-control" placeholder="" name="adresse" value="">
						</div>

					</div>

					<div class="row">

						<div class="col-md-6">
							<label for="">Téléphone</label>
							<input type="tel" class="form-control" placeholder="" name="telephone" value="">
						</div>

						<div class="col-md-6">
							<label for="">Email</label>
							<input type="email" name="email" id="email" class="form-control">
						</div>

					</div>

					<div class="row">

						<div class="col-md-6">
							<label for="">IFU</label>
							<input type="tel" class="form-control" placeholder="" name="ifu" value="">
						</div>

						<div class="col-md-6">
							<label for="">RIB</label>
							<input type="tel" name="rib" id="" class="form-control">
						</div>

					</div>

					<div class="row">

						<div class="col-md-6">
							<label for="postead">Role</label>
							<select id="poste-ad" class="form-control " name="role">
								<option value="" disabled="" selected="" hidden=""> </option>
								<?php
								while ($donneesrole = $roles->fetch()) {


								?>
									<option value="<?php echo  $donneesrole['id']  ?>"><?php echo  $donneesrole['nom']  ?></option>

								<?php
								}
								?>


							</select>
						</div>

						<div class="col-md-6">
							<label for="statutad">Statut</label>
							<select id="statutad" class="form-control " name="statut">
								<option value="" disabled="" selected="" hidden=""> </option>
								<?php
								while ($donneesstatut = $statut->fetch()) {


								?>
									<option value="<?php echo  $donneesstatut['id']  ?>"><?php echo  $donneesstatut['nom']  ?></option>

								<?php
								}
								?>
							</select>
						</div>

					</div>


					<div class="row">

						<div class="col-md-6">
							<label for="">Profession</label>
							<input type="texte" class="form-control" placeholder="" name="profession" value="">
						</div>

						<div class="col-md-6">
							<label for="categorie">Catégorie</label>
							<select id="categorie" class="form-control " name="categorie">
								<option value="" disabled="" selected="" hidden=""> </option>
								<?php
								while ($donneescategorie = $categorie->fetch()) {


								?>
									<option value="<?php echo  $donneescategorie['id']  ?>"><?php echo  $donneescategorie['nom']  ?></option>

								<?php
								}
								?>
							</select>
						</div>



					</div>

					<div class="row">

						<div class="col-md-6">
							<label for="date">Date de première prise de service</label>
							<div>
								<input type="date" name="date_premier_service" id="date" class="form-control">
							</div>
						</div>

						<div class="col-md-6">
							<label for="cote">Grade</label>

							<select id="cote" class="form-control " name="grade">
								<option value="" disabled="" selected="" hidden=""> </option>
								<?php
								while ($donneesgrade = $grade->fetch()) {


								?>
									<option value="<?php echo  $donneesgrade['id']  ?>"><?php echo  $donneesgrade['nom']  ?></option>

								<?php
								}
								?>
							</select>
						</div>

					</div>

					<div class="row">

						<div class="col-md-6">
							<label for="">En service</label>
							<select id="categorie" class="form-control " name="en_service">
								<option value="" disabled="" selected="" hidden=""> </option>
								<option value="ad">Oui</option>
								<option value="en">Non</option>
							</select>
						</div>

						<div class="col-md-6">
							<label for="categorie">Banque</label>
							<select id="categorie" class="form-control " name="banque">
								<option value="" disabled="" selected="" hidden=""> </option>
								<?php
								while ($donneesbanque = $banque->fetch()) {


								?>
									<option value="<?php echo  $donneesbanque['id']  ?>"><?php echo  $donneesbanque['nom']  ?></option>

								<?php
								}
								?>

							</select>
						</div>



					</div>


				</section>



				<div class="row">
					<div class="col-12">
						<div class="form-group text-center">
							<p>
								<button name="enregistrer" class="btn btn-primary btn-md full-width pop-login" type="submit" data-bs-toggle="collapse" aria-controls="collapseExample">
									Enregistrer
								</button>
							</p>
						</div>
					</div>
				</div>
			</form>
		</section>


		<div class="bout">
			<a href="accueil.php"><i class="fa fa-arrow-left"></i> <span>Retour à la page d'accueil</span> </a>
		</div>
	</section>
	<script>
		var elt = document.getElementById('categorie');
		elt.addEventListener('change', function() {
			console.log('value => ' + this.value);
			console.log(elt.value);
			if (elt.value == "ad") {
				console.log('true')
				document.getElementById("statutad-d").style.display = 'block';
				document.getElementById("postad-d").style.display = 'block';
				document.getElementById("l_matricule").style.display = 'block';
				document.getElementById("l_img_carte").style.display = 'block';
			} else {
				document.getElementById("statutad-d").style.display = 'none';
				document.getElementById("postad-d").style.display = 'none';
				document.getElementById("l_matricule").style.display = 'none';
				document.getElementById("l_img_carte").style.display = 'none';
			}
		})
		elt.addEventListener('change', function() {
			console.log('value => ' + this.value);
			console.log(elt.value);
			if (elt.value == "en") {
				console.log('true')
				document.getElementById("statuten-d").style.display = 'block';
				document.getElementById("posten-d").style.display = 'block';
			} else {
				document.getElementById("statuten-d").style.display = 'none';
				document.getElementById("posten-d").style.display = 'none';
			}
		})

		// function afficher_cacher(elem) {

		//     if (elem.checked) {

		//         document.getElementById("inpt").style.display = 'block';
		//     } else
		//         document.getElementById("inpt").style.display = 'none';
		// }
	</script>
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="js/scripts.js"></script>
	<script src="js/jquery.slimscroll.js"></script>
	<script src="js/jquery.nicescroll.js"></script>
	<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
	<script src="js/jquery.scrollTo.js"></script>
</body>

</html>