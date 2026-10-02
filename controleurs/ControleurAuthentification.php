<?php

class ControleurAuthentification{

    public function afficherCoucou(){
        echo "coucou !";
    }

    public function afficherFormCo(){
        include __DIR__."/../vues/VueFormCo.php";
    }

    public function traiterFormCo($cnx){ 
        $login = $_POST["login"];
        $pass = $_POST["pass"];

        $textR = "select droit, password ";
        $textR.= "from membre ";
        $textR.= "where id=:login ";
        $req = $cnx->prepare($textR);
        $req->bindParam(":login", $login);
        $req->execute();        

        $tabRes = $req->fetchAll(PDO::FETCH_ASSOC);

        if (count($tabRes)!=1){
            $messagePourUtilisateur="J'te connais pas.<br>";
            include __DIR__."/../vues/VueFormCo.php";
            exit();
        }

        if (!password_verify($pass, $tabRes[0]["password"])){
            $messagePourUtilisateur="Erreur de mdp.<br>";
            include __DIR__."/../vues/VueFormCo.php";
            exit();
        }

        // login/pass OK
        $_SESSION["login"] = $login;
        $_SESSION["droit"] = $tabRes[0]["droit"];

        echo "TODO : aller sur la page d'accueil";

    }

}