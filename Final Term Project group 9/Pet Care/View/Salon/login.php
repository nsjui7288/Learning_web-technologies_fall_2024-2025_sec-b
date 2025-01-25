<?php
session_start();

if (isset($_SESSION['auth']))
{
    $_SESSION['message'] = "You are already logged in";
    header('Location: index.php');
    exit();
}


include('includes/header.php');
?>

<!-- <style>
    .card {
        max-width: 450px; /* Adjust the maximum width as needed */
        margin: 0 auto;
    }

    .form-label {
        font-size: 12px; /* Reduce the font size for labels */
    }

    .form-control {
        padding: 7px; /* Reduce the padding for form controls */
        font-size: 12px; /* Reduce the font size for form controls */
    }
</style> -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- <script src="login.js"></script> -->
    <!-- <script src="assets/js/login.js"></script> -->
</head>

<body>

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <?php
                if(isset($_SESSION['message']))
                {
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey</strong> <?= $_SESSION['message'] ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    unset($_SESSION['message']);
                }
                ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Login From</h4>
                        </div>
                        <div class="card-body">
                            <form action="../controllers/functions/authcode.php" method="post" novalidate autocomplete="on" >
                   <!-- onsubmit="return isValidRegisterForm(this);" -->
                                <div class="mb-3">
                                    <label for="remail" class="form-label">Email Address</label>
                                    <input type="email" name="remail" class="form-control" id="remail"
                                        placeholder="Enter your email address">
                                    <span id="emailErrMsg" class="form-text text-danger"></span>
                                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                </div> -->
                                </div>


                                <div class="mb-3">
                                    <label for="rpassword" class="form-label">Password</label>
                                    <input type="password" name="rpassword" class="form-control" id="rpassword"
                                        placeholder="Enter your password">
                                    <span id="passwordErrMsg" class="form-text text-danger"></span>
                                </div>

                                <!-- <div class="mb-3">
                                <a href="forgot_password.php">Forgot Password?</a>
                            </div> -->


                                <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
                            </form>
                            <div class="mb-3">
                                <!-- <a href="admin/forget_password.php">Forgot Password?</a> -->
                                <a href="forget_password.php">Forgot Password?</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <?php include('includes/footer.php'); ?>

</body>

</html>