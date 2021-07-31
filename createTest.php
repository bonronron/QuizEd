<?php
session_start();
if (!($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
        <script src="scripts/jquery.js"></script>
        <?php
        echo('<link href="style/'.$_SESSION['theme'].'/bootstrap.min.css" rel="stylesheet">
        <link href="style/'.$_SESSION['theme'].'/bootstrap.css" rel="stylesheet">
        <link href="style/'.$_SESSION['theme'].'/_bootswatch.scss" rel="stylesheet">
        <link href="style/'.$_SESSION['theme'].'/_variables.scss" rel="stylesheet">');
        ?>
    <script src="scripts/createTest.js"></script>
    <link rel = "stylesheet" type = "text/css" href = "style/createTest.css" />
    
</head>
    
<body>
    <nav class="navbar navbar-light navbar-expand-md bg-light justify-content-md-center justify-content-start">
            <a class="nav-link navbar-brand mx-0 d-none d-md-inline" >Create Test</a>
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
<div class="cstm-container">
    <div class="split left" id="rightQuestionList">
        <?php echo('<h3>Test: '.$_POST["testname"].'</h3>');
        echo('<small>'.$_POST["testdesc"].'</small>');
        echo('<input type="hidden" id = "testname" value="'.$_POST["testname"].'">');
        echo('<input type="hidden" id = "testdesc" value="'.$_POST["testdesc"].'">');
        echo('<input type="hidden" id = "testtime" value="'.$_POST["testtime"].'">');
        ?>
        <div class="centered fixheight">
            <div class="holder">
             <button id="btnaddQ" class="btn btn-primary">Add Question</button>
                <ul id="allQs" >
                    <!--Dynamic questions created here-->
                </ul>
            </div>
        </div>
    </div>
    <div class="split right" id="leftQuestionDisplay">
        <div class="submit">
            <button id='btnTestSubmit' class="btn btn-success btn-lg">Submit Test</button>
        </div>
         <div class="vcentered centered">
            <div class="holder">
            <form id="QuestionDisplay">
                <!--Dyanamic selected question here-->            
            </form>
            <button id='btnQupdate' class="btn btn-primary">Update Question</button>
            </div>
        </div>
       
    </div>
</div>
</body>
</html>