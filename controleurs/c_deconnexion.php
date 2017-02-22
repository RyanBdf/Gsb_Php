<?php

    if(isset($_REQUEST['uc']) == "deconnexion" && isset($_SESSION['idVisiteur'])){
        //On supprime la session en cour
        session_destroy();
        // On redirige vers la page de connexion
        header("Location:/index.php?uc=connexion");
    }

?>
