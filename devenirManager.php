<?php
include('fonction.php');
$listeDep = get_dep();
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
            <form action="traitement_SetManager.php" method="post">
                <label>
                    <select name="departement" id="">
                        <option value="">Selectionner un departement</option>
                        <?php foreach ($listeDep as $liste) { ?>
                            <option value="<?php echo $liste['dept_no'] ?>"><?php echo $liste['dept_name']; ?></option>
                        <?php } ?>

                    </select>
                    <input type="hidden" name="emp_no" value="<?php echo $_GET['emp_no'] ?>">
                    <label for="">Choisissez une date :</label>
                    <input type="date" name="date">
                    <input type="submit" value="Changer de department">
            </form>
        </div>
        </table>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>