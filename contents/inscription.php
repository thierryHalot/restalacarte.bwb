
<div class="col-12 formInscr">
    <form method="post" action="../script/inscription.php" class="forLivreDor">

        <label for="pseudoInscription" class="labelInscrip">Pseudo</label> : <input type="text" name="pseudoInscription" id="pseudoInscription" class="inpInscrip"/><br/>
        <label for="mdpInscription" class="labelInscrip">Mot de passe</label> : <input type="password" name="mdpInscription" id="mdpInscription"class="inpInscrip"/><br/>
        <label for="mailInscription" class="labelInscrip">adresse e-mail</label> : <input type="email" name="mailInscription" id="mailInscription"class="inpInscrip"/><br/>
        <input type="submit" value="s'inscrire" class="bouton"/>

    </form>
</div>
<?php if(isset($_GET)&&   $_GET['exist']):?>
    l'utilisateur existe deja
<?php endif; ?>
