<?php
error_reporting(E_ALL);
ini_set('display_errors', 1); 
include('fonction.php');
$resultat = modifier_dep($_POST['emp_no'], $_POST['departement'],$_POST['date']);
?>