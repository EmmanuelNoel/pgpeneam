<?php
session_start();
// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();

header('location:index.php');

// session_start();

// unset($_POST['nom']);

// unset($_POST['prenom']);


// header('location:index.php');


?>