<?php
$contenuFichier = file_get_contents('./data/message.json',true);

$fichierDecoder = json_decode($contenuFichier,true);

?>