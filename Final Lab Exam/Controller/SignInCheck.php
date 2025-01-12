<?php
session_Start();
require_once ('validation.php');
require_once ('../model/userModel.php');
$userName=$_POST['userName'];
$password=$_POST["password"];

if(!isset($_POST['SignIn'])) {header('location: ../view/SignIn.php');}
if(empty($email)) {
    header("location: ../view/SignIn.php?errorMsgUserName=Field is empty&userName={$userName}&submit=true"); 
    exit();
}
else{
    if(!isValidUserName($userName)){
        header("location: ../view/SignIn.php?errorMsg=invalidUserName&userName={$userName}&submit=true"); 
        exit();
    }
}
if(empty($password)) {
    header("location: ../view/SignIn.php?errorMsgPassword=Field is empty&firstName={$firstName}&lastName={$lastName}&userName={$userName}&email={$email}&phone={$phone}&submit=true"); 
    exit();
}
else{
    if(!isValidPassword($password)){
        header("location: ../view/SignIn.php?errorMsg=invalidPassword&firstName={$firstName}&lastName={$lastName}&userName={$userName}&email={$email}&phone={$phone}&submit=true"); 
        exit();
    }
}
if(logIn($userName,$password)){
    $user=getUser($userName);
    $_SESSION['loggedIn']=true;
    $_SESSION['userName']=$user['userName'];
    $_SESSION['user']=$user;
    $_SESSION['role']=$user['role'];
    setcookie('loggedIn', true, time()+10000000000, '/');
    setcookie('userName', $userName, time()+10000000000, '/');
    if($_SESSION['role']==='admin'){
        header("location:../view/AdminDashboard.php?userName={$user['userName']}");
        exit();
    }
    
    else{
        header("location: ../view/DashBoard.php?userName={$user['userName']}");
        exit();
    }
    
    
}
else{
    header("location: ../view/SignIn.php?errorMsg=invalidUser");
}
?>