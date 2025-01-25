<?php
  $db_host = '127.0.0.1';
  $db_user = 'root';
  $db_password = '';
  $db_name = 'doctor';

$conn = new mysqli($db_host,$db_user,$db_pass,$db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO doctors (username, password, email, phone) VALUES (?, ?, ?, ?)";
if(mysqli_query($con, $sql)){

    echo "Success";
}
else{
    echo "Error";   
}

?>

