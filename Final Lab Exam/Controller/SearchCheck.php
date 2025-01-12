<?php
include_once('../model/employeesModel.php');
$userName = $_POST['search'];
$employees = getSearchEmployeesByUserName($userName);
echo json_encode($employees);
?>