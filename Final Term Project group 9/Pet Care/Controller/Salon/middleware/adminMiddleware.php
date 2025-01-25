<?php
//include('../functions/myfunction.php');
//include('../functions/myfunction.php');
//include('functions/myfunction.php');
include(__DIR__ . '/../functions/myfunction.php');


if(isset($_SESSION['auth'])){
    if($_SESSION['role_as'] !=1 ){
        redirect("../../phpp/admin/index.php",'You are not authorized to access this');
        // $_SESSION['message']="You are not authorized to access this";
        // header('Location: ../index.php');
    }

}else{
    redirect('../../view/login.php','Login to continue');
    // $_SESSION['message'] = "Login to continue";
    // header('Location: ../login.php');
}

?>