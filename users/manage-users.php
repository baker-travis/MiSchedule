<!doctype html>
<html lang="en" ng-app = "">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/css/common.css" />
    
    <script type="text/javascript">
        (function() {
            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
            po.src = 'https://apis.google.com/js/client:plusone.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
        })();
    </script>
    
    <title>Scheduling Home</title>
    <script>
        function submitForm() {
            $.post("../db/addEmployee.php", $("#submitEmployee").serialize()).done(function (data) {
                console.log(data);
                var error = /Error/g;
                if (error.test(data)) {
                    $("#result").html("Error.");
                    var duplicate = /Duplicate/g;
                    if (duplicate.test(data)) {
                        $("#result").html("There is already an existing entry containing this email address.");
                    }
                } else {
                    $("#result").html("Submitted successfully");
                }
            });
        }

        function submitStation() {
            $.post("../db/addStation.php", $("#submitStation").serialize()).done(function (data) {
                console.log(data);
                var error = /Error/g;
                if (error.test(data)) {
                    $("#result").html("Error.");
                    var duplicate = /Duplicate/g;
                    if (duplicate.test(data)) {
                        $("#result").html("There is already an existing station named this.");
                    }
                } else {
                    $("#result").html("Submitted successfully");
                }
            });
        }

        function submitRole() {
            $.post("../db/addRole.php", $("#submitRole").serialize()).done(function (data) {
                console.log(data);
                var error = /Error/g;
                if (error.test(data)) {
                    $("#result").html("Error.");
                    var duplicate = /Duplicate/g;
                    if (duplicate.test(data)) {
                        $("#result").html("There is already an existing role named this.");
                    }
                } else {
                    $("#result").html("Submitted successfully");
                }
            });
        }
    </script>

</head>

<body>
    
    <?php include "../includes/menu.php" ?>
    
    

    <section class='container' ng-controller="manageUsers">
        <hgroup>
            <h1>BYU-Idaho Support Center Employees</h1>
            <!-- This needs to be edited to allow for any department being input there. -->
        </hgroup>
        
        <div class="row">
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th ng-click="orderByField = 'LastName'; reverseSort = !reverseSort">Employee Name <span ng-show="orderByField == 'LastName'"><span class="glyphicon glyphicon-chevron-down pull-right" ng-show="!reverseSort"></span><span class="glyphicon glyphicon-chevron-up pull-right" ng-show="reverseSort"></span></span></th>
                                <th ng-click="orderByField = 'Name'; reverseSort = !reverseSort">Employee Role <span ng-show="orderByField == 'Name'"><span class="glyphicon glyphicon-chevron-down pull-right" ng-show="!reverseSort"></span><span class="glyphicon glyphicon-chevron-up pull-right" ng-show="reverseSort"></span></span></th>
                                <th>Employee Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="employee in users | orderBy:orderByField:reverseSort" ng-click="openEmployee(employee)">
                                <td>{{ employee.FirstName + " " + employee.LastName }}</td>
                                <td>{{ employee.Name }}</td>
                                <td>{{ employee.Email }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Roles</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="role in roles | orderBy: 'Name'">
                                <td>{{ role.Name }} <button type="button" class="btn btn-danger btn-sm pull-right" ng-click="deleteRole(role)"><span class="glyphicon glyphicon-remove"></span> Delete</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Stations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="station in stations | orderBy: 'Name'">
                                <td>{{ station.Name }} <button type="button" class="btn btn-danger btn-sm pull-right" ng-click="deleteStation(station)"><span class="glyphicon glyphicon-remove"></span> Delete</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="editEmployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="editEmployeeName"></h4>
                    </div>
                    <form id="editCurrentEmployee">
                        <div class="modal-body">
                            <input type="hidden" name="pid" id="pid" />
                            <div class="form-group">
                                <label for="firstName">First name:</label>
                                <input type="text" class="form-control" name="firstName" id="employeeFirstName" />
                            </div>
                            <div class="form-group">
                                <label for="lastName">Last name:</label>
                                <input type="text" class="form-control" name="lastName" id="employeeLastName" />
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="email" id="employeeEmail" />
                            </div>
                            <div class="form-group">
                                <label for="role">Role:</label>
                                <select name="role" id="employeeRole">
                                    <option ng-repeat="role in roles | orderBy: 'Name'" value="{{role.RID}}">{{role.Name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger" ng-click="deleteEmployee()" data-dismiss="modal">Delete Employee</button>
                            <button type="button" class="btn btn-primary" ng-click="updateEmployee()" data-dismiss="modal">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Button trigger modal -->
        <button class="btn btn-primary" data-toggle="modal" data-target="#addEmployee">
            Add Employee
        </button>

        <button class="btn btn-primary" data-toggle="modal" data-target="#addRole">
            Add Role
        </button>

        <button class="btn btn-primary" data-toggle="modal" data-target="#addStation">
            Add Station
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="addRole" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Add Role</h4>
                    </div>
                    <form action="#" method="post" role="form" onsubmit="submitRole(); return false;" id="submitRole">
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="name">Role name:</label>
                                <input type="text" class="form-control" name="name" id="name" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" data-dismiss="modal" ng-click="loadData()" onclick="submitRole();">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End modal -->

        <!-- Modal -->
        <div class="modal fade" id="addStation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Add Station</h4>
                    </div>
                    <form action="#" method="post" role="form" onsubmit="submitStation(); return false;" id="submitStation">
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="name">Station name:</label>
                                <input type="text" class="form-control" name="name" id="name" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" data-dismiss="modal" ng-click="loadData()" onclick="submitStation();">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End modal -->

        <!-- Modal -->
        <div class="modal fade" id="addEmployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Add Employee</h4>
                    </div>
                    <form action="#" method="post" role="form" onsubmit="submitForm(); return false;" id="submitEmployee">
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="firstName">First Name:</label>
                                <input type="text" class="form-control" name="firstName" id="firstName" />
                            </div>
                            <div class="form-group">
                                <label for="lastName">Last Name:</label>
                                <input type="text" class="form-control" name="lastName" id="lastName" />
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="email" id="email" />
                            </div>
                            <div class="form-group">
                                <label for="role" </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" data-dismiss="modal" ng-click="loadData()" onclick="submitForm();">Submit</button>
                            </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- End modal -->

            <div id="result"></div>

    </section>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="/js/angular.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/manageUsers.js"></script>
        
    <script>
        function signinCallback(authResult) {
            if (authResult['status']['signed_in']) {
                
                console.log(authResult);
                
                var request = gapi.client.plus.people.get( {'userId' : 'me'} );
                request.execute( function(profile) {
                    if (profile.error) {
                        console.log(profile.error);
                        return;
                    }
                    
                    console.log(profile);
                    
                    //profile.image.url is the src for an img.
                    
                    //profile.displayName   profile.tagline    profile.aboutMe
                    
//                    if (profile.cover && profile.coverPhoto) {
//                        $('#profile').append(
//                            $('<p><img src=\"' + profile.cover.coverPhoto.url + '\"></p>'));
//                    }
                });
                
                //$.get("https://www.googleapis.com/plus/v1/people/me?" + ).done();
                // Update the app to reflect a signed in user
                // Hide the sign-in button now that the user is authorized, for example:
                document.getElementById('signinButton').setAttribute('style', 'display: none');
            } else {
                // Update the app to reflect a signed out user
                // Possible error values:
                //   "user_signed_out" - User is signed-out
                //   "access_denied" - User denied access to your app
                //   "immediate_failed" - Could not automatically log in the user
                console.log('Sign-in state: ' + authResult['error']);
            }
        }    
    </script>

</body>

</html>