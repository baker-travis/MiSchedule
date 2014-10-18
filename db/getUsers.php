<?php

include "database_setup.php";

$getUsersSQL = "SELECT Employees.PID, Employees.FirstName, Employees.LastName, Employees.Role, Roles.Name, Employees.Email, Employees.employee_rank FROM Employees
LEFT JOIN Roles
ON Employees.Role = Roles.RID";

$result = mysqli_query($con, $getUsersSQL);

$userData = array();

while($var = mysqli_fetch_object($result)) {
    $userData[] = $var;
}

echo json_encode($userData);

?>