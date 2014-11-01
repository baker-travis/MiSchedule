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

		include 'includes/googleSignIn.php';

?>

    <title>Scheduling Home</title>

	<style>
		.nav-tabs > li {
			cursor: pointer;
		}
    <?php
    if (isset($_SESSION["employeeInfo"]["PID"])) {
      echo "td.id" . $_SESSION["employeeInfo"]["PID"] . " {
        background-color: #35FF0D;
      }";
    }
    ?>
	</style>

</head>

<body ng-cloak>

    <?php include "includes/menu.php" ?>

    <section class='container' ng-controller="manageUsers">
        <hgroup>
            <h1>BYU-Idaho Support Center Schedule - {{today.toDateString()}}</h1>
            <!-- This needs to be edited to allow for any department being input there. -->
        </hgroup>


        <ul class="nav nav-tabs" role="tablist">
		<li ng-click="changeDate(-7)"><a role="tab" data-toggle="tab">Prev</a></li>
	    <li class="{{(today.getDay() == 1) ? 'active':'' }}"><a role="tab" data-toggle="tab" ng-click="changeDate(1)">Mon</a></li>
	    <li class="{{(today.getDay() == 2) ? 'active':'' }}"><a role="tab" data-toggle="tab" ng-click="changeDate(2)">Tue</a></li>
	    <li class="{{(today.getDay() == 3) ? 'active':'' }}"><a role="tab" data-toggle="tab" ng-click="changeDate(3)">Wed</a></li>
	    <li class="{{(today.getDay() == 4) ? 'active':'' }}"><a role="tab" data-toggle="tab" ng-click="changeDate(4)">Thu</a></li>
	    <li class="{{(today.getDay() == 5) ? 'active':'' }}"><a role="tab" data-toggle="tab" ng-click="changeDate(5)">Fri</a></li>
	    <li class="{{(today.getDay() == 6) ? 'active':'' }}"><a role="tab" data-toggle="tab" ng-click="changeDate(6)">Sat</a></li>
		<li ng-click="changeDate(7)"><a role="tab" data-toggle="tab">Next</a></li>
	</ul>
	<div class="tab-content">
	<div class="row tab-pane active" id="mon">
		<div class="col-xs-12">
			<div class="table-responsive" style="width: 100%; overflow-y: auto;">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Station</th>
							<th colspan="4">7:00</th>
							<th colspan="4">8:00</th>
							<th colspan="4">9:00</th>
							<th colspan="4">10:00</th>
							<th colspan="4">11:00</th>
							<th colspan="4">12:00</th>
							<th colspan="4">1:00</th>
							<th colspan="4">2:00</th>
							<th colspan="4">3:00</th>
							<th colspan="4">4:00</th>
							<th colspan="4">5:00</th>
							<th colspan="4">6:00</th>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="station in stations | orderBy:'Name'">
							<th>{{station.Name}}</th>
							<td ng-show="shouldDisplay($index)" ng-repeat="t in getTimes(48) track by $index" colspan="{{howManyColumns(station, $index)}}" class="id{{getEmployeeID(station, $index)}}">{{ whoIsWorking(station, $index) }}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/angular.min.js"></script>
	<script src="/js/manageUsers.php"></script>
    <script>
        $.ajax({
            url: "/db/makeTables.php"
        }).done(function (data) {
            console.log(data);
        });
    </script>

	<?php
		if (isset($_SESSION['user'])) {
			echo "<script>$(\"#user-image\").html(\"" . $_SESSION['user']['result']['displayName'] . "&nbsp;<img src='" . $_SESSION['user']['image']['url'] . "' style='width: 35px; height: auto;' class='img-circle' />\");</script>";
		}
	?>

</body>

</html>
