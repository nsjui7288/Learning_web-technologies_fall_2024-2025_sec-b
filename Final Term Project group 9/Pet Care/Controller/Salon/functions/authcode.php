<?php
session_start();
include('../../model/config/dbcon.php');
include('myfunction.php');

if (isset($_POST['register_btn'])) {

     $requiredFields = ['frname', 'lrname', 'rusername', 'rgender', 'rphone', 'remail', 'rpassword', 'cpassword'];

    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            $_SESSION['message'] = ucfirst($field) . " is required";
            header('location: ../../view/register.php');
            exit();
        }
    }

    $frname = mysqli_real_escape_string($con, $_POST['frname']);
    $lrname = mysqli_real_escape_string($con, $_POST['lrname']);
    $rusername = mysqli_real_escape_string($con, $_POST['rusername']);
    $rgender = mysqli_real_escape_string($con, $_POST['rgender']);
    $rphone = mysqli_real_escape_string($con, $_POST['rphone']);
    $remail = mysqli_real_escape_string($con, $_POST['remail']);
    $rpassword = mysqli_real_escape_string($con, $_POST['rpassword']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    // Check if frname, lrname, and rusername only contain letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/", $frname) || !preg_match("/^[a-zA-Z-' ]*$/", $lrname) || !preg_match("/^[a-zA-Z-' ]*$/", $rusername)) {
        $_SESSION['message'] = "Only letters and white space allowed for first name, last name, and username";
        header('location: ../../view/register.php');
    } else {
        // Check if the phone number has exactly 11 digits
        if (strlen($rphone) == 11 && is_numeric($rphone)) {
            // checking email address already exists or not
            $check_email_query = "SELECT remail FROM arest WHERE remail=?";
            $check_email_query_run = mysqli_prepare($con, $check_email_query);
            mysqli_stmt_bind_param($check_email_query_run, 's', $remail);
            mysqli_stmt_execute($check_email_query_run);
            mysqli_stmt_store_result($check_email_query_run);

            if (mysqli_stmt_num_rows($check_email_query_run) > 0) {
                $_SESSION['message'] = "Email already exists";
                header('location: ../../view/register.php');
            } else {
                // check proper email address
                if (!filter_var($remail, FILTER_VALIDATE_EMAIL)) {
                    $_SESSION['message'] = "Invalid email format";
                    header('location: ../../view/register.php');
                } else {
                    // Check if the password meets the specified criteria
                    if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $rpassword)) {
                        // checking password and confirm password are same or not
                        if ($rpassword == $cpassword) {
                            $insert_query = "INSERT INTO arest (frname,lrname,rusername,rgender,rphone,remail,rpassword,cpassword) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                            $insert_query_run = mysqli_prepare($con, $insert_query);
                            mysqli_stmt_bind_param($insert_query_run, 'ssssdsss', $frname, $lrname, $rusername, $rgender, $rphone, $remail, $rpassword, $cpassword);
                            mysqli_stmt_execute($insert_query_run);

                            if ($insert_query_run) {
                                $_SESSION['message'] = "Registered successfully";
                                header('location: ../../view/login.php');
                            } else {
                                $_SESSION['message'] = 'Something went wrong';
                                header('location: ../../view/register.php');
                            }
                        } else {
                            $_SESSION['message'] = "Passwords do not match";
                           header('location: ../../view/register.php');
                        }
                    } else {
                        $_SESSION['message'] = "Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character (@$!%*?&)";
                        header('location: ../../view/register.php');
                    }
                }
            }
        } else {
            $_SESSION['message'] = "Phone number must be exactly 11 digits long and consist of numbers only.";
            header('location: ../../view/register.php');
        }
    }
}  else if (isset($_POST['login_btn'])) {
    $remail = mysqli_real_escape_string($con, $_POST['remail']);
    $rpassword = mysqli_real_escape_string($con, $_POST['rpassword']);
    $login_query = "SELECT * FROM arest WHERE remail = ? AND rpassword = ?";
    $login_query_run = mysqli_prepare($con, $login_query);
    mysqli_stmt_bind_param($login_query_run, 'ss', $remail, $rpassword);
    mysqli_stmt_execute($login_query_run);

    // Get the result set from the prepared statement
    $result = mysqli_stmt_get_result($login_query_run);

    if ($result) {
        // Use mysqli_fetch_array on the result set
        if ($userdata = mysqli_fetch_array($result)) {
            $_SESSION['auth'] = true;
            $rusername1 = $userdata['rusername'];
            $remail1 = $userdata['remail'];
            $role_as = $userdata['role_as'];

            $_SESSION['auth_user'] = [
                'rusername' => $rusername1,
                'remail' => $remail1
            ];

            $_SESSION['role_as'] = $role_as;

            if ($role_as == 1) {
                redirect('../../phpp/admin/index.php', 'Welcome to Dashboard');
            } else {
                redirect('../../view/index.php', 'Logged in successfully');
            }
        } else {
            redirect('../../view/login.php', 'Invalid Credentials');
        }
    } else {
        // Handle the case where there is an error with the prepared statement
        echo "Error executing prepared statement: " . mysqli_stmt_error($login_query_run);
    }

    // Close the prepared statement
    mysqli_stmt_close($login_query_run);
}

?>