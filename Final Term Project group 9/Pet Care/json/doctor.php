<?php

    //$data = $_REQUEST['mydata'];
    //$std = json_decode($data);
    //echo "Your name is: {$std->name}";

    $doctor = ['name'=>'tasnim', 'email'=>'tasnims285@gmail.com', 'password'=>'12345678'];
    $jsondata = json_encode($doctor);
    echo $jsondata;
?>  