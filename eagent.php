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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" rel="stylesheet" />
	<!-- font CSS -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<!-- font-awesome icons -->
	<link rel="stylesheet" href="css/font.css" type="text/css" />
	<link rel="stylesheet" href="mdi/css/materialdesignicons.min.css">
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome icons -->
	<script src="js/jquery2.0.3.min.js"></script>

</head>

<body class="body bodyy">
	
	<section class="first ">

		<section class="second container-sm col-8 mb-5">
			<form action="traitement.php" method="post" name="enregistrer" class=""> 
				<p>ENREGISTREMENT AGENT </p>

					<section class="third">


					<div class="row mb-4">
						<div class="col-md-4">
							<label for=""></label>
							<input type="text" class="form-control formcontrol formcontrol" placeholder="Matricule" name="matricule" value="">
						</div>
					</div>

					<div class="row mb-4">
						<div class="col-md-6">
							<input type="text" class="form-control formcontrol" placeholder="Nom" name="nom" value="">
						</div>

						<div class="col-md-6">
							<input type="text" class="form-control formcontrol" placeholder="Prénom" name="prenom" value="">
						</div>
					</div>

					<div class="row mb-4">
						<div class="col-md-4">
							<input type="text" class="form-control formcontrol" placeholder="Nationalité" name="nationalite" value="">
						</div>

						<div class="col-md-4">
							<select class="form-select formselect " name="sexe">
								<option value="" disabled="" selected="" hidden=""> </option>
								<option value="" selected>Sexe </option>
								<option value="homme">Homme</option>
								<option value="femme">Femme</option>
							</select>
						</div>

						<div class="col-md-4">
							<input type="text" class="form-control formcontrol" placeholder="Adresse" name="adresse" value="">
						</div>
					</div>

					<div class="row mb-4">
						<div class="col-md-3">
							<input type="tel" class="form-control formcontrol" placeholder="Profession" name="profession" value="">
						</div>
						<div class="col-md-3">
							<input type="tel" class="form-control formcontrol" placeholder="IFU" name="ifu" value="">
						</div>

						<div class="col-md-3">
							<input type="tel" placeholder="RIB" name="rib" id="" class="form-control formcontrol">
						</div>

						<div class="col-md-3">
							<select id="categorie" class="form-select formselect" name="banque">
							
								<option value="" disabled="" selected="" hidden=""> </option>
								<option value="" selected>Banque </option>
								<?php
										while($donneesbanque=$banque->fetch())
										{

										
										?>
										<option value="<?php echo  $donneesbanque['id']  ?>"><?php echo  $donneesbanque['nom']  ?></option>
										
										<?php
										}
										?>

							</select>
						</div>
					</div>
					
					<div class="row mb-4">
						<div class="col-md-6">
							<input type="tel" class="form-control formcontrol" placeholder="Téléphone" name="telephone" value="">
						</div>

						<div class="col-md-6">
							<input type="email" name="email" id="email" placeholder="Email" class="form-control formcontrol">
						</div>
					</div>
					
					<div class="row mb-4">
						<div class="col-md-4">
							<select id="categorie" class="form-select formselect " name="categorie">
								<option value="" disabled="" selected="" hidden=""> </option>
								<option value="" selected>Catégorie </option>
								<?php
										while($donneescategorie=$categorie->fetch())
										{

										
										?>
										<option value="<?php echo  $donneescategorie['id']  ?>"><?php echo  $donneescategorie['nom']  ?></option>
										
										<?php
										}
										?>
							</select>
						</div>
						<div class="col-md-4">
							<select id="statutad" class="form-select formselect " name="statut">
								<option value="" disabled="" selected="" hidden=""> </option>
								<option value="" selected>Statut</option>
								
								<?php
										while($donneesstatut=$statut->fetch())
										{


									?>
										<option value="<?php echo  $donneesstatut['id']  ?>"><?php echo  $donneesstatut['nom']  ?></option>
										
										<?php
										}
										?>
							</select>
						</div>
						<div class="col-md-4">
							<select id="cote" class="form-select formselect " name="grade">
								<option value="" disabled="" selected="" hidden=""> </option>
								<option value="" selected>Grade </option>
									<?php
									while($donneesgrade=$grade->fetch())
									{
										
										?>
										<option value="<?php echo  $donneesgrade['id']  ?>"><?php echo  $donneesgrade['nom']  ?></option>
										
										<?php
										}
										?>
							</select>
						</div>

					</div>
					
					<div class="row mb-4">
						<div class="col-md-9">
							<select id="poste-ad" class="form-select formselect " name="role">
								<option value="" disabled="" selected="" hidden=""> </option>
								<option value="" selected>Rôle </option>
								<?php
									while($donneesrole=$roles->fetch())
										{
											?>
											<option value="<?php echo  $donneesrole['id']  ?>"><?php echo  $donneesrole['nom']  ?></option>
											
											<?php
										}
								?>
							</select>
						</div>
					
						<div class="col-md-3">
							<div>
								<input type="date" placeholder="Date de première prise de service" name="date_premier_service" id="date" class="form-control formcontrol">
							</div>
						</div>
					</div>
					
					
					<div class="row">
						<div class="col-md-12 text-start">
							<span class="en_service">En service</span>
							<div class="form-check form-check-inline">
								<input type="radio" name="oui" id="oui" value="1" class="form-check-input"checked autocomplete="off">
								<label class="form-check-label" for="oui" >Oui</label> &nbsp;&nbsp;&nbsp;
							</div>
							<div class="form-check form-check-inline">
								<input type="radio" name="non" id="non" value="2"  autocomplete="off" class="form-check-input">
								<label class="form-check-label" for="non">Non</label>
							</div>						
						</div>
					</div>
				
					<div class="row">
						<div class="col-12">
							<div class="form-group text-center">
									<button name="enregistrer" class="btn enregistrer btn-primary btn-md full-width pop-login" type="submit" data-bs-toggle="collapse" aria-controls="collapseExample">
										Enregistrer
									</button>
							</div>
						</div>
					</div>
				</form>
			</section>
		</section>


		<div class="bout">
			<a href="accueil.php"><span class="mdi mdi-arrow-left arrowleft"></span> <span class="retour">Retour à la page d'accueil</span> </a>
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