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
       <script src="scripts/createUser.js"  ></script>
        <?php
        echo('<link href="style/'.$_SESSION['theme'].'/bootstrap.min.css" rel="stylesheet">
        <link href="style/'.$_SESSION['theme'].'/bootstrap.css" rel="stylesheet">
        <link href="style/'.$_SESSION['theme'].'/_bootswatch.scss" rel="stylesheet">
        <link href="style/'.$_SESSION['theme'].'/_variables.scss" rel="stylesheet">');
        ?>
        <link href="style/createUser.css" rel="stylesheet">
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
        <form action="saveUser.php" method="post">
            <label>Account Type</label>
            <select  id=clearance name="clearance">
                <option value="none" disabled selected hidden>Select Account</option>
                <option value="s">Student</option>
                <option value="t">Teacher</option>
                <option value="a">SuperUser</option>
            </select>
            <small id="small"></small>
            <br>
            <br>
            <label for="username"><strong>Username</strong></label>
            <input type="text" class = "form-control" id="username" name="username">
            <p class="text-primary userinfo">*Choose an unique username</p>
            <br>
            <label><strong>Password</strong></label>
            <input type="password" class = "form-control" id="password" name="password">
            <br>
            
            <div class="isStudent">
                <label>Class :</label>
                <?php 
                    echo("<select name='class'>");
                    $con = mysqli_connect('localhost','root','','quized','3308');
                    if (mysqli_connect_errno()){
                        exit("Failed to connect to server:".mysqli_connect_errno());
                    }
                    $res = $con->query("select class_name from class")->fetch_all(MYSQLI_ASSOC);
                    $classesall = array();
                    foreach($res as $class){
                        array_push($classesall,$class["class_name"]);
                    }
                    $classes = array_unique($classesall);
                    foreach($classes as $class){
                        echo("<option value='".$class."'>".$class."</option>");
                    }
                    echo("</select>");
                ?>
            </div>
            <input type="submit" class = "btn btn-outline-success" id="btnsubmit" value="Create Account">
        </form>
        </div> 
        
        
    </body>

</html>