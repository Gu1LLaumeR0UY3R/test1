<?php
    session_start();
    // require_once "../utils_inc/inc_pdo.php";  => new PDO placé dans le routeur
    require_once __DIR__."/../controleurs/ControleurAuthentification.php";

    define("BASE_URL","/contribEvo/");

    $pdo = new PDO('mysql:host=mysqlsrv;dbname=contrib', "contrib_root", "123abc");

    // index.php?route=maRoute&param1=truc
    // => route reçue en get

    $route = isset($_GET["route"])? $_GET["route"] : null;

    /*
    if (isset($_GET["route"])){
        $route = $_GET["route"];
    }else{
        $route = null;
    }
    */

    if ($route=="coucou"){
        $ctr = new ControleurAuthentification();
        $ctr->coucou();
        exit();
    }

    if ($route=="afficherFormCo"){
        $ctr = new ControleurAuthentification();
        $ctr->afficherFormCo();
        exit();
    }

 
    if ($route=="traiterFormCo"){
        $ctr = new ControleurAuthentification();
        $ctr->traiterFormCo($pdo);
        exit();
    }
   
    echo "Route inconnue";