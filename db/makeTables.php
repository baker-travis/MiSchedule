<?php

$dbAddress = getenv("OPENSHIFT_MYSQL_DB_HOST");

$con = mysqli_connect($dbAddress, "admin5kZjAYj", "tHK_D1kEKlhw", "scheduling");

if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$employeeSql = "CREATE TABLE IF NOT EXISTS Employees
(
   PID INT NOT NULL AUTO_INCREMENT,
   FirstName CHAR(15),
   LastName CHAR(15),
   Role INT,
   Email VARCHAR(35),
   PRIMARY KEY(PID),
   UNIQUE(Email),
   FOREIGN KEY (Role) REFERENCES Roles(RID)
)";

$stationsSql = "CREATE TABLE IF NOT EXISTS Stations
(
   SID INT NOT NULL AUTO_INCREMENT,
   Name VARCHAR(25),
   PRIMARY KEY(SID)
)";

$rolesSql = "CREATE TABLE IF NOT EXISTS Roles
(
   RID INT NOT NULL AUTO_INCREMENT,
   Name VARCHAR(25),
   PRIMARY KEY(RID)
)
";

function doQuery($sql) {
   if (mysqli_query($con, $sql)) {
      echo "Created table successfully";
   } else {
      echo "Error creating table: " . mysqli_error($con);
   }
}

doQuery($rolesSql);
doQuery($stationsSql);
doQuery($employeeSql);

?>