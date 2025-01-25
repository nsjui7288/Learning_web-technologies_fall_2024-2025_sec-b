<?php 
session_start();
require_once("../model/AuthModel.php");


if(isset($_POST["submit"])){
    $email = $_POST['email'];
    $password = $_POST['password']; 

    if($email == '' || $password == ''){
        
        echo "Please provide email & password";
    }

    else{
        $user = login($email,$password);
        if($user)
        {
           
            if($user["role"] == "customer")
            {
                $_SESSION['id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['email'] = $user['email'];
                header("location:../view/home.php");
            }
            
            else{
                echo "Exception Operation";
            }
        }
        else{
            echo "email or password do not exist!";
        }
    
    }



}
else{
    echo("Invalid Entry");
}

?>