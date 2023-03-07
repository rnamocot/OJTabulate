<?php
// Start the session and include the database connection
session_start();
require_once('./config/mydb.php');
$conn = connectionDBlocal();

$teacher_id = isset($_GET['teacher']) ? $_GET['teacher'] : '';

?>
<!-- Get the username value on the url teacher -->
<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-employee-reg'])) {
  // Get the form data
  $employee_name = $_POST['employeename'];
  $supervisor_name = $_POST['supervisorname'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $teacher_id= $_POST['teacher_id'];

  // Insert the data into the database
  $sql = "INSERT INTO `ojt_employee` (`ojt_employee_name`, `ojt_employee_supervisor`, `ojt_employee_phone`, `ojt_employee_email`, `ojt_employee_address`, `ojt_teachers_id`) VALUES ('$employee_name', '$supervisor_name', '$phone', '$email', '$address', '$teacher_id')";
  $result = $conn->query($sql);
  // Check if the query was successful
  if ($result) {
    // Redirect to the dashboard
    header('Location: index.php');
    exit();
  } else {
    // Display an error message
    $error = "Error: " . $conn->error;
    var_dump($error);
  }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OJT - Employee Registration</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Custom stylesheet -->
        <link href="./public/assets/employee.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./public/images/logo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <div class="employe-reg-div">
        <div class="container">
            <div class="row">
                <div class="col-md-7 employee-form">
                    <div class="employee-heading">
                    <h2>Employee Registration Form</h2>
                    </div>
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="employeeName">Employee Name:</label>
                            <input type="text" class="form-control" id="employeeName" name="employeename" required>
                        </div>
                        <div class="form-group">
                            <label for="yourName">Supervisor Name:</label>
                            <input type="text" class="form-control" id="supervisorName" name="supervisorname" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone #:</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input class="form-control" id="address" name="address" rows="3" required></input>
                            <input type="hidden" name="teacher_id" value="<?php echo $teacher_id; ?>">
                        </div>
                        <button type="submit" class="btn-employee-reg" name="btn-employee-reg">Submit</button>
                        <div class="form-message">
                    </div>
                    </form>
                </div>
                <div class="col-md-5">
                <div class="employee-img-div">
                        <img src="./public/images/employee.jpg" class="employee-img" alt="Employee - OJT" />
                </div>
                <div class="btn-go-home">
                <a href="/">Go to homepage</a>
                </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Bootstrap JS -->
</body>

</html>