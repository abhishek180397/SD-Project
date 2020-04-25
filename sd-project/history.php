<?php require_once "config.php" ?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<style>

body {font-family: "Times New Roman", Georgia, Serif;}
h1, h2, h3, h4, h5, h6 {
  font-family: "Playfair Display";
  letter-spacing: 5px;
}

/* body{
  background-image: url('img17.jpg');
} */

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

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

b{
  font-size: 30px;
} 
</style>
</head>

<body>
<ul>
  <li><a href="login-home.html">Home</a></li>
  <li><a  href="profile.php">My Profile</a></li>
  <li><a href="fuel_quote.php">New Quote</a></li>
  <li><a class = "active" href="history.php">Quote History</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>

<center><b>FUEL QUOTE HISTORY </b></center>
<br>
<?php
session_start();
$uname = $_SESSION["username"];
$sql = "Select qid, gallons, address, del_date, price from fuel_quote where uname = '$uname'";
if($result = mysqli_query($link, $sql)){
	echo"<table>
	<tr><th>Quote Id</th>
		<th>Gallons Requested</th>
		<th>Delivery Address</th>
		<th>Delivery Date</th>
		<th>Suggested Price</th>
		<th>Total amount due</th>
		</tr>";
	while($row = mysqli_fetch_row($result)){
		$amount = $row[1] * $row[4];
		echo"<td>$row[0]</td>";
		echo"<td>$row[1]</td>";
		echo"<td>$row[2]</td>";
		echo"<td>$row[3]</td>";
		echo"<td>$row[4]</td>";
		echo"<td>$amount</td>";
		echo "</tr>";
	}
	echo"</table>";
}
	

?>


</body>
</html>
