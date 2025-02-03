<?php
    session_start();
    if(!isset($_COOKIE['status'])){
        header('location: adminSignup.html');
    }
?>

<html>
<head>
    <title>HOME Page</title>
</head>
<body>
        <h1>Welcome Home!</h1>
        <a href='view_users.php' > View All </a> | 
        <a href='../controller/logout.php' > logout </a>
</body>
</html>