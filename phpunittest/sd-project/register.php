<?php
// Include config file
//require_once "config.php";
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

function userExists($uname){
	$username = "kganta@uh.edu";
	if($username == $uname){
		return 1;
	}else{
		return 0;
	}
}
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username

    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
		//echo "username entered";
		$entered_username = trim($_POST["username"]);
           	
        if(userExists($entered_username)){
            $username_err = "This username is already taken.";
			echo "username exists";
        } else{
            $prep_username = trim($_POST["username"]);
			echo "Successfully Registered";
        }
            
        
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
		echo "<script>alert('Registration Successful..please login');</script>";
        header("location: login.html");
                
    }else{
		echo "<script>alert('Something went wrong. Please try again later.');</script>";
		header("location: register.html");
	}
}
?>

