<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/css/common.css" />
    <title>Scheduling Home</title>

</head>

<body>

    <?php include "includes/menu.php" ?>

    <section class='container'>
        <hgroup>
            <h1>BYU-Idaho Support Center Schedule</h1>
            <!-- This needs to be edited to allow for any department being input there. -->
        </hgroup>


        <div class="row table-responsive" id="schedule calendar">
            <table class="table">
                <tr class="times">
                    <th>Station</th>
                    <td>7</td>
                    <td></td>
                    <td>8</td>
                    <td></td>
                    <td>9</td>
                    <td></td>
                    <td>10</td>
                    <td></td>
                    <td>11</td>
                    <td></td>
                    <td>12</td>
                    <td></td>
                    <td>1</td>
                    <td></td>
                    <td>2</td>
                    <td></td>
                    <td>3</td>
                    <td></td>
                    <td>4</td>
                    <td></td>
                    <td>5</td>
                    <td></td>
                    <td>6</td>
                    <td></td>
                    <td>7</td>
                    <td></td>

                </tr>
                <tr class="station">
                    <th>Biddulph 1</th>
                    <!-- This needs to be programmatically set -->
                </tr>
            </table>
        </div>

        <div class="row" id="response">
        </div>


        <section class="col-xs-12">
            <form action="/db/addEmployee.php" method="post" role="form">
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

                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </section>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/angular.min.js"></script>
    <script>
        $.ajax({
            url: "/db/makeTables.php"
        }).done(function (data) {
            console.log(data);
        });
    </script>

</body>

</html>
