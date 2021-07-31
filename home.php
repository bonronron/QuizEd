<?php
session_start();
if (!($_SESSION['loggedin'])) {
	header('Location: index.php');
    exit;
}
if($_SESSION['clearance']=="s"){header('Location: viewTest.php');}
?>


<html>
    <head>
       <script src="scripts/jquery.js"></script>
        <?php
        echo('<link href="style/'.$_SESSION['theme'].'/bootstrap.min.css" rel="stylesheet">
        <link href="style/'.$_SESSION['theme'].'/bootstrap.css" rel="stylesheet">
        <link href="style/'.$_SESSION['theme'].'/_bootswatch.scss" rel="stylesheet">
        <link href="style/'.$_SESSION['theme'].'/_variables.scss" rel="stylesheet">');
        ?>
        <link href="style/home.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-light navbar-expand-md bg-light justify-content-md-center justify-content-start">
            <a class="nav-link navbar-brand mx-0 d-none d-md-inline" >Home</a>
            <div class="navbar-collapse collapse justify-content-between align-items-center w-100" id="collapsingNavbar2">
                    <ul class="navbar-nav mx-auto text-md-center text-left">
                        <li class="nav-item">
                            <a class="nav-link" href="#">--</a> 
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">--</a>
                        </li>
                        <li class="nav-item my-auto">
                            <a class="nav-link navbar-brand mx-0 d-none d-md-inline" href="home.php">QuizEd</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">--</a> 
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">--</a> 
                        </li>
                    </ul>
                    <ul class="nav navbar-nav flex-row justify-content-md-center justify-content-start flex-nowrap">
                       <a href="logout.php" class="ml-auto"><button type="button" class="btn btn-danger">Logout</button></a>    
                    </ul>
            </div> 
        </nav>
        <?php
            if($_SESSION["clearance"]=="t"){
                echo('<div class="center"><div class = "createtest"><a href="testDetails.php"><h1>Create Test</h1></a></div><div class="viewtest"><a href="viewtest.php"><h1>View Tests</h1></a></div></div>');
            }
            if($_SESSION["clearance"]=="s"){
                echo('<div class="center"><div class="alert alert-dismissible alert-primary">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Oh snap!</strong> Seems like you shouldn&#8217t be on this page, you might want to go and <a href="viewtest.php" class="alert-link">View Tests</a> for your class
                </div></div>');
            }
            if($_SESSION["clearance"]=="a"){
                echo('<div class="center"><h1><a href="createUser.php">Create User</a><br><br><a href="createClass.php">Create Class</a><br><br><a href="testDetails.php">Create Test</a><br><br><a href="viewAccounts.php">View Accounts</a><br><br><a href="viewTest.php">View all Tests</a></h1></div>');
            }
        ?>
         
    </body>
    
</html>