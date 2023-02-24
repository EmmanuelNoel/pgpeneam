<?php

include ('connexionDB.php');

//récupération de l'id de entité
$entite = $bdd->query('SELECT * from entite');
$id = $entite->fetch();
$showid = $id['id'];





//ajout de l'UE

if(isset($_POST['codeue']) AND isset($_POST['libue']) AND isset($_POST['classe']) AND isset($_POST['annee']) )
{
    $ajouter = $bdd->prepare('INSERT INTO ue(nom,code,entite_id,classe_id,annee_id)
    VALUES (?,?,?,?,?)');

$ajouter->execute(array(htmlspecialchars($_POST['libue']),htmlspecialchars($_POST['codeue']),strip_tags($showid),strip_tags($_POST['classe']), strip_tags($_POST['annee'])));

}
 

//Récupération de l'id de l'UE enregistré

$lastinsert = $bdd->query('SELECT * from ue ORDER BY id DESC');
$id = $lastinsert->fetch();
$lastid = $id['id'];


//ajout des ECUES

if(isset($_POST['codecue']) AND isset($_POST['libecue']) AND isset($_POST['classe']))
{
    if (is_array($_POST['codecue'])) {



        foreach ($_POST['codecue'] as $cle => $val) {
    
            $code_ecue = $_POST['codecue'][$cle];
            $libelle_ecue = $_POST['libecue'][$cle];
          
            if($code_ecue and $libelle_ecue)
            {
                $ajouter = $bdd->prepare('INSERT INTO ecue(nom,code,ue_id)
                VALUES (?,?,?)');
        
                $ajouter->execute(array($libelle_ecue,$code_ecue,$lastid));
            }
          
        }
    }
}


     header("location:matiere.php");


?>