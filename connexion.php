<?php




if(!empty($_POST['login']))
{

    session_start();
    include ('connexionDB.php');

    $tab_passe = [];
    $tab_matricule = [];

    $donneesmat = $bdd->query('SELECT matricule FROM agent');
    $donneespasse = $bdd->query('SELECT passwd FROM agent');

    $matricule=$_POST['matricule'];
    $passe = $_POST['password'];

    //tous les matricules de la table agent
    $i=0;
    while($infomat = $donneesmat->fetch())
    {
       $tab_matricule[$i] = $infomat['matricule'];
       $i++;
    }

    //tous les mots de passe de la table agent

    $i=0;
    while($infopasse = $donneespasse->fetch())
    {
       $tab_passe[$i] = $infopasse['passwd'];
       $i++;
    }

        
    if(in_array($matricule,$tab_matricule))
    {
        if(in_array($passe,$tab_passe))
        {
           header('location:accueil.php');
        }
        else
        {
            header('location:index.php');
        }
    }
   
    else
    {
        header('location:index.php');
    }

    //session utilisateur

    $info_utilisateur = $bdd->prepare('SELECT * FROM agent where matricule=?');
    $info_utilisateur->execute(array($matricule));
    $prenom=$info_utilisateur->fetch();
    $_SESSION['nom']=$_POST['matricule'];
    $_SESSION['prenom']=$prenom['prenom'];


}









?>