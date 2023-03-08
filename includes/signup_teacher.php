<?php
// start session
session_start();
// check if user already logged in
if (isset($_SESSION["teacher_username"])) {
    header("Location: ./dashboard/teacher.php");
  exit();
}
include_once "/config/mydb.php";
$conn=connectionDBlocal();
// check if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // get form input values
  $username = $_POST["username"];
  $password = $_POST["password"];
  $confirm_password = $_POST["confirm_password"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  // check if username already exists
  $query = "SELECT * FROM ojt_teachers WHERE ojt_teachers_username = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows > 0) {
    $error = "Username already taken.";
  } elseif ($password != $confirm_password) {
    // check if password and confirm_password inputs match
    $error = "Passwords do not match.";
  } else {
    // if username available and passwords match, insert new teacher into table
    $query = "INSERT INTO ojt_teachers (ojt_teachers_username, ojt_teachers_password, ojt_teachers_email, ojt_teachers_phone) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $username, $password, $email, $phone);
    $stmt->execute();
    $stmt->close();
    // set session variable and redirect to dashboard
    $_SESSION["teacher_username"] = $username;
    header("Location: ./dashboard/teacher.php");
    exit();
  }
}
?>

