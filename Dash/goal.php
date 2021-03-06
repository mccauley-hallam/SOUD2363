<?php
    include("../PHP/session.php");
    include("../PHP/addgoal.php");
    include("../PHP/completegoal.php");
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../CSS/styles.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>SDC:UC Progress Checker</title>
        <link rel="icon" href="../Images/ico.png">
    </head>
    <body>
        <!-- NAVBAR -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div id="brand" class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="overview.php" style="margin-bottom:0px">
                        <p>SDC:UC Progress Checker</p>
                    </a>
                </div>

                <!-- LINKS -->
                <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="overview.php"><span class="glyphicon glyphicon-home" aria-hidden="true" style="padding-right:5px"></span> Dashboard</a>
                        </li>
                        <li>
                            <a href="about.php"><span class="glyphicon glyphicon-info-sign" aria-hidden="true" style="padding-right:5px"></span> About</a>
                        </li>
                        <li>
                            <a href="../PHP/logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true" style="padding-right:5px"></span> Sign Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Side Navigation Bar -->
        <div id="mySidebar" class="sidebar">
            <a><img src="../Images/defaultimg.png" class="img-edit" style="padding-right:10px"><?php echo("$login_session"); ?></a>
            <ul class="nav nav-sidebar" style="margin-top:20px">
                <li><a href="overview.php"><span class="glyphicon glyphicon-user" aria-hidden="true" style="padding-right:5px"></span>Overview</a></li>
                <li><a href="goal.php"><span class="glyphicon glyphicon-save-file" aria-hidden="true" style="padding-right:5px"></span>Set Goal</a></li>
                <li><a href="enroll.php"><span class="glyphicon glyphicon-education" aria-hidden="true" style="padding-right:5px"></span>Enrolment Form</a></li>
                <li><a href="settings.php"><span class="glyphicon glyphicon-cog" aria-hidden="true" style="padding-right:5px"></span>Settings</a></li>
                <li><a href="javascript:void(0)" onclick="closeNav()"><span class="glyphicon glyphicon-remove" aria-hidden="true" style="padding-right:5px"></span>Close</a></li>
            </ul>
        </div>

        <!-- Content -->
        <div id="main">
            <button class="openbtn hover" onclick="openNav()">&#8594;</button>
            <h1 class="page-header">Dashboard | <small>Goals</small></h1>

            <h4>Active Goals</h4>
            <?php include("../PHP/pullgoals.php"); ?>

            <br><br><h4>Set a new goal</h4>
            <form method="post" class="setgoal">
                <input class="goaltitle" type="text" name="title" placeholder="Goal Title" required/>
                <input class="goaldesc" type="text" name="description" placeholder="Goal Description" required/>
                <button class="btn btn-primary" name="addgoal">Add new goal</button>
            </form>
            <h4>Complete a goal</h4>
            <form method="post" class="setgoal">
                <input style="width:100%" class="goaltitle" type="text" name="goalid" placeholder="Goal ID" required/>
                <button style="width:100%" class="btn btn-primary" name="completegoal">Complete Goal</button>
            </form>
        </div>

        <script>
        /* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
        function openNav() {
          document.getElementById("mySidebar").style.width = "250px";
          document.getElementById("main").style.marginLeft = "250px";
        }

        /* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
        function closeNav() {
          document.getElementById("mySidebar").style.width = "0";
          document.getElementById("main").style.marginLeft = "0";
        }
        </script>
        <script src="../JS/dash.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </body>
</html>
