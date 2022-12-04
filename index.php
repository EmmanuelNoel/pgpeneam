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
<!-- //font-awesome icons -->
<!--//MDI Icons-->
<link rel="stylesheet" href="mdi/css/materialdesignicons.min.css">
<script src="js/jquery2.0.3.min.js"></script>

<style>
/* Format pc  */
@media (min-width: 800px)

{ 

	#logo_uac
	{
		width: 120px;
		margin-left: 50px;
	}

	#logo_eneam
	{
		width: 125px;
		margin-left: 50px;
		height: 125px;
		margin-top: 15px;
	}

	.texte
	{
		font-size: 45px;
		color: white;
		text-align: center;
		margin-top: 12px;
	}

 }


/* Format mobile */

 @media (max-width: 800px)

{ 

	#logo_uac
	{
		width: 80px;
		margin-left: 10px;
	}

	#logo_eneam
	{
		height: 85px;
		margin-right: 100px;
		width: 85px;
		margin-top: 12px;
		
	}

	.texte
	{
		font-size: 25px;
		color: white;
		text-align: center;
		margin-top: 10px;
	}

 }



</style>

</head>
<body class="body">
<!--drapeau-->
<div class="container" id="banner">
	<div class="row">
		<div class="col-4 drapeau"  style="background-color : green; "></div>
		<div class="col-4 drapeau"  style="background-color : yellow;"></div>
		<div class="col-4 drapeau" style="background-color : red;"></div>
	</div>
</div>
<!--en-tête-->
<div class="row image" style="margin-top: 10px">
		<div class="col-2"><img src="images/logo_uac2.png" id="logo_uac" alt=""></div> 
		<div class="col-8"><p class="texte">PLATEFORME DE GESTION DU PERSONNEL DE L'ENEAM</p></div> 
        <div class="col-2"><img  src="images/eneamlogo1.png" id="logo_eneam"   alt=""></div> 
</div>
<!--formulaire-->
<div class="log-w3">
	<div class=" second w3layouts-main">
		<h2>CONNEXION</h2>
		<form action="connexion.php" method="post">
			<input type="number" class="ggg" name="matricule" placeholder="Matricule" required>
			<input type="password" class="ggg" name="password" placeholder="Mot de passe" required>
		
			<!-- <h6><a href="#">Mot de passe oublié?</a></h6>
				<div class="clearfix"></div> -->
				<input type="submit" value="Se connecter" name="login">
				<!-- <p>Vous n'avez pas un compte ?<a href="registration.php">Créer un compte</a></p> -->
		</form>
	</div>	
</div>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
