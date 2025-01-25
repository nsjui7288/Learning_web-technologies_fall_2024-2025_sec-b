<?php
    session_start();
    
    require_once('../model/doctorModel.php'); 

    if(isset($_POST['submit'])){
        
        $username  = trim($_REQUEST['username']);
        $email     = trim($_REQUEST['email']);
        $phone     = trim($_REQUEST['phone']);
        $password  = trim($_REQUEST['password']);

        
        if(empty($username) || empty($email) || empty($phone) || empty($password)){
            echo "Null data found!";
        } else {
        
            $status = doctorLogin($username, $email, $phone, $password);
            if ($status){
                setcookie('flag', 'true', time()+3600, '/');
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                $_SESSION['phone'] = $phone;
                header('location: ../view/home.php');
            } else {
                echo "Invalid user";
            }
        }
    } else {
    
        header('location: ../view/login.html');
    }
?>
