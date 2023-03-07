<?php
require_once('./config/mydb.php');
$conn = connectionDBlocal();

function registerUser($username, $password, $email, $phone) {
    global $conn;
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO ojt_teachers (ojt_teachers_username, ojt_teachers_password, ojt_teachers_email, ojt_teachers_phone) VALUES ('$username', '$hash', '$email', '$phone')";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}
function verifyUser($username, $password) {
    global $conn;
    $sql = "SELECT ojt_teachers_password FROM ojt_teachers WHERE ojt_teachers_username='$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['ojt_teachers_password'])) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

?>
