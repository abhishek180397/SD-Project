<?php

$user_names = [ "reddykeerthana98@gmail.com", "kganta@uh.edu"];
$pass = ["ganta123", "uh12345"];

function isValidUsername($uname){
	global $user_names;
	if (in_array($uname, $user_names)){
		return true;
	}
	else{
		return false;
	}
}

function validatePassword($uname, $pwd){
	global $user_names, $pass;
	$index = array_search($uname, $user_names);
	if ($pwd == $pass[$index]){
		return true;
	} 
}

function isProfileComplete(){
	if(isSet($_SESSION["name"], $_SESSION["address1"],$_SESSION["address2"], $_SESSION["city"],$_SESSION["state"], $_SESSION["zip"])){
		return true;
	} 
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
			//$_SESSION["id"] = $id;
			$_SESSION["username"] = $username;
			//$_SESSION["name"] = $_SESSION["address1"] = $_SESSION["address2"] = $_SESSION["city"] = $_SESSION["state"] = $_SESSION["zip"] = "";
			if(isProfileComplete()){
				// Redirect user to welcome page
				header("location: profile.html");
			}else{			
			// Redirect user to profile page
			header("location: login-home.php");
			}

		}	
	}
}
?>