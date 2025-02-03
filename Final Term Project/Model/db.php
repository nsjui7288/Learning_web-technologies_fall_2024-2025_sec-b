<?php
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
    $sql = "insert into users VALUES('', 'ZZZ', 'zzz', 'xxx@aiub.edu')";
    if(mysqli_query($conn, $sql)){
        echo "Success";
    }else{
        echo "Error";
    }
?>
