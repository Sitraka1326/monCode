<?php
include("fonction.php");
date_default_timezone_set("Africa/Nairobi");
$employe_no = $_GET['employe_no'];
$ficheEmploye = affiche_fiche_employe($employe_no);
$departement_recent = departement_recent($employe_no);

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
        <h1 class="text-center">FICHE D'EMPLOYEE</h1>
        <div class="row border border-white rounded-5">
            <div class="col-md-6">
                <div class="row mx-auto mt-5">
                    <div class="div colm-md-12 bg-white rounded-4">
                        <h3><span class="text text-secondary">NOM: </span><?= $ficheEmploye[0]['first_name'] ?></h3>
                        <h3><span class="text text-secondary">PRENOM: </span><?= $ficheEmploye[0]['last_name'] ?></h3>
                        <h3><span class="text text-secondary">NUMERO EMPLOYE: </span><?= $ficheEmploye[0]['emp_no'] ?></h3>
                        <h3><span class="text text-secondary">GENRE: </span><?= $ficheEmploye[0]['gender'] ?></h3>
                        <h3><span class="text text-secondary">Departement: </span><?= $ficheEmploye[0]['dept_name'] ?></h3>
                        <h3><span class="text text-secondary">Departement le plus long: </span><?= $departement_recent[0]['dept_name']?></h3>
                        <h3><span class="text text-secondary">DATE DE NAISSANCE: </span><?= $ficheEmploye[0]['birth_date'] ?></h3>
                        <h3><span class="text text-secondary">DATE DE d'EMBAUCHE: </span><?= $ficheEmploye[0]['hire_date'] ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6 ">
                <h3 class="text-center">HISTORIQUE DE SALAIRE</h3>
                <table class="table table-bordered">
                    <tr>
                        <th>Montant salaire</th>
                        <th>Date de debut</th>
                        <th>Date de fin</th>
                    </tr>
                    <?php foreach ($ficheEmploye as $employe) { ?>
                        <tr>
                            <th><?= $employe['salary'] ?></th>
                            <th><?= $employe['from_date'] ?></th>
                            <th><?= (strtotime($employe['to_date']) > strtotime(date("Y-m-d"))) ? "indetrminee" : $employe['to_date']; ?></th>
                        </tr>
                    <?php } ?>
            </div>
        </div>
        </table>
        <div>
            <form action="changer_dept.php" method="GET">
                <input type="hidden" name="emp_no" value="<?php echo $employe_no ?>"  >
                <button type="submit" class="btn btn-primary btn-lg">Choisir un nouveau departement</button>
            </form>
            <form action="devenirManager.php" method="GET">
                <input type="hidden" name="emp_no" value="<?php echo $employe_no ?>"  >
                <button type="submit" class="btn btn-primary btn-lg">Devenir Manager</button>
            </form>
        </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>