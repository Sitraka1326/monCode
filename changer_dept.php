<?php 
include('fonction.php');
$listeDep = get_dep();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="resultat_changer.php" method="post">
        <label >Choisissez votre pays
            <select name="departement" id="">
                <option value="">Selectionner un departement</option>
                <?php foreach ($listeDep as $liste ) { ?>
                    <option value="<?php echo $liste['dept_no'] ?>"><?php echo $liste['dept_name']; ?></option>
               <?php } ?>
                
            </select>
        </label>
        <input type="hidden" name="emp_no" value="<?php echo $_GET['emp_no'] ?>" >
        <label for="">Choisissez une date :</label>
        <input type="date" name="date" >
        <input type="submit" value="Changer de department" >
        
    </form>



</body>
</html>

<?php 
// echo "blabla";
$choix = $_POST['departement'];
echo $choix;
?>