<?php
session_start();

include 'database_setup.php';

//$getUserSql = "SELECT * FROM Employees WHERE google_id=" . $_GET["google_id"];

$getUserSql = "SELECT Employees.PID, Employees.FirstName, Employees.LastName, Employees.Role, Roles.Name, Employees.Email, Employees.employee_rank FROM Employees
LEFT JOIN Roles
ON Employees.Role = Roles.RID
WHERE google_id=" . $_GET["google_id"];
				
$result = mysqli_query($con, $getUserSql);
				
$theUser = mysqli_fetch_assoc($result);

$_SESSION["employeeInfo"] = $theUser;

?>