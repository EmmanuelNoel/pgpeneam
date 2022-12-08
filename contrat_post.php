<?php 
include('connexionDB.php');

// var_dump($_GET['val']);
$enseignant = $bdd->query('SELECT * FROM agent where categorie_id =  1');
$classe = $bdd->query('SELECT * FROM classe');
if (isset($_GET['val'])) {
    $ue = $bdd->prepare('SELECT * FROM ue where classe_id=?');
    $ue->execute(array($_GET['val']));
    $resultat =$ue->fetchAll(PDO::FETCH_ASSOC);
   $objson=json_encode($resultat);
   echo $objson;
}elseif (isset($_GET['val2'])) {
    
    $ue = $bdd->prepare('SELECT * FROM ecue where ue_id=?');

    $ue->execute(array($_GET['val2']));

    $resultat =$ue->fetchAll(PDO::FETCH_ASSOC);

   $objson=json_encode($resultat);
   echo $objson;

}


?>