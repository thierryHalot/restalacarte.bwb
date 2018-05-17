<?php
session_start();
header('Location: http://www.restalacarte.bwb/?chemin=livre_d_or');

require_once "fonction.php";

getUser($_POST['pseudo'],$_POST['mdp']);



//$_SESSION['pseudo'] = $_POST['pseudo'];
//$_SESSION['mdp'] = $_POST['mdp'];
//header('Location: http://www.php-decouverte.bwb/?chemin=livre_d_or');
?>