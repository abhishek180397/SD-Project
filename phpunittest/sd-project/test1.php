<?php
$uname = $_POST["username"];
$pass = $_POST["password"];
if ($uname == "bar"){
    header('location:login-home.php');
}
else{
echo $uname;
}
?>