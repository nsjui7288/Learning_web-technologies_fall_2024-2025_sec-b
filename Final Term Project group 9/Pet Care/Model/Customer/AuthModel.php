<?php
require_once("db.php");
function register_customer($name,$email,$password,$phone)
{
    $role = "customer";
    $con = connection();
    $sql1 = "INSERT INTO customer(name,email,password,phone,role)
             VALUES('$name','$email','$password','$phone','$role')";

    $status1 = mysqli_query($con,$sql1);
    if($status1){
        return true;
    }
    else{
        return false;
    }
}   

function login($email,$password)
{
    $sql1 ="SELECT * 
    FROM customer
    WHERE email = '$email' AND password = '$password'";
    $con = connection();
    $rowCustomer = mysqli_query($con,$sql1);

    if(mysqli_num_rows($rowCustomer)> 0)
    {
        return mysqli_fetch_assoc($rowCustomer);
    }

    else{
        return false;
    }
}
    

function get_user_data($user_id) {
    $con = connection();
    $sql = "SELECT * FROM customer WHERE id = '$user_id'";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_assoc($result);
}


function update_user_data($user_id, $name, $email, $phone) {
    $con = connection();
    $sql = "UPDATE customer SET name = '$name', email = '$email', phone = '$phone' WHERE id = '$user_id'";
    return mysqli_query($con, $sql);
}

function appointment($name,$date,$pet_type,$status)
{
    $con = connection();
    $sql2 = "INSERT INTO appointment(customer_name,date,pet_type,status)
             VALUES('$name','$date','$pet_type','$status')";

    $status1 = mysqli_query($con,$sql2);
    if($status1){
        return true;
    }
    else{
        return false;
    }
}   

?>