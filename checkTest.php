<?php
//get post data
//check test answers
//update database user test results
if (isset($_POST["selectedoptions"],$_POST["test_id"],$_POST["student"])){
    $con = mysqli_connect('localhost','root','','quized','3308');
    if (mysqli_connect_errno()){
        exit("Failed to connect to server:".mysqli_connect_errno());
    }
    $stmt ='SELECT `question_id`, `correct_answer` FROM `question` WHERE `test_id` = '.$_POST['test_id'];
    $result = mysqli_query($con,$stmt);
    $questions = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $correctoptions = array();
    
    foreach($questions as $question){
        $correctoptions[$question["question_id"]] = $question["correct_answer"];
    }
    if(ksort($correctoptions)){
        $countcorrect = 0;
        for($check = 0;$check<count($correctoptions);$check++){
            if($_POST["selectedoptions"][$check]==$correctoptions[$check]){
                $countcorrect++;
            }
        }
    }
    $percentage = ($countcorrect/count($correctoptions))*100;
    $stmt = "INSERT INTO `result` VALUES ('".$_POST['student']."',".$_POST['test_id'].",$percentage) ";
    if(mysqli_query($con,$stmt)){
        echo("recorded");
    }else {
        echo "Error: <br>" . $con->error;
    }
}
else
{

}

?>