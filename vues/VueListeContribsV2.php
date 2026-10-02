
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <script src="./js/bootstrap.bundle.min.js"></script>
</head>
<body class="container">
    <?php include __DIR__."/../vues/inc_navbar.php"; ?>
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
                foreach($listeContribs as $uneContrib){
                    echo "<tr>";
                    echo "  <th>".$uneContrib->id."</th>";
                    echo "  <td>".$uneContrib->membre_id."</td>";
                    echo "  <td>".$uneContrib->projet_id."</td>";
                    echo "  <td>".$uneContrib->duree."</td>";
                    echo "</tr>";                   
                }
            ?>
        </tbody>
    </table>   
</body>
</html>
