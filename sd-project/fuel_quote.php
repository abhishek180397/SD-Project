<?php require_once "config.php" ?>

<html>
<title>MY FUEL QUOTE</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<style>
body {font-family: "Times New Roman", Georgia, Serif;}
h1, h2, h3, h4, h5, h6 {
  font-family: "Playfair Display";
  letter-spacing: 5px;
}

#frm1:invalid #btn1 {
  pointer-events: none;
  cursor: not-allowed;
}

#frm1:invalid #btn2 {
  pointer-events: none;
  cursor: not-allowed;
}

button {
  /* default for <button>, but useful for <a> */
  display: inline-block;
  text-align: center;
  text-decoration: none;

  /* create a small space when buttons wrap on 2 lines */
  margin: 2px 0;

  /* invisible border (will be colored on hover/focus) */
  border: solid 1px transparent;
  border-radius: 4px;

  /* size comes from text & padding (no width/height) */
  padding: 0.5em 1em;

  /* make sure colors have enough contrast! */
  color: #ffffff;
  background-color: #9555af;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #4CAF50;
}
input[type=text], select, input[type=number], input[type=date]  {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>

<body>
<ul>
  <li><a href="login-home.html">Home</a></li>
  <li><a href="profile.php">My Profile</a></li>
  <li><a class = "active" href="fuel_quote.php">New Quote</a></li>
  <li><a href="history.php">Quote History</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>


<?php 
session_start();
$uname = $_SESSION["username"];
$sql = "Select address1, address2 from client where uname = '$uname'";
if($result = mysqli_query($link, $sql)){
	$address = mysqli_fetch_row($result);
}

if(!isset($_SESSION["sug_price"])){
	$_SESSION["gallons"] = $_SESSION["date"] = $_SESSION["sug_price"] = $_SESSION["tot_amt"] = "";
	
}
?>

<h1>Fuel Quote Form </h1>
<div>
<form action="Get_Price.php" method = "post" id="frm1">
	  <label for="gallons">Gallons Requested</label>
      <p><input type="number" placeholder="Gallons" required name="gallons" value =<?php echo $_SESSION["gallons"]?> ></p>
	  <label>Address</label>
	  <label for="address">Delivery Address</label>
      <p><input type="text" placeholder="Address Line 1" readonly name="address1", value="<?php echo $address[0]." ".$address[1]?>" ></p>
	  <label for="date">Delivery Date</label>
	  <p><input type="date" placeholder="Date.." required name="date" value =<?php echo $_SESSION["date"]?> ></p>
      <label for="price">Sugested Price</label>
	  <p><input type="number" placeholder="Price.." readonly name="price" value =<?php echo $_SESSION["sug_price"]?>></p>
      <label for="amount">Total Amount Due</label>
	  <p><input type="number" placeholder="Total Amount.." readonly name="amount" value =<?php echo $_SESSION["tot_amt"]?> ></p>
	  <p><button type="submit" name="price_btn" value="Price" id="btn1">Get Price</button>
	  <button type="submit" name="submit_btn" value ="Submit" id="btn2">Save Quote</button></p>
    </form>
</div>

</body>
</html>