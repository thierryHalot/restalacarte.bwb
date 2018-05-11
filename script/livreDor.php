<?php
$listeDeMessages = array();

//je definis un message
$message = array(

        "nom" => $_POST['nomLivreDor'],
        "prenom" => $_POST['prenomLivreDor'],
        'message' => $_POST['messageLivreDor'],


);

array_push($listeDeMessages,$message);

$messageEncoder = json_encode($listeDeMessages);


$ecritureFichier = file_put_contents('../data/message.json',$messageEncoder);




