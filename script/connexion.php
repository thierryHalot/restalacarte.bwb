<?php
session_start();

include $_SERVER['DOCUMENT_ROOT'].'/script/decodeUsers.php';


    foreach ($fichierDecoderUsers as  $value) {




                if ($_POST['pseudo'] === $value['Pseudo'] && $_POST['mdp'] === $value['mdp'] ) {

                        $_SESSION['pseudo'] = $_POST['pseudo'];
                        $_SESSION['mdp'] = $_POST['mdp'];
                        var_dump($_POST['pseudo']);
                    }

            //echo $key1." : ".$value1."<br>";

    }

//$_SESSION['pseudo'] = $_POST['pseudo'];
//$_SESSION['mdp'] = $_POST['mdp'];
//header('Location: http://www.php-decouverte.bwb/?chemin=livre_d_or');
?>