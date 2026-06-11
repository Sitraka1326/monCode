<?php
include("fonction.php");
$employe_no = $_GET['employe_no'];
$ficheEmploye = affiche_fiche_employe($employe_no);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>FICHE D'EMPLOYEE</h1>
    <h3>NOM: <?= $ficheEmploye[0]['first_name'] ?></h3>
    <h3>PRENOM: <?= $ficheEmploye[0]['last_name'] ?></h3>
    <h3>NUMPERO EMPLOYE: <?= $ficheEmploye[0]['emp_no'] ?></h3>
    <h3>GENRE: <?= $ficheEmploye[0]['gender'] ?></h3>
    <h3>DATE DE NAISSANCE: <?= $ficheEmploye[0]['birth_date'] ?></h3>
    <h3>HISTORIQUE DE SALAIRE</h3>
    <table>
        <tr>
            th*
        </tr>
        <?php foreach ($ficheEmploye as $employe) { ?>
            
        <?php } ?>
    </table>
</body>
</html>