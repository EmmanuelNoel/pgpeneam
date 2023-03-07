<?php
session_start();
if (empty($_SESSION)) {
    # code...
    header('location:index.php');
}


include('connexionDB.php'); //connexion DB

$enseignant = $bdd->query('SELECT * FROM agent where categorie_id =  1');

//récupération des classe dans la bd
$classe = $bdd->query('SELECT * FROM classe');


//récupérer le dernier numero contrat
$donnees_contrat = $bdd->query('SELECT * FROM contrat ORDER BY id DESC LIMIT 1');
$num_contrat = $donnees_contrat->fetch();

if ($num_contrat) {
    $dernier_num_contrat = $num_contrat['numcontrat'];

    $dernier_num_contrat++;
} else {
    $dernier_num_contrat = 1000;
}

?>


<!DOCTYPE html>

<head>
    <title>Edition de contrat master</title>
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/style-responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
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

<body class="body">

    <section class="first">

        <section class="second container-sm col-10">

            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 text-end">
                    <p>EDITION DE CONTRAT MASTER</p>
                </div>
            </div>



            <form action="contratmaster.php" method="post">
                <input type="hidden" name="num_contrat" value="<?php echo $dernier_num_contrat; ?>">
                <section class="third">
                    <div class=" col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6"
                        style="display:flex ; justify-content: space-around;">

                        <select class="form-select formselect" name="enseignant" style="width: 450px;" required>
                            <option value="" selected>Enseignant</option>
                            <?php
                            while ($donneesEnseignant = $enseignant->fetch()) {
                            ?>

                            <option value="<?php echo $donneesEnseignant['id']; ?>">
                                <?php echo '' . $donneesEnseignant['nom'] ?> &nbsp;
                                <?php echo $donneesEnseignant['prenom']; ?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="row pe-3 pb-4">
                        <div class="col-12 text-end">
                            <button type="button" class="bg-gradient btn btn-secondary text-white" id="button"
                                onclick="duplicate()"><i class="bi-plus"></i> Ajouter une prestation</button>
                        </div>
                    </div>

                    <div class="row" style="margin-bottom: 20px; text-align: left">

                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6" style="display:flex ; justify-content: space-around;">

                            <select class="form-select formselect depFormSelect" name="dep" style="width: 450px; " required>
                                <option value="" selected>Departement</option>
                                <option value="/DECOFI" >DECOFI</option>
                                <option value="/ISE">ISE</option>
                            </select>
                        </div>

                    </div>
                    <section id="duplicater">

                        <div class="row pe-3 pb-4">
                            <div class="col-12 text-end">
                            </div>
                        </div>

                        <div class="row text-start" style="margin-bottom: 20px;">
                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6"
                                style="display:flex ; justify-content: space-around;">

                                <select class="form-select formselect" name="classe[]" style="width: 450px;" id="classe"
                                    onchange="run(this)"  required>
                                    <option value="" selected>Sélectionner une classe</option>
                                    <?php
                                    foreach ($classe as $cls) {
                                    ?>
                                    <option value="<?= $cls['id'] ?>"><?= $cls['nom']; ?></option>
                                    <?php }; ?>
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6"
                                style="display:flex ; justify-content: space-around;">

                                <select class="form-select formselect  ueFormSelect" oninput="run2(this)" name="ue[]"
                                    style="width: 450px; "  required>
                                    <option value="ue" disabled="" selected="" hidden="">UE </option>
                                </select>
                            </div>
                        </div>

                        <div class="row" style="margin-bottom: 20px; text-align: left">

                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6"
                                style="display:flex ; justify-content: space-around;">

                                <select class="form-select formselect ecueFormSelect" name="ecue[]"
                                    style="width: 450px; "  required>

                                    <option value="" disabled="" selected="" hidden=""> </option>
                                    <option value="ecue" selected>ECUE</option>
                                </select>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 "
                                style="display:flex ; justify-content: space-around;">

                                <input type="tel" class="form-control formcontrol " placeholder="Massehoraire"
                                    name="massehoraire[]" value="" style="width: 450px; "  required>

                            </div>

                        </div>

                        <div class="row" style="margin-bottom: 20px; text-align: left">

                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6"
                                style="display:flex ; justify-content: space-around;">

                                <input type="text" name="date_debut[]" id="date" onfocus="(this.type='date')"
                                    onfocusout="(this.type='text')" placeholder="Date début"
                                    class="form-control formcontrol" style="width: 450px; "  required>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6"
                                style="display:flex ; justify-content: space-around;">

                                <input type="text" name="date_fin[]" id="date" onfocus="(this.type='date')"
                                    onfocusout="(this.type='text')" placeholder="Date fin"
                                    class="form-control formcontrol" style="width: 450px; "  required>
                            </div>

                        </div>

                    </section>

                    <div class="row" style="margin-bottom: 20px; text-align: left">

                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 "
                            style="display:flex ; justify-content: space-around;">

                            <input type="tel" class="form-control formcontrol " placeholder="Jours ouvrables"
                                name="jourouvrable" value="" style="width: 450px;"  required>

                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 "
                            style="display:flex ; justify-content: space-around;">

                            <input type="tel" class="form-control formcontrol " placeholder="Taux horaire" name="taux"
                                value="" style="width: 450px;"  required>

                        </div>

                    </div>

                </section>

                <div class="text-center">

                    <button class="ms-3 btn btn-primary btn-md full-width pop-login " data-bs-toggle="collapse"
                        type="submit" name="editer" target="blank" role="button" aria-expanded="false"
                        aria-controls="collapseExample">
                        Editer
                    </button>

                </div>


                <br><br>
                </div>

            </form>

        </section>

        <div class="bout">
            <a href="accueil.php"><span class="mdi mdi-arrow-left arrowleft"></span> <span class="retour">Retour à la
                    page d'accueil</span> </a>
        </div>

    </section>


    <script>
        var i = 0;
        var original = document.getElementById('duplicater');

        function duplicate() {
            var clone = original.cloneNode(true); //"deep" clone
            clone.id = "duplicater" + ++i;
            //or clone.id = ""; if the divs don't need an ID
            original.parentNode.appendChild(clone);
        }
    </script>


    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/jquery.nicescroll.js"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
    <script src="js/jquery.scrollTo.js"></script>


    <script src="js/contrat.js"></script>


</body>

</html>