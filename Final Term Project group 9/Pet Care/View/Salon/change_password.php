<?php
//session_start();
include("config/dbcon.php");

include('includes/header.php');

?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Your existing HTML code here -->
                <?php
                if (isset($_SESSION['status']))
                    {
                        ?>
                <div class="alert alert-success ">
                    <h5>
                        <? $_SESSION['status'];?>
                    </h5>
                </div>
                <?php
                        unset($_SESSION['status']);
                    }
                ?>

                <div class="card">
                    <div class="card-header">
                        <h4>Change Password
                            <a href="view_profile.php" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="forgot_passVal.php" method="post" novalidate autocomplete="on">
                            <input type="hidden" name="password_token"
                                value="<?php if(isset($_GET['token'])){echo $_GET['token'];}?>">
                            <div class="mb-3">
                                <label for="remail" value="<?php if(isset($_GET['remail'])){echo $_GET['remail'];} ?>"
                                    class="form-label">E-mail Address</label>
                                <input type="email" name="remail" class="form-control" id="remail"
                                    placeholder="Enter your new password">
                            </div>
                            <div class="mb-3">
                                <label for="rpassword" class="form-label">New Password</label>
                                <input type="password" name="rpassword" class="form-control" id="rpassword"
                                    placeholder="Enter your new password">
                            </div>
                            <div class="mb-3">
                                <label for="cpassword" class="form-label">Confirm Password</label>
                                <input type="password" name="cpassword" class="form-control" id="cpassword"
                                    placeholder="Enter your new password">
                            </div>
                            <button type="submit" name="password_update" class="btn btn-primary">Change
                                Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>