SELECT ditech.employee,
       ditech.dept_name,
       ditech.days
FROM(SELECT CONCAT(employees.first_name, ' ',employees.last_name) as employee,
            departments.dept_name,
            min(dept_emp.from_date) as date_from,
            ((CASE
	 			  WHEN dept_emp.to_date IS NULL THEN current_date()
				  ELSE dept_emp.to_date
			 END) - dept_emp.from_date) as days
       FROM employees
 INNER JOIN dept_emp    ON dept_emp.emp_no     = employees.emp_no
 INNER JOIN departments ON departments.dept_no = dept_emp.dept_no
   GROUP BY departments.dept_name
      LIMIT 10) AS ditech
   ORDER BY ditech.days DESC;
