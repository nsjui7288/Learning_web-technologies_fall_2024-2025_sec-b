<?php
    require_once('../model/doctorModel.php');

    if (isset($_POST['submit'])) {
        $firstName = trim($_REQUEST['first_name']);
        $lastName = trim($_REQUEST['last_name']);
        $username = trim($_REQUEST['username']);
        $email = trim($_REQUEST['email']);
        $phone = trim($_REQUEST['phone']);
        $password = trim($_REQUEST['password']);
        $confirmPassword = trim($_REQUEST['confirm_password']);
        $licenseNumber = trim($_REQUEST['license_number']);
        $specialization = trim($_REQUEST['specialization']);
        $yearsOfExperience = trim($_REQUEST['years_of_experience']);

        
        if (
            empty($firstName) || empty($lastName) || empty($username) || empty($email) ||
            empty($phone) || empty($password) || empty($confirmPassword) || empty($licenseNumber) ||
            empty($specialization) || empty($yearsOfExperience)
        ) {
            echo "Null data found!";
        } elseif ($password !== $confirmPassword) {
            echo "Passwords do not match!";
        } else {
            $status = addDoctor(
                $firstName,
                $lastName,
                $username,
                $email,
                $phone,
                $password,
                $licenseNumber,
                $specialization,
                $yearsOfExperience
            );

            if ($status) {
                header('location: ../view/login.html');
            } else {
                header('location: ../view/signup.html');
            }
        }
    } elseif (isset($_POST['reset'])) {
        
        header('location: ../view/signup.html');
    } else {
        header('location: ../view/signup.html');
    }
?>
