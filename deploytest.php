<?php
    if(isset($_POST["testid"],$_POST["class"])){
        echo($_POST["testid"].'<br>'.$_POST["class"]);
    }
    $con = mysqli_connect('localhost','root','','quized','3308');
    if (mysqli_connect_errno()){
        exit("Failed to connect to server:".mysqli_connect_errno());
    }
    $classid = ($con->query('SELECT class_id FROM `class` WHERE `class_name` = "'.$_POST["class"].'"'))->fetch_all()[0][0];
    $res = $con->query("INSERT INTO `classtest` (`class_id`, `test_id`) VALUES ('".$classid."', '".$_POST["testid"]."') ");
    header('Location: viewTest.php');
	exit;
?>