<?php
function connection() {
    $host = "localhost";       
    $username = "root";       
    $password = "";            
    $db_name = "petcare";      

    $con = mysqli_connect($host, $username, $password, $db_name);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $con;
}
?>
