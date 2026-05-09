<?php
$hostName = "sql111.ezyro.com";
$dbuser = "ezyro_41875440";
$dbpassword = "Pradeepti@123";
$dbName = "ezyro_41875440_login_register_db";
$conn=mysqli_connect($hostName,$dbuser,$dbpassword, $dbName);
if(!$conn){
    die("Something went wrong");
}
?>
