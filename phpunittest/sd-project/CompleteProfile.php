<?php
require_once ("config.php");
session_start();
function completeProfile($name, $address1, $address2, $city, $state, $zip){
	global $link;
	$uname = $_SESSION["username"];
	echo($uname.$name.$address1.$address2.$city.$state.$zip);
#	$sql = "Insert into Client(uname, name, address1, address2, city, state, zip) values(?, ?, ?, ?, ?, ?, ?)";
	$sql = "Insert into client values('$uname', '$name', '$address1', '$address2', '$city', '$state', '$zip')";
	if($result = mysqli_query($link, $sql)){
		echo "Inserted";
		return 1;
		#mysqli_stmt_bind_param($stmt, 'sssssss', $uname, $name, $address1, $address2, $city, $state, $zip);
		#if(mysqli_stmt_execute(stmt)){
	#		return 1;
	#	}
	#	echo "Insert Failed";
	}
	echo "Failed to Insert".$result;
	return 0;
}

// define variables and set to empty values
$name = $address1 = $address2 = $city = $state = $zipcode = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = trim($_POST["fname"]);
  $address1 = trim($_POST["address1"]);
  $address2 = trim($_POST["address2"]);
  $city = trim($_POST["city"]);
  $state = trim($_POST["state"]);
  $zipcode = trim($_POST["zip"]);
  if( completeProfile($name, $address1, $address2, $city, $state, $zipcode)) {
	echo "<script>alert('Profile Completed');</script>"; 
	header("location: profile.php");
	}
// Redirect user to profile page
	echo "<script>alert('Profile Not Completed');</script>"; 
	#header("location: login-home.php");
}

?>