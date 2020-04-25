<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Style the top navigation bar */
.topnav {
    overflow: hidden;
    background-color: rgb(51, 51, 51);
    }

/* Style the topnav links */
.topnav a {
float: left;
display: block;
color: #cae43a;
text-align: center;
padding: 14px 16px;
text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
background-color: #ddd;
color: black;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: rgb(140, 148, 156);
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>

<script> 
          
    // Function to check Whether both passwords 
    // is same or not. 
    function checkPassword() { 
        var password1 = document.forms["registerform"]["password"].value;
        var password2 = document.forms["registerform"]["confirmpassword"].value; 

        // If password not entered 
        if (password1 == '') {
            alert ("Please enter Password");
            return false;
        }
              
        // If confirm password not entered 
        if (password2 == '') {
            alert ("Please enter confirm password"); 
            return false;
        }
              
        // If Not same return False.     
        if (password1 != password2) { 
            alert ("\nPassword did not match: Please try again...") 
            return false; 
        } 
    } 
</script> 

</head>
<body>
<?php
if(!empty($_GET['msg'])){
  $message = $_GET['msg'];
  echo "<script>alert('$message');</script>";
}

?>


<div class="topnav">
    <a href="index2.html">Home</a>
    <a href="login.php">Login</a>
    <a href="register.php">Register</a>
</div>

<form name="registerform" onsubmit="return checkpassword()" , action="registeruser.php" , method="post">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="password" ><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <label for="confirm_password" ><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="confirm_password" required>
    <hr>
    <p>
        <input type="submit" value="Register" class="registerbtn">
    </p>
    <!-- <button type="submit" value="Submit" class="registerbtn">Register</button> -->
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
</form>

</body>
</html>
