<?php

include ('connexionDB.php');

//récupération de l'id de entité
$entite = $bdd->query('SELECT * from entite');
$id = $entite->fetch();
$showid = $id['id'];



echo $showid;

//ajout du département

if(isset($_POST['departement']) AND isset($_POST['lide']))
{
//     $ajouter = $bdd->prepare('INSERT INTO departement(nom,acro,entite_id) VALUES (?,?,?)');

// $ajouter->execute(array(htmlspecialchars($_POST['lide']),htmlspecialchars($_POST['departement'],strip_tags($showid))));

$ajouter = $bdd->prepare('INSERT INTO departement(nom,acro,entite_id) VALUES (?,?,?) ');
$ajouter->execute(array(htmlspecialchars($_POST['lide']),htmlspecialchars($_POST['departement']),$showid));

}
 

//Récupération de l'id du département enregistré

$lastinsert = $bdd->query('SELECT * from departement ORDER BY id DESC');
$id = $lastinsert->fetch();
$lastid = $id['id'];


//ajout des filieres

if(isset($_POST['codefil']) AND isset($_POST['libfil']))
{
    if (is_array($_POST['codefil'])) {



        foreach ($_POST['codefil'] as $cle => $val) {
    
            $code_filiere = $_POST['codefil'][$cle];
            $libelle_filiere = $_POST['libfil'][$cle];
          
            if($code_filiere and $libelle_filiere)
            {
                $ajouter = $bdd->prepare('INSERT INTO filiere(nom,code,departement_id)
                VALUES (?,?,?)');
        
                $ajouter->execute(array($libelle_filiere,$code_filiere,$lastid));
            }
          
        }
    }
}


     header("location:filiere.php");


?>