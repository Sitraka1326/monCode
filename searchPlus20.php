<?php
include('fonction.php');
$plus = $_GET['plus'];
$recherche = liste_rechercheplus20($_GET['departement'], $_GET['nameEmployee'], $_GET['PrenomEmployee'], $_GET['AgeMin'], $_GET['AgeMax'], $plus);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/font/bootstrap-icons.css">
</head>

<body class="bg-secondary">
    <div class="container">
        <h1 class="text-center">RECHERCHE</h1>
        <div class="row">
            <div class="col-md-12 mt-5 text-center">
                <table class="table table-bordered ">
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
                <a href="searchPlus20.php?plus=<?= $plus + 20 ?>&departement=<?= $_GET['departement'] ?>&nameEmployee=<?= $_GET['nameEmployee'] ?>&PrenomEmployee=<?= $_GET['PrenomEmployee'] ?>&AgeMin=<?= $_GET['AgeMin'] ?>&AgeMax=<?= $_GET['AgeMax'] ?>" class="text-info me-3 mb-5">plus 20</a>
                <?php if ($plus >= 20) { ?>
                    <a href="searchPlus20.php?plus=<?= $plus - 20 ?>&departement=<?= $_GET['departement'] ?>&nameEmployee=<?= $_GET['nameEmployee'] ?>&PrenomEmployee=<?= $_GET['PrenomEmployee'] ?>&AgeMin=<?= $_GET['AgeMin'] ?>&AgeMax=<?= $_GET['AgeMax'] ?>" class="text-info ms-3 mb-5">Moins 20</a>
                <?php } ?>
            </div>
        </div>
    </div>


    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>