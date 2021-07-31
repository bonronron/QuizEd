<?php
session_start();
if(isset($_POST["classname"],$_POST["startnum"],$_POST["endnum"])){
    $classname = $_POST["classname"];
    $startroll = $_POST["startnum"];
    $endroll = $_POST["endnum"];
    
    
    $con = mysqli_connect('localhost','root','','quized','3308');
    if (mysqli_connect_errno()){
        exit("Failed to connect to server:".mysqli_connect_errno());
    }
    $res = $con->query("select class_id from class")->fetch_all(MYSQLI_ASSOC);
    $classesall = array();
    foreach($res as $class){
        array_push($classesall,$class["class_id"]);
    }
    if (empty($classesall)){
        $class_id = 0;
    }
    else{
        $class_id = max(array_unique($classesall))+1; 
    }
    for($i = $startroll;$i<=$endroll;$i++){
        var_dump($con->query("INSERT INTO `accounts` (`username`, `password`, `clearance`) VALUES ('$i', '$i', 's')"));
        var_dump($con->query("INSERT INTO `class` (`class_id`, `class_name`, `student`) VALUES ('$class_id', '$classname', '$i');"));    
    }
    header('Location: home.php');
	exit;               
        
}