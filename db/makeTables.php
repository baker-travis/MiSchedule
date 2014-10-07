<?php

include 'database_setup.php';

$employeeSql = "CREATE TABLE IF NOT EXISTS Employees
(
   PID INT NOT NULL AUTO_INCREMENT,
   FirstName CHAR(15) NOT NULL,
   LastName VARCHAR(15) NOT NULL,
   Role INT,
   Email VARCHAR(35) NOT NULL,
   PRIMARY KEY(PID),
   UNIQUE(Email),
   FOREIGN KEY (Role) REFERENCES Roles(RID) ON DELETE SET NULL ON UPDATE CASCADE
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
   RSID INT NOT NULL AUTO_INCREMENT,
   SID INT NOT NULL,
   RID INT NOT NULL,
   PRIMARY KEY(RSID),
   FOREIGN KEY (SID) REFERENCES Stations(SID) ON DELETE CASCADE ON UPDATE CASCADE,
   FOREIGN KEY (RID) REFERENCES Roles(RID) ON DELETE CASCADE ON UPDATE CASCADE
)";

$scheduleSql = "CREATE TABLE IF NOT EXISTS Schedule
(
    Schedule_ID INT NOT NULL AUTO_INCREMENT,
    Station_ID INT NOT NULL,
    Start_Date_Time DATETIME NOT NULL,
    End_Date_Time DATETIME NOT NULL,
    Employee_ID INT NOT NULL,
    PRIMARY KEY(Schedule_ID),
    FOREIGN KEY (Station_ID) REFERENCES Stations(SID) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (Employee_ID) REFERENCES Employees(PID) ON DELETE CASCADE ON UPDATE CASCADE
)
";

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
doQuery($scheduleSql);

?>