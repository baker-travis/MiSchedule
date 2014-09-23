<?php

$dbAddress = getenv("OPENSHIFT_MYSQL_DB_HOST")

$con = mysqli_connect($dbAddress, "admin5kZjAYj", "tHK_D1kEKlhw", "scheduling");

if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "CREATE TABLE Employees
(
PID INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(PID),
FirstName CHAR(15),
LastName Char(15),
Role Char(15),
Email Char(35)
)";

if (mysqli_query($con, $sql)) {
   echo "Created table successfully"
} else {
   echo "Error creating table: " . mysqli_error($con);
}

?>