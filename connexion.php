<?php




if(!empty($_POST['login']))
{

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



}









?>