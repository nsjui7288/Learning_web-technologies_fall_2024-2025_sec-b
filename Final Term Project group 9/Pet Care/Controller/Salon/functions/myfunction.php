<?php
//ob_start();
//session_start();
include('../../model/config/dbcon.php');

function getAll($table)
{
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);
}

function getByID($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id = ?";
    $stmt = mysqli_prepare($con, $query);

    // Bind the parameter
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);

    return $result;
}

function redirect($url, $message)
{
    // Assuming session_start() has been called before this point
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit();
}
//ob_end_flush();
?>