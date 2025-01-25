<?php
require_once("../model/AuthModel.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $pet_type = $_POST['pet'];
    $status = $_POST['status'];

    if($name == '' || $date == '' || $pet_type = '' || $status == '')
    {
        echo "Empty field! Fill all the fields!";
    }
    else
    {
        $user= appointment($name, $date, $pet_type, $status);
        if($user)
        {
            header('location:../view/booked.php');
        }
        else{
            echo "booking failed!";
        }
    }
}
else{
    echo "Invalid entry" ;


}
    
?>
