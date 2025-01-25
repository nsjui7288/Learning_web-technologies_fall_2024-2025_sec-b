<?php

    if(isset($_REQUEST['username'])){
        echo $_REQUEST['username'];
    }

?>

<html>
<head>
    <title>Edit DoctorPage</title>
</head>
<body>
        <h2>Edit Page</h2>
        <a href='home.php' > Back </a> | 
        <a href='logout.php' > logout </a>
        <br>

        <form method="post" action="editDoctorCheck.php" enctype="">
            Doctor Id: <input type="text" name="doctor_id" value="" /> <br><br>
            Username: <input type="text" required name="username" value="" /> <br>
            Password: <input type="password" name="password" value="" /> <br>
            Email:   <input type="email" name="email" value="" /> <br>
            Phone: <input type="tel" name="phone" value="" pattern="[0-9]{10}" /> <br>
            License Number: <input type="text" name="license_number" value="" /> <br>
            Specialization: <input type="text" name="specialization" value="" /> <br>
            Years of Experience: <input type="number" name="experience" min="0" value="" /> <br>
            <input type="submit" name="submit" value="Submit" />
        </form>
</body>
</html>