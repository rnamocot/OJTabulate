<?php
require_once('../config/mydb.php');
$conn = connectionDBlocal();

function getTeacherUsers(){
    global $conn;
    $sql = "SELECT ojt_teachers_id, ojt_full_name, ojt_teachers_username, ojt_teachers_email, ojt_teachers_phone FROM ojt_teachers";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    return $result;
}

function getEmployers(){
    global $conn;
    $sql = "SELECT ojt_employee_id,ojt_employee_name, ojt_employee_supervisor, ojt_employee_phone, ojt_employee_email,ojt_employee_address	 FROM ojt_employee";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    return $result;
}

function getStudents(){
    global $conn;
    $sql = "SELECT ojt_students_id,ojt_students_username,ojt_students_name,ojt_students_email,ojt_students_phone FROM ojt_students";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    return $result;
}
function adminlogin($username){
    global $conn;
    $sql = "SELECT ojt_admin_id,ojt_admin_username,ojt_admin_password FROM ojt_admin WHERE ojt_admin_username='$username'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result); // fetch the data from the result set
    return $row; // return the data as an array
}

function getUserid($username){
    global $conn;
    $sql = "SELECT ojt_admin_id FROM ojt_admin WHERE ojt_admin_username='$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
    }
    return $row['ojt_admin_id'] ;
}

?>