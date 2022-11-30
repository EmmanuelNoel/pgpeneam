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


				<div class="row">

					<div class="col-md-6">
						<label for="">Matricule</label>
						<input type="text" class="form-control" placeholder="" name="" value="">
					</div>

					<div class="col-md-6">
						<label for="">Nom</label>
						<input type="text" class="form-control" placeholder="" name="" value="">
					</div>

				</div>

				<div class="row">

					<div class="col-md-6">
						<label for="">Prénom</label>
						<input type="text" class="form-control" placeholder="" name="" value="">
					</div>


					<div class="col-md-6">
						<label for="">Sexe</label>
						<select class="form-control " name="">
							<option value="" disabled="" selected="" hidden=""> </option>
							<option value="1">Homme</option>
							<option value="">Femme</option>
						</select>
					</div>

				</div>

				<div class="row">

					<div class="col-md-6">
						<label for="">Nationalité</label>
						<input type="text" class="form-control" placeholder="" name="" value="">
					</div>

					<div class="col-md-6">
						<label for="">Adresse</label>
						<input type="text" class="form-control" placeholder="" name="" value="">
					</div>

				</div>

				<div class="row">

					<div class="col-md-6">
						<label for="">Téléphone</label>
						<input type="tel" class="form-control" placeholder="" name="" value="">
					</div>

					<div class="col-md-6">
						<label for="">Email</label>
						<input type="email" name="" id="email" class="form-control">
					</div>

				</div>

				<div class="row">

					<div class="col-md-6">
						<label for="">IFU</label>
						<input type="tel" class="form-control" placeholder="" name="" value="">
					</div>

					<div class="col-md-6">
						<label for="">RIB</label>
						<input type="tel" name="" id="" class="form-control">
					</div>

				</div>

				<div class="row">

					<div class="col-md-6">
						<label for="">Profession</label>
						<input type="texte" class="form-control" placeholder="" name="" value="">
					</div>

					<div class="col-md-6">
						<label for="categorie">Catégorie</label>
						<select id="categorie" class="form-control " name="categorie">
							<option value="" disabled="" selected="" hidden=""> </option>
							<option value="ad">Administration</option>
							<option value="en">Enseignant</option>
						</select>
					</div>

					<div class="row">

						<div class="col-md-6">
							<label for="postead">Poste</label>
							<select id="poste-ad" class="form-control " name="postead">
								<option value="" disabled="" selected="" hidden=""> </option>
							</select>
						</div>

						<div class="col-md-6">
							<label for="statutad">Statut</label>
							<select id="statutad" class="form-control " name="statutad">
								<option value="" disabled="" selected="" hidden=""> </option>
							</select>
						</div>

					</div>

					<div class="row">

						<div class="col-md-6">
							<label for="date">Date de première prise de service</label>
							<div>
								<input type="date" name="date" id="date" class="form-control">
							</div>
						</div>

						<div class="col-md-6">
							<label for="cote">Côte</label>

								<select id="cote" class="form-control " name="cote">
									<option value="" disabled="" selected="" hidden=""> </option>
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