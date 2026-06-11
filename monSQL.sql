SELECT departments.dept_no,employees.first_name,employees.emp_no FROM departments JOIN dept_emp ON departments.dept_no = dept_emp.dept_no JOIN employees ON employees.emp_no = dept_emp.emp_no WHERE departments.dept_no = 'd009';

SELECT * FROM salaries;
SELECT * FROM employees JOIN salaries on employees.emp_no = salaries.emp_no WHERE salaries.emp_no = 10005;