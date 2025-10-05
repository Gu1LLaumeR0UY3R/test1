<?php
    session_start();
    require_once "../utils_inc/inc_pdo.php"; // $pdo existe ici désormais
    // http://localhost/contribs/traiterAuthentification.php?login=M001&pass=123

    // Recevoir les données du form de login, et vérifier login/pass dans la base
    // En version finale : envoi en $_POST obligatoire. Pour le dev $_GET peut être plus pratique.
    $login = $_POST["login"];
    $pass = $_POST["pass"];

    // Vérification dans la base si le mot de passe et le login se trouvent dans la base
    // VERSION mot de passe chiffré
    $textR = "select droit, password ";
    $textR.= "from membre ";
    $textR.= "where id=:login ";
    $req = $pdo->prepare($textR);
    $req->bindParam(":login", $login);
    $req->execute();

    // 2 possibilités : 1 ligne retournée ou 0 ligne retournée 
    $tabRes = $req->fetchAll(PDO::FETCH_ASSOC);
    if (count($tabRes)!=1) {
        // pas trouvé => retour au formulaire de co
        // die("Erreur de co");
        header("Location:../index.php?message=tekitoa");
        exit();
    }

    // Si on arrive là : login existe (count==1)
    if (!password_verify($pass, $tabRes[0]["password"])){
        // die("Erreur de co");
        header("Location:../index.php?message=tekitoa");
        exit();
    }

    $_SESSION["login"] = $login;
    $_SESSION["droit"] = $tabRes[0]["droit"];

    // redirection vers accueil, éventuellement spécifique à l'utilisateur
    header("Location:../pages/accueil.php");
    // pas besoin d'exit pour déclencher la redirection, puisque fin de script


