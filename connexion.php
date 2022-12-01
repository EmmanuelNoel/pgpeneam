<?php



if(!empty($_POST['login']))
{

    include 'connexionDB.php';

    $donnees = $bdd->query('SELECT matricule,passwd FROM agent');

    $matricule=$_POST['matricule'];
    $passe = $_POST['password'];

   


}









?>