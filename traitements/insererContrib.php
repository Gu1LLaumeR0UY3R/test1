<?php
    session_start();
    // Exécutable si :
    // admin ou (dev et "je suis le bon utilisateur")
    if (!isset($_SESSION['droit'])){
        die("Connexion obligatoire.");
    }

    if (  !( ($_SESSION['droit']=='admin') ||
            ($_SESSION['droit']=='dev' && $_SESSION['login']==$idM) ) ){
        die("Accès interdit");
    }
    // Exemple insertion :
    // .../insererContrib.php?idMembre=M001&idProjet=P001&duree=56

    // Récupère membre_id, projet_id, durée en $_GET
    // include include_once : si fichier pas trouvé, pas d'erreur
    // require require_once : si fichier pas trouvé, erreur et arrêt
    // => once : php vérifie que l'inclusion n'est faite qu'une fois
    require_once "../utils_inc/inc_pdo.php";

    $idM  = $_GET["idMembre"];
    $idP  = $_GET["idProjet"];
    $dudu = $_GET["duree"];

    $texteRequete = "insert into contribution (membre_id, projet_id, duree) ";
    $texteRequete.= "       values(:mId, :pId, :du) ";

    $req = $pdo->prepare($texteRequete);
    $req->bindParam(":mId",$idM);
    $req->bindParam(":pId",$idP);
    $req->bindParam(":du" ,$dudu);

    $req->execute();

    // header : prépare une redirection
    //          qui devient effective à la fin de l'exécution
    header("location:../pages/listeContribsMembre.php?id=".$idM);
    // exit(); // pour que la redirection soit immédiate






















// appeler un script php pour l'exécuter en lui transmettant des paramètres dans l'url
// Créer un formulaire, utiliser action, method, name, utiliser des champs cachés (hidden)
// Utiliser pdo pour : 
//      - se connecter à une base
//      - faire une requête simple (non paramétrée)
//      - faire une requête paramétrée (bind)
// Extraire les données retournées par une requête et les "traiter"(foreach)
// => comprendre la communication client-serveur (qui fait quoi ?)










