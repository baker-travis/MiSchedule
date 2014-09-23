<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="/css/common.css" />
  <title>Add Employee</title>

</head>
<body>

<?php
   $dbAddress = getenv("OPENSHIFT_MYSQL_DB_HOST");
   
   if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }

   $con = mysqli_connect($dbAddress, "admin5kZjAYj", "tHK_D1kEKlhw", "scheduling");
   
   $firstName = mysqli_real_escape_string($con, $_POST["firstName"]);
   $lastName = mysqli_real_escape_string($con, $_POST["lastName"]);
   $email = mysqli_real_escape_string($con, $_POST["email"]);
   
   $sql = "INSERT INTO Employees (FirstName, LastName, Email)
   VALUES ('$firstName', '$lastName', '$email')";
   
   if (!mysqli_query($con, $sql)) {
      die("Error: " . mysqli_error($con));
   }
   
   echo "1 record added"
?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</body>
</html>