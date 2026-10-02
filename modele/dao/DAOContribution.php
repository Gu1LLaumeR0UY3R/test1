<?php
require __DIR__."/../entites/Contribution.php";

class DAOContribution{

    private $pdo;

    public function __construct($cnx){
        $this->pdo = $cnx;
    }

    // findAll: retourne un flux d'entités (instances de Contribution)
    public function findAll(){
        $textReq = "select contribution.id as numero, membre.nom as nom_membre, projet.nom as nom_projet, duree, ";
        $textReq.= " contribution.membre_id as m_id, contribution.projet_id  as p_id ";
        $textReq.= "from membre inner join contribution on membre.id = contribution.membre_id ";
        $textReq.= "            inner join projet on contribution.projet_id = projet.id ";
        $textReq.= "order by membre.nom, nom_projet ";

        $req = $this->pdo->prepare($textReq);

        $req->execute();

        $tabRes = $req->fetchAll(PDO::FETCH_ASSOC);   
        
        // On crée des entités à partir de ce qui a été extrait
        $tabContribs = [];
        foreach($tabRes as $uneLigne){
            $contrib = new Contribution();
            $contrib->id = $uneLigne["numero"];
            $contrib->membre_id = $uneLigne["m_id"];
            $contrib->projet_id = $uneLigne["p_id"];
            $contrib->duree = $uneLigne["duree"];
            $tabContribs[]=$contrib;
        }

        return $tabContribs;
    }
}