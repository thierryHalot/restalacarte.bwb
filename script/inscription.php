<?php

$user = array (

    "Pseudo" => $_POST['pseudoInscription'],
    "mdp" => $_POST['mdpInscription'],

);

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
header('Location: http://www.php-decouverte.bwb/?chemin=accueil');
