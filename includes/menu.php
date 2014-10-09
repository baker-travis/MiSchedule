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
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <div id="gSignInWrapper">
						  <div id="myButton" class="">
							
						  </div>
					</div>
                </li>
                <li class="dropdown">
					<a href="#" id="user-image" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span></a>
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