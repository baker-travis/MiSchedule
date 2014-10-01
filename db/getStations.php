<?php

include "database_setup.php";

$getStationsSQL = "SELECT * FROM Stations";

$result = mysqli_query($con, $getStationsSQL);

$userData = array();

while($var = mysqli_fetch_object($result)) {
    $userData[] = $var;
}

echo json_encode($userData);

?>