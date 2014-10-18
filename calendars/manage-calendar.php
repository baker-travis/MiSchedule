<?php session_start() ?>
<!doctype html>
<html lang="en" ng-app = "">
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

<style>
	.nav-tabs > li {
		cursor: pointer;	
	}
</style>

</head>

<body>
<?php include "../includes/menu.php" ?>
<section class='container' ng-controller="manageUsers">
	<hgroup>
		<h1>Edit BYU-Idaho Support Center Employees' Schedules {{today}}</h1>
		<!-- This needs to be edited to allow for any department being input there. --> 
	</hgroup>
	<ul class="nav nav-tabs" role="tablist">
		<li><a role="tab" data-toggle="tab">Prev</a></li>
	    <li class="active"><a role="tab" data-toggle="tab">Mon {{getDate(1)}}</a></li>
	    <li><a role="tab" data-toggle="tab">Tue {{getDate(2)}}</a></li>
	    <li><a role="tab" data-toggle="tab">Wed {{getDate(3)}}</a></li>
	    <li><a role="tab" data-toggle="tab">Thu {{getDate(4)}}</a></li>
	    <li><a role="tab" data-toggle="tab">Fri {{getDate(5)}}</a></li>
	    <li><a role="tab" data-toggle="tab">Sat {{getDate(6)}}</a></li>
		<li><a role="tab" data-toggle="tab">Next</a></li>
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
						<tr ng-repeat="station in stations | orderBy:Name">
							<th>{{station.Name}}</th>
							<td ng-show="shouldDisplay($index)" ng-repeat="t in getTimes(48) track by $index" colspan="{{howManyColumns(station)}}" ng-click="openScheduler(station.Name, station.SID, $index)">{{ whoIsWorking(station, $index) }}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>
	
	<!-- Modal -->
        <div class="modal fade" id="editSchedule" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="">Add Schedule to Station <span id="stationName"></span></h4>
                    </div>
                    <form id="editScheduleForm">
                        <div class="modal-body">
                            <input type="hidden" name="sid" id="sid" />
                            <div class="form-group">
								<label>Start Time:</label>
								<select name="start-hour" id="start-hour">
									<option value="12">12</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
								</select>
								<select name="start-min" id="start-min">
									<option value="0">00</option>
									<option value="15">15</option>
									<option value="30">30</option>
									<option value="45">45</option>
								</select>
								<select name="start-am-pm" id="start-am-pm">
									<option value="am">am</option>
									<option value="pm">pm</option>
								</select>
							</div>
							<div class="form-group">
								<label>End Time:</label>
								<select name="end-hour" id="end-hour">
									<option value="12">12</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
								</select>
								<select name="end-min" id="end-min">
									<option value="0">00</option>
									<option value="15">15</option>
									<option value="30">30</option>
									<option value="45">45</option>
								</select>
								<select name="end-am-pm" id="end-am-pm">
									<option value="am">am</option>
									<option value="pm">pm</option>
								</select>
							</div>
                            <div class="form-group">
                                <label for="emp-id">Employee:</label>
                                <select name="emp-id" id="emp-id">
                                    <option ng-repeat="employee in users | orderBy: 'FirstName'" value="{{employee.PID}}">{{employee.FirstName}} {{employee.LastName}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" ng-click="insertSchedule()" data-dismiss="modal">Add Shift</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
		
		<div class="modal fade" id="editEmployeeSchedule" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="">Edit Schedule for Station <span id="employee-stationName"></span></h4>
                    </div>
                    <form id="editEmployeeScheduleForm">
                        <div class="modal-body">
                            <input type="hidden" name="schedule-id" id="schedule-id" />
                            <div class="form-group">
								<label>Start Time:</label>
								<select name="employee-start-hour" id="employee-start-hour">
									<option value="12">12</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
								</select>
								<select name="employee-start-min" id="employee-start-min">
									<option value="0">00</option>
									<option value="15">15</option>
									<option value="30">30</option>
									<option value="45">45</option>
								</select>
								<select name="employee-start-am-pm" id="employee-start-am-pm">
									<option value="am">am</option>
									<option value="pm">pm</option>
								</select>
							</div>
							<div class="form-group">
								<label>End Time:</label>
								<select name="employee-end-hour" id="employee-end-hour">
									<option value="12">12</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
								</select>
								<select name="employee-end-min" id="employee-end-min">
									<option value="0">00</option>
									<option value="15">15</option>
									<option value="30">30</option>
									<option value="45">45</option>
								</select>
								<select name="employee-end-am-pm" id="employee-end-am-pm">
									<option value="am">am</option>
									<option value="pm">pm</option>
								</select>
							</div>
                            <div class="form-group">
                                <label for="employee">Employee:</label>
                                <select name="employee-id" id="employee-id">
                                    <option ng-repeat="employee in users | orderBy: 'FirstName'" value="{{employee.PID}}">{{employee.FirstName}} {{employee.LastName}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger" ng-click="deleteShift()" data-dismiss="modal">Delete Shift</button>
                            <button type="button" class="btn btn-primary" ng-click="updateShift()" data-dismiss="modal">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
	
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
