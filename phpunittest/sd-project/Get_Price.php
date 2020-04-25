<?php
require_once "config.php";
#session_start();

function getLocationFactor(){
	global $link;
	$uname = $_SESSION["username"];	
	$sql = "Select state from client where uname = '$uname'";
	if($result = mysqli_query($link, $sql)){
		$row = mysqli_fetch_row($result);
		$state = $row[0]; 
		#echo $state;
		#echo "State";
		if ($state == 'TX'){
			return 0.02;
		}
	}
	return 0.04;
}

function getRateHistoryFactor(){
	global $link;
	$uname = $_SESSION["username"];
	$sql = "select * from fuel_quote where uname = '$uname'";
	if($result = mysqli_query($link, $sql)){
		if(mysqli_num_rows($result) > 0){
			return 0.01;
		}
	}
	return 0;
}

function getGallonsRequestedFactor($gallons){
	if ($gallons > 1000){
		return 0.02;
	}
	return 0.03;
}

function getCompanyProfitFactor(){
	return 0.1;
}

function getRateFluctuation($date){
	$timestamp = strtotime($date);
	$date = date("m", $timestamp);
	echo"Date ".$date."  ";
	if ($date > 5 && $date < 9){
		return 0.04;
	}
	return 0.03;
}

function saveQuote($gallon, $address, $date, $price){
	global $link;
	$uname = $_SESSION["username"];
	$sql = "Insert into fuel_quote(uname, gallons, address, del_date, price) values('$uname', $gallon, '$address', '$date', $price)";
	if($result = mysqli_query($link, $sql)){
		$_SESSION["tot_amt"] = $_SESSION["sug_price"] = $_SESSION["gallons"] = $_SESSION["date"] = '';
		return true;
	}
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$gallon = trim($_POST["gallons"]);
	$date = trim($_POST["date"]);
	$current_price = 1.5;
	$margin = $current_price * (getLocationFactor() - getRateHistoryFactor() + getGallonsRequestedFactor($gallon) + getRateFluctuation($date) + getCompanyProfitFactor());
	$suggested_price = $current_price + $margin;
	$amount = $suggested_price * $gallon;
	
	if(isset($_POST["price_btn"])){
		$_SESSION["sug_price"] = $suggested_price;
		$_SESSION["tot_amt"] = $amount;
		$_SESSION["gallons"] = $gallon;
		$_SESSION["date"] = $date;
		echo $suggested_price;
		echo $amount;
		header("location: fuel_quote.php");
	}
	elseif(isset($_POST["submit_btn"])){
		$address = $_POST["address1"];
		#$price = $_POST["price"];
		#echo $gallon." ".$address." ".$date." ".$suggested_price;
		if(saveQuote($gallon, $address, $date, $suggested_price)){
			echo "Quote Saved";
		}
		echo "Quote not saved";
		header("location: login-home.php");
	}
}

 ?>