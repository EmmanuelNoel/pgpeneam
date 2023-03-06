<?php

session_start();
if (empty($_SESSION)) {
	# code...
	header('location:index.php');
}



include('connexionDB.php');
$banque = $bdd->query('SELECT * FROM banque');
$categorie = $bdd->query('SELECT * FROM categorie');
$grade = $bdd->query('SELECT * FROM grade');
$roles = $bdd->query('SELECT * FROM role');
$statut = $bdd->query('SELECT * FROM statut');


//Récuperation de l'id

$val = $_GET['val'];

//Récupération des informations de l'agent

$agent = $bdd->prepare('SELECT * FROM agent where agent.id = ?');
$agent->execute(array($val));
$donneAgent = $agent->fetch();

//Données des clés etrangeres

$donnees = $bdd->prepare('SELECT agent.id, grade.id as g_id, grade.nom as g_nom , statut.id as st_id, statut.nom as st_nom ,
 banque.id as b_id, banque.nom as b_nom, categorie.id as c_id , categorie.nom as c_nom, role.id as r_id, 
 role.nom as r_nom FROM agent,grade,statut,banque,categorie,role where agent.id = ? AND grade.id = agent.grade_id
AND statut.id = agent.statut_id AND banque.id = agent.banque_id AND agent.categorie_id = categorie.id AND role.id = agent.role_id
');
$donnees->execute(array($val));
$agentDonnees = $donnees->fetch();

?>

<!DOCTYPE html>

<head>
	<title>Plateforme de gestion du personnel de l'ENEAM</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
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
	<link
		href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
		rel='stylesheet' type='text/css'>
	<!-- font-awesome icons -->
	<link rel="stylesheet" href="css/font.css" type="text/css" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome icons -->
	<script src="js/jquery2.0.3.min.js"></script>
	<!--//MDI Icons-->
	<link rel="stylesheet" href="mdi/css/materialdesignicons.min.css">

	<link href="css/enregistrementValide.css" rel="stylesheet">

</head>

<body class="body bodyy">

	<section class="first ">

		<section class="second container-sm col-8 mb-5">
			<form action="modifierAgent.php" method="post" name="enregistrer" class="" onsubmit="submitForm(event);" >
				<p>ENREGISTREMENT AGENT </p>

				<section class="third">


					<div class="row mb-4">
						<div class="col-md-4">
							<label for=""></label>
							<input type="text" class="form-control formcontrol formcontrol" placeholder="<?php echo $donneAgent['matricule'] ; ?> "
								name="matricule" value="<?php echo $donneAgent['matricule'] ; ?>"  required>
						</div>
					</div>

					<div class="row mb-4">
						<div class="col-md-6">
							<input type="text" class="form-control formcontrol" placeholder="<?php echo $donneAgent['nom'] ; ?>" name="nom" value="<?php echo $donneAgent['nom'] ; ?>"  required>
						</div>

						<div class="col-md-6">
							<input type="text" class="form-control formcontrol" placeholder="<?php echo $donneAgent['prenom'] ; ?>" name="prenom"
								value="<?php echo $donneAgent['prenom'] ; ?>"  required>
						</div>
					</div>

					<div class="row mb-4">
						<div class="col-md-4">
							<input type="text" class="form-control formcontrol" placeholder="<?php echo $donneAgent['nationalite'] ; ?>"
								name="nationalite" value="<?php echo $donneAgent['nationalite'] ; ?>"  required>
						</div>

						<div class="col-md-4">
							<select class="form-select formselect " name="sexe">
								<option value="" disabled="" selected="" hidden=""  required> </option>
								<option value="<?php echo $donneAgent['sexe'] ; ?>" selected> <?php echo $donneAgent['sexe'] ; ?> </option>
							<?php	if( $donneAgent['sexe'] == "Homme" )
							{
								?>
<option value="femme">Femme</option>
								<?php
							}
							else
							{
								?>
<option value="homme">Homme</option>
								<?php
							}
							
							?>
								
								
							</select>
						</div>

						<div class="col-md-4">
							<input type="text" class="form-control formcontrol" placeholder="<?php echo $donneAgent['adresse'] ; ?>" name="adresse"
								value="<?php echo $donneAgent['adresse'] ; ?>"  required>
						</div>
					</div>

					<div class="row mb-4">
						<div class="col-md-3">
							<input type="tel" class="form-control formcontrol" placeholder="<?php echo $donneAgent['profession'] ; ?>"
								name="profession" value="<?php echo $donneAgent['profession'] ; ?>"  required>
						</div>
						<div class="col-md-3">
							<input type="tel" class="form-control formcontrol" placeholder="<?php echo $donneAgent['ifu'] ; ?>" name="ifu"
							 value="<?php echo $donneAgent['ifu'] ; ?>"  required>
						</div>

						<div class="col-md-3">
							<input type="tel" placeholder="<?php echo $donneAgent['rib'] ; ?>" 
							value="<?php echo $donneAgent['rib'] ; ?>" name="rib" id="" class="form-control formcontrol"  required>
						</div>

						<div class="col-md-3">
							<select id="categorie" class="form-select formselect" name="banque"  required>

								<option value="" disabled="" selected="" hidden=""> </option>
								<option value="<?php echo  $agentDonnees['b_id']  ?>" selected><?php echo  $agentDonnees['b_nom'];  ?> </option>
								<?php
								while ($donneesbanque = $banque->fetch()) {
									if(!($donneesbanque['nom'] == $agentDonnees['b_nom']))
									{

								?>
								<option value="<?php echo  $donneesbanque['id']  ?>">
									<?php echo  $donneesbanque['nom'] ; ?></option>

								<?php
									}
								}
								?>

							</select>
						</div>
					</div>

					<div class="row mb-4">
						<div class="col-md-6">
							<input type="tel" class="form-control formcontrol" placeholder="<?php echo $donneAgent['telephone'] ; ?>" name="telephone"
								value="<?php echo $donneAgent['telephone'] ; ?>"  required>
						</div>

						<div class="col-md-6">
							<input type="email" name="email" id="email" placeholder="<?php echo $donneAgent['email'] ; ?>"
							value="<?php echo $donneAgent['email'] ; ?>"	class="form-control formcontrol"  required>
						</div>
					</div>

					<div class="row mb-4">
						<div class="col-md-4">
							<select id="categorie" class="form-select formselect " name="categorie"  required>
								<option value="" disabled="" selected="" hidden=""> </option>
								<option value="<?php echo $agentDonnees['c_id'] ; ?>" selected><?php echo $agentDonnees['c_nom'] ; ?></option>
								<?php
								while ($donneescategorie = $categorie->fetch()) {
									if(!($donneescategorie['nom'] == $agentDonnees['c_nom']))
									{


								?>
								<option value="<?php echo  $donneescategorie['id']  ?>">
									<?php echo  $donneescategorie['nom']  ?></option>

								<?php
									}
								}
								?>
							</select>
						</div>
						<div class="col-md-4">
							<select id="statutad" class="form-select formselect " name="statut"  required>
								<option value="" disabled="" selected="" hidden=""> </option>
								<option value="<?php echo $agentDonnees['st_id'] ; ?>" selected><?php echo $agentDonnees['st_nom'] ; ?></option>

								<?php
								while ($donneesstatut = $statut->fetch()) {
									if(!($donneesstatut['nom'] == $agentDonnees['st_nom']))
									{

								?>
								<option value="<?php echo  $donneesstatut['id']  ?>">
									<?php echo  $donneesstatut['nom']  ?></option>

								<?php
									}
								}
								?>
							</select>
						</div>
						<div class="col-md-4">
							<select id="cote" class="form-select formselect " name="grade"  required>
								<option value="" disabled="" selected="" hidden=""> </option>
								<option value="<?php echo $agentDonnees['g_id'] ; ?>" selected><?php echo $agentDonnees['g_nom'] ; ?> </option>
								<?php
								while ($donneesgrade = $grade->fetch()) {
									if(!($donneesgrade['nom'] == $agentDonnees['g_nom'] ))
									{
								?>
								<option value="<?php echo  $donneesgrade['id'];  ?>"><?php echo  $donneesgrade['nom'];  ?>
								</option>

								<?php
									}
								}
								?>
							</select>
						</div>

					</div>

					<div class="row mb-4">
						<div class="col-md-9">
							<select id="poste-ad" class="form-select formselect " name="role"  required>
								<option value="" disabled="" selected="" hidden=""> </option>
								<option value="<?php echo $agentDonnees['r_id'] ; ?>" selected><?php echo $agentDonnees['r_nom'] ; ?> </option>
								<?php
								while ($donneesrole = $roles->fetch()) {
									if(!($donneesrole['nom'] == $agentDonnees['r_nom'] ))
									{

									
								?>

								<option value="<?php echo  $donneesrole['id']  ?>"><?php echo  $donneesrole['nom']  ?>
								</option>

								<?php
								}
								}
								?>
							</select>
						</div>

						<div class="col-md-3">
							<div>
								<input type="date" placeholder="<?php echo $donneAgent['date_premier_service'] ; ?>"
									name="date_premier_service" id="date" class="form-control formcontrol"
									value="<?php echo $donneAgent['date_premier_service'] ; ?>"  required>
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-md-12 text-start">
							<span class="en_service">En service</span>
							<div class="form-check form-check-inline">
								<input type="radio" name="service" id="service" value="1" class="form-check-input"
									checked autocomplete="off"  required>
								<label class="form-check-label" for="oui">Oui</label> &nbsp;&nbsp;&nbsp;
							</div>
							<div class="form-check form-check-inline">
								<input type="radio" name="service" id="service" value="2" autocomplete="off"
									class="form-check-input"  required>
								<label class="form-check-label" for="non">Non</label>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<div class="form-group text-center">
								<button name="enregistrer"
									class="btn enregistrer btn-primary btn-md full-width pop-login" type="submit"
									onClick="openPopup()" data-bs-toggle="collapse" aria-controls="collapseExample">
									Enregistrer
								</button>
								<div class="enregistrementValide" id="popup">
									<h3>Enregistrement de l'agent effectué</h3>
									<button type="button" onClick="closePopup();location.reload()">
										OK
									</button>
								</div>
							</div>
						</div>
			</form>
		</section>
	</section>


	<div class="bout">
		<a href="accueil.php"><span class="mdi mdi-arrow-left arrowleft"></span> <span class="retour">Retour à la page
				d'accueil</span> </a>
	</div>

	</section>

	 <script>
		let popup = document.getElementById("popup");

		function openPopup() {
			popup.classList.add("open-popup");
		}

		function closePopup() {
			popup.classList.add("open-popup");
		}

		function submitForm(event) {
			event.preventDefault();

			// Récupérer les données du formulaire
			var formData = new FormData(event.target);

			// Créer une requête AJAX
			var xhr = new XMLHttpRequest();
			xhr.open("POST", "modifierAgent.php");

			// Envoyer les données du formulaire
			xhr.send(formData);
		}
	</script>

	<script>
		var elt = document.getElementById('categorie');
		elt.addEventListener('change', function () {
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
		elt.addEventListener('change', function () {
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