<?php

header('Location:http://www.php-decouverte.bwb/');
require "fonction.php";

$user = array (

    "Pseudo" => $_POST['pseudoInscription'],
    "mdp" => $_POST['mdpInscription'],
    "mail" => $_POST['mailInscription'],
);


echo addUser($user);


