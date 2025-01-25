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
<script>
// Function to set a cookie
function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

// Function to get a cookie value by name
function getCookie(name) {
    var nameEQ = name + "=";
    var cookies = document.cookie.split(';');
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        while (cookie.charAt(0) == ' ') {
            cookie = cookie.substring(1, cookie.length);
        }
        if (cookie.indexOf(nameEQ) == 0) {
            return cookie.substring(nameEQ.length, cookie.length);
        }
    }
    return null;
}

// Function to load saved form data from cookies
function loadSavedData() {
    var frname = getCookie("frname");
    var lrname = getCookie("lrname");
    var rusername = getCookie("rusername");
    var rgender = getCookie("rgender");
    var rphone = getCookie("rphone");
    var remail = getCookie("remail");

    if (frname) document.getElementById("frname").value = frname;
    if (lrname) document.getElementById("lrname").value = lrname;
    if (rusername) document.getElementById("rusername").value = rusername;
    if (rgender) document.getElementById("rgender").value = rgender;
    if (rphone) document.getElementById("rphone").value = rphone;
    if (remail) document.getElementById("remail").value = remail;
}

// Function to save form data to cookies when "Save as" button is clicked
function saveFormData() {
    setCookie("frname", document.getElementById("frname").value, 30);
    setCookie("lrname", document.getElementById("lrname").value, 30);
    setCookie("rusername", document.getElementById("rusername").value, 30);
    setCookie("rgender", document.getElementById("rgender").value, 30);
    setCookie("rphone", document.getElementById("rphone").value, 30);
    setCookie("remail", document.getElementById("remail").value, 30);
}

// Call loadSavedData() to populate the form fields when the page loads
window.onload = loadSavedData;
</script>


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
    <title>Register</title>
    <!-- <script src="register.js"></script> -->
    <!-- <script src="assets/js/register.js"></script> -->
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
                            <h4>Register From</h4>
                        </div>
                        <div class="card-body">
                            <form action="../controllers/functions/authcode.php" method="post" novalidate
                                autocomplete="on">
                                <div class="mb-3">
                                    <label for="frname" class="form-label">First Name </label>
                                    <input type="text" name="frname" class="form-control" id="frname"
                                        placeholder="Enter your first name">
                                    <span id="firstNameErrMsg"></span>

                                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                </div> -->
                                </div>

                                <div class="mb-3">
                                    <label for="lrname" class="form-label">Last Name </label>
                                    <input type="text" name="lrname" class="form-control" id="lrname"
                                        placeholder="Enter your last name">
                                    <span id="lastNameErrMsg" class="form-text text-danger"></span>

                                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                </div> -->
                                </div>


                                <div class="mb-3">
                                    <label for="rusername" class="form-label">User Name </label>
                                    <input type="text" name="rusername" class="form-control" id="rusername"
                                        placeholder="">
                                    <span id="userNameErrMsg" class="form-text text-danger"></span>

                                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                </div> -->
                                </div>

                                <div class="mb-3">
                                    <label for="rgender" class="form-label">Gender</label>
                                    <select class="form-select" id="rgender" name="rgender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <span id="genderErrMsg" class="form-text text-danger"></span>
                                </div>



                                <div class="mb-3">
                                    <label for="rphone" class="form-label">Phone </label>
                                    <input type="phone" name="rphone" class="form-control" id="rphone"
                                        placeholder="Enter your phone number">
                                    <span id="phoneErrMsg" class="form-text text-danger"></span>
                                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                </div> -->
                                </div>



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
                                        placeholder="">
                                    <span id="passwordErrMsg" class="form-text text-danger"></span>
                                </div>

                                <div class="mb-3">
                                    <label for="cpassword" class="form-label"> Confirm Password</label>
                                    <input type="password" name="cpassword" class="form-control" id="cpassword"
                                        placeholder="">
                                    <span id="confirmPasswordErrMsg" class="form-text text-danger"></span>
                                    <!-- <span id="confirmPasswordErrMsg" class="form-text text-danger"></span> -->
                                </div>




                                <button type="submit" name="register_btn" class="btn btn-primary">Submit</button>
                                <button type="button" onclick="saveFormData()" class="btn btn-secondary">Save
                                    as</button>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <?php include('includes/footer.php'); ?>

</body>

</html>