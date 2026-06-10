<?php
function dbconnect()
{
    static $connect = null;

    if ($connect === null) {
        $connect = mysqli_connect('localhost', 'root', '', 'employees');

        if (!$connect) {
            die('Erreur de connexion à la base de données : ' . mysqli_connect_error());
        }

        mysqli_set_charset($connect, 'utf8mb4');
    }

    return $connect;
}

function afficher_ListeDepartement(){

    $sql = "select * from departments;";
    $news_req = mysqli_query(dbconnect(), $sql);
    $result = array();
    while($new = mysqli_fetch_assoc($news_req)){
        $result[] = $new;
    }
    mysqli_free_result($news_req);
    return $result;

}




?>