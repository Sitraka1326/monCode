<?php
include('fonction.php');
$nbEmployee_genre = nb_employee_genre();
$salaireMoyenne = moyenne_salaire();
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
        <h1 class="text-center">NOMBRE EMPLOYEE ET SALAIRE MOYEN</h1>
        <div class="row">
            <div class="col-md-12 mt-5">
                <table class="table table-bordered ">
                    <tr>
                        <th>
                            Genre
                        </th>
                        <th>
                            Nombre Employee
                        </th>
                    </tr>
                    <?php foreach ($nbEmployee_genre as $genre) { ?>
                        <tr>
                            <td>
                                <?= $genre['genre'] ?>
                            </td>
                            <td>
                                <?= $genre['nbEmployee'] ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <table class="table table-bordered ">
                    <tr>
                        <th>
                            Genre
                        </th>
                        <th>
                            Nombre Employee
                        </th>
                    </tr>
                    <?php foreach ($salaireMoyenne as $salaire) { ?>
                        <tr>
                            <td>
                                <?= $salaire['nomDept'] ?>
                            </td>
                            <td>
                                <?= $salaire['salaireMoy'] ?>
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