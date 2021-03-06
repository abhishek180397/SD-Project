<!DOCTYPE html> 
<html> 
<style> 
	/*set border to the form*/ 
	
	form { 
        border: 3px solid #f1f1f1; 
        background: rgb(140, 148, 156);
	} 
	/*assign full width inputs*/ 
	
	input[type=text], 
	input[type=password] { 
		width: 100%; 
		padding: 12px 20px; 
		margin: 8px 0; 
		display: inline-block; 
		border: 1px solid #ccc; 
		box-sizing: border-box; 
	} 
	/*set a style for the buttons*/ 

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
	
	button { 
		background-color: #4CAF50; 
		color: white; 
		padding: 14px 20px; 
		margin: 8px 0; 
		border: none; 
		cursor: pointer; 
		width: 100%; 
	} 
	/* set a hover effect for the button*/ 
	
	button:hover { 
		opacity: 0.8; 
	} 
	/*set extra style for the cancel button*/ 
	
	.cancelbtn { 
		width: auto; 
		padding: 10px 18px; 
		background-color: #f44336; 
	} 
	/*centre the display image inside the container*/ 
	
	.imgcontainer { 
		text-align: center; 
		margin: 24px 0 12px 0; 
	} 
	/*set image properties*/ 
	
	img.avatar { 
		width: 40%; 
		border-radius: 50%; 
	} 
	/*set padding to the container*/ 
	
	.container { 
		padding: 16px; 
	} 
	/*set the forgot password text*/ 
	
	span.psw { 
		float: right; 
		padding-top: 16px; 
	} 
	/*set styles for span and cancel button on small screens*/ 
	
	@media screen and (max-width: 300px) { 
		span.psw { 
			display: block; 
			float: none; 
		} 
		.cancelbtn { 
			width: 100%; 
		} 
	} 

	.signin {
        background-color: #f1f1f1;
        text-align: center;
		color: red;
    }
</style> 

<body> 

<?php
if(!empty($_GET['msg'])){
$msg = $_GET['msg'];
if($msg == 'success'){
echo "<script>alert('Successfully Registered, Please Login');</script>";
}elseif($msg == 'uerr'){
echo "<script>alert('Username does not exist');</script>";
}elseif($msg == 'perr'){
echo "<script>alert('Wrong Password, Try again');</script>";
}
}
?>

    <div class="topnav">
		<a href="index2.html">Home</a>
		<a href="login.php">Login</a>
	    <a href="register.php">Register</a>
	</div>

	<h2>Login Form</h2> 
	<form action="loginuser.php", method = "post"> 
		<div class="imgcontainer"> 
			<img src= 
"image16.jpg"
				alt="Avatar" class="avatar"> 
		</div> 

		<div class="container"> 
			<label><b>Username</b></label> 
			<input type="text" placeholder="Enter Username" name="username" required> 

			<label><b>Password</b></label> 
			<input type="password" placeholder="Enter Password" name="password" required> 

			<button type="submit">Login</button>  
		</div> 
		<div class="container" style="background-color:#f1f1f1">  
		</div> 
		<div class="container signin">
            <p>New User? Create a new account - <a href="register.php">Sign up</a>.</p>
        </div>
	</form> 

</body> 

</html> 
