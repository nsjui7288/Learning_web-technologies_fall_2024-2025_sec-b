<?php
$usernamePattern = "/^[a-zA-Z0-9\.\-_]{2,}$/";
$specialCharacters = ['@', '#', '$', '%'];

$currentPassword = "password123";
function validateUsername($username)
{
    global $usernamePattern;
    return strpos($usernamePattern, $username);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $currentPassword = $_POST["current_password"];
    $newPassword = $_POST["new_password"];
    $retypedPassword = $_POST["retyped_password"];

    if (validateUsername($username)) {
        echo "Username does not meet the criteria.<br>";
    }
    if ($newPassword != $retypedPassword) {
        echo "New password and retyped password do not match.<br>";
    }
    if ($newPassword == $currentPassword) {
        echo "New password cannot be the same as the current password.<br>";
    }
    if (strlen($newPassword) < $passwordMinLength) {
        echo "Password must be at least $passwordMinLength characters long.<br>";
    }

    $containsSpecialChar = false;
    foreach ($specialCharacters as $char) {
        if (strpos($newPassword, $char) !== false) {
            $containsSpecialChar = true;
            break;
        }
    }
    if (!$containsSpecialChar) {
        echo "Password must contain at least one of the special characters (@, #, $, %).<br>";
    }
}
?>

<html>
    <head></head>
    <body>
    <fieldset>
    <legend>Login </legend>
    <form method="request" action="" enctype="">
        Username: <input type="text" name="username" value="" placeholder="type username" /> <br>
        <br>
        Password: <input type="password" name="current_password" value="" /> <br>
        <br>


        <hr>
        <input type="checkbox" name="anything" value="" /> Remember Me <br>
        <br>
        <button type="submit"> Login </button>
        <a href="logout.php">Logout</a>
        <a href="Forgot password"> Forgot Password?</a>
    </form>
</fieldset>
</body>
</html>