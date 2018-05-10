<nav class="navbar navbar-expand-lg navbar-expand-md navbar-expand-sm navbar-expand-xl navbar-dark bg-dark">


        <ul class="navbar-nav mr-auto">

    <?php
//chemin vers les dossier qui m'interresse
    $cheminDossier = './contents';

    //stoque mes dossiers
    $dossier = scandir($cheminDossier);

    //je parcours mon dossier
    foreach ($dossier as $fichiers){

  //j'enleve de la vue l'extension
 $Ressource = basename($fichiers,'.php');
 $Fichier =explode("_",basename($fichiers,'.php'));
$nomFichier= implode(" ",$Fichier);

 //si j'enleve de la vue les dossier contenant des points
    if(!in_array($fichiers,array(".",".."))) {

//au click je cible index.php dans l'url ,je defini ma clé et la ressouce qui m'interrese (ex ?chemin=contact.php)
//pour plus de sécurité j'enleve l'extension de l'url


?><li class="nav-item">

                <a href="?chemin=<?php echo $Ressource; ?>" class="nav-link" ><?php echo $nomFichier; ?></a>

        </li>

<?php
    }
    }
    ?>

</ul>

</nav>
