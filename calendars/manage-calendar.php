<!doctype html>
<html lang="en" ng-app = "">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="/css/common.css" />
<title>Scheduling Home</title>
</head>

<body>
<?php include "../includes/menu.php" ?>
<section class='container' ng-controller="manageUsers">
	<hgroup>
		<h1>Edit BYU-Idaho Support Center Employees' Schedules</h1>
		<!-- This needs to be edited to allow for any department being input there. --> 
	</hgroup>
	<div class="row">
		<div class="col-xs-12">
			<div class="table-responsive">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Station</th>
							<th>7:00</th>
							<th>7:30</th>
							<th>8:00</th>
							<th>8:30</th>
							<th>9:00</th>
							<th>9:30</th>
							<th>10:00</th>
							<th>10:30</th>
							<th>11:00</th>
							<th>11:30</th>
							<th>12:00</th>
							<th>12:30</th>
							<th>1:00</th>
							<th>1:30</th>
							<th>2:00</th>
							<th>2:30</th>
							<th>3:00</th>
							<th>3:30</th>
							<th>4:00</th>
							<th>4:30</th>
							<th>5:00</th>
							<th>5:30</th>
							<th>6:00</th>
							<th>6:30</th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="station in stations | orderBy:Name" ng-init="current-time = 7">
							<th>{{station.Name}}</th>
							<td ></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
<script src="/js/angular.min.js"></script> 
<script src="/js/bootstrap.min.js"></script> 
<script src="/js/manageUsers.js"></script>
</body>
