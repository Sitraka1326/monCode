<?php
include('fonction.php');
$plus = $_GET['plus'];
$recherche = liste_rechercheplus20($_GET['departement'],$_GET['nameEmployee'],$_GET['PrenomEmployee'],$_GET['AgeMin'],$_GET['AgeMax'],$plus);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border = 1>
        <tr>
            <th>Nom departement</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Age</th>
        </tr>
        <?php
        foreach ($recherche as $search) { ?>
            <tr>
                <td><?= $search['dept_name'] ?></td>
                <td><?= $search['first_name'] ?></td>
                <td><?= $search['last_name'] ?></td>
                <td><?= $search['Age'] ?></td>
            </tr>
       <?php }
        ?>
    </table>
    <a href="searchPlus20.php?plus=<?= $plus+20 ?>&departement=<?= $_GET['departement'] ?>&nameEmployee=<?= $_GET['nameEmployee'] ?>&PrenomEmployee=<?= $_GET['PrenomEmployee'] ?>&AgeMin=<?= $_GET['AgeMin'] ?>&AgeMax=<?= $_GET['AgeMax'] ?>">plus 20</a>
    <a href="searchPlus20.php?plus=<?= $plus-20 ?>&departement=<?= $_GET['departement'] ?>&nameEmployee=<?= $_GET['nameEmployee'] ?>&PrenomEmployee=<?= $_GET['PrenomEmployee'] ?>&AgeMin=<?= $_GET['AgeMin'] ?>&AgeMax=<?= $_GET['AgeMax'] ?>">Moins 20</a>
</body>
</html>