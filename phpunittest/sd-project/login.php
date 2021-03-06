<?php
#require_once("config.php");

// Initialize the session

function isValidUsername($uname){
	global $link;
	$sql = "Select * from Login where uname = '$uname'";
	echo " Before query ";
	if($result = mysqli_query($link, $sql)){
		echo " after query row is ";
		$nrow = mysqli_num_rows($result);
		echo $nrow;
		if(mysqli_num_rows($result) > 0){
			return true;
		}
	}
	return false;
}

function validatePassword($uname, $pwd){
	global $link;
	$sql = "Select pass from Login where uname = '$uname'";
	if($result = mysqli_query($link, $sql)){
		#echo "Query Executed";
		$pswd = mysqli_fetch_row($result);
		if($pwd == $pswd[0]){
			return true;
		}
	}
	#echo $pswd[0];
	#echo "Password Mismatch";
}

function isProfileComplete($uname){
	global $link;
	$sql = "Select * from Client where uname = '$uname'";
	if($result = mysqli_query($link, $sql)){
		$nrow = mysqli_num_rows($result);
		#echo "<script>alert('$nrow');</script>";
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
	echo "Before Checking";
	if(isValidUsername($username)) {

		if(validatePassword($username, $password)){
			echo "Password Matching";
			session_start();	
			$_SESSION["loggedin"] = true;
			$_SESSION["username"] = $username;
			if(isProfileComplete($username)){
				echo "Profile complete";
				// Redirect user to welcome page
				header("location: profile.php");
			}else{			
				// Redirect user to profile page
				echo "Profile not complete";
				header("location: profile.html");
			}

		}	
	}
	
}
#header("location: login.html");
?>