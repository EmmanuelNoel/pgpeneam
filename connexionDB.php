<?php
try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=pgpeneam;charset=utf8', 'root', '');

    // En cas d'erreur, on affiche un message et on arrête tout
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());

}


?>