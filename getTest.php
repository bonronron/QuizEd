<?php
session_start();
if (!($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
?>
<html>
<head>
    <script src="scripts/jquery.js"></script>
    <?php
        echo('<link href="style/'.$_SESSION['theme'].'/bootstrap.min.css" rel="stylesheet">
        <link href="style/'.$_SESSION['theme'].'/bootstrap.css" rel="stylesheet">
        <link href="style/'.$_SESSION['theme'].'/_bootswatch.scss" rel="stylesheet">
        <link href="style/'.$_SESSION['theme'].'/_variables.scss" rel="stylesheet">');?>
    <script src="scripts/takeTest.js"></script>
</head>

<?php

if(isset($_POST['test_id'])){
    echo("<input type='hidden' id = testid value = '".$_POST['test_id']."'>");
    echo("<input type='hidden' id = user value = '".$_SESSION['username']."'>");
    $con = mysqli_connect('localhost','root','','quized','3308');
    //error handling
    if (mysqli_connect_errno()){
        exit("Failed to connect to server:".mysqli_connect_errno());
    }
    $getname ='SELECT * FROM `test` WHERE `test_id` = '.$_POST['test_id'];
    $testnameres = mysqli_query($con,$getname);
    $testdetails =$testnameres->fetch_all(MYSQLI_ASSOC)[0];
    $testname = $testdetails["test_name"];
    $testdesc = $testdetails["test_desc"];
    $testtime = $testdetails["test_time"];
    
    
    $stmt ='SELECT `question_id`, `question_name` FROM `question` WHERE `test_id` = '.$_POST['test_id'];
    $result = mysqli_query($con,$stmt);
    $questions = mysqli_fetch_all($result,MYSQLI_ASSOC);
    //echo(var_dump($questions));
    $optionsarray = array();
    foreach ($questions as $value => $question){
        //get options for each question
        $getoption = 'SELECT `option_id`, `option_name` FROM `options` WHERE `test_id` = '.$_POST['test_id'].' AND `question_id`='.$question['question_id'];
        $optionsquery = mysqli_query($con,$getoption);
        $options = mysqli_fetch_all($optionsquery,MYSQLI_ASSOC);
        //returns array of options of each question
        array_push($optionsarray,$options);
    }
    //echo(var_dump($optionsarray));  
}
?>

<body>
    <nav class="navbar navbar-light navbar-expand-md bg-light justify-content-md-center justify-content-start">
            <a class="nav-link navbar-brand mx-0 d-none d-md-inline" >Test</a>
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
    <div id = 'test'>
    <?php
        echo('<h1 style = "display: inline;">Test: </h1><h2 class="text-muted" style = "display: inline;">'.$testname.'</h2>');
        echo('<p>'.$testdesc.'</p><input type = "hidden" id=testtime value="'.$testtime.'">');
        foreach($questions as $value=> $question){
            //make the options html string
            $optionshtml = '';
            foreach($optionsarray[$value] as $opvalue=>$option){
                $optionshtml .= '<fieldset class="form-group">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input option" name="question'.$value.'" id="'.$value.'_'.$opvalue.'" value="'.$option["option_name"].'">'.$option["option_name"].'
                    </label>
                  </div>
                </fieldset>';
            }
            //Echoing question here
            echo('<div class="question jumbotron" style="margin : 20px;padding-top: 10px;padding: 10px;">
                    <div class="questionname">
                        <p>'.($value+1) .')</p>
                        <legend>'.$question["question_name"].'</legend>
                    </div>
                    <hr class="my-4">
                    <div class="options">
                        '.$optionshtml.'
                    </div>
                </div>');
        }
    ?>
    <button type="button" class="btn btn-outline-success" id="btnsubmit" style="float:right;margin-right: 20px;margin-bottom: 20px;">Submit</button>
    </div>
</body>
</html>









