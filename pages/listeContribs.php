<?php
    session_start();
    // Liste de TOUTES les contributions (tous les membres)
    // Juste pour l'admin
    require_once "../utils_inc/inc_pdo.php";

    if (!isset($_SESSION["droit"])){
        // pas connecté : retour au formulaire de connexion
        header("location:formCo.php");
        exit();
    }

    if ($_SESSION["droit"]!="admin"){
        // droits insuffisants : connexion à refaire ou message 
        //                       "moins gentil"
        header("location:formCo.php");
        exit();        
    }

    // Si on arrive là, c'est qu'on a le droit d'y être !

    $textReq = "select contribution.id as numero, membre.nom as nom_membre, projet.nom as nom_projet, duree ";
    $textReq.= "from membre inner join contribution on membre.id = contribution.membre_id ";
    $textReq.= "            inner join projet on contribution.projet_id = projet.id ";
    $textReq.= "order by membre.nom, nom_projet ";

    $req = $pdo->prepare($textReq);

    $req->execute();

    $tabRes = $req->fetchAll(PDO::FETCH_ASSOC);

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
</body>
</html>
