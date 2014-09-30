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
    $dbAddress = getenv("OPENSHIFT_MYSQL_DB_HOST");

    $con = mysqli_connect($dbAddress, "admin5kZjAYj", "tHK_D1kEKlhw", "scheduling");
}

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>