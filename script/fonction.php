<?php

//fonction pour afficher la bar de nav
function getNav(){
    ?>
    <nav class="navbar navbar-expand-lg navbar-expand-md navbar-expand-sm navbar-expand-xl navbar-dark bg-dark">


        <ul class="navbar-nav mr-auto">

    <?php
//chemin vers les dossier qui m'interresse
    $cheminDossier = $_SERVER['DOCUMENT_ROOT'] . '/contents';

    //stoque mes dossiers (scan-dir me retourne que du texte mais n'indique pas pour autent le chemin dans une boucle foreach)
    $dossier = scandir($cheminDossier);

    //je parcours mon dossier
    foreach ($dossier as $fichiers) {

        //gestion de l'affichage de mon url sans l'extenssion
        $Ressource = basename($fichiers, '.php');

        //j'enleve de la vue l'extension et je remplace les underscore par des espace
        $Fichier = explode("_", basename($fichiers, '.php'));
        $nomFichier = implode(" ", $Fichier);


            //si il y a des dossier avec des points,je les enleves de la vue
            if (!in_array($fichiers, array(".", ".."))) {

                //si c'est pas un dossier (is_dir prend en argument le chemin de mon dossier)
                //DIRECTORY_SEPARATOR s'apadapte suivant l'os uttilisé et uttiisera le séparateur adequate
                if (!is_dir($cheminDossier . DIRECTORY_SEPARATOR . $fichiers)) {

//au click je cible index.php dans l'url ,je defini ma clé et la ressource qui m'interrese (ex ?chemin=contact.php),la resoource vient ce stocker dans la clé
//pour plus de sécurité j'ai enlever l'extension de l'url
                ?>
                <li class="nav-item">
                    <a href="?chemin=<?php echo $Ressource; ?>" class="nav-link"><?php echo $nomFichier; ?></a>
                </li>
                <?php
            }else if (is_dir($cheminDossier . DIRECTORY_SEPARATOR . $fichiers)) {


                    ?>
                    <div class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $nomFichier; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <?php

                    $sousDossier = scandir($cheminDossier . DIRECTORY_SEPARATOR . $fichiers);

                    foreach ($sousDossier as $contenu) {

                        if (!in_array($contenu, array(".", ".."))) {

                            ?>

                                <a class="dropdown-item" href="#"> <?php echo $contenu; ?> </a>

                            <?php
                        }
                    }
                }
        }
    }
    ?></div></div><?php

            getformNavCo();
    ?>
</ul>
</nav>
  <?php
}
//fonction qui permet d'afficher le formulaire de connexion dans la barre nav si il est deconnecter
//ou un bouton de deconnexion si il est connecter
function getformNavCo(){

    if(isset($_SESSION['pseudo'])): ?>
        <li class="nav-item bs-tooltip-right bs-popover-right">
            <form method="get" class="form-inline" action="../script/deconnexion.php ">
                <input type="submit" value="deconnexion" >
            </form>
        </li>
    <?php else: ?>
        <li class="nav-item bs-tooltip-right bs-popover-right">
            <form method="post" class="form-inline" action="../script/connexion.php">
                <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" class="form-control mr-sm-2">
                <label for="mdp">Mot de passe</label> : <input type="password" name="mdp" id="mdp" class="form-control mr-sm-2">
                <input type="submit" value="Connexion" >
            </form>
        </li>

        <?php
    endif;

}

//fonction qui permet de d'afficher le bon contenu correspondant au ancre de ma barre nav
function getNavContent(){


    //si ma clé 'chemin' existe dans l'url
    if(isset($_GET['chemin'])){

//j'insere le contenu de la page qui m'interresse en rajoutant l'extension
        include "contents/".$_GET['chemin'].".php";

    }

}

//fonction qui prend en argument le chemin du fichier a decoder a partir du document root
//et qui permet de le retourner sous forme de tableau associatif
function decodeJsonFile ($cheminFichier){

    $recuperationFichier = file_get_contents($_SERVER['DOCUMENT_ROOT'].$cheminFichier,true);

    //important true permet de decode notre fichier sous forme de tableau associatif
    //sinon c'est decoder sous forme d'objet
    $fichierDecoder = json_decode($recuperationFichier,true);

    return $fichierDecoder;


};
//fonction pour l'affichage du formulaire du livre d'or
function getFormLivreDor (){


    ?>
    <div class="row">
    <?php
    if (isset($_SESSION['pseudo'])) {

        ?>
        <div class="col-5">
            <form method="post" action="../script/encode.php" class="forLivreDor">
                <label for="nomLivreDor">Votre nom</label> : <input type="text" name="nomLivreDor" id="nomLivreDor" class="inpLivreDor"/><br/>
                <label for="prenomLivreDor">Votre prenom</label> : <input type="text" name="prenomLivreDor" id="prenomLivreDor"class="inpLivreDor"/><br/>
                <p>
                    <label for="messageLivreDor">message : </label><br/>
                    <textarea name="messageLivreDor" id="messageLivreDor" class="textaLivreDor"></textarea>
                </p>
                <input type="submit" value="Envoyer" class="bouton"/>
            </form>
        </div>
        <?php
    };

    $fichierDecoder = decodeJsonFile('/data/message.json');

    ?>
    <div class="col-5 test">
        <?php

        foreach ($fichierDecoder as $key => $value){



            foreach ($value as $key1 => $value1){


                echo $key1." : ".$value1."<br>";


            }
?><hr> <?php

        }?>


    </div>
</div>

<?php
}

