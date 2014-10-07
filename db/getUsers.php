<?php

include "database_setup.php";

//$getUsersSQL = "SELECT Employees.PID, Employees.FirstName, Employees.LastName, Roles.Name, Employees.Email FROM Employees
//INNER JOIN Roles
//ON Employees.Role = Roles.RID";

$getUsersSQL = "SELECT * FROM Employees";

$getUsersSQL = "SELECT Employees.PID, Employees.FirstName, Employees.LastName, Roles.Name, Employees.Email FROM Employees
LEFT JOIN Roles
ON Employees.Role = Roles.RID";

$result = mysqli_query($con, $getUsersSQL);

$userData = array();

while($var = mysqli_fetch_object($result)) {
    $userData[] = $var;
}

echo json_encode($userData);

?>