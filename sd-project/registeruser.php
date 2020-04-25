<?php
// Include config file
//include ('config.php');
require_once "config.php";
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

function userExists($uname){
	global $link;
	$sql = "Select 1 from login where uname = ?";
		
	if($stmt = mysqli_prepare($link, $sql)){
        echo "Function Statement Prepared";
        mysqli_stmt_bind_param($stmt, 's', $uname);
        
        // Set parameters
        //$uname = trim($_POST["username"]);
		
		if(mysqli_stmt_execute($stmt)){
            /* store result */
            mysqli_stmt_store_result($stmt);
                
            if(mysqli_stmt_num_rows($stmt) == 1){
                return 1;
            
            }
            echo "Username doesn't exist";
		}
    }
	return 0;
}
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username

    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
        echo "<script>alert('$username_err');</script>";
    } else{
		//echo "username entered";
		$entered_username = trim($_POST["username"]);
           	
        if(userExists($entered_username)){
            $username_err = "This username $entered_username is already taken.";
            // echo "<script>alert('Could not register. Please try again later');</script>";
		    // echo "<script>window.location.href='register.html';</script>";
            //echo "<script type='text/javascript'>alert('$username_err');</script>";
            //header("location: register.html");
            //echo "<script>redirect('sd-pro/register.html'); </script>";
            //echo '<script type="text/javascript">'; 
            //echo 'alert("$username_err")'; 
            //echo 'window.location= "register.html"';
            //echo '</script>';  
             
        } else{
            $prep_username = trim($_POST["username"]);
			echo "Username available";
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
        echo "password entered";
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
        echo "password matched";
    }
    
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        echo "entered function";
		$sql = "Insert into login(uname, pass) values(?, ?)";
		if($stmt = mysqli_prepare($link, $sql)){
            echo "statement prepared";
			mysqli_stmt_bind_param($stmt, 'ss', $uname, $hashed_password);
            echo "Param binded";
            // Set parameters
            $uname = $entered_username;
            $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

			if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
				//$msgg = "Registration Successful..please login')";
                header("location:login.php?msg=success");
            } else{
                echo "Something went wrong. Please try again later.";
            }
		}
                
    }else{
        $err = '';
        if($username_err){
            $err = $username_err;
        }elseif($password_err){
            $err = $password_err;
        }else{
            $err = $confirm_password_err;
        }
        header("location: register.php?msg=$err");
	}
}
?>

