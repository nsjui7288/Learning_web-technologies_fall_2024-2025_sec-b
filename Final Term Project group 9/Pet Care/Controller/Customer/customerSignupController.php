<?php
require_once("../model/AuthModel.php");

if(isset($_POST["submit"]))
{
    $name = $_POST["name"]; 
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phone = $_POST["phone"];

    if($name == '' || $email == '' || $phone = '' || $password == '')
    {
        echo "Empty field! Fill all the fields!";
    }
    else
    {
        $user= register_customer($name, $email, $password, $phone);
        if($user)
        {
            header('location:../view/login.php');
        }
        else{
            echo "Signup failed!";
        }
    }
}
else{
    echo "Invalid entry" ;
}




?>