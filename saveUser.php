<?php
session_start();
if(isset($_POST["username"])){
    $clearance = $_POST["clearance"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $con = mysqli_connect('localhost','root','','quized','3308');
    if (mysqli_connect_errno()){
        exit("Failed to connect to server:".mysqli_connect_errno());
    }
    var_dump($con->query("INSERT INTO `accounts` (`username`, `password`, `clearance`) VALUES ('$username', '$password', '$clearance')"));
    
    if ($clearance == 's')  {
        //create class relation as well
        $class = $_POST["class"];
        echo $class;
        //var_dump(($con->query('SELECT class_id FROM `class` WHERE `class_name` = "'.$class.'"'))->fetch_all()[0][0]);
        $classid = ($con->query('SELECT class_id FROM `class` WHERE `class_name` = "'.$class.'"'))->fetch_all()[0][0];
        var_dump($con->query("INSERT INTO `class` (`class_id`, `class_name`, `student`) VALUES ('$classid', '$class', '$username')")); 
    }
    header('Location: home.php');
	exit;
}