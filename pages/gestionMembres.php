<?php
    session_start();
    require_once "../utils_inc/inc_pdo.php";

    if (!isset($_SESSION["droit"])){
        // pas connecté : retour au formulaire de connexion
        header("location:../index.php");
        exit();
    }

    if ($_SESSION["droit"]!="admin"){
        header("location:../pages/accueil.php");
        exit();        
    }

    // Si on arrive là, c'est qu'on a le droit d'y être !

    $textReq = "select * from membre ";
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
    <link href="../css/styles.css" rel="stylesheet">
    <script src="../js/bootstrap.bundle.min.js"></script>
</head>
<body class="container">
    <?php include "../utils_inc/inc_navbar.php"; ?>
    <table class="table table-striped">
        <thead>
            <tr>
            <th>id </th>
            <th>nom </th>
            <th>droit </th>
            <th>contribs</th>
            <th>suppr</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($tabRes as $uneLigne){
                    echo "<tr>";
                    echo "  <th>".$uneLigne["id"]."</th>";
                    echo "  <td>".$uneLigne["nom"]."</td>";
                    echo "  <td>".$uneLigne["droit"]."</td>";
                    echo "  <td><a href='../pages/listeContribsMembre.php?id=".$uneLigne["id"]."'><button class='btn btn-info'>voir</a></td>";
                    echo "  <td><a href='#'><button class='btn btn-danger'>X</a></td>";
                    echo "</tr>";                   
                }
            ?>
        </tbody>
    </table>   
</body>
</html>
