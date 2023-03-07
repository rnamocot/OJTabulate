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
}?>