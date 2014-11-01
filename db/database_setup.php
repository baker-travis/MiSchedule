<?php

if (PHP_OS == "Darwin") {
    $dbAddress = "127.0.0.1";
    
    $con = mysqli_connect($dbAddress, "root", "root", "Schedule", 8889);
    
    $createDBSql = "CREATE DATABASE IF NOT EXISTS Schedule";
    
    if (mysqli_query($con, $createDBSql)) {
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    /* $dbAddress = getenv("OPENSHIFT_MYSQL_DB_HOST");
	$dbUser = "admin5kZjAYj";
	$dbPass = "tHK_D1kEKlhw";
	$dbName = "scheduling"; */
	
	$dbAddress = "db549585601.db.1and1.com";
	$dbUser = "dbo549585601";
	$dbPass = "meldrum77";
	$dbName = "db549585601";

    $con = mysqli_connect($dbAddress, $dbUser, $dbPass, $dbName);
}

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>