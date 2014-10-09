<?php header('Content-type: text/javascript'); ?>

/*
* This file is the controller for the angular js application for the manage users page.
*
* © 2014 Travis Baker
*/

function manageUsers($scope, $http) {
    
    $scope.orderByField = "LastName";
    
    $scope.reverseSort = false;
    
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
			data = formatDateData(data);
			$scope.schedule = data;
		});
    }
	
	function formatDateData(data) {
		
	}
    
    $scope.openEmployee = function(employee) {
        $("#editEmployeeName").html("Edit " + employee.FirstName + " " + employee.LastName);
        $("#pid").val(employee.PID);
        $("#employeeFirstName").val(employee.FirstName);
        $("#employeeLastName").val(employee.LastName);
        $("#employeeEmail").val(employee.Email);
        
        if (employee.Role != null) {
            $("#employeeRole").val(employee.Role);
        }
        
        $("#editEmployee").modal();
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
    
    $scope.loadData();
}
