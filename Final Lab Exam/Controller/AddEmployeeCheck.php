<?php
session_start();
if(!isset($_SESSION['loggedIn'])) {header('location: ../view/SignIn.php');}
$employeeName=$_POST['employeeName'];
$contactNo=$_POST['contactNo'];
$userName=$_POST['userName'];
$password=$_POST['password'];
if(!isset($_POST['submit'])){
    header('location:../view/ManageEmployee.php?addStatus=false');
    exit();
}
if(empty($employeeName) || empty($contactNo) || empty($userName) || empty($password)){
    header('location:../view/AddEmployee.php?addStatus=false');
    exit();
}
else{
    $status = addEmployee($employeeName,$contactNo,$userName,$password);
    if($status){
        header('location:../view/ManageEmployee.php?addSuccess=true');
    }
    else{
        header('location:../view/ManageEmployee.php?');
    }
}

?>