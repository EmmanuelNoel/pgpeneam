<?php

session_start();

unset($_POST['nom']);

unset($_POST['prenom']);


header('location:index.php');


?>