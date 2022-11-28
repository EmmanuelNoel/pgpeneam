<?php
	$matricule=$_POST['matricule'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$categorie=$_POST['categorie'];
	$date=$_POST['date'];
	$cote=$_POST['cote'];
	$file=$_POST['file'];
	$service=$_POST['service'];

	include('db.php');
	$query=self::$connection->query("INSERT INTO agent VALUES () ")
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

		<section class="second">

			<p>ENREGISTREMENT AGENT </p>

			<section class="third">
				<div class="container">

					<div class="row justify-content-center">

						<div class="col-lg-7 col-md-7 col-sm-12">
							<div class="modal-body">
								<div class="social-login center-tr">
								</div>
								<div class="login-form">
									<form method="POST" action="eagent.php">
										<input type="hidden" name="_token" value="">

										<div class="form-group">
											<div class="input-with-gray">
												<label for="matricule" >Matricule</label>
												<input type="text" class="form-control" placeholder="" name="matricule" value="">
												<!-- <i class="ti-user"></i> -->
											</div>
										</div>

										<div class="form-group">
											<label for="nom">Nom</label>
											<div class="input-with-gray">

												<input type="nom" name="nom" id="nom" class="form-control " placeholder="">
												<!-- <i class="ti-nom"></i> -->
											</div>
										</div>

										<div class="form-group">
											<label for="prenom">Prénom(s)</label>
											<div class="input-with-gray">

												<input type="prenom" name="prenom" id="prenom" class="form-control " placeholder="">
												<!-- <i class="ti-prenom"></i> -->
											</div>
										</div>

										<div class="form-group">
											<label for="categorie">Catégorie</label>
											<div class="input-with-gray">

												<select id="categorie" class="form-control " name="categorie">
													<option value="" disabled="" selected="" hidden="">  </option>
													<option value="ad">Administration</option>
													<option value="en">Enseignant</option>
												</select>
												<!-- <i class="ti-user"></i> -->
											</div>

											<div class="form-group" id="postad-d" style="display: none;">
											<label for="postead">Poste</label>
											<div class="input-with-gray">

													<select id="poste-ad" class="form-control " name="postead">

														<option value="" disabled="" selected="" hidden="">  </option>
														<option value="9">Non affecté à un poste</option>
														<option value="8">Directeur Adjoint</option>
														<option value="7">Assistant Directeur</option>
														<option value="6">Sécrétaire Gérénale</option>
														<option value="5">Chef Service Comptable</option>
														<option value="4">Sécrétaire Comptable</option>
														<option value="3">Chef de Départements</option>
														<option value="2">Chef Adjoint de Départements</option>
														<option value="1">Secrétaire Administratif</option>
														<option value="0">Coordonnateur du CREAM</option>

													</select>
												<!-- <i class="ti-nom"></i> -->
											</div>
										</div>

										<div class="form-group" id="posten-d" style="display: none;">
											<label for="posten">Poste</label>
											<div class="input-with-gray">

													<select id="poste-en" class="form-control " name="posten" >

														<option value="" disabled="" selected="" hidden="">  </option>
														<option value="9">Non affecté à un poste</option>
														<option value="8">Professeur d'Initiation à l'Algorithme</option>
														<option value="7">Professeur de Structure de données</option>
														<option value="6">Professeur de Base de données</option>
														<option value="5">Professeur de Comptabilité analytique</option>
														<option value="4">Professeur de Statistique et probabilité</option>
														<option value="3">Professeur de Bureautique</option>
														<option value="2">Professeur de Mathématiques pour l'informatique</option>
														<option value="1">Professeur d'Entrepreneuriat</option>
														<option value="0">Professeur de Statistique inférentielle</option>

													</select>
												<!-- <i class="ti-nom"></i> -->
											</div>
										</div>

											<div class="form-group" id="statutad-d" style="display: none;">
												<label for="statutad">Statut</label>
												<div class="input-with-gray">

													<select id="statutad" class="form-control " name="statutad" title="Hey">

														<option value="" disabled="" selected="" hidden="">  </option>
														<option value="convent">Conventionné</option>
														<option value="contract">Contractuel</option>
														<option value="perma">Permanent</option>


													</select>
													<!-- <i class="ti-user"></i> -->
												</div>
											</div>

											<div class="form-group" id="statuten-d"  style="display: none;">
												<label for="statuten">Statut</label>
												<div class="input-with-gray">

													<select id="statuten" class="form-control " name="statuten">

														<option value="" disabled="" selected="" hidden="">  </option>
														<option value="perma">Permanent</option>
														<option value="vact">Vacataire</option>

													</select>
													<!-- <i class="ti-user"></i> -->
												</div>
											</div>

											<div class="form-group">
												<label for="date">Date de première prise de service</label>
												<div class="input-with-gray">

													<input type="date" name="date" id="date" class="form-control">
													<!-- <i class="ti-prenom"></i> -->
												</div>
											</div>

											<div class="form-group">
											<label for="cote">Côte</label>
											<div class="input-with-gray">

													<select id="cote" class="form-control " name="cote">

														<option value="" disabled="" selected="" hidden="">  </option>
														<option value="0">E1</option>
														<option value="1">E2</option>
														<option value="2">E3</option>
														<option value="3">E4</option>
														<option value="4">M1</option>
														<option value="5">M2</option>
														<option value="6">M3</option>
														<option value="7">M4</option>
														<option value="8">C1</option>
														<option value="9">C2</option>
														<option value="10">C3</option>
														<option value="11">C4</option>

													</select>
												<!-- <i class="ti-nom"></i> -->
											</div>
										</div>

										<div class="form-group">
											<label for="file">Choisir les fichiers</label>
											<div class="input-with-gray">

											<input type="file" name="file" id="file" class="form-control " placeholder="" multiple>
												<!-- <i class="ti-nom"></i> -->
											</div>
										</div>

										<div class="form-group">
											<label for="service">En service</label>
											<div class="input-with-gray">

													<select id="service" class="form-control " name="service">

														<option value="" disabled="" selected="" hidden="">  </option>
														<option value="1">Oui</option>
														<option value="">Non</option>

													</select>
												<!-- <i class="ti-nom"></i> -->
											</div>
										</div>


									</form>

								</div>
							</div>
						</div>

					</div>

				</div>
			</section>

			<div class="row">
				<div class="col-12">
				    <div class="form-group">
					    <p>
                             <a class="btn btn-primary btn-md full-width pop-login" data-bs-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="collapseExample">
                                  Enregistrer
                            </a>
						</p>
					</div>
				</div>
			</div>

		</section>
		<div class="bout">
			<a href="index.php"><i class="fa fa-arrow-left"></i> <span>Retour à la page d'accueil</span> </a>
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