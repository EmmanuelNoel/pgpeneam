<?php
session_start();
if (empty($_SESSION)) {
    # code...
    header('location:index.php');
}

?>

<!--insertion des données dans la table contrat et prestation -->
<?php

include('connexionDB.php'); //connexion DB

//date actuel

date_default_timezone_set('Africa/Abidjan');
$currenttime = date('d-m-Y');
$dateActuel = strtotime($currenttime);


//insertion dans la table contrat

$num_contrat = $_POST['num_contrat'];

$insertion_contrat = $bdd->prepare('INSERT INTO contrat(numcontrat,dates,agent_id,entite_id) VALUES (?,?,?,?)');
$insertion_contrat->execute(array($num_contrat, $dateActuel, $_POST['enseignant'], 1));


//insertion dans la table prestation

$donnees_contrat = $bdd->query('SELECT * FROM contrat ORDER BY id DESC LIMIT 1');
$id = $donnees_contrat->fetch();
$contrat_id = $id['id']; // recuperer l'id du dernier numcontrat

if (is_array($_POST['classe'])) {

    foreach ($_POST['classe'] as $cle => $val) {

        $classe_id = $_POST['classe'][$cle];

        $ecue_id = $_POST['ecue'][$cle];
        $date_debut =  $_POST['date_debut'][$cle];
        $date_fin =   $_POST['date_fin'][$cle];
        $massehoraire =  $_POST['massehoraire'][$cle];

        $insertion_prestation = $bdd->prepare('INSERT INTO prestation(contrat_id,classe_id,ecue_id,massehoraire,date_debut,date_fin)
VALUES (?,?,?,?,?,?)
');
        $insertion_prestation->execute(array($contrat_id, $classe_id, $ecue_id, $massehoraire, $date_debut, $date_fin));
    }
}
//informations de l'agent

$infos_agent = $bdd->prepare('SELECT * FROM agent where id=?');
$infos_agent->execute(array($_POST['enseignant']));
$info = $infos_agent->fetch();

//infos supplémentaires de l'agent

$infos_sup = $bdd->prepare('SELECT grade.nom as grade, banque.nom as banque FROM agent,grade,banque where agent.id = ? and agent.grade_id = grade.id and agent.banque_id = banque.id');
$infos_sup->execute(array($_POST['enseignant']));
$infos_agent = $infos_sup->fetch();

//infos prestation




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
    <link href="css/contrat.css" rel='stylesheet' type='text/css' />
    <link href="css/style-responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="css/font.css" type="text/css" />
    <link href="css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="css/morris.css" type="text/css" />
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

    <div class=" mt-3">
        <button type="button" class="btn btn-primary telecharger mx-4 mt-3"><i class="bi-download fs-3"></i> &nbsp;<span class="fs-4">Télécharger pdf</span> </button>
    </div>
    <br><br><br>

    <div class="container fs-5 text-justify" style="font-family: 'Times New Roman', Times, serif;">

        <div>
            <table class="table font-family-times">
                <tr>
                    <td class="header fw-bold mt-auto text-black">CONTRAT DE PRESTATION D'ENSEIGNEMENT</td>
                </tr>
            </table>
        </div>
        <br><br>
        <div>
            <div class="fw-bolder ms-5">N°....................................../UAC/ENEAM/DA/SGE/SC/SPE/SerP du .................................</div>
        </div>
        <br>
        <div class="">
            <b><em>Entre :</em></b>
            <br> L’Ecole Nationale d’Economie Appliquée et de Management (ENEAM) de l'Université d'Abomey-Calavi (UAC),
            sise au campus universitaire de Cotonou, représentée par son Directeur, Monsieur <strong><em>HONLONKOU N’lédji Albert </em></strong>, téléphone : 21 30 41 68 ;
            03 BP 1079, ci-après dénommée « ETABLISSEMENT » d’une part,
            <br> <b>Et</b>
            <br> Monsieur/Madame: <b><?php echo $info['nom']; ?> &nbsp;<?php echo $info['prenom']; ?></b>
            <br> Nationalité: <b><?php echo $info['nationalite']; ?></b>
            <br> Profession: <b><?php echo $info['profession']; ?></b>
            <br> Domicilié à: <b><?php echo $info['adresse']; ?></b>
            <br> IFU: N° <b><?php echo $info['ifu']; ?></b>
            <br> Compte bancaire N° <b><?php echo $info['rib']; ?></b> &nbsp;&nbsp;/Banque :&nbsp; <b><?php echo $infos_agent['banque']; ?></b>
            <br> Email: <b><?php echo $info['email']; ?></b>
            <br> Tél.: <b><?php echo $info['telephone']; ?></b>
            <br> Ci-après dénommé « L’ENSEIGNANT PRESTATAIRE » d’autre part qui déclare être disponible pour fournir les prestations objet du présent contrat, ci-après dénommé
            « PRESTATIONS D’ENSEIGNEMENT »,

            <br><br> Considérant que <strong><em>l’ENEAM</em></strong> est disposée à faciliter à l’enseignant prestataire l’exécution de ses prestations,
            conformément aux clauses et conditions du présent contrat ;

            <br><br> Les parties au présent contrat ont convenu de ce qui suit :
        </div>

        <?php
        $masseHoraireTotal = 0;
        foreach ($_POST['ecue'] as $cle => $val) {
            //recupérer les noms des ecue 
            $ecue_id = $_POST['ecue'][$cle];
            $infos_ecue = $bdd->prepare('SELECT * from ecue where id=?');
            $infos_ecue->execute(array($ecue_id));
            $nom_ecue = $infos_ecue->fetch();
            //récupérer les classes associées au ecue
            $classe_id = $_POST['classe'][$cle];
            $infos_classe = $bdd->prepare('SELECT classe.nom as nom, filiere.nom as filiere, niveau.libelle as niveau from classe,filiere,niveau where classe.id=? and classe.filiere_id = filiere.id and classe.niveau = niveau.id');
            $infos_classe->execute(array($classe_id));
            $nom_classe = $infos_classe->fetch();

            //masse horaire de chaque ecue
            $masse_horaire = $_POST['massehoraire'][$cle];
            $masseHoraireTotal += $masse_horaire;
        }

        ?>

        <?php
        function convertNumberToWords(int $number): string
        {
            // Tableau pour stocker tous les mots à remplacer.
            $words = array(
                0 => '',
                1 => 'un',
                2 => 'deux',
                3 => 'trois',
                4 => 'quatre',
                5 => 'cinq',
                6 => 'six',
                7 => 'sept',
                8 => 'huit',
                9 => 'neuf',
                10 => 'dix',
                11 => 'onze',
                12 => 'douze',
                13 => 'treize',
                14 => 'quatorze',
                15 => 'quinze',
                16 => 'seize',
                20 => 'vingt',
                30 => 'trente',
                40 => 'quarante',
                50 => 'cinquante',
                60 => 'soixante',
                70 => 'soixante-dix',
                80 => 'quatre-vingt',
                90 => 'quatre-vingt-dix'
            );

            // Gestion des nombres compris entre 0 et 19.
            if ($number < 20) {
                return $words[$number];
            }

            // Gestion des nombres strictement compris entre 20 et 69.
            if ($number >= 20 && $number < 70) {
                return $words[($number - $number % 10) / 10 * 10] . (($number % 10 != 0) ? '-' . $words[$number % 10] : '');
            }

            // Gestion des nombres strictement compris entre 70 et 99.
            if ($number >= 70 && $number < 100) {
                return $words[60] . ((($number - 60) != 10 && ($number - 60) != 20) ? '-' . convertNumberToWords($number - 60) : '-' . $words[($number - 60) / 10 * 10 + 10]);
            }

            // Gestion des nombres compris entre 100 et 999.
            if ($number >= 100 && $number < 1000) {

                // C'est cent si le nombre est égal à 100, 200, 300, 400, 500, 600, 700, 800, 900.
                if ($number % 100 == 0) {
                    return $words[$number / 100] . ' cent';
                }

                // Si il n'y a pas de modulos, c'est donc tout simplement X cent.
                if ($number % 100 != 0) {
                    return $words[(int)($number / 100)] . ' cent ' . convertNumberToWords($number % 100);
                }
            }

            // Erreur dans le cas où le nombre est >= 1000.
            return "Erreur: le nombre doit être inférieur ou égal à 999";
        }
        ?>


        <div>

            <div class="fw-bolder ms-5">1- Objet du contrat</div>
            <div>
                Le présent contrat a pour objet la fourniture de prestations d’enseignement à <strong><em>l’ENEAM</em></strong> dans les conditions de délai,
                normes académiques et de qualité conformément aux clauses et conditions ci-après énoncées.
            </div>

            <br>

            <div class="fw-bolder ms-5">2- Nature des prestations</div>
            <div>
                L’Entité retient par la présente les prestations de l’enseignant pour l’exécution de <?php echo convertNumberToWords($masseHoraireTotal) ?> (<?php echo $masseHoraireTotal; ?>) heures
                d’enseignement des cours de:
                <br>
                <ol>
                    <?php
                    foreach ($_POST['ecue'] as $cle => $val) {
                        //recupérer les noms des ecue 
                        $ecue_id = $_POST['ecue'][$cle];
                        $infos_ecue = $bdd->prepare('SELECT * from ecue where id=?');
                        $infos_ecue->execute(array($ecue_id));
                        $nom_ecue = $infos_ecue->fetch();
                        //récupérer les classes associées au ecue
                        $classe_id = $_POST['classe'][$cle];
                        $infos_classe = $bdd->prepare('SELECT classe.nom as nom, filiere.nom as filiere, niveau.libelle as niveau from classe,filiere,niveau where classe.id=? and classe.filiere_id = filiere.id and classe.niveau = niveau.id');
                        $infos_classe->execute(array($classe_id));
                        $nom_classe = $infos_classe->fetch();

                        //masse horaire de chaque ecue
                        $masse_horaire = $_POST['massehoraire'][$cle];
                        $masseHoraireTotal += $masse_horaire;

                    ?>
                        <li> <?php echo $nom_ecue['nom'];   ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $nom_classe['nom'];   ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $masse_horaire . 'H'   ?> </li>
                    <?php
                    }
                    ?>
                </ol>
                <em>conformément aux exigences énumérées dans le cahier de charges joint au présent contrat.</em>
            </div>

            <br>

            <div class="fw-bolder ms-5">3- Date de démarrage et calendrier</div>
            <div>
                La durée de la prestation est de <?php echo $_POST['jourouvrable']; ?> jours ouvrables à partir de :
            </div>

            <div>
                <table class="h-auto w-auto table table-responsive px-2 text-wrap mt-3 ">
                    <tr class="text-center">
                        <th class="col-2">Département</th>
                        <th class="col-2">Année <br> d'étude</th>
                        <th class="col-3">ECUE<sup>1</sup> </th>
                        <th class="col-1">Nombre <br> d'heures</th>
                        <th class="col-2">Date de <br> démarrage</th>
                        <th class="col-2">Date de fin</th>
                    </tr>
                    <?php
                    foreach ($_POST['ecue'] as $cle => $val) {
                        //recupérer les noms des ecue 
                        $ecue_id = $_POST['ecue'][$cle];
                        $infos_ecue = $bdd->prepare('SELECT * from ecue where id=?');
                        $infos_ecue->execute(array($ecue_id));
                        $nom_ecue = $infos_ecue->fetch();
                        $massehoraire = $_POST['massehoraire'][$cle];
                        $date_demarrage = $_POST['date_debut'][$cle];
                        $datefin = $_POST['date_fin'][$cle];
                        //récupérer les classes associées au ecue
                        $classe_id = $_POST['classe'][$cle];
                        $infos_classe = $bdd->prepare('SELECT classe.nom as nom, filiere.nom as filiere, niveau.libelle as niveau, 
                           departement.nom as departement from classe,filiere,niveau,departement where classe.id=? and 
                           classe.filiere_id = filiere.id and classe.niveau = niveau.id and filiere.departement_id = departement.id');
                        $infos_classe->execute(array($classe_id));
                        $nom_classe = $infos_classe->fetch();

                    ?>
                        <tr class="text-center">

                            <td><?php echo $nom_classe['departement']; ?></td>
                            <td><?php echo $nom_classe['nom']; ?></td>
                            <td><?php echo $nom_ecue['nom']; ?> </td>
                            <td><?php echo $massehoraire . 'H'; ?></td>
                            <td><?php echo $date_demarrage; ?></td>
                            <td><?php echo $datefin; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>

            <br>

            <div>
                <sup>1</sup>ECUE : Elément Constitutif de l’Unité d’Enseignement
            </div>
            <br>

            <div class="fw-bolder ms-5">4- Temps de présence</div>
            <div>
                Dans l’exécution du présent contrat, « L’ENSEIGNANT PRESTATAIRE » <?php echo $info['nom']; ?> assurera
                également un volume horaire hebdomadaire de… de travaux dirigés et de travaux pratiques s’il y en a
                lieu. En outre, il surveillera les travaux de recherche des apprenants dans les conditions prévues par les textes de
                <strong><em>l’ENEAM</em></strong>.
            </div>

            <br>

            <div class="fw-bolder ms-5">5- Termes de paiement et prélèvements</div>
            <div>
                Les honoraires pour les prestations d’enseignement sont de <b> 5.000 FCFA brut pour le cycle de Licence/LMD
                    par heure exécutée conformément aux exigences de l'ENEAM.</b>
                Les paiements sont effectués en Francs CFA à la fin des prestations (dépôt de sujets, corrigés types et copies
                corrigées) dûment constatées par une attestation de service fait, par virement bancaire après le prélèvement de
                l’AIB.
            </div>

            <br>

            <div class="fw-bolder ms-5">6- Normes de Performance</div>
            <div>
                L’enseignant prestataire s’engage à fournir les prestations conformément aux normes professionnelles, d’éthique
                et déontologiques, de compétence et d’intégrité les plus exigeantes. Il est systématiquement mis fin au présent
                contrat en cas de défaillance du prestataire constatée et motivée par écrit de <strong><em>l’ENEAM</em></strong>.
            </div>

            <br>

            <div class="fw-bolder ms-5">7- Droit de propriété, de devoir de réserve et de non-concurrence</div>
            <div>
                Pendant la durée d’exécution du présent contrat et les cinq années suivant son expiration, l’enseignant prestataire
                ne divulguera aucune information exclusive ou confidentielle concernant la prestation, le présent contrat, les
                affaires ou les documents de <strong><em>l’ENEAM</em></strong> sans avoir obtenu au préalable l’autorisation écrite de l’Unité de formation
                et de recherche concernée.
                <br> Tous les rapports ou autres documents, que l’enseignant prestataire préparera pour le compte <strong><em>l’ENEAM</em></strong> dans le
                cadre du présent contrat deviendront et demeureront la propriété de <strong><em>l’ENEAM</em></strong>.
                <br> Ne sont pas pris en compte les cours et autres documents préparés par l’enseignant pour l’exécution de ses
                prestations.
            </div>

            <br>

            <div class="fw-bolder ms-5">8- Règlement des litiges</div>
            <div>
                Pour tout ce qui n’est pas prévu au présent contrat, les parties se référeront aux lois béninoises en la matière. Tout
                litige survenu lors de l’exécution du présent contrat sera soumis aux juridictions compétentes, s’il n’est pas réglé à
                l’amiable ou par tout autre mode de règlement agréé par les deux parties.
            </div>


            <div class="footer">

                <div class="text-center mt-3 mb-5 ">
                    Fait en trois (3) copies originales à Cotonou, le ................................
                </div>

                <div class="row ">

                    <div class="col-6 mt-3 text-center">
                        <span class="fw-bolder">
                            L'enseignant prestataire,
                        </span>
                    </div>

                    <div class="col-6 text-center ">
                        <span class="fw-bolder">
                            Pour l’ENEAM <br>
                            le Directeur,
                        </span>
                    </div>

                </div>
                <br><br>
                <div class="row">

                    <div class="col-6 text-center">
                        <span class="fw-bolder">
                            Monsieur/Madame <?php echo $info['nom'];   ?>
                        </span>
                    </div>

                    <div class="col-6 text-center mb-5">
                        <span class="fw-bolder">
                            <em class="text-decoration-underline"> N. Albert HONLONKOU </em> <br>
                            <em>(Maître de conférences Agrégé)</em>
                        </span>
                    </div>

                </div>

                <div class="text-center fw-bolder mb-5">
                    VISA DE L'AGENT COMPTABLE
                </div>
                <br><br><br>
                <div class="text-center fw-bolder mt-5">
                    Monsieur.....................................................
                </div>

            </div>

        </div>

    </div>
    <!-- Télechargement du contrat -->
    <script src="html2pdf.bundle.js"></script>
    <script src="pdf.js"></script>
</body>

</html>