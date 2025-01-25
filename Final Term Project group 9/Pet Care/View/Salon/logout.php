<!--
// session_start();
// if(isset($_POST['auth']))
// {
//     unset($_SESSION['auth']);
//     unset($_SESSION['auth_user']);
//     $_SESSION['message']="Logged Out successfully";

// }
// header('Location: index.php');
// exit;
?> -->
<?php

session_start();

if (isset($_SESSION['auth'])) {

    unset($_SESSION['auth']);

    unset($_SESSION['auth_user']);

    $_SESSION['message'] = "Logged Out successfully";

}

header('Location: index.php');

exit; // Make sure to exit after the header redirect

?>