<?php
include("fonction.php");
$dept_no = $_GET['dept_no'];
$afficherEmployee_Dept = afficheEmplee_Dept($dept_no);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Numero departement</th>
            <th>Nom employe</th>
        </tr>
        <?php foreach ($afficherEmployee_Dept as $employee) { ?>
            <tr>
                <td><?= $employee["dept_no"] ?></td>
                <td><?= $employee["first_name"] ?></td>
            </tr>
        <?php } ?> 
    </table>
</body>
</html>
