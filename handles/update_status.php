<?php
require_once('../config/mydb.php');
$conn = connectionDBlocal();

    // get the new status and the employee ID from the POST data
    $new_status = $_POST['status'];
    $employee_id = $_POST['employee_id'];

    // update the ojt_employee_status column in the database
    $sql = "UPDATE ojt_employee SET ojt_employee_status = '$new_status' WHERE ojt_employee_id = $employee_id";
    if (mysqli_query($conn, $sql)) {
        echo 'Status updated successfully';
    } else {
        echo 'Error updating status: ' . mysqli_error($conn);
    }

    // close the database connection
    mysqli_close($conn);
?>
