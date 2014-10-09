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
	<ul class="nav nav-tabs" role="tablist">
		<li><a href="#home" role="tab" data-toggle="tab">Prev</a></li>
	    <li class="active"><a href="#mon" role="tab" data-toggle="tab">Mon {{getDate(1)}}</a></li>
	    <li><a href="#profile" role="tab" data-toggle="tab">Tue {{getDate(2)}}</a></li>
	    <li><a href="#messages" role="tab" data-toggle="tab">Wed {{getDate(3)}}</a></li>
	    <li><a href="#settings" role="tab" data-toggle="tab">Thu {{getDate(4)}}</a></li>
	    <li><a href="#settings" role="tab" data-toggle="tab">Fri {{getDate(5)}}</a></li>
	    <li><a href="#settings" role="tab" data-toggle="tab">Sat {{getDate(6)}}</a></li>
		<li><a href="#home" role="tab" data-toggle="tab">Next</a></li>
	</ul>
	<div class="tab-content">
	<div class="row tab-pane active" id="mon">
		<div class="col-xs-12">
			<div class="table-responsive" style="width: 100%; overflow-y: auto;">
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
	</div>
</section>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
<script src="/js/angular.min.js"></script> 
<script src="/js/bootstrap.min.js"></script> 
<script src="/js/manageUsers.php"></script>
</body>
