<?php
    require_once("db.php");
    function getConnection(){
        $con = mysqli_connect($id, $name, $email, $password, $phone);
        return $con;
    }

    function login($name, $password){
        $con = getConnection();
        $sql = "UPDATE doctor SET name='$name',
        
         email='$email',

         password='$password',

         phone = '$phone'

    WHERE id=$id";

        $status= mysqli_query($con, $sql);
        $count = mysqli_num_rows(status);

        if($count ==1){
            return true;
        }else{
            return false;
        }
    }

    function addDoctor($id, $name, $email, $password, $phone){
        $con = getConnection();
        $sql = "insert into users VALUES('','{$id}', '{$name}', '{$password}', '{$email}', '{$phone}')";    
        if(mysqli_query($con, $sql)){
            return true;
        }else{
            return false;
        }
    }

    function getDoctor($id){

    }

    function getAllDoctor(){

    }

    function updateDoctor($doctor){

    }

    function deleteDoctor($id){

    }
?>


