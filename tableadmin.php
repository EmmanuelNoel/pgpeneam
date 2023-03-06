<script>
  function run() {
    var info = document.getElementById("admin").value;

    window.location.href = "tableadmin.php?val=" + info;

  }
</script>

<?php
include('connexionDB.php');
session_start();


if (empty($_SESSION)) {
  # code...
  header('location:index.php');
}

if (isset($_GET['val'])) {
  $admin = $bdd->prepare('SELECT agent.id as id, agent.matricule as matricule,agent.nom as nom,agent.prenom as prenom,role.nom as 
  role FROM agent,role WHERE role.id = agent.role_id and categorie_id = 2 and statut_id = ?');
  $admin->execute(array($_GET['val']));
} else {
  $admin = $bdd->query('SELECT agent.id as id, agent.matricule as matricule,agent.nom as nom,agent.prenom as prenom,role.nom as role FROM agent,role WHERE role.id = agent.role_id and categorie_id = 2');
}
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
  <link rel="stylesheet" href="css/bootstrap.min.css">
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
  <!-- icones bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="bootstrap-icons-1.9.1/bootstrap-icons.css">
</head>

<body class="body">
  <section id="container">
    <!--header start-->
    <header class="header fixed-top clearfix">
      <!--logo start-->
      <div class="brand">
        <a href="index.php" class="logo">
          PERSONNEL ENEAM
        </a>
        <div class="sidebar-toggle-box">
          <div class="fa fa-bars"></div>
        </div>
      </div>
      <!--logo end-->
      <div class="top-nav clearfix">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">
          <li>
            <input type="text" class="form-control search" placeholder=" Rechercher">
          </li>
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

              <span class="username"><?php echo '' . $_SESSION['prenom'] . ' ' . $_SESSION['nom'] ?></span>
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
              <li><a href="profilagent.php"><i class="bi bi-person-circle"></i>Profil</a></li>

              <li><a href="login.php"><i class="fa fa-sign-out"></i>Déconnexion</a></li>
            </ul>
          </li>
          <!-- user login dropdown end -->

        </ul>
        <!--search & user info end-->
      </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
          <ul class="sidebar-menu" id="nav-accordion">
            <li>
              <a href="accueil.php">
                <i class="fa fa-home"></i>
                <span>Accueil</span>
              </a>
            </li>

            <li class="sub-menu dcjq-parent-li">
              <a class="dcjq-parent active" href="javascript:;">
                <i class="fa fa-th"></i>
                <span>Liste du personnel</span>
                <span class="dcjq-icon"></span></a>
              <ul class="sub" style="display: block;">
                <li><a class="active" href="tableadmin.php">Administration</a></li>
                <li><a class="" href="tablens.php">Enseignant</a></li>
              </ul>
            </li>

            <li>
              <a href="eagent.php">
                <i class="fa  fa-check-square"></i>
                <span>Enregistrer agent</span>
              </a>
            </li>

            <li>
              <a href="matiere.php">
                <i class="fa fa-plus"></i>
                <span>Ajouter UE/ECUE</span>
              </a>
            </li>

            <li>
							<a href="filiere.php">
								<i class="fa fa-plus"></i>
								<span>Ajouter département/filière</span>
							</a>
						</li>

						<li class="sub-menu dcjq-parent-li">
							<a href="javascript:;">
								<i class="fa fa-file-text-o"></i>
								<span>Editer Contrat</span>
								<span class="dcjq-icon"></span></a>
							<ul class="sub" style="display: block;">
                <li><a href="contratl.php">Contrat Licence</a></li>
								<li><a href="contratm.php">Contrat Master</a></li>
							</ul>
						</li>

          </ul>
        </div>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="table-agile-info">
          <div class="panel panel-default">
            <div class="panel-heading">
              Liste du personnel administratif
            </div>

            <div class="row w3-res-tb">
              <div class="col-sm-5 m-b-xs">
                <select class="input-sm form-control w-sm inline v-middle" id="admin" onchange="run()">

                  <option value="0">Toute la liste</option>
                  <option value="3">
                    Agents conventionnés
                  </option>
                  <option value="4">Agents contractuels</option>
                  <option value="1">Agents permanents</option>
                </select>

              </div>
              <div class="col-sm-4">
              </div>
              <div class="col-sm-3">
                <div class="input-group">
                  <input type="text" class="input-sm form-control" placeholder="Search">
                  <span class="input-group-btn">
                    <button class="btn btn-sm btn-default" type="button"> <i class="fa fa-search"></i> </button>
                  </span>
                </div>
              </div>
            </div>


            <!--tableau-->
            <div class="table-responsive">
              <table class="table table-striped b-t b-light">
                <thead>
                  <tr>
                    <th data-breakpoints="xs">Matricule</th>
                    <th>Nom</th>
                    <th>Prénom(s)</th>
                    <th data-breakpoints="xs">Poste</th>


                  </tr>
                </thead>
                <tbody>

                  <?php

                  while ($donneesenseignant = $admin->fetch()) {
                  ?>

                    <tr data-expanded="true">
                      <td> <a href="profilagent.php?val=<?php echo $donneesenseignant['id'];  ?>"> <?php echo $donneesenseignant['matricule'];  ?></a> </td>
                      <td> <a href="profilagent.php?val=<?php echo $donneesenseignant['id'];  ?>"> <?php echo $donneesenseignant['nom'];  ?> </a></td>
                      <td> <a href="profilagent.php?val=<?php echo $donneesenseignant['id'];  ?>"> <?php echo $donneesenseignant['prenom'];  ?></a></td>
                      <td> <a href="profilagent.php?val=<?php echo $donneesenseignant['id'];  ?>"> <?php echo $donneesenseignant['role'];  ?></a></td>

                    </tr>
                  <?php
                  }

                  ?>
                </tbody>
              </table>
            </div>
            <!--footer tableau-->
            <footer class="panel-footer">
              <div class="row">

                <div class="col-sm-7 text-right text-center-xs">
                  <ul class="pagination pagination-sm m-t-none m-b-none">
                    <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                    <li><a href="">1</a></li>
                    <li><a href="">2</a></li>
                    <li><a href="">3</a></li>
                    <li><a href="">4</a></li>
                    <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                  </ul>
                </div>
              </div>
            </footer>
          </div>
        </div>
      </section>

    </section>
    <!--main content end-->
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