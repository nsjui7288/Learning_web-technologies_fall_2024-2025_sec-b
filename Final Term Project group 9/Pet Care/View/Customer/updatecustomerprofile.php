<?php

session_start();
require_once("../model/AuthModel.php");

if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
    $user_data = get_user_data($user_id);

    if ($user_data) {
        $name = $user_data['name'];
        $email = $user_data['email'];
        $phone = $user_data['phone'];
    } else {
        echo "No data found!";
    }
}


if (isset($_POST['submit'])) {
    $updated_name = $_POST['name'];
    $updated_email = $_POST['email'];
    $updated_phone = $_POST['phone'];


    $update_status = update_user_data($user_id, $updated_name, $updated_email, $updated_phone);
    if ($update_status) {
        header("Location: home.php");  
    } else {
        echo "Error updating your information.";
    }
}

?>

<html>
<head>
    <title>Update Information</title>
</head> 
<body>
    <h3>Update your information</h3>
    <form action="updatecustomerprofile.php" method="POST">
       
        Name: <input type="text" name="name" value=""><br>
        Email: <input type="email" name="email" value=""><br>
        Password: <input type="password" name="password" value=""><br>
        Phone: <input type="text" name="phone" value=""><br>
        <input type="submit" name="submit" value="Update Information">
    </form>
    <br>
    <a href="home.php">Return to Homepage</a>
</body>
</html>
