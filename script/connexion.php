<?php
session_start();

$_SESSION['pseudo'] = $_POST['pseudo'];
$_SESSION['mdp'] = $_POST['mdp'];
header('Location: http://www.php-decouverte.bwb/?chemin=livre_d_or');