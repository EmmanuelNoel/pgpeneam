<?php

include ('connexionDB.php');


$enregistrer = $bdd->prepare('UPDATE agent SET nom=?,prenom=?,matricule=?,nationalite=?,profession=?,
ifu=?,rib=?,email=?,telephone=?,adresse=?,sexe=?,en_service=?,date_premier_service=?,grade_id=?,
statut_id=?,banque_id=?,categorie_id=?,role_id=?
     ');

$enregistrer->execute(array(htmlspecialchars($_POST['nom']),htmlspecialchars($_POST['prenom']),strip_tags($_POST['matricule'])
,htmlspecialchars($_POST['nationalite']),htmlspecialchars($_POST['profession']),
htmlspecialchars($_POST['ifu']),htmlspecialchars($_POST['rib']),htmlspecialchars($_POST['email']),
htmlspecialchars($_POST['telephone']),htmlspecialchars($_POST['adresse']),htmlspecialchars($_POST['sexe']),
htmlspecialchars($_POST['service']),
htmlspecialchars($_POST['date_premier_service']),htmlspecialchars($_POST['grade']),htmlspecialchars($_POST['statut']),
htmlspecialchars($_POST['banque']),htmlspecialchars($_POST['categorie']),htmlspecialchars($_POST['role'])


));

header("location:eagent2.php");


?>