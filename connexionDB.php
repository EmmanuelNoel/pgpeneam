<?php
try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=pgpeneam', 'root', '');

    // En cas d'erreur, on affiche un message et on arrête tout
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());

}


?>