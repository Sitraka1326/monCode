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

    $sql = "select departments.dept_no as numDept,departments.dept_name as nameDept,employees.first_name as NameManager, `v_listeDepartement`.`nbEmployee` as `nbEmployee` from departments JOIN dept_manager ON departments.dept_no = dept_manager.dept_no JOIN employees ON employees.emp_no = dept_manager.emp_no JOIN `v_listeDepartement` ON departments.dept_no = `v_listeDepartement`.`numDept` WHERE dept_manager.to_date > CURRENT_DATE;";
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
    $sql = "SELECT * FROM employees JOIN salaries on employees.emp_no = salaries.emp_no JOIN dept_emp ON dept_emp.emp_no = employees.emp_no JOIN departments ON departments.dept_no = dept_emp.dept_no WHERE salaries.emp_no = $employe_no;";

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

function moyenne_salaire()
{
    $sql = "SELECT departments.dept_name as nomDept, (SELECT AVG(salary) FROM salaries WHERE salaries.emp_no = dept_emp.emp_no) as salaireMoy FROM departments JOIN dept_emp ON departments.dept_no = dept_emp.dept_no JOIN salaries ON dept_emp.emp_no = salaries.emp_no GROUP BY departments.dept_no;";

    $news_req = mysqli_query(dbconnect(), $sql);

    $result = array();

    while ($news = mysqli_fetch_assoc($news_req)) {
        $result[] = $news;
    }

    mysqli_free_result($news_req);

    return $result;
}

function departement_recent($no_emp)
{
    $sql = "SELECT departments.dept_name,MAX(DATEDIFF(dept_emp.to_date,dept_emp.from_date)) FROM employees JOIN salaries on employees.emp_no = salaries.emp_no JOIN dept_emp ON dept_emp.emp_no = employees.emp_no JOIN departments ON departments.dept_no = dept_emp.dept_no WHERE salaries.emp_no = $no_emp ;";

    $news_req = mysqli_query(dbconnect(), $sql);

    $result = array();

    while ($news = mysqli_fetch_assoc($news_req)) {
        $result[] = $news;
    }

    mysqli_free_result($news_req);

    return $result;
}

function nb_employee_deprt()
{
    $sql = "SELECT DISTINCT(dept_no) as numDept ,(SELECT COUNT(emp_no) FROM dept_emp WHERE numDept = dept_no) as nbEmployee FROM dept_emp ;";

    $news_req = mysqli_query(dbconnect(), $sql);

    $result = array();

    while ($news = mysqli_fetch_assoc($news_req)) {
        $result[] = $news;
    }

    mysqli_free_result($news_req);

    return $result;
}

function nb_employee_genre()
{
    $sql = "SELECT DISTINCT(gender) as genre,(SELECT COUNT(emp_no) FROM employees WHERE gender = genre) as nbEmployee FROM employees;";

    $news_req = mysqli_query(dbconnect(), $sql);

    $result = array();

    while ($news = mysqli_fetch_assoc($news_req)) {
        $result[] = $news;
    }

    mysqli_free_result($news_req);

    return $result;
}


function get_dep(){
    $sql = "select * from departments ;";

    $news_req = mysqli_query(dbconnect(), $sql);

    $result = array();

    while ($news = mysqli_fetch_assoc($news_req)) {
        $result[] = $news;
    }

    mysqli_free_result($news_req);

    return $result;
}

function modifier_dep($departement,$emp_no, $date_debut){
    $sql1 = "select from_date from dept_emp where emp_no = '$emp_no' and to_date = '9999-01-01' ";
    $req1 = mysqli_query(dbconnect(),$sql1);
    $row = mysqli_fetch_assoc($req1);
    $from_date_actuel = $row['from_date'];

    if($date_debut < $from_date_actuel ){
        return "Erruer : la date de debut est anterieure a la date du departement actuel ($from_date_actuel)";
    }

    $sql2 = "update dept_emp set to_date = curdate() where emp_no = '$emp_no' and to_date = '9999-01-01'; ";
    mysqli_query(dbconnect(), $sql2);

    $sql3 = "insert into dept_emp (emp_no, dept_no, from_date, to_date)
            values ('$emp_no', '$departement', '$date_debut', '9999-01-01'); ";
    mysqli_query(dbconnect(),$sql3);
    return "ok";

}
function modifier_manager($departement,$emp_no, $date_debut){
    $sql1 = "SELECT * FROM dept_manager WHERE dept_no = '$departement' AND YEAR(to_date) = '9999' ";
    $req1 = mysqli_query(dbconnect(),$sql1);
    $row = mysqli_fetch_assoc($req1);
    $ancien_manager = $row['emp_no'];
    $from_date_actuel = $row['from_date'];

    if($date_debut < $from_date_actuel ){
        return "Erruer : la date de debut est anterieure a la date du departement actuel ($from_date_actuel)";
    }

    $sql2 = "UPDATE dept_manager set to_date = '$date_debut' WHERE emp_no = $ancien_manager; ";
    mysqli_query(dbconnect(), $sql2);

    $sql3 = "INSERT INTO dept_manager (emp_no, dept_no, from_date, to_date)
            VALUES ($emp_no, '$departement', '$date_debut', '9999-01-01'); ";
    mysqli_query(dbconnect(),$sql3);
    return "ok";

}


?>