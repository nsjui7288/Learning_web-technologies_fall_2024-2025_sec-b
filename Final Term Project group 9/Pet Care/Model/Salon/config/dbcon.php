<?php
$servername = "localhost";
$username = "root";
$password = "";
//$username = "root";
//$password = "";
$databasename="tans_yum_spotter";

// Create connection
$con = mysqli_connect($servername, $username, $password, $databasename);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
else
{
//echo "Connected successfully";
}

?>