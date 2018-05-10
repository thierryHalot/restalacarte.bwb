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
    ?>

<li class="nav-item bs-tooltip-right bs-popover-right">


    <form method="post" class="form-inline">

        <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" class="form-control mr-sm-2">
        <label for="Mdp">Mot de passe</label> : <input type="text" name="Mdp" id="Mdp" class="form-control mr-sm-2">

        <input type="submit" value="Connexion" >
    </form>

</li>
</ul>

</nav>
