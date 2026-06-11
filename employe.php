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
    <title>Document</title>
</head>
<body>
    <h1>Departement n° <?= $dept_no ?></h1>
    <table>
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
</body>
</html>
