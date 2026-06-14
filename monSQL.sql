SELECT departments.dept_no,employees.first_name,employees.emp_no FROM departments JOIN dept_emp ON departments.dept_no = dept_emp.dept_no JOIN employees ON employees.emp_no = dept_emp.emp_no WHERE departments.dept_no = 'd009';

SELECT * FROM salaries;
SELECT * FROM employees JOIN salaries on employees.emp_no = salaries.emp_no WHERE salaries.emp_no = 10005;

SELECT DISTINCT (YEAR(CURRENT_DATE) - YEAR(birth_date)) as Age  FROM employees ORDER BY Age ASC ;

SELECT dept_name,first_name,last_name,(YEAR(CURRENT_DATE) - YEAR(birth_date)) as Age FROM departments JOIN dept_emp ON departments.dept_no = dept_emp.dept_no JOIN employees ON dept_emp.emp_no = employees.emp_no  WHERE (dept_name LIKE '%est%' OR first_name LIKE '%Part%' OR last_name LIKE '%ga%' OR ((YEAR(CURRENT_DATE) - YEAR(birth_date)) < 80 AND (YEAR(CURRENT_DATE) - YEAR(birth_date)) > 60 )) LIMIT 2;