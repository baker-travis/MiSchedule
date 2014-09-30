<?php

include 'database_setup.php';

$employeeSql = "CREATE TABLE IF NOT EXISTS Employees
(
   PID INT NOT NULL AUTO_INCREMENT,
   FirstName CHAR(15) NOT NULL,
   LastName CHAR(15) NOT NULL,
   Role INT,
   Email VARCHAR(35) NOT NULL,
   PRIMARY KEY(PID),
   UNIQUE(Email),
   FOREIGN KEY (Role) REFERENCES Roles(RID)
)";

$stationsSql = "CREATE TABLE IF NOT EXISTS Stations
(
   SID INT NOT NULL AUTO_INCREMENT,
   Name VARCHAR(25) NOT NULL,
   PRIMARY KEY(SID),
   UNIQUE(Name)
)";

$rolesSql = "CREATE TABLE IF NOT EXISTS Roles
(
   RID INT NOT NULL AUTO_INCREMENT,
   Name VARCHAR(25) NOT NULL,
   PRIMARY KEY(RID),
   UNIQUE(Name)
)
";

$rolesAndStationsSql = "CREATE TABLE IF NOT EXISTS RolesAndStations
(
   SID INT NOT NULL,
   RID INT NOT NULL,
   FOREIGN KEY (SID) REFERENCES Stations(SID),
   FOREIGN KEY (RID) REFERENCES Roles(RID)
)";

function doQuery($sql) {
   global $con;
   if (mysqli_query($con, $sql)) {
      echo "Success!\n";
   } else {
      echo "Error: " . mysqli_error($con) . "\n";
   }
}

doQuery($rolesSql);
doQuery($stationsSql);
doQuery($employeeSql);
doQuery($rolesAndStationsSql);

?>