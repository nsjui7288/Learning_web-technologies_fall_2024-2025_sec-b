<?php
session_start();
require_once("../model/AuthModel.php");
if (!isset($_SESSION['id']) || !isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
$userName = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome to Pet Care, <?php echo htmlspecialchars($userName); ?>!</h2>
    <hr><br>
    <fieldset>
        <legend>How Can We Help You?</legend>
        <a href="ProductList.php">View Product List</a> <br>
        <a href="updatecustomerprofile.php">Update Profile</a> <br>
        <a href="salonBooking.html">Book Salon Appointment</a> <br>
        <a href="doctorappointment.php">Book Doctor's Appointment</a> <br>
        <a href="../controller/logout.php">Logout</a>
    </fieldset>
    <br>
    <a href="dashboard.php">See Dashboard</a> <br>
    <a href="searchProduct.php">Search Product from Product List</a> <br>
    <a href="leaveReview.php">Leave a Review</a> <br>
</body>
</html>