//fonction qui permet de rajouter un nouvelle uttilisateur dans la bdd

function encodeMsg(){

//je definis un message
    $message = array(

        "nom" => $_POST['nomLivreDor'],
        "prenom" => $_POST['prenomLivreDor'],
        'message' => $_POST['messageLivreDor'],


    );

//le serveur envoi un requete de type get vers le fichier message.jon
//et recupere le fichier sous forme de chainde caractère
//l'argument true sert a rechercher le fichier dans le chemin d'inclusion c'est a dire dans le chemin spécifier en 1er argument

    $contenuFichier = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/data/message.json',true);



    //strlen retoune le nombre de caractere contenu dans mon ficchier
    //si mon fichier est vide
    if(strlen($contenuFichier)=== 0){

        //je crée un tableau contenant mes messages
        $listeDeMessages = array();

        //j'insere le message que l'uttilisateur a poster dans ma liste de message
        array_push($listeDeMessages, $message);


        //j'encode mon message en json pour l'envoi
        $messageEncoder = json_encode($listeDeMessages);

        //le serveur fait une requete de type post vers le fichier
        file_put_contents($_SERVER['DOCUMENT_ROOT'].'/data/message.json', $messageEncoder);

//sinon,mon tableau liste de message étant déja crée alors...
    }else{




        //je decode mon tableau de json, nouvelle requette de type get du serveur vers mon fichier

        $tableauJson = json_decode($contenuFichier);



        //je rajoute le message dans le tableau que j'ai recuperer de mon fichier

        array_push($tableauJson, $message);



        //je réencode mon tableau en json pour l'envoi

        $messageEncoder = json_encode($tableauJson);



        //le serveur post le contenus vers mon fichier avec les données actualisées

        file_put_contents($_SERVER['DOCUMENT_ROOT'].'/data/message.json', $messageEncoder);


    }
//je redirige l'uttilisateur vers le livre d'or (php(point de vue serveur) crée le contenue du livre d'or et l'envoie sur l'index,le navigateur affiche le contenus !!!!)
    header('Location: http://www.restalacarte.bwb/?chemin=livre_d_or');

}

function addUser($user){



    $fichierUsers = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/data/users.json',true);



//strlen retoune le nombre de caractere contenu dans mon ficchier
//si mon fichier est vide
    if(strlen($fichierUsers)== 0) {
        //je crée un tableau contenant ma liste d'uttilisateur
        $users = array();

        //j'insere le nouvelle uttilisateur dans la liste
        array_push($users, $user);


        //j'encode ma liste d'uttilisateur
        $TableauUsers = json_encode($users);

        var_dump($TableauUsers);

        //le serveur fait une requete de type post vers le fichier
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/data/users.json', $TableauUsers);

        //sinon si mon tableaus users existe deja
    }else{

        //je recupere mes uttilisateur
        $fichierUsersJson = json_decode($fichierUsers);

        //je stocke mon nouvelle utilisateur
        array_push($fichierUsersJson,$user);

        //j'encode le tous
        $TableauUsers = json_encode($fichierUsersJson);

        //j'envois vers mon fichier
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/data/users.json', $TableauUsers);


    }


//je redirige l'uttilisateur vers le l'accueil (php(point de vue serveur) crée le contenue du livre d'or et l'envoie sur l'index,le navigateur affiche le contenus !!!!)




}

//function qui permet de vérifier si le nom d'uttilisateur et le mot de passe taper a la connexion correspond avec la bdd
function getUser($username,$mdp){

    $fichierDecoderUsers = decodeJsonFile('/data/users.json');


    foreach ($fichierDecoderUsers as $value ) {


        if ($username === $value['Pseudo'] && $mdp === $value['mdp'] ) {

            $_SESSION['pseudo'] = $username;
            $_SESSION['mdp'] = $mdp;

        }

        //echo $key1." : ".$value1."<br>";

    }



}

