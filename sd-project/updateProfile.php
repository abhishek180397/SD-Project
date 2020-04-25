<?php
require_once "config.php";
session_start();
function updateProfile($name, $address1, $address2, $city, $state, $zip){
	global $link;
	$uname = $_SESSION["username"];
	$sql = "Update client set name = '$name', address1 = '$address1', address2 = '$address2', city = '$city', state = '$state', zip = '$zip' where uname = '$uname'";
	if($result = mysqli_query($link, $sql)){
		echo "Updated";
		return true;		
	}
	return false;
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
  if( updateProfile($name, $address1, $address2, $city, $state, $zipcode)) {
	echo "<script>alert('Profile Update Successful');</script>"; 
	header("location: profile.php");
	}
// Redirect user to profile page
	header("location: profile.php");
}

?>