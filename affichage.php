<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('fonction.php');
$listeDep = afficher_ListeDepartement();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de vente</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/font/bootstrap-icons.css">
</head>

<body class="bg-secondary">
    <div class="container">
        <h1 class="text-center">LISTE DE DEPARTEMENT</h1>
        <div class="row">
            <div class="col-md-12 mt-5">
                <table class="table table-bordered ">
                    <tr>
                        <th>
                            numero
                        </th>
                        <th>
                            nom departement
                        </th>
                        <th>
                            Manager
                        </th>
                    </tr>
                    <?php foreach ($listeDep as $dep) { ?>
                        <tr>
                            <td>
                                <?= $dep['numDept'] ?>
                            </td>
                            <td>
                                <a href="employe.php?dept_no=<?= $dep['numDept'] ?>"><?= $dep['nameDept'] ?></a>
                            </td>
                            <td>
                                <?= $dep['NameManager'] ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>