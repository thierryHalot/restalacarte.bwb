<?php
$listeDeMessages = array();

//je definis un message
$message = array(

        "nom" => $_POST['nomLivreDor'],
        "prenom" => $_POST['prenomLivreDor'],
        'message' => $_POST['messageLivreDor'],


);



//je pousse mon message dans ma listes de message
array_push($listeDeMessages,$message);




//j'encode mon message en json
$messageEncoder = json_encode($listeDeMessages);

//j'insere ma liste de message dans mon fichier ,le fichier est ecraser


    $ecritureFichier = file_put_contents('../data/message.json',$messageEncoder);







header('Location: http://www.php-decouverte.bwb/?chemin=livre_d_or');


