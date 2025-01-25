<?php
session_start();
//include("../config/dbcon.php");

include('includes/header.php');

?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Your existing HTML code here-->
                <?php
                if(isset($_SESSION['status']))
                {
                    ?>
                <div class="alert alert-success">
                    <h5><?= $_SESSION['status']; ?></h5>
                </div>
                <?php
                    unset($_SESSION['status']);
                }
                ?>

                <div class="card">
                    <div class="card-header">
                        <h4>Forget Password</h4>
                    </div>
                    <div class="card-body">
                        <form action="forgot_passVal.php" method="post" novalidate autocomplete="on">

                            <div class="mb-3">
                                <label for="remail" class="form-label">Email Address</label>
                                <input type="email" name="remail" class="form-control" id="remail"
                                    placeholder="Enter your email address">
                            </div>
                            <button type="submit" name="password_reset_link" class="btn btn-primary">send
                                password_reset_link</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>