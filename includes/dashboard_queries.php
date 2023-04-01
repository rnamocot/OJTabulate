<?php
require_once('../config/mydb.php');
$conn = connectionDBlocal();

function getUserid($username){
    global $conn;
    $sql = "SELECT ojt_teachers_id FROM ojt_teachers WHERE ojt_teachers_username='$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
    }
    return $row['ojt_teachers_id'] ;
}
/*
function getEmployer($user_id){
    global $conn;
    $sql = "SELECT ojt_employee_name,ojt_employee_supervisor, ojt_employee_phone, ojt_employee_email,ojt_employee_address FROM ojt_employee WHERE ojt_teachers_id='$user_id'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["ojt_employee_name"]."</td><td>".$row["ojt_employee_supervisor"]."</td><td>".$row["ojt_employee_phone"]."</td><td>".$row["ojt_employee_email"]."</td><td>".$row["ojt_employee_address"]."</td></tr>";
        }
    } else {
        echo "<p>No Employer listed..</p>";
    }
}
*/
function getEmployers($user_id){
    global $conn;
    $sql = "SELECT ojt_employee_name,ojt_employee_status,ojt_employee_supervisor, ojt_employee_phone, ojt_employee_email,ojt_employee_address FROM ojt_employee WHERE ojt_teachers_id='$user_id'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    return $result;
}
function getTeacherprofile($user_id){
    global $conn;
    $sql = "SELECT * FROM ojt_teachers WHERE ojt_teachers_id='$user_id'";
    $result = mysqli_query($conn, $sql); 
    return $result->fetch_assoc();
}


?>