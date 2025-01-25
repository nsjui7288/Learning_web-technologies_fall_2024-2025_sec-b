<?php

require_once("../../Controllers/Doctor/doctorAppointmentController.php")
$appointments = getAllDoctorsAppointments(); 
?>

<!DOCTYPE html>
<head>

   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Appointments</title>
</head>
<body>

    <h2>Doctor Appointment Management</h2>

    <?php if (count($appointments) > 0): ?>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Appointment ID</th>
                    <th>Pet Name</th>
                    <th>Doctor Name</th>
                    <th>Appointment Date</th>
                    <th>Appointment Time</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($appointments as $appointment): ?>
                    <tr>
                        <td><?php echo $appointment['appointment_id']; ?></td>
                        <td><?php echo $appointment['pet_name']; ?></td>
                        <td><?php echo $appointment['doctor_name']; ?></td>
                        <td><?php echo $appointment['appointment_date']; ?></td>
                        <td><?php echo $appointment['appointment_time']; ?></td>
                        <td><?php echo $appointment['reason']; ?></td>
                        <td><?php echo ucfirst($appointment['status']); ?></td>
                        <td>
                            <?php if ($appointment['status'] === 'pending'): ?>
                                <form method="POST" action="../../Controllers/Doctor/appointmentActionController.php">
                                    <input type="hidden" name="appointment_id" value="<?php echo $appointment['appointment_id']; ?>">
                                    <button type="submit" name="action" value="confirm">Confirm</button>
                                    <button type="submit" name="action" value="reject">Reject</button>
                                </form>
                            <?php else: ?>
                                <span><?php echo ucfirst($appointment['status']); ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No appointments available at the moment.</p>
    <?php endif; ?>

</body>
</html>
