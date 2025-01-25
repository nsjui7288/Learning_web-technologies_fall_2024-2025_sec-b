<?php
session_start();
//include("model/config/dbcon.php");
//include("../model/config/dbcon.php");
include("../model/config/dbcon.php");
?>
<?php
$servername = "localhost";
$username = "host";
$password = "root";
$databasename="tans_yum_spotter";

// Create connection
$con = mysqli_connect($servername, $username, $password, $databasename);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
//require '../phpp/vendor/autoload.php';
require'../phpp/vendor/autoload.php';

 function send_password_reset($get_name,$get_email,$token)
 {

    $mail = new PHPMailer(true);
     $smtp = new SMTP;
     $mail->isSMTP();
     $mail->SMTPAuth = true;
     $mail->Host = "smtp.gmail.com";
     $mail->Username = "toukerahmed.2728@gmail.com";
     $mail->Password ="ncci kcvg otds kose";
    //$smtp->Host = 'smtp.example.com'; // Your SMTP server
    //$smtp->SMTPAuth = true;
    // $smtp->Username = 'toukerahmed.2728@gmail.com'; // Your SMTP username
    // $smtp->Password = 'ncci kcvg otds kose'; // Your SMTP password
    // $smtp->SMTPSecure = 'tls';
    // $smtp->Port = 587;

    $mail->isSMTP();
    $mail->SMTP = new SMTP;

    $mail->setFrom('toukerahmed.2728@gmail.com', $get_name);
    $mail->addAddress($get_email);
    $mail->isHTML(true);
    $mail->Subject = 'Password Change Notification';

    $email_template = "
    <h2>Hello</h2>
    
    <a href ='http://localhost/mvc/view/change_password.php?token=$token&remail=$get_email'>click me</a>

    <p>Your password has been changed successfully.</p>";

    $mail->Body = $email_template;
    $mail->Send();

    try {
        $mail->send();
    } catch (Exception $e) {
        // Handle email sending error
    }

 }


if(isset($_POST['password_reset_link']))
{
 $remail = mysqli_real_escape_string($con,$_POST['remail']);
 $token = md5(rand());
 $check_email = "SELECT remail FROM arest WHERE remail ='$remail' limit 1";
 $check_email_run = mysqli_query($con,$check_email);

if(mysqli_num_rows($check_email_run)> 0)
{
     $row= mysqli_fetch_array($check_email_run);
     $get_name=$row['frname'];
     $get_email=$row['remail'];
     $update_token="UPDATE arest SET verify_token ='$token' WHERE remail ='$get_email' limit 1" ;
     $update_token_run = mysqli_query($con,$update_token);

     if($update_token_run)
     {
        send_password_reset($get_name,$get_email,$token);
        $_SESSION["status"] ="we e-mailed you a password reset link";
        header("Location: forget_password.php");
        exit(0);

     }
     else
     {
         $_SESSION['status'] ="something went wrong. #1";
         header("Location: forget_password.php");
         exit(0);


}

}
else{
    $_SESSION['status'] ="NO email found";
    header("Location: forget_password.php");
    exit(0);
}
}

if(isset($_POST['password_update']))
{
    $remail = mysqli_real_escape_string($con,$_POST['remail']);
    $rpassword = mysqli_real_escape_string($con,$_POST['rpassword']);
    $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);
    $token = mysqli_real_escape_string($con,$_POST['password_token']);

    if(!empty($token))
    {
        if(!empty($remail)&& !empty($rpassword)&& !empty($cpassword))
        {
            // checking token valid or not
            $check_token = "SELECT verify_token FROM arest WHERE verify_token = '$token' limit 1";
            $check_token_run = mysqli_query($con,$check_token);
            if(mysqli_num_rows($check_token_run) > 0 )
            {
                if($rpassword == $cpassword)
                {
                    $update_password = "UPDATE arest SET rpassword = '$rpassword',  cpassword = '$cpassword' WHERE verify_token = '$token' limit 1";
                    $update_password_run = mysqli_query($con,$update_password);
                    if($update_password_run)
                    {
                        $_SESSION['status'] ="Password updated successfully";
                        header("Location: login.php");
                        exit(0);

                    }
                    else
                    {
                        $_SESSION['status'] ="Did not update password , Something went wrong";
                        header("Location: change_password.php?token=$token&remail=$remail");
                        exit(0);
                    }

                }
                else
                {
                    $_SESSION['status'] ="Password And Confirm Password Does Not Match";
                    header("Location: change_password.php?token=$token&remail=$remail");
                    exit(0);
                }
            }
            else
            {
             $_SESSION['status'] ="Invalid Token";
             header("Location: change_password.php?token=$token&remail=$remail");
             exit(0);
            }

        }
        else
        {
             $_SESSION['status'] ="All Field are Mandatory";
             header("Location: change_password.php?token=$token&remail=$remail");
             exit(0);
        }

    }
    else
    {
         $_SESSION['status'] ="NO Token Avaiable";
         header("Location: change_password.php");
         exit(0);
    }
}

?>