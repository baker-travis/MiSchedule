<?php session_start() ?>
<!doctype html>
<html lang="en" ng-app="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/css/common.css" />
	
<?php 
	if (!isset($_SESSION['user'])) {
		include '../includes/googleSignIn.php';
	}
?>
	
    <title>Scheduling Home</title>

</head>

<body>

    <?php include "../includes/menu.php" ?>
	
	<section class='container' ng-controller="manageUsers">
        <hgroup>
            <h1>
			<?php
	
			if (isset($_GET["pid"])) {
				include "../db/database_setup.php";
				
				$getUserSql = "SELECT * FROM Employees WHERE PID=" . $_GET["pid"];
				
				$result = mysqli_query($con, $getUserSql);
				
				$theUser = mysqli_fetch_assoc($result);
				
				echo $theUser["FirstName"] . " " . $theUser["LastName"];
			}
			
			?>, Sign Up to View Your Schedule</h1>
            <!-- This needs to be edited to allow for any department being input there. -->
        </hgroup>
		
		
		
		
	</section>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="/js/angular.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/manageUsers.php"></script>
    
	<?php
		if (isset($_SESSION['user'])) {
			echo "<script>$(\"#user-image\").html(\"" . $_SESSION['user']['result']['displayName'] . "&nbsp;<img src='" . $_SESSION['user']['image']['url'] . "' style='width: 35px; height: auto;' class='img-circle' />\");</script>";
		}
	?>
    

</body>

</html>