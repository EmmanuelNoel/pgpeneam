<?php
session_start();
if (empty($_SESSION)){
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

// $num_contrat = $_POST['num_contrat'];

// $insertion_contrat = $bdd->prepare('INSERT INTO contrat(numcontrat,dates,agent_id,entite_id) VALUES (?,?,?,?)');
// $insertion_contrat->execute(array($num_contrat,$dateActuel,$_POST['enseignant'],1));


//insertion dans la table prestation

// $donnees_contrat = $bdd->query('SELECT * FROM contrat ORDER BY id DESC LIMIT 1');
// $id = $donnees_contrat->fetch();
// $contrat_id = $id['id']; // recuperer l'id du dernier numcontrat

// if(is_array($_POST['classe']))
//   {
   
//      foreach($_POST['classe'] as $cle=>$val)
//      {

//         $classe_id = $_POST['classe'][$cle];
      
//         $ecue_id = $_POST['ecue'][$cle];
//         $date_debut =  $_POST['date_debut'][$cle];
//         $date_fin =   $_POST['date_fin'][$cle];
//         $massehoraire =  $_POST['massehoraire'][$cle];
      
// $insertion_prestation = $bdd->prepare('INSERT INTO prestation(contrat_id,classe_id,ecue_id,massehoraire,date_debut,date_fin)
// VALUES (?,?,?,?,?,?)
// ');
// $insertion_prestation->execute(array($contrat_id,$classe_id,$ecue_id,$massehoraire,$date_debut,$date_fin));

//      }
    
//   }
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

<main >
<div class="fs-5">
        <button type="button" class="btn btn-primary telecharger mx-4 "><i class="bi-download fs-3"></i> &nbsp;<span class="fs-4">Télécharger pdf</span> </button>
    </div>

    <div class="container fs-5">

        <br><br><br>
        <div>
            <table class="table">
                <tr>
                    <td class="header fw-bold text-black">CONTRAT DE PRESTATION D'ENSEIGNEMENT</td>
                </tr>
            </table>
        </div>
<br><br>
        <div class="text-center">
            <b>N°</b>...............2022/UAC/ENEAM/DA/SGE/SC/SPE/SerP <b>du</b> ...................
        </div>

        <br><br>

        <div>
            <b>Entre :</b>
            <br> L’Ecole Nationale d’Economie Appliquée et de Management (ENEAM),
            sise au campus universitaire de Cotonou, représentée par le Directeur <strong><em>HONLONKOU N’lédji Albert</em></strong> tel : 21 30 41 68 ;
            03 BP 1079,
            E-mail professionnel : <?php echo $info['email'];?> ci-après dénommé « ETABLISSEMENT » d’une part,
            <br> <b>Et</b>
            <br> Monsieur/Madame <?php echo $info['nom'];?> &nbsp;&nbsp;<?php echo $info['prenom'];?>
            <br> Nationalité :<?php echo $info['nationalite'];?> Profession : <?php echo $info['profession'];?>
            <br> Domicilié à
            <br> IFU: <?php echo $info['ifu'];?>
            <br> Compte bancaire N°................................................................/Banque : <?php echo $infos_agent['banque'];     ?>
            <br> Email:<?php echo $info['email'];?>   Tél. : <?php echo $info['telephone'];?>
            ci-après dénommé « L’ENSEIGNANT PRESTATAIRE » d’autre part
            qui déclare être disponible pour fournir les prestations objet du présent contrat, ci-après dénommé
            « PRESTATIONS D’ENSEIGNEMENT»,

            <br><br> Considérant que l’ENEAM est disposée à faciliter à l’enseignant prestataire l’exécution de ses prestations,
            conformément aux clauses et conditions du présent contrat ;

            <br><br> Les parties au présent contrat ont convenu de ce qui suit :
        </div>

        <div>
            <ol>
                <li class="fw-bolder">Objet du contrat</li>
                <div>
                    Le présent contrat a pour objet la fourniture de prestations d’enseignement à l’ENEAM dans les conditions de délai,
                    normes académiques et de qualité conformément aux clauses et conditions ci-après énoncées.
                </div>

                <br>

                <li class="fw-bolder">Nature des prestations</li>
                <div>
                    L’Entité retient par la présente les prestations de l’enseignant pour l’exécution de ................................... (......) heures
                    d’enseignement des cours de: [énumérer les cours, les masses horaires ainsi les niveaux/cycles concernés]
                    <br>
                    <ol>
                        <?php
                         foreach($_POST['ecue'] as $cle=>$val)
                         {
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

                            ?> 
                        <li> <?php echo $nom_ecue['nom'];   ?>..... &nbsp;&nbsp;&nbsp; <?php echo $nom_classe['nom'];   ?> / <?php echo $nom_classe['niveau'];   ?>......... &nbsp;&nbsp; <?php echo $masse_horaire. 'heures'   ?> </li>
                        <?php
                         }
                         ?>
                    </ol>
                    <br>
                    Conformément aux exigences énumérées dans le cahier de charges joint au présent contrat.
                </div>

                <br>

                <li class="fw-bolder">Date de démarrage et calendrier</li>
                <div>
                    La durée de la prestation est de ...................jours ouvrables à partir de :
                </div>
                <br>
                <div>
                    <table class="w-50 px-5 text-break mx-auto w-auto">
                        <tr class="text-center">
                            <th>Département</th>
                            <th>Année d'étude</th>
                            <th>ECUE<sup>1</sup> </th>
                            <th>Nombre d'heures</th>
                            <th>Date de <br> démarrage</th>
                            <th>Date de fin</th>
                        </tr>
                        <?php
                        foreach($_POST['ecue'] as $cle=>$val)
                         {
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
                           classe.filiere_id = filiere.id and classe.niveau = niveau.id and filiere.departement_id = departement.id' );
                           $infos_classe->execute(array($classe_id));
                           $nom_classe = $infos_classe->fetch();

                            ?>
                        <tr class="text-center">
                            
                            <td class="text-center"><?php echo $nom_classe['departement']; ?></td>
                            <td><?php echo $nom_classe['nom']; ?></td>
                            <td><?php echo $nom_ecue['nom']; ?> </td>
                            <td><?php echo $massehoraire; ?></td>
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

                <li class="fw-bolder">Temps de présence</li>
                <div>
                    Dans l’exécution du présent contrat, « L’ENSEIGNANT PRESTATAIRE » <?php echo $info['nom'];?> assurera
                    également un volume horaire hebdomadaire de…de travaux dirigés et de travaux pratiques s’il y en a
                    lieu. En outre, il surveillera les travaux de recherche des apprenants dans les conditions prévues par les textes de
                    l’ENEAM
                </div>

                <br>

                <li class="fw-bolder">Termes de paiement et prélèvements</li>
                <div>
                    Les honoraires pour les prestations d’enseignement sont de <b> 3.500 FCFA brut pour le cycle de licence/LMD et 
                    de 10.000 FCFA brut pour le cycle de Master, par heure exécutée conformément aux exigences de l'ENEAM.</b> 
                    Les paiements sont effectués en Francs CFA à la fin des prestations (dépôt de sujets, corrigés types et copies
                    corrigées) dûment constatées par une attestation de service fait, par virement bancaire après le prélèvement de
                    l’AIB.
                </div>

                <br>

                <li class="fw-bolder"> Normes de Performance</li>
                <div>
                    L’enseignant prestataire s’engage à fournir les prestations conformément aux normes professionnelles, d’éthique
                    et déontologiques, de compétence et d’intégrité les plus exigeantes. Il est systématiquement mis fin au présent
                    contrat en cas de défaillance du prestataire constatée et motivée par écrit de l’ENEAM
                </div>

                <br>

                <li class="fw-bolder">Droit de propriété, de devoir de réserve et de non-concurrence</li>
                <div>
                    Pendant la durée d’exécution du présent contrat et les cinq années suivant son expiration, l’enseignant prestataire
                    ne divulguera aucune information exclusive ou confidentielle concernant la prestation, le présent contrat, les
                    affaires ou les documents de l’ENEAM sans avoir obtenu au préalable l’autorisation écrite de l’Unité de formation
                    et de recherche concernée.
                    <br><br> Tous les rapports ou autres documents, que l’enseignant prestataire préparera pour le compte l’ENEAM dans le
                    cadre du présent contrat deviendront et demeureront la propriété de l’ENEAM
                    <br><br> Ne sont pas pris en compte les cours et autres documents préparés par l’enseignant pour l’exécution de ses
                    prestations.
                </div>

                <br>

                <li class="fw-bolder">Règlement des litiges</li>
                <div>
                    Pour tout ce qui n’est pas prévu au présent contrat, les parties se référeront aux lois béninoises en la matière. Tout
                    litige survenu lors de l’exécution du présent contrat sera soumis aux juridictions compétentes, s’il n’est pas réglé à
                    l’amiable ou par tout autre mode de règlement agréé par les deux parties.
                </div>
            </ol>

            <div class="footer">

                <div class="text-center mb-5">
                    Fait en trois (3) copies originales à ........................., le ................................
                </div>

                <div class="row mb-5">

                    <div class="col-6 text-center">
                        <span class="fw-bolder">
                            L'enseignant prestataire,
                        </span>
                    </div>

                    <div class="col-6 text-center mb-5">
                        <span class="fw-bolder">
                            Pour l’ENEAM <br>
                            le Directeur,
                        </span>
                    </div>

                </div>
                <div class="row">

                    <div class="col-6 text-center">
                        <span class="fw-bolder">
                            Monsieur/Madame.....................
                        </span>
                    </div>

                    <div class="col-6 text-center mb-5">
                        <span class="fw-bolder">
                            <u> Professeur <i></i><?php echo $info['nom'];   ?> </u>
                            <p>
                                <?php echo $infos_agent['grade'];   ?>
                            </p>
                        </span>
                    </div>

                </div>

                <div class="text-center fw-bolder mb-5">
                    VISA DE L'AGENT COMPTABLE
                </div>

            </div>

        </div>

    </div>
    <!-- Télecargement du contrat -->
    <script src="html2pdf.bundle.js"></script>
    <script src="pdf.js"></script>
</main>
   
</body>

</html>