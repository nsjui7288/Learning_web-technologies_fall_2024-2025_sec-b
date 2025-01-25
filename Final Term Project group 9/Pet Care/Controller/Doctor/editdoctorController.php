<?php

require_once('../model/doctorModel.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (isset($_GET['id'])) {
        $doctorId = $_GET['id'];

        $doctor = getDoctorById($doctorId);

        if ($doctor) {
            
            include('../view/editdoctor.php');
        } else {
            echo "Doctor not found.";
        }
    } else {
        echo "No doctor ID provided.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    
    $doctorId = trim($_POST['id']);
    $firstName = trim($_POST['first_name']);
    $lastName = trim($_POST['last_name']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $licenseNumber = trim($_POST['license_number']);
    $specialization = trim($_POST['specialization']);
    $yearsOfExperience = trim($_POST['years_of_experience']);


    if (
        empty($doctorId) || empty($firstName) || empty($lastName) || empty($username) ||
        empty($email) || empty($phone) || empty($licenseNumber) || empty($specialization) ||
        empty($yearsOfExperience)
    ) {
        echo "All fields are required.";
    } else {
     
        $status = updateDoctor(
            $doctorId,
            $firstName,
            $lastName,
            $username,
            $email,
            $phone,
            $licenseNumber,
            $specialization,
            $yearsOfExperience
        );

        if ($status) {
            header('Location: ../view/doctorlist.php'); 
        } else {
            echo "Failed to update doctor information.";
        }
    }
} else {
    echo "Invalid request method.";
}

?>
