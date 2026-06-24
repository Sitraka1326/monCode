-- creation de v_listeDepartement
CREATE OR REPLACE VIEW v_listeDepartement AS (SELECT DISTINCT(dept_no) as numDept ,(SELECT COUNT(emp_no) FROM dept_emp WHERE numDept = dept_no) as nbEmployee FROM dept_emp) ;

SELECT * FROM dept_manager WHERE emp_no = 110511 AND YEAR(to_date) = '9999';

UPDATE dept_manager set from_date = '1996-02-02' WHERE emp_no = 111939;

SELECT departments.dept_name,MAX(DATEDIFF(dept_emp.to_date,dept_emp.from_date)) as deptLong FROM employees JOIN salaries on employees.emp_no = salaries.emp_no JOIN dept_emp ON dept_emp.emp_no = employees.emp_no JOIN departments ON departments.dept_no = dept_emp.dept_no WHERE salaries.emp_no = 10088 ;