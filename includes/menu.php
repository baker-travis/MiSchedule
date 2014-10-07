<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/index.php">MiSchedule</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li <?php if (htmlspecialchars($_SERVER["PHP_SELF"]) == "/index.php") echo "class='active'"; ?> ><a href="/index.php">Home</a>
                </li>
            </ul>
            <form class="navbar-form navbar-right" action="">
                <a href="manage-me.php" type="submit" class="btn btn-default"><span class="glyphicon glyphicon-user"></span></a>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <span id="signinButton">
                        <span
                              style="vertical-align: middle;"
                              class="g-signin"
                              data-callback="signinCallback"
                              data-clientid="1076527969182-71a5dorqdpehvluq76fv0lsh3s7qasea.apps.googleusercontent.com"
                              data-cookiepolicy="single_host_origin"
                              data-requestvisibleactions="http://schema.org/AddAction"
                              data-scope="https://www.googleapis.com/auth/plus.login">
                        </span>
                    </span>
                </li>
                <li class="dropdown">
                    
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/users/manage-users.php">Manage Assets</a>
                        </li>
                        <li><a href="/calendars/manage-calendar.php">Manage Schedule</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>