<?php
   $con = mysqli_connect('localhost','root','','quized','3308');
    if (mysqli_connect_errno()){
            exit("Failed to connect to server:".mysqli_connect_errno());
    }
    echo($con->query('DELETE FROM `accounts` WHERE username = "'.$_POST["username"].'"'));


?>