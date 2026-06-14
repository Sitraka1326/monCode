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

    $sql = "select departments.dept_no as numDept,departments.dept_name as nameDept,employees.first_name as NameManager from departments JOIN dept_manager ON departments.dept_no = dept_manager.dept_no JOIN employees ON employees.emp_no = dept_manager.emp_no WHERE dept_manager.to_date > CURRENT_DATE;";
    $news_req = mysqli_query(dbconnect(), $sql);
    $result = array();
    while($new = mysqli_fetch_assoc($news_req)){
        $result[] = $new;
    }
    mysqli_free_result($news_req);
    return $result;

}

function afficheEmployee_Dept($dept_no)
{
    $sql = "SELECT departments.dept_no,employees.first_name,employees.emp_no FROM departments JOIN dept_emp ON departments.dept_no = dept_emp.dept_no JOIN employees ON employees.emp_no = dept_emp.emp_no WHERE departments.dept_no = '$dept_no';";

    $news_req = mysqli_query(dbconnect(), $sql);

    $result = array();

    while ($news = mysqli_fetch_assoc($news_req)) {
        $result[] = $news;
    }

    mysqli_free_result($news_req);

    return $result;
}
function affiche_fiche_employe($employe_no)
{
    $sql = "SELECT * FROM employees JOIN salaries on employees.emp_no = salaries.emp_no WHERE salaries.emp_no = $employe_no;";

    $news_req = mysqli_query(dbconnect(), $sql);

    $result = array();

    while ($news = mysqli_fetch_assoc($news_req)) {
        $result[] = $news;
    }

    mysqli_free_result($news_req);

    return $result;
}
function liste_age()
{
    $sql = "SELECT DISTINCT (YEAR(CURRENT_DATE) - YEAR(birth_date)) as Age  FROM employees ORDER BY Age ASC ;";

    $news_req = mysqli_query(dbconnect(), $sql);

    $result = array();

    while ($news = mysqli_fetch_assoc($news_req)) {
        $result[] = $news;
    }

    mysqli_free_result($news_req);

    return $result;
}
function liste_recherche($depart,$firstName,$lastName,$AgeMin, $AgeMax)
{
    if ($AgeMin > 0 && $AgeMax > 0) {
        $sql = "SELECT dept_name,first_name,last_name,(YEAR(CURRENT_DATE) - YEAR(birth_date)) as Age FROM departments JOIN dept_emp ON departments.dept_no = dept_emp.dept_no JOIN employees ON dept_emp.emp_no = employees.emp_no WHERE dept_name LIKE '%$depart%' OR first_name LIKE '%$firstName%' OR last_name LIKE '%$lastName%' AND ((YEAR(CURRENT_DATE) - YEAR(birth_date)) < $AgeMax AND (YEAR(CURRENT_DATE) - YEAR(birth_date)) > $AgeMin )LIMIT 20;";
    }
    else {
        $sql = "SELECT dept_name,first_name,last_name,(YEAR(CURRENT_DATE) - YEAR(birth_date)) as Age FROM departments JOIN dept_emp ON departments.dept_no = dept_emp.dept_no JOIN employees ON dept_emp.emp_no = employees.emp_no WHERE dept_name LIKE '%$depart%' OR first_name LIKE '%$firstName%' OR last_name LIKE '%$lastName%' LIMIT 20;";
    }

    $news_req = mysqli_query(dbconnect(), $sql);

    $result = array();

    while ($news = mysqli_fetch_assoc($news_req)) {
        $result[] = $news;
    }

    mysqli_free_result($news_req);

    return $result;
}
function liste_rechercheplus20($depart,$firstName,$lastName,$AgeMin, $AgeMax,$limite)
{
    if ($AgeMin > 0 && $AgeMax > 0) {
        $sql = "SELECT dept_name,first_name,last_name,(YEAR(CURRENT_DATE) - YEAR(birth_date)) as Age FROM departments JOIN dept_emp ON departments.dept_no = dept_emp.dept_no JOIN employees ON dept_emp.emp_no = employees.emp_no WHERE dept_name LIKE '%$depart%' OR first_name LIKE '%$firstName%' OR last_name LIKE '%$lastName%' AND ((YEAR(CURRENT_DATE) - YEAR(birth_date)) < $AgeMax AND (YEAR(CURRENT_DATE) - YEAR(birth_date)) > $AgeMin)LIMIT $limite,20;";
    }
    else {
        $sql = "SELECT dept_name,first_name,last_name,(YEAR(CURRENT_DATE) - YEAR(birth_date)) as Age FROM departments JOIN dept_emp ON departments.dept_no = dept_emp.dept_no JOIN employees ON dept_emp.emp_no = employees.emp_no WHERE dept_name LIKE '%$depart%' OR first_name LIKE '%$firstName%' OR last_name LIKE '%$lastName%' LIMIT $limite,20;";
    }

    $news_req = mysqli_query(dbconnect(), $sql);

    $result = array();

    while ($news = mysqli_fetch_assoc($news_req)) {
        $result[] = $news;
    }

    mysqli_free_result($news_req);

    return $result;
}



?>