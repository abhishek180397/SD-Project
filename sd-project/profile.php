<?php require_once("config.php") ?>

<!DOCTYPE html>
<html>
<title>MY PROFILE</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<style>
body {font-family: "Times New Roman", Georgia, Serif;}
h1, h2, h3, h4, h5, h6 {
  font-family: "Playfair Display";
  letter-spacing: 5px;
}

x{
  color: red;
  font-weight:bold;
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
input[type=text], select {
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


<script>

function validateForm() {
  var x = document.forms["myForm"]["fname"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
  var x = document.forms["myForm"]["fname"].value;
  if (x.length > 50){
    alert("NAME EXCEEDED THE LIMIT");
    return false;
  }
  var z = document.forms["myForm"]["address1"].value;
  if (x.length > 100){
    alert("ADDRESS EXCEEDED THE LIMIT");
    return false;
  }
  var a = document.forms["myForm"]["address2"].value;
  if (x.length > 100){
    alert("ADDRESS EXCEEDED THE LIMIT");
    return false;
  }
  var b = document.forms["myForm"]["city"].value;
  if (x.length > 100){
    alert("CITY NAME EXCEEDED THE LIMIT");
    return false;
  }
  var y = document.forms["myForm"]["zip"].value;
  if(y.length < 5 || y.length > 9){
    alert("ZIP CODE MUST CONTAIN MORE THAN 5 AND LESS THAN 9 CHARACTERS");
    return false;
  }
  
}
</script>


</head>

<?php 
session_start();
$uname = $_SESSION["username"];
$sql = "Select uname, name, address1, address2, city, state, zip from client where uname = '$uname'";
if($result = mysqli_query($link, $sql)){
  $profile = mysqli_fetch_row($result);
  //echo $profile[1].$profile[2].$profile[3].$profile[4].$profile[5];
//   echo("<script>
// var temp = '$profile[5]';
// var mySelect = document.getElementById('state');

// for(var i, j = 0; i = mySelect.options[j]; j++) {
//     if(i.value == temp) {
//         mySelect.selectedIndex = j;
//         break;
//     }
// }

// </script>");
}

?>

<?php echo("<script>
var temp = '$profile[5]';
var mySelect = document.getElementById('state');

for(var i, j = 0; i = mySelect.options[j]; j++) {
    if(i.value == temp) {
        mySelect.selectedIndex = j;
        break;
    }
}
#document.getElementById('address2').value($profile[3]);
</script>");
?>


<body>
<ul>
  <li><a href="login-home.php">Home</a></li>
  <li><a class = "active" href="profile.html">My Profile</a></li>
  <li><a href="fuel_quote.php">New Quote</a></li>
  <li><a href="history.php">Quote History</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>

<div class="w3-top">
  <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">

<h1>My Profile </h1>
<div>
      <form name="myForm" action="updateProfile.php", onsubmit="return validateForm()", method="post">
        Name:<x>*</x> <input type="text" name="fname", value = "<?php echo $profile[1]?>" />
   	  <label>Address</label>
	  <label for="address1">Address 1<x>*</x></label>
      <p><input type="text" placeholder="Address Line 1" required name="address1", value = "<?php echo $profile[2]?>"></p>
	  <label for="address2">Address 2</label>
	  <p><input type="text" placeholder="Address Line 2" name="address2" value = "<?php echo $profile[3]?>" autocomplete="off"/></p>
      <label for="city">City<x>*</x></label>
	  <p><input type="text" placeholder="City" required name="city", value = "<?php echo $profile[4]?>"></p>
      <label for="state">State<x>*</x></label>
    <p><select id="state" required name="state"></p>
      <option value="none"><?php echo $profile[5]?></option>
      <option value="AL">Alabama</option>
      <option value="AK">Alaska</option>
      <option value="AZ">Arizona</option>
      <option value="AR">Arkansas</option>
      <option value="CA">California</option>
      <option value="CO">Colorado</option>
      <option value="CT">Connecticut</option>
      <option value="DE">Delaware</option>
      <option value="DC">District Of Columbia</option>
      <option value="FL">Florida</option>
      <option value="GA">Georgia</option>
      <option value="HI">Hawaii</option>
      <option value="ID">Idaho</option>
      <option value="IL">Illinois</option>
      <option value="IN">Indiana</option>
      <option value="IA">Iowa</option>
      <option value="KS">Kansas</option>
      <option value="KY">Kentucky</option>
      <option value="LA">Louisiana</option>
      <option value="ME">Maine</option>
      <option value="MD">Maryland</option>
      <option value="MA">Massachusetts</option>
      <option value="MI">Michigan</option>
      <option value="MN">Minnesota</option>
      <option value="MS">Mississippi</option>
      <option value="MO">Missouri</option>
      <option value="MT">Montana</option>
      <option value="NE">Nebraska</option>
      <option value="NV">Nevada</option>
      <option value="NH">New Hampshire</option>
      <option value="NJ">New Jersey</option>
      <option value="NM">New Mexico</option>
      <option value="NY">New York</option>
      <option value="NC">North Carolina</option>
      <option value="ND">North Dakota</option>
      <option value="OH">Ohio</option>
      <option value="OK">Oklahoma</option>
      <option value="OR">Oregon</option>
      <option value="PA">Pennsylvania</option>
      <option value="RI">Rhode Island</option>
      <option value="SC">South Carolina</option>
      <option value="SD">South Dakota</option>
      <option value="TN">Tennessee</option>
      <option value="TX">Texas</option>
      <option value="UT">Utah</option>
      <option value="VT">Vermont</option>
      <option value="VA">Virginia</option>
      <option value="WA">Washington</option>
      <option value="WV">West Virginia</option>
      <option value="WI">Wisconsin</option>
      <option value="WY">Wyoming</option>
    </select>

    <label for="zip">Zip Code<x>*</x></label>
    <p><input type="text" placeholder="Zip Code" required name="zip", value = "<?php echo $profile[6]?>"></p>
    <p>
        <input type="submit" value="Submit">
    </p>
    </form>
</div>

</body>
</html>
