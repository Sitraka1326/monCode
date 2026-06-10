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
    <title>Document</title>
</head>
<body>
    <table border=1>
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
</body>
</html>