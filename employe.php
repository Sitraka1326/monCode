<?php
include("fonction.php");
$dept_no = $_GET['dept_no'];
$afficherEmployee_Dept = afficheEmployee_Dept($dept_no);
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
        <h1 class="text-center">Departement n° <?= $dept_no ?> </h1>
        <div class="row">
            <div class="col-md-12" mt-5>
                <table class="table table-bordered">
                    <tr>
                        <th>Numero empoye</th>
                        <th>Nom employe</th>
                    </tr>
                    <?php foreach ($afficherEmployee_Dept as $employee) { ?>
                        <tr>
                            <td><a href="ficheEmploye.php?employe_no=<?= $employee["emp_no"] ?>"><?= $employee["emp_no"] ?></a></td>
                            <td><?= $employee["first_name"] ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>