<?php

//header('Location:http://www.php-decouverte.bwb/');
require "fonction.php";

$user = array (

    "Pseudo" => $_POST['pseudoInscription'],
    "mdp" => $_POST['mdpInscription'],
    "mail" => $_POST['mailInscription'],
);



if(verifUser($_POST['pseudoInscription'])){

echo "salut";

}else{

     addUser($user);

}


//cette fonction vérifie si la valeur que l'uttilisateur a rentrer existe dans ma db (data base)
//si c'est le cas elle affiche un texte


function verifUser($userPseudo){


    $contenuFichierUsers = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/data/users.json', true);

    $fichierDecoderUsers = json_decode($contenuFichierUsers, true);

var_dump($fichierDecoderUsers);
    foreach ($fichierDecoderUsers as $value) {
        if (empty($userPseudo)== true) {
            if ($userPseudo === $value['Pseudo']) {

                return true;

            }

            //$value['Pseudo'];

            //echo $key1." : ".$value1."<br>";

        }

    }
    return false;
}
//echo addUser($user);


