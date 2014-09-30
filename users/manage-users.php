<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/css/common.css" />
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

    <section class='container'>
        <hgroup>
            <h1>BYU-Idaho Support Center Employees</h1>
            <!-- This needs to be edited to allow for any department being input there. -->
        </hgroup>

        <!-- Button trigger modal -->
        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addEmployee">
            Add Employee
        </button>

        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addStation">
            Add Station
        </button>

        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addRole">
            Add Role
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
                            <button type="submit" class="btn btn-primary" data-dismiss="modal" onclick="submitRole();">Submit</button>
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
                            <button type="submit" class="btn btn-primary" data-dismiss="modal" onclick="submitStation();">Submit</button>
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
                                <button type="submit" class="btn btn-primary" data-dismiss="modal" onclick="submitForm();">Submit</button>
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

</body>

</html>