<?php
require __DIR__."/../modele/DAO/DAOContribution.php";

class ControleurContribution{

    public function listerToutesContribs($pdo){
        $daoC = new DAOContribution($pdo);

        $listeContribs = $daoC->findAll();

        // A passer $tabRes
        include __DIR__."/../vues/VueListeContribsV2.php";
    }
}