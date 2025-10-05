<?php
    session_start();
    require_once "../utils_inc/inc_pdo.php";

    $idM = $_GET["id"]; // id du membre pour lequel on veut afficher la liste

    if (!isset($_SESSION["droit"])){
        // pas connecté : retour au formulaire de connexion
        header("location:formCo.php");
        exit();
    }

    // accès possible si : admin ou (dev et "ce sont mes contribs")
    if  ( !(($_SESSION["droit"]=="admin") || ($_SESSION["droit"]=="dev" && $_SESSION["login"]==$idM)) ){
        die("Droits insuffisants");
    }

    // Si on arrive ici, c'est que nos droits sont suffisants

    $textReq = "select contribution.id as numero, membre.nom as nom_membre, projet.nom as nom_projet, duree ";
    $textReq.= "from membre inner join contribution on membre.id = contribution.membre_id ";
    $textReq.= "            inner join projet on contribution.projet_id = projet.id ";
    $textReq.= "where membre.id = :id_m ";
    $textReq.= "order by membre.nom, nom_projet ";

    $req = $pdo->prepare($textReq);
    $req->bindParam(":id_m",$idM); // protection contre injections SQL

    $req->execute();

    $tabRes = $req->fetchAll(PDO::FETCH_ASSOC);

    //---------------------------------------------------------
    $reqProjet = $pdo->prepare("select * from projet");
    $reqProjet->execute();

    $tabProjets = $reqProjet->fetchAll(PDO::FETCH_ASSOC);

    //var_dump($tabRes);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>
<body class="container">
    <?php include "../utils_inc/inc_navbar.php"; ?>
    <table class="table table-striped">
        <thead>
            <tr>
            <th>Numéro </th>
            <th>Membre </th>
            <th>Projet </th>
            <th>Durée </th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($tabRes as $uneLigne){
                    echo "<tr>";
                    echo "  <th>".$uneLigne["numero"]."</th>";
                    echo "  <td>".$uneLigne["nom_membre"]."</td>";
                    echo "  <td>".$uneLigne["nom_projet"]."</td>";
                    echo "  <td>".$uneLigne["duree"]."</td>";
                    echo "</tr>";                   
                }
            ?>
        </tbody>
    </table>   
    <form action="../traitements/insererContrib.php" method="get">
        <input name="idMembre" hidden value='<?php echo $idM; ?>'>
        <label>Projet</label>
        <select name="idProjet">
            <?php
                foreach ($tabProjets as $projet){
                    echo "<option value='".$projet['id']."'>".$projet['nom']."</option>";
                }
            ?>
        </select>
        <label>Durée</label>
        <input name="duree" type="number">
        <input type="submit">
    </form>
</body>
</html>
