<?php
require_once("config.php");

// Initialize the session

function isValidUsername($uname){
	global $link;
	$sql = "Select * from login where uname = '$uname'";
	if($result = mysqli_query($link, $sql)){
		$nrow = mysqli_num_rows($result);
		if(mysqli_num_rows($result) > 0){
			return true;
		}
	}
	
	return false;
}

function validatePassword($uname, $pwd){
	global $link;
	$sql = "Select pass from login where uname = '$uname'";
	if($result = mysqli_query($link, $sql)){
		echo "Query Executed";
		$pswd = mysqli_fetch_row($result);
		// if($pwd == $pswd[0]){
		// 	return true;
		// }
		if(password_verify($pwd,$pswd[0])){
			return true;
		}
	}
	echo $pswd[0];
	echo "Password Mismatch";
}

function isProfileComplete($uname){
	global $link;
	$sql = "Select * from client where uname = '$uname'";
	if($result = mysqli_query($link, $sql)){
		$nrow = mysqli_num_rows($result);
		echo "<script>alert('$nrow');</script>";
		if(mysqli_num_rows($result) > 0){
			return true;
		}
	}
	return false;
} 
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: login-home.php");
    exit;
}

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
	}

	if(isValidUsername($username)) {
		if(validatePassword($username, $password)){
			session_start();	
			$_SESSION["loggedin"] = true;
			$_SESSION["username"] = $username;
			if(isProfileComplete($username)){
				// Redirect user to welcome page
				//echo "profile complete";
				header("location: login-home.php");
			}else{			
				// Redirect user to profile page
				//echo "profile incomplete";
				header("location: profile.html");
			}

		}	
		else{
			$err = 'perr';
			header("location: login.php?msg=$err");
			}
		}else{
			$err = 'uerr';
			header("location: login.php?msg=$err");
		}
		
			
}


?>