<?php

$dbAddress = getenv("OPENSHIFT_MYSQL_DB_HOST");

$con = mysqli_connect($dbAddress, "admin5kZjAYj", "tHK_D1kEKlhw", "scheduling");

if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$tableName = mysqli_real_escape_string($con, $_POST(["tblName"]));

$createTableSql = "CREATE TABLE IF NOT EXISTS " . $tableName .
"(
    WorkHour TIME NOT NULL,
    SID INT,
    PID INT,
    FOREIGN KEY (SID) REFERENCES Stations(SID),
    FOREIGN KEY (PID) REFERENCES Employees(PID)
)";

?>