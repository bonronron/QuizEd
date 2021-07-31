

<?php
//TODO: no password hashing yet.



//Starting session
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'quized';
//connection object
$con = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME,'3308');
//error handling
if (mysqli_connect_errno()){
    exit("Failed to connect to server:".mysqli_connect_errno());
}
//check username and password postback

// TODO: check if null
//get username and password from database
if ($stmt = $con->prepare('SELECT username, password,clearance FROM accounts WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
    if ($stmt->num_rows > 0) {          // Get all rows with that username
	$stmt->bind_result($username, $password,$clearance); // get data
	$stmt->fetch();
        if ($_POST['password'] === $password) { //check if password is valid
            session_regenerate_id();  //start new session
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['clearance'] = $clearance;
            $_SESSION['username'] = $username;
            $_SESSION['theme'] = "Orange";
            
            //REDIRECT HERE
            //REDIRECT HERE
            header('Location: home.php');
        }else{
            echo("<script>alert('Please check your password');window.location.href='index.php';</script>");
            
        }
    }
    else{
        echo("<script>alert('Please check your account details');window.location.href='index.php';</script>");
    }
	$stmt->close();
}
   
//check account


   
