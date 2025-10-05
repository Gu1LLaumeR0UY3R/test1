<?php
    session_start();

    // Choix de déconnexion : on supprime les champs de session liés à la connexion
    unset($_SESSION['droit']);    
    unset($_SESSION['login']);

    // retour au form de connexion
    header("location:../index.php");