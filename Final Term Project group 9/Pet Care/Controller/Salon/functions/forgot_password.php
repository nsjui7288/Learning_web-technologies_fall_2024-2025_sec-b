<?php
session_start();
include('../model/config/dbcon.php');
include('myfunction.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['forgot_password_btn'])) {
    $remail = isset($_POST['remail']) ? $_POST['remail'] : null;

    if (filter_var($remail, FILTER_VALIDATE_EMAIL)) {
        $query = "SELECT * FROM arest WHERE remail = ?";
        $stmt = mysqli_prepare($con, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $remail);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            if ($result && mysqli_num_rows($result) > 0) {
                $reset_token = md5(uniqid(rand(), true));
                $timestamp = time() + (24 * 60 * 60);

                $update_query = "UPDATE users SET reset_token = ?, reset_token_expires = ? WHERE email = ?";
                $update_stmt = mysqli_prepare($con, $update_query);

                if ($update_stmt) {
                    mysqli_stmt_bind_param($update_stmt, "sss", $reset_token, $timestamp, $remail);
                    $update_result = mysqli_stmt_execute($update_stmt);

                    if ($update_result) {
                        $reset_link = "http://yourwebsite.com/reset_password.php?email=$remail&token=$reset_token";
                        // Send the $reset_link to the user's email

                        $_SESSION['reset_message'] = "Password reset link sent to your email. Please check your inbox.";
                    } else {
                        $_SESSION['reset_message'] = "Error updating reset token: " . mysqli_error($con);
                    }

                    mysqli_stmt_close($update_stmt);
                } else {
                    $_SESSION['reset_message'] = "Error preparing update statement: " . mysqli_error($con);
                }
            } else {
                $_SESSION['reset_message'] = "Email address not found in our records.";
            }

            mysqli_stmt_close($stmt);
        } else {
            $_SESSION['reset_message'] = "Error preparing statement: " . mysqli_error($con);
        }
    } else {
        $_SESSION['reset_message'] = "Invalid email address.";
    }
}

mysqli_close($con);
?>