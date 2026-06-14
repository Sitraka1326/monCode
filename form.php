<?php
include("fonction.php");
$listeAge = liste_age();
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
    <div class="navbar navbar-expand-lg navbar-dark bg-dark">
    <form action="searchDepartement.php" method="get" class="text-white ">
        <label for="departement" class="form-label">
            Departement
            <input type="text" name="departement" class="form-control"> </label>
           <label for="">
             Nom employee
           <input type="text" name="nameEmployee" class="form-control"> </label>
            <label for="">
                Prenom Employee
            <input type="text" name="PrenomEmployee" class="form-control"> </label>
            <label for="">
            Age
            <select name="AgeMin" class="form-select mb-1 w-auto">
                <option value="-1">Min</option>
                <?php foreach ($listeAge as $age) { ?>
                    <option value="<?= $age['Age'] ?>"><?= $age['Age'] ?></option>
                <?php } ?>
            </select> </label>
            <label>
            <select name="AgeMax" class="form-select w-auto">
                <option value="-1">Max</option>
                <?php foreach ($listeAge as $age) { ?>
                    <option value="<?= $age['Age'] ?>"><?= $age['Age'] ?></option>
                <?php } ?>
            </select> </label>
            <input type="submit" value="Rechercher" class="button btn-secondary"> </label>
        </label>
    </form>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>