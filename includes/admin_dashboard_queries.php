<?php
require_once('../config/mydb.php');
$conn = connectionDBlocal();

function getTeacherUsers(){
    global $conn;
    $sql = "SELECT * FROM ojt_teachers";
    $result = mysqli_query($conn, $sql); 
    return $result->fetch_assoc();
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["ojt_full_name	"]."</td><td>".$row["ojt_teachers_email"]."</td><td>".$row["ojt_teachers_phone"]."</td><td>"."</td></tr>";
        }
    } else {
        echo "<p>No Employer listed..</p>";
    }
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