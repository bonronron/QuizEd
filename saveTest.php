<?php
session_start();
if(isset($_POST['form'],$_POST['test_name'],$_POST['test_desc'],$_POST['test_time'])){
    $form = $_POST['form'];
    
    //variables 
    $teacher_id = $_SESSION['username'];
    $name = $_POST['test_name'];
    $desc = $_POST['test_desc'];
    $time = $_POST['test_time'];
    var_dump($form);
    //connection object
    $con = mysqli_connect('localhost','root','','quized','3308');
    //error handling
    if (mysqli_connect_errno()){
        exit("Failed to connect to server:".mysqli_connect_errno());
    }
    
    $inserttest = "INSERT INTO `test` (`test_id`, `test_owner`, `test_name`, `test_time`, `test_desc`) VALUES (NULL, '".$teacher_id."', '".$name."', '".$time."', '".$desc."') ";
    if (mysqli_query($con,$inserttest)) {
        echo "New test created successfully!\n";
    }
    if(($stmt = $con->prepare('SELECT LAST_INSERT_ID()'))){
        $stmt->execute(); 
        $stmt->store_result();
        if ($stmt->num_rows > 0) {         
            $stmt->bind_result($test_id); 
            $stmt->fetch();
            echo "testId got\n";
        }
        else{echo("failed to get test_id");}
    }//$test_id obtained
    foreach($form as $qindex => $question){ 
        foreach($question as $obj=>$value){

            if($obj=='question'){
                $q = $value;
            }
            
            if($obj=='correctanswer'){
                $ca = $value;
            }
            if($obj == 'answers'){
                foreach ($value as $option_id => $option){
                    $insertoption = "INSERT INTO `options` (`test_id`, `question_id`, `option_id`, `option_name`) VALUES ('$test_id', '$qindex', '$option_id', '$option')";
                    if (mysqli_query($con,$insertoption)) {
                        echo "Question $qindex Option $option_id successfully inserted!\n";
                    }        
                }
                
            }
        }
        $insertquestion = "INSERT INTO `question` (`test_id`, `question_id`, `question_name`, `correct_answer`) VALUES ('".$test_id."', '".$qindex."', '".$q."', '".$ca."') ";
        if (mysqli_query($con,$insertquestion)) {
            echo "Question $qindex successfully inserted!\n";
        }   
        //perform insert query here
    }
}
?>