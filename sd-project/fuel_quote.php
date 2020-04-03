<?php

if(isset($_SESSION["id"]) === $id){
    header("location: fuel_quote.html");
    exit;
}

// define variables and set to empty values
$gallons = $date =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $gallons = trim($_POST["gallons"]);
  $date = trim($_POST["date"]);
 }

// Redirect user to fuel_quote page
header("location: login-home.php");
?>