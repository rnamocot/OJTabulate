<?php
    // Connect to the database
require_once('../config/mydb.php');
$conn = connectionDBlocal();

    // Check if the form has been submitted
    if (isset($_POST['btn-edit'])) {
        // Get the form data
        $id = $_POST['id'];
        $status = $_POST['status'];
        $employeename = $_POST['employeename'];
        $supervisorname = $_POST['supervisorname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];

        // Update the employee in the database
        $sql = "UPDATE ojt_employee SET ojt_employee_status='$status',ojt_employee_name='$employeename', ojt_employee_supervisor='$supervisorname', ojt_employee_phone='$phone', ojt_employee_email='$email', ojt_employee_address='$address' WHERE ojt_employee_id=$id";
        $result = mysqli_query($conn, $sql);

        // Check if the update was successful
        if ($result) {
            header("Location: ../dashboard/admin.php");
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        // Get the employee ID from the URL parameter
        $id = $_GET['id'];

        // Get the employee from the database
        $sql = "SELECT ojt_employee_status, ojt_employee_name, ojt_employee_supervisor, ojt_employee_phone, ojt_employee_email, ojt_employee_address FROM ojt_employee WHERE ojt_employee_id=$id";
        $result = mysqli_query($conn, $sql);

        // Check if the employee was found
        if (mysqli_num_rows($result) == 1) {
            // Get the employee data
            $row = mysqli_fetch_assoc($result);
            $status = $row['ojt_employee_status'];
            $employeename = $row['ojt_employee_name'];
            $supervisorname = $row['ojt_employee_supervisor'];
            $phone = $row['ojt_employee_phone'];
            $email = $row['ojt_employee_email'];
            $address = $row['ojt_employee_address'];
        } else {
            echo "Employee not found.";
        }
    }
    
    // Close the database connection
    mysqli_close($conn);
    ?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OJTabulate - Signup</title>
    <meta name="description"
        content="Our Internship Management program equips you with the skills and knowledge to effectively manage and develop successful internship programs. Learn practical strategies and gain valuable insights to help you optimize the intern experience and maximize organizational benefits. Join us today to elevate your internship management game!">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link href="../public/assets/edit_employee.css" rel="stylesheet">
    <link href="../public/assets/style.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../public/images/logo.jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg ">
        <div class="container ">
            <a class="navbar-brand" href="../index.php">
                <img src="../public/images/logo.jpg" class=" mainlogo" alt="Logo" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav ">
                    <a class="nav-link active" aria-current="page" href="#">About</a>
                    <a class="nav-link" href="#">Features</a>
                    <a class="nav-link" href="#">Pricing</a>
                    <a href="../signup.php" class="nav-link nav-signup" >Sign up</a>
                </div>
            </div>
        </div>
    </nav>

<div class="employe-edit-div">
        <div class="container">
            <div class="row">
                <div class="col-md-7 employee-form">
                    <div class="employee-heading">
                    <h2>Edit Supervisor Details</h2>
                    </div>
                    <form method="POST" action="edit_employee.php">
                        <?php
                        echo"
                         <input type='hidden' name='id' value='$id'>
                        <div class='form-group'>
                            <label for='status'>Status:</label>
                            <select class='form-control' name='status'>
                            <option value='No Status'>Select Status</option>
                            <option value='Contacted'>Contacted</option>
                            <option value='Appointment met'>Appointment Met</option>
                            <option value='Nurtured'>Nurtured</option>
                            <option value='Trash'>Trash</option>
                            </select>
                        </div>
                        <div class='form-group'>
                        <label for='employeeName'>Employee Name:</label>
                        <input type='text' class='form-control'  name='employeename' value='$employeename' >
                    </div>
                        <div class='form-group'>
                            <label for='yourName'>Supervisor Name:</label>
                            <input type='text' class='form-control'  name='supervisorname' value='$supervisorname'>
                        </div>
                        <div class='form-group'>
                            <label for='phone'>Phone #:</label>
                            <input type='tel' class='form-control'  name='phone' value='$phone'>
                        </div>
                        <div class='form-group'>
                            <label for='email'>Email:</label>
                            <input type='email' class='form-control'  name='email' value='$email'>
                        </div>
                        <div class='form-group'>
                            <label for='address'>Address:</label>
                            <input class='form-control'  name='address' rows='3' value='$address'></input>
                        </div>
                        <button type='submit' name='btn-edit' >Edit</button>
                        ";
                        ?>
                    </form>
                </div>
                <div class="col-md-5">
                <div class="employee-img-div">
                        <img src="../public/images/employee.jpg" class="employee-img" alt="Employee - OJT" />
                </div>
                <div class="btn-go-home">
                <a href="../dashboard/admin.php">Go back to Admin dashbaord</a>
                </div>
                </div>
            </div>

        </div>
    </div>
    <footer>
        <div class="container">
            <div class="footer-sec">
                <div class="row">
                    <div class="col-md-3">
                        <div class="footer-logo-col">
                            <a class="footer-logo" href="#">
                                <img src="../public/images/logo.jpg" class="d-inline-block align-text-top mainlogo"
                                    alt="Logo" />
                            </a>
                            <p>Our Internship Management program equips you with the skills and knowledge to effectively
                                manage and develop successful internship programs.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-links">
                            <h3>Quick Links</h3>
                            <ul>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Features</a></li>
                                <li><a href="#">Features</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Sitemap</a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-links">
                            <h3>Contacts</h3>
                            <div class="footer-contact-list">
                                <a href="">Phone: 000-000-0000</a><br>
                                <a href="">Email: companyemal@domain.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-links">
                            <h3>Socials</h3>
                            <div class="social-logos-footer">
                                <a href="#" class="fa fa-facebook"></a>
                                <a href="#" class="fa fa-twitter"></a>
                                <a href="#" class="fa fa-instagram"></a>
                                <a href="#" class="fa fa-linkedin"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyrights">
                <p>© 2023 Company, Inc. All Rights Reserved</p>
            </div>
        </div>
    </footer>
</body>

</html>
    
