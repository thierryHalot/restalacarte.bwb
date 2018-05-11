<h1>livre d'or</h1>
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
include './script/decode.php';
?>
    <div class="col-5 test">
        <?php

        foreach ($fichierDecoder as $key => $value){



            foreach ($value as $key1 => $value1){


                echo $key1." : ".$value1."<br>";


            }


        }?>
    </div>
</div>
