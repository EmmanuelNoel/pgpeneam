<?php
session_start();
if (empty($_SESSION)){
	# code...
	header('location:index.php');
}
include('connexionDB.php');



$req =$bdd->prepare('
select agent.nom,
agent.prenom
,agent.prenom
,agent.matricule
,agent.nationalite
,agent.profession
,agent.ifu
,agent.rib
,agent.email
,agent.telephone
,agent.adresse,
agent.sexe,
agent.en_service,
agent.date_premier_service,
grade.nom as grade,
statut.nom as statut,
categorie.nom as categorie,
banque.nom as banque,
role.nom as role
from agent,grade,statut,categorie,banque,role WHERE agent.grade_id=grade.id AND agent.statut_id=statut.id AND agent.banque_id=banque.id AND agent.categorie_id=categorie.id AND agent.role_id=role.id ORDER BY `agent`.`nom` AND agent.id=:id');
$req->execute(array(
'id' =>$_SESSION['id'],
    )
);

$resultat = $req->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<head>
<title>Plateforme de gestion du personnel de l'ENEAM</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/b1ootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!--//MDI Icons-->
<link rel="stylesheet" href="mdi/css/materialdesignicons.min.css">
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>


</head>
<body class="body">

<section class="first">

    <section class="second container-sm col-10">
    
    <p>INFORMATIONS AGENT</p>
    
        <section class="third">

	<form action="#" method="post">

<div class="row">
    <div class="col-lg-6" >
    <span>N° matricule :</span>
    </div>
    <div class="col-6" >


    
    <span><?php echo $resultat[0]['matricule'];?></span>
    </div>
</div>   

<div class="row">
    <div class="col-lg-6" >
    <span>Nom :</span>
    </div>
    <div class="col-6">
    <span><?php echo $resultat[0]['nom'];?></span>
    </div>
</div>   

<div class="row">
    <div class="col-lg-6" >
    <span>Prénom(s) :</span>
    </div>
    <div class="col-6" >
    <span><?php echo $resultat[0]['prenom'];?></span>
    </div>
</div>  

<div class="row">
    <div class="col-lg-6" >
    <span>Catégorie :</span>
    </div>
    <div class="col-6" >
    <span>
    <?php echo $resultat[0]['categorie'];?>    </span>
    </div>
</div>   

<div class="row">
    <div class="col-lg-6" >
    <span>Statut :</span>
    </div>
    <div class="col-6" >
    <span><?php echo $resultat[0]['statut'];?></span>
    </div>
</div>        

<div class="row">
    <div class="col-lg-6" >
    <span>Poste :</span>
    </div>
    <div class="col-6" >
    <span><?php echo $resultat[0]['profession'];?></span>
    </div>
</div> 

<div class="row">
    <div class="col-lg-6" >
    <span>Date de première prise de service :</span>
    </div>
    <div class="col-6" >
    <span><?php echo $resultat[0]['date_premier_service'];?></span>
    </div>
</div>        

<div class="row">
    <div class="col-lg-6">
    <span>Côte</span>
    </div>
    <div class="col-6">
    <span><?php echo $resultat[0]['grade'];?></span>
    </div>
</div>

<div class="row">
    <div class="col-lg-6" >
    <span>Documments fournis :</span>
    </div>
    <div class="col-6" >
    <span>Contrat de travail</span>
    <br><span>Décision d'engagement</span>
    <br><span>Arrrêté de nomination</span>
    <br><span>Acte de prise de fonction</span>
    <br><span>Etat civil</span>
    <br><span>Diplômes légalisés</span>
    <br><span>Décision d'admission</span>
    <br><span>Casier judiciaire</span>
    <br><span>Certificat d'individualité</span>
    <br><span>Certificat de première prise de fonction</span>
    <br><span>Curriculum vitae</span>
    </div>
</div>    
       
<div class="row">
    <div class="col-lg-6" >
    <span>En service :

    </span>
    </div>
    <div class="col-6" >
    <span>
    <?php echo $resultat[0]['en_service'];
?>
    </span>
    </div>
</div> 

	</form>
</div>	
        </section>
    
<div>
    <div class="row">
    <div class="col-lg-6">
    <p>
    <a class="btn btn-primary btnprimary btn-md btn-sm btn-lg btn-xl btn-xxl full-width pop-login" data-bs-toggle="collapse" href="eagent.php" role="button" aria-expanded="false" aria-controls="collapseExample">
    Modifier
    </a></p>
    </div>
    <div class="col-6"><p>
    <a class="btn btn-primary btnprimary btn-md btn-sm btn-lg btn-xl btn-xxl full-width pop-login" data-bs-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="collapseExample">
    Désactiver
    </a>
    </p>
    </div>
    </div>
</div>

    </section>
    <div class="bout">
	    <a href="tableadmin.php"><span class="mdi mdi-arrow-left arrowleft"></span> <span class="retour">Page précédente</span> </a>
    </div>
</section>

<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>