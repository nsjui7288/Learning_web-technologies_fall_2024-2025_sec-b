<?php
    session_start();
    require_once('../model/userModel.php');
    if(isset($_POST['submit'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if($username == null || empty($password)){
            echo "Null username/password";
        }else {
            $status = login($username, $password);
            if($status){
                setcookie('status', 'true', time()+3000, '/');
                header('location: ../view/adminSignup.html');
            }else{
                echo "Invalid User!";
            }
        }
    }else{
        header('location: ../view/adminLogin.html');
    }
?>