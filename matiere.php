<?php

session_start();
if (empty($_SESSION)) {
    # code...
    header('location:index.php');
}

include('connexionDB.php');
$classe = $bdd->query('SELECT * FROM classe');

$annee = $bdd->query('SELECT * FROM annee');

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
            <form action="traitementmat.php" method="post" name="enregistrer" class="" onsubmit="submitForm(event);">
                <p>AJOUTER UE/ECUE</p>

                <section class="third">


                <div class="row text-start" style="margin-bottom: 20px;">
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6" style="display:flex ; justify-content: space-around;">

                            <select class="form-select formselect" name="classe" style="width: 450px;" id="classe" onchange="run(this)">
                                <option value="" selected>Sélectionner une classe</option>
                                <?php
                                    foreach($classe as $cls)
                                    {
                                ?>
                                <option value="<?= $cls['id']?>"><?= $cls['nom'];?></option>
                                <?php };?>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6" style="display:flex ; justify-content: space-around;">

                            <select class="form-select formselect" name="annee" style="width: 450px; ">
                                <option value="annee" disabled="" selected="" hidden="">Année académique
                                <?php
                                    foreach($annee as $ann)
                                    {
                                ?>
                                <option value="<?= $ann['id']?>"><?= $ann['annee'];?></option>
                                <?php };?>
                            </select>

                        </div>
                    </div>



                    <br><br>

                    <div class="row mb-4">
                        <div class="col-md-3">
                            <input type="text" class="form-control formcontrol" placeholder="Code UE" name="codeue" value="">
                        </div>

                        <div class="col-md-9">
                            <input type="text" class="form-control formcontrol" placeholder="Libellé UE" name="libue" value="">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3">
                            <input type="text" class="form-control formcontrol" placeholder="Code ECUE 1" name="codecue[]" value="">
                        </div>

                        <div class="col-md-9">
                            <input type="text" class="form-control formcontrol" placeholder="Libellé ECUE 1" name="libecue[]" value="">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3">
                            <input type="text" class="form-control formcontrol" placeholder="Code ECUE 2" name="codecue[]" value="">
                        </div>

                        <div class="col-md-9">
                            <input type="text" class="form-control formcontrol" placeholder="Libellé ECUE 2" name="libecue[]" value="">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3">
                            <input type="text" class="form-control formcontrol" placeholder="Code ECUE 3" name="codecue[]" value="">
                        </div>

                        <div class="col-md-9">
                            <input type="text" class="form-control formcontrol" placeholder="Libellé ECUE 3" name="libecue[]" value="">
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <div class="form-group text-center">
                            <button name="ajouter" class="btn ajouter btn-primary btn-md full-width pop-login" type="submit" onClick="openPopup()" data-bs-toggle="collapse" aria-controls="collapseExample">
									Ajouter
								</button>
								<div class="enregistrementValide" id="popup">
									<h3>Enregistrement de l'UE/ECUE effectuée</h3>
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
        <a href="accueil.php"><span class="mdi mdi-arrow-left arrowleft"></span> <span class="retour">Retour à la page d'accueil</span> </a>
    </div>

    </section>

    <script>
		let popup = document.getElementById("popup");

		function openPopup(){
			popup.classList.add("open-popup");
		}

		function closePopup(){
			popup.classList.add("open-popup");
		}
		function submitForm(event) {
  event.preventDefault();
  
  // Récupérer les données du formulaire
  var formData = new FormData(event.target);

  // Créer une requête AJAX
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "traitement.php");

  // Envoyer les données du formulaire
  xhr.send(formData);
}
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