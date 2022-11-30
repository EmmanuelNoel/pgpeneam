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

    <!-- icones bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="bootstrap-icons-1.9.1/bootstrap-icons.css">
</head>

<body class="body">

    <section class="first">

        <section class="second">

            <p>EDITION DE CONTRAT</p>

            <section class="third">


                <div class="row">

                    <div class="col-md-6">
                        <label for="">Enseignant</label>
                        <input type="text" class="form-control" placeholder="" name="" value="">
                    </div>

                    <div class="col-md-6">
                        <label for="">Classe</label>
                        <select class="form-control " name="">
                            <option value="" disabled="" selected="" hidden=""> </option>
                        </select>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">
                        <label for="">Semestre</label>
                        <select class="form-control " name="">
                            <option value="" disabled="" selected="" hidden=""> </option>
                        </select>
                    </div>


                    <div class="col-md-6">
                        <label for="">UE</label>
                        <select class="form-control " name="">
                            <option value="" disabled="" selected="" hidden=""> </option>
                        </select>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">
                        <label for="">ECUE</label>
                        <select class="form-control " name="">
                            <option value="" disabled="" selected="" hidden=""> </option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="">Masse horaire</label>
                        <select class="form-control " name="">
                            <option value="" disabled="" selected="" hidden=""> </option>
                        </select>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">
                        <label for="">Date début</label>
                        <input type="date" name="date" id="date" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label for="">Date fin</label>
                        <input type="date" name="date" id="date" class="form-control">
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