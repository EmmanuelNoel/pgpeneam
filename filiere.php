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
            <form action="traitementfil.php" method="post" name="enregistrer" class="" onsubmit="submitForm(event);">
                <p>AJOUTER Departement/Filiere</p>

                <section class="third">
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <input type="text" class="form-control formcontrol" placeholder="Acronyme" name="departement" value="">
                        </div>

                        <div class="col-md-9">
                            <input type="text" class="form-control formcontrol" placeholder="Libellé département" name="lide" value="">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3">
                            <input type="text" class="form-control formcontrol" placeholder="Code Filière 1 " name="codefil[]" value="">
                        </div>

                        <div class="col-md-9">
                            <input type="text" class="form-control formcontrol" placeholder="Libellé Filière 1" name="libfil[]" value="">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3">
                            <input type="text" class="form-control formcontrol" placeholder="Code Filière 2 " name="codefil[]" value="">
                        </div>

                        <div class="col-md-9">
                            <input type="text" class="form-control formcontrol" placeholder="Libellé Filière 2" name="libfil[]" value="">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-3">
                            <input type="text" class="form-control formcontrol" placeholder="Code Filière 3 " name="codefil[]" value="">
                        </div>

                        <div class="col-md-9">
                            <input type="text" class="form-control formcontrol" placeholder="Libellé Filière 3" name="libfil[]" value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group text-center">
                            <button name="ajouter" class="btn ajouter btn-primary btn-md full-width pop-login" type="submit" onClick="openPopup()" data-bs-toggle="collapse" aria-controls="collapseExample">
									Ajouter
								</button>
								<div class="enregistrementValide" id="popup">
									<h3>Enregistrement du Département/Filiere effectué</h3>
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
  xhr.open("POST", "traitementfil.php");

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