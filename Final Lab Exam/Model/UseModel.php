<?php
require_once ('db.php');
function isUserExist($userName,$email){
    $con=dbConnection();
    $sql="SELECT * FROM users WHERE userName='{$userName}' AND email='{$email}'";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
        return true;
    }
    else{
        return false;
    }

}
function addUser($userName, $firstName, $lastName, $email, $phone, $gender,$district, $address, $password, $role, $profileLocation)
{
        
    $con = dbConnection();
    $sql = "INSERT INTO users (userName,firstName,lastName,email,phone,gender,district,address,password,role,profile) VALUES(
                                    '{$userName}',
                                    '{$firstName}',
                                    '{$lastName}',
                                    '{$email}',
                                    '{$phone}',
                                    '{$gender}',
                                    '{$district}',
                                    '{$address}',
                                    '{$password}',
                                    '{$role}',
                                    '{$profileLocation}')";

    if(mysqli_query($con, $sql)){
        return true;
    }else {
        mysqli_error($con);
        return false;
    }
}
function logIn($userName,$password){
    $con=dbConnection();
    $sql="SELECT * FROM users WHERE userName='{$userName}' AND password='{$password}'";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
        return true;
    }
    else{
        return false;
    }
}
function getUser($userName){
    $con = dbConnection();
    $sql = "SELECT * from users where userName='{$userName}';";
    
    if($result = mysqli_query($con, $sql)){
        return mysqli_fetch_assoc($result);
    }
    return false;
}


?>