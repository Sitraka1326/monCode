<?php
include("fonction.php");
$listeAge = liste_age();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="searchDepartement.php" method="get">
        <p>Departement<input type="text" name="departement" id=""> </p>
        <p>Nom employee<input type="text" name="nameEmployee" id=""> Prenom Employee <input type="text" name="PrenomEmployee" id=""> </p>
        <p>
            Age
            <select name="AgeMin" id="">
                <option value="-1">Min</option>
                <?php foreach ($listeAge as $age) { ?>
                    <option value="<?= $age['Age'] ?>"><?= $age['Age'] ?></option>
                <?php } ?>
            </select>
            <select name="AgeMax" id="">
                <option value="-1">Max</option>
                <?php foreach ($listeAge as $age) { ?>
                    <option value="<?= $age['Age'] ?>"><?= $age['Age'] ?></option>
                <?php } ?>
            </select>
            
        </p>
        <input type="submit" value="Rechercher">
    </form>
</body>
</html>