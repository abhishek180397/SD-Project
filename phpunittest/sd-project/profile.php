<?php

function saveProfile($name, $address1, $address2, $city, $state, $zip){
  if($name && $address1 && $city && $state && $zip){
	$_SESSION["name"] = $name;
	$_SESSION["address1"] = $address1;
	$_SESSION["address2"] = $address2;
	$_SESSION["city"] = $city;
	$_SESSION["state"] = $state;
  $_SESSION["zip"] = $zip;
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
  if(saveProfile($name, $address1, $address2, $city, $state, $zipcode)) {
    // Redirect user to profile page
    header("location: login-home.php");
  }
  else{
    header("location: profile.html");
  }
}


?>