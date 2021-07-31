<?php
    /*
        3 kinds of accounts:
         1) Teacher
         2) Student
         3) Admin
         
         Teacher and Admin accounts directly
         Student accounts can be created in 2 ways:
         1) singular
         2) multiple
    */
    session_start();
    if (!($_SESSION['loggedin'])) {
        header('Location: index.php');
        exit;
    }
?>
<html>
    
    <head>
       <script src="scripts/jquery.js"></script>
       <script src="scripts/createClass.js"  ></script>
        <?php
        echo('<link href="style/'.$_SESSION['theme'].'/bootstrap.min.css" rel="stylesheet">
        <link href="style/'.$_SESSION['theme'].'/bootstrap.css" rel="stylesheet">
        <link href="style/'.$_SESSION['theme'].'/_bootswatch.scss" rel="stylesheet">
        <link href="style/'.$_SESSION['theme'].'/_variables.scss" rel="stylesheet">');
        ?>
        <link href="style/createClass.css" rel="stylesheet">
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
        
        <div class="xcenter">
            <h1>Create New Class</h1>
            <br>
            
            <form action="saveClass.php" method="post">
                <table class="xform">
                    <tr>
                        <td><label>Class Name: </label></td>
                        <td><input type="text" class="form-control" id="classname" name="classname"></td>
                    </tr>
                    <tr>
                        <td><label>Start Roll Number:</label></td>
                        <td><input type="text" class="form-control" id="startnum" name="startnum"></td>
                    </tr>
                    <tr>
                        <td><label>End Roll Number:</label></td>
                        <td><input type="text" class="form-control" id="endnum" name="endnum"></td>
                    </tr>
                    <tr>
                        <br>
                        <td colspan="2"><input class= "btn btn-success" type="submit" id="btnsubmit" value="Create Class Accounts"></td>
                    </tr>
                </table>
            </form>
        </div>
        
        
    </body>

</html>