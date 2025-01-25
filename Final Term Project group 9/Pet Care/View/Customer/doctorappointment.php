<html>
<head>
    <title>Book Doctor Appointment</title>
</head>
<body>
    <h3>Schedule Doctor's Appointment</h3>
    <form method="POST" action="../controller/doctorAppointmentController.php">
        Name: <input type="text" name="name" required /> <br>
        Date: <input type="date" name="date" required /> <br>
        Pet Type: <input type="text" name="pet" required /> <br>
        Status: 
        <input type="radio" name="status" value="pending" required /> Pending
        <input type="radio" name="status" value="confirmed" required /> Confirmed
        <input type="radio" name="status" value="rejected" required /> Rejected
        <br> 
        <input type="submit" value="Book Appointment" />
    </form>
</body>
</html>
