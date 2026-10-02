<?php
    session_start();
    $DBG = false;

    // require_once "../utils_inc/inc_pdo.php";  => new PDO placé dans le routeur
    require_once __DIR__."/../controleurs/ControleurAuthentification.php";
    require_once __DIR__."/../controleurs/ControleurContribution.php";

    define("BASE_URL","/contribEvo/");

    $pdo = new PDO('mysql:host=mysqlsrv;dbname=contrib', "contrib_root", "123abc");

    // index.php?route=maRoute&param1=truc
    // => route reçue en get

    $route = isset($_GET["route"])? $_GET["route"] : null;


    $tabRoutes=[
        "coucou"            => [ ["tous"], "ControleurAuthentification", "afficherCoucou", []   ],
        "afficherFormCo"    => [ ["tous"], "ControleurAuthentification", "afficherFormCo", []   ],
        'traiterFormCo'     => [ ["tous"], "ControleurAuthentification", "traiterFormCo",  [$pdo]   ],
        'listerContribs'     => [ ["tous"], "ControleurContribution", "listerToutesContribs",  [$pdo]   ],
    ];

    if ($DBG) var_dump($_GET);


    foreach($tabRoutes as $nomRoute => $paramsRoute) {
        if ($DBG) echo "Route: $nomRoute ";
        if ($DBG) var_dump( $paramsRoute);
        if ($route==$nomRoute){
            if ($DBG) echo " route OK :...";
            // on sort si :
            //  - pas les bons droits et droits nécessaires!=tous
            if (!in_array("tous",$paramsRoute[0])){
                if (!in_array($_SESSION["droit"],$paramsRoute[0]) ) {
                    break;
                }
            }

            if ($DBG) echo " on a les droits";

            $ctr = new $paramsRoute[1];
            // ctr->uneMethode($p1,$p2,$p3)
            call_user_func_array([$ctr,$paramsRoute[2]],$paramsRoute[3]);
            exit();
        }
    }

    
    echo "Route inconnue (404)";