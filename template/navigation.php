<?php
session_start();
?>
<nav class="navbar navbar-expand-lg navbar-expand-md navbar-expand-sm navbar-expand-xl navbar-dark bg-dark">


        <ul class="navbar-nav mr-auto">

    <?php
//chemin vers les dossier qui m'interresse
    $cheminDossier = './contents';

    //stoque mes dossiers
    $dossier = scandir($cheminDossier);

    //je parcours mon dossier
    foreach ($dossier as $fichiers){

  //gestion de l'affichage de mon url sans l'extenssion
 $Ressource = basename($fichiers,'.php');

 //j'enleve de la vue l'extension et je remplace les underscore par des espace
 $Fichier =explode("_",basename($fichiers,'.php'));
$nomFichier= implode(" ",$Fichier);

 //si il y a des dossier avec des points,je les enleves de la vue
    if(!in_array($fichiers,array(".",".."))) {



//au click je cible index.php dans l'url ,je defini ma clé et la ressouce qui m'interrese (ex ?chemin=contact.php),la resoource vient ce stocker dans la clé
//pour plus de sécurité j'ai enlever l'extension de l'url
?><li class="nav-item">


                <a href="?chemin=<?php echo $Ressource; ?>" class="nav-link" ><?php echo $nomFichier; ?></a>

        </li>

<?php
    }
    }
    if(isset($_SESSION['pseudo'])){ ?>


        <li class="nav-item bs-tooltip-right bs-popover-right">


            <form method="get" class="form-inline" action="../script/deconnexion.php ">



                <input type="submit" value="deconnexion" >
            </form>

        </li>

<?php

    }else{ ?>

        <li class="nav-item bs-tooltip-right bs-popover-right">


            <form method="post" class="form-inline" action="../script/connexion.php">

                <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" class="form-control mr-sm-2">
                <label for="mdp">Mot de passe</label> : <input type="text" name="mdp" id="mdp" class="form-control mr-sm-2">

                <input type="submit" value="Connexion" >
            </form>

        </li>





        <?php
    }
    ?>



</ul>

</nav>
