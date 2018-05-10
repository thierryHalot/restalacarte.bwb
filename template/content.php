<div class="container">

    <?php

//si ma clé 'chemin' existe dans l'url
    if(isset($_GET['chemin'])){

//j'insere le contenu de la page qui m'interresse en rajoutant l'extension
    include "contents/".$_GET['chemin'].".php";


    }
    ?>


</div>
