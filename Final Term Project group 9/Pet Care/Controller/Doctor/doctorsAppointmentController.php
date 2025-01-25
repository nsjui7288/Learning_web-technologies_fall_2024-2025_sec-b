<?php
require_once("../../Models/appointmentModel.php");
$appoinments = GetAllAppointment();

?>




<?php
require_once("../../Models/Doctor/appointmentModel.php");

function getAllDoctorAppointments() {
    return getAllDoctorAppointments();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $appointmentId = $_POST['appointment_id'];
    $action = $_POST['action'];

    if ($action === 'confirm') {
        updateAppointmentStatus($appointmentId, 'confirmed');
    } elseif ($action === 'reject') {
        updateAppointmentStatus($appointmentId, 'rejected');
    }
    header("Location: ../../Views/Doctor/appointments.php");
    exit;
}
?>
