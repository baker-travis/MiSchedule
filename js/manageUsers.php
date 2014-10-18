<?php 
header('Content-type: text/javascript'); 
session_start();
?>

/*
* This file is the controller for the angular js application for the manage users page.
*
* © 2014 Travis Baker
*/

function manageUsers($scope, $http) {

	<?php
	
	if (!isset($_SESSION["today"])) {
		$_SESSION["today"] = time();
	}
	echo "\$scope.millis = " . $_SESSION["today"] . ";";
	echo "console.log('" . $_SESSION["today"] . "');";
	
	
	?>
	$scope.today = Date($scope.millis);
    
    $scope.orderByField = "LastName";
    
    $scope.reverseSort = false;
	
	$scope.column = 0;
	
	$scope.nameFound = false;
    
	$scope.currentStation = null;
	
    $scope.loadData = function () {
        $http.get("/db/getUsers.php").success(function (data) {
            console.log(data);
            $scope.users = data
        });

        $http.get("/db/getRoles.php").success(function (data) {
            console.log(data);
            $scope.roles = data
        });

        $http.get("/db/getStations.php").success(function (data) {
            console.log(data);
            $scope.stations = data
        });
		
		$http.get("/db/getSchedule.php?").success(function (data) {
			$scope.schedule = data;
			formatDateData($scope.schedule);
			console.log(data);
		});
    }
	
	function formatDateData(data) {
		for (var i = 0; i < data.length; i++) {
			var twoParts = data[i].Start_Date_Time.split(" ");
			var date = twoParts[0].split("-");
			var time = twoParts[1].split(":");
			data[i].year = date[0];
			data[i].month = date[1];
			data[i].day = date[2];
			data[i].startHour = time[0];
			data[i].startMin = time[1];
			time = data[i].End_Date_Time.split(" ")[1].split(":");
			data[i].spanTime = (time[0] - data[i].startHour) * 4;
			if (time[1] - data[i].startMin != 0) {
				data[i].spanTime += ((time[1] - data[i].startMin) / 15);
			}
		}
	}
    
    $scope.openEmployee = function(employee) {
        $("#editEmployeeName").html("Edit " + employee.FirstName + " " + employee.LastName);
        $("#pid").val(employee.PID);
        $("#employeeFirstName").val(employee.FirstName);
        $("#employeeLastName").val(employee.LastName);
        $("#employeeEmail").val(employee.Email);
		$("#employeeRank").val(employee.employee_rank);
        
        if (employee.Role != null) {
            $("#employeeRole").val(employee.Role);
        }
        
        $("#editEmployee").modal();
    }
	
	$scope.insertSchedule = function() {
		$.post("../db/insertSchedule.php", $("#editScheduleForm").serialize()).done(function (data) {
            console.log(data);
        });
        
        $scope.loadData();
	}
    
    $scope.deleteEmployee = function() {
        $.post("../db/deleteEmployee.php", $("#editCurrentEmployee").serialize()).done(function (data) {
            console.log(data);
        });
        
        $scope.loadData();
    }
    
    $scope.updateEmployee = function() {
        $.post("../db/updateEmployee.php", $("#editCurrentEmployee").serialize()).done(function (data) {
            console.log(data);
        });
        
        $scope.loadData();
    }
    
    $scope.deleteStation = function(station) {
        $.post("../db/deleteStation.php", {sid: station.SID}).done(function (data) {
            console.log(data);
        });
        
        $scope.loadData();
    }
    
    $scope.deleteRole = function(role) {
        $.post("../db/deleteRole.php", {rid: role.RID}).done(function (data) {
            console.log(data);
        });
        
        $scope.loadData();
    }
	
	$scope.deleteShift = function() {
		$.post("../db/deleteSchedule.php", $("#editEmployeeScheduleForm").serialize()).done(function (data) {
			console.log(data);
		});
		
		$scope.loadData();
	}
	
	$scope.updateShift = function() {
		$.post("../db/updateSchedule.php", $("#editEmployeeScheduleForm").serialize()).done(function (data) {
			console.log(data);
		});
		
		$scope.loadData();
	}
	
	$scope.getTimes = function(n) {
		return new Array(n);
	}
	
	$scope.shouldDisplay = function(n) {
		var val = false;
		
		if (n == 0) $scope.column = 0;
		if ($scope.nameFound == true) {
			val = true;
			$scope.nameFound = false;
		} else if (n == $scope.column) {
			val = true;
			$scope.column++;
		}
		
		return val;
	}
	
	$scope.howManyColumns = function(station) {
		var column = $scope.column;
		var currentHour = Math.floor(7 + (column / 4));
		var currentMin = column % 4 * 15;
		var thisStation = new Array();
		if (typeof $scope.schedule != 'undefined') {
			thisStation = $.grep($scope.schedule, function(schedule) {
				return (schedule.Station_ID == station.SID && schedule.startHour == currentHour && schedule.startMin == currentMin);
			});
		}
		
		if (typeof thisStation[0] != 'undefined') {
			return thisStation[0].spanTime;
		}
		
		return 1;
	}
	
	$scope.whoIsWorking = function(station, index) {
	
		var column = index;
		var currentHour = Math.floor(7 + (index / 4));
		var currentMin = index % 4 * 15;
		var thisStation = new Array();
		if (typeof $scope.schedule != 'undefined') {
			thisStation = $.grep($scope.schedule, function(schedule) {
				return (schedule.Station_ID == station.SID && schedule.startHour == currentHour && schedule.startMin == currentMin);
			});
		}
		
		if (typeof thisStation[0] != 'undefined') {
			$scope.column += thisStation[0].spanTime;
			var theEmployee = $.grep($scope.users, function(user) {
				return user.PID == thisStation[0].Employee_ID;
			});
			$scope.nameFound = true;
			return theEmployee[0].FirstName + " " + theEmployee[0].LastName;
		}
		
		return "";
	}
	
	$scope.openScheduler = function(name, sid, index) {
	
		var currentHour = Math.floor(7 + (index / 4));
		var currentMin = index % 4 * 15;
		var thisStation = new Array();
		if (typeof $scope.schedule != 'undefined') {
			thisStation = $.grep($scope.schedule, function(schedule) {
				return (schedule.Station_ID == sid && schedule.startHour == currentHour && schedule.startMin == currentMin);
			});
		}
		
		if (typeof thisStation[0] != 'undefined') {
			$scope.column += thisStation[0].spanTime;
			var theEmployee = $.grep($scope.users, function(user) {
				return user.PID == thisStation[0].Employee_ID;
			});
			
			theEmployee[0].PID;
			thisStation[0].Schedule_ID;
			
			$("#employee-id").val(theEmployee[0].PID);
			$("#schedule-id").val(thisStation[0].Schedule_ID);
			$("#employee-stationName").html(name);
			
			var hour = thisStation[0].startHour;
			
			var min = thisStation[0].startMin * 1;
			
			var spanTime = thisStation[0].spanTime;
			
			spanTime += (hour * 4);
			spanTime += (min / 15);
			
			var endHour = Math.floor(spanTime / 4);
			var endMin = (spanTime % 4) * 15;
			var amPm = null;
			var endAmPm = null;
			if (Math.floor(hour / 12) > 0) {
				amPm = "pm";
			} else {
				amPm = "am";
			}
			
			if (hour != 12) {
				hour %= 12;
			}
			
			if (Math.floor(endHour / 12) > 0) {
				endAmPm = "pm";
			} else {
				endAmPm = "am";
			}
			
			if (endHour != 12) {
				endHour %= 12;
			}
			
			$("#employee-start-hour").val(hour);
			$("#employee-start-min").val(min);
			$("#employee-start-am-pm").val(amPm);
			
			$("#employee-end-hour").val(endHour);
			$("#employee-end-min").val(endMin);
			$("#employee-end-am-pm").val(endAmPm);
			
			$("#editEmployeeSchedule").modal();
			return;
		}
		
		var hour = Math.floor(7 + (index / 4));
		var endHour = hour + 2;
		var min = index % 4 * 15;
		var amPm = null;
		var endAmPm = null;
		if (Math.floor(hour / 12) > 0) {
			amPm = "pm";
		} else {
			amPm = "am";
		}
		
		if (hour != 12) {
			hour %= 12;
		}
		
		if (Math.floor(endHour / 12) > 0) {
			endAmPm = "pm";
		} else {
			endAmPm = "am";
		}
		
		if (endHour != 12) {
			endHour %= 12;
		}
		
		$("#start-hour").val(hour);
		$("#start-min").val(min);
		$("#start-am-pm").val(amPm);
		
		$("#end-hour").val(endHour);
		$("#end-min").val(min);
		$("#end-am-pm").val(endAmPm);
		
		$("#sid").val(sid);
		
		$("#stationName").html(name);
		$("#editSchedule").modal();
	}
    $scope.loadData();
}
