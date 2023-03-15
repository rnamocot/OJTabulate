<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit();
}
$username = $_SESSION['username'];
require_once '../includes/dashboard_queries.php';
$user_id = getUserid($username);
$teacher_row = getTeacherprofile($user_id);
?>

<?php
                                          // Edit Profile details
// Check if the form has been submitted
if (isset($_POST['btn-edit-profile'])) {
    // Get the form data
    $fullname = $_POST['fullname'];
    $tusername = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // Update the employee in the database
    $sql = "UPDATE ojt_teachers SET ojt_full_name='$fullname',ojt_teachers_username	='$tusername',ojt_teachers_phone='$phone', ojt_teachers_email='$email' WHERE ojt_teachers_username='$username'";
    $result = mysqli_query($conn, $sql);

    // Check if the update was successful
    if ($result) {
        header("Location: ../dashboard/teacher.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {

    // Get the employee from the database
    $sql = "SELECT ojt_full_name,ojt_teachers_username,ojt_teachers_email,ojt_teachers_phone FROM ojt_teachers WHERE ojt_teachers_username='$username'";
    $result = mysqli_query($conn, $sql);

    // Check if the employee was found
    if (mysqli_num_rows($result) == 1) {
        // Get the employee data
        $row = mysqli_fetch_assoc($result);
        $fullname = $row['ojt_full_name'];
        $tusername = $row['ojt_teachers_username'];
        $phone = $row['ojt_teachers_phone'];
        $email = $row['ojt_teachers_email'];
    } else {
        echo "Details not found.";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OJT - Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../public/assets/edit_profile.css">
    <link rel="stylesheet" href="../public/assets/dashboard.css">
    <link rel="icon" type="image/x-icon" href="../public/images/logo.jpg">
</head>

<body>
    <div class="sidebarleft expand">
        <div class="nav-header">
            <p class="logo">
                <img src="../public/images/logo.jpg" class="dashboard-logo" alt="Logo" /> <br>
                <span class="db-username" style="color:#1e35cc;">Dashboard</span>
            </p>
            <i class="bx bx-menu-alt-right btn-menu"></i>
        </div>
        <ul class="nav-links">
            <!-- <li>
                <a href="#profile" onclick="showContent('profile')" class="active">
                    <i class='bx bx-user'></i>
                    <span class="title">My profile</span>
                </a>
                <span class="tooltip">My profile</span>
            </li> -->
            <li>
                <a href="#student-employer" onclick="showContent('student-employer')" class="active">
                    <i class='bx bx-user'></i>
                    <span class="title">Student Employer</span>
                </a>
                <span class="tooltip">Student Employer</span>
            </li>
            <li>
                <a href="#students" onclick="showContent('students')" class="active">
                    <i class='bx bx-street-view'></i>
                    <span class="title">My Students</span>
                </a>
                <span class="tooltip">My Students</span>
            </li>
            <li>
                <a href="#qr-code" onclick="showContent('qr-code')" class="active">
                    <i class='bx bx-qr-scan'></i>
                    <span class="title">QR Code</span>
                </a>
                <span class="tooltip">QR Code</span>
            </li>
            <li>
                <a href="#setting" onclick="showContent('setting')" class="active">
                    <i class="bx bx-cog"></i>
                    <span class="title">Profile Settings</span>
                </a>
                <span class="tooltip">Profile Settings</span>
            </li>
            <li>
                <a href="../logout.php" onclick="showLogoutModal()" class="active">
                    <i class='bx bx-power-off'></i>
                    <span class="title">Logout</span>
                </a>
                <span class="tooltip">Logout</span>
            </li>
        </ul>
        <!-- Logout button -->
    </div>
    <!-- Right Side Contents -->
    <div class="main-db-right db-right-content">
        <div class="db-right-header">
            <div id="default-content">
                <div class="profile-col">
                    <div class="profile-row-2">
                        <h2>Employer details</h2>
                        <table>
                            <tr>
                                <th>Employee Name</th>
                                <th>Supervisor Name</th>
                                <th>Phone </th>
                                <th>Email</th>
                                <th>Address</th>
                            </tr>
                            <!-- call the getEmployer method to display employee data -->
                            <?php getEmployer($user_id);?>
                        </table>
                    </div>
                </div>
            </div>
            <!-- employer section -->
            <section id="student-employer">
                <h1>Your Students Employer Details</h1>
                <div class="table-header">
                    <input class="form-control search-box" type="text" placeholder="Search name...">
                </div>
                <table>
                    <tr>
                        <th>Employee Name</th>
                        <th>Supervisor Name</th>
                        <th>Phone </th>
                        <th>Email</th>
                        <th>Address</th>
                    </tr>
                    <!-- call the getEmployer method to display employee data -->
                    <?php getEmployer($user_id);?>
                </table>
            </section>
            <!-- END - Employer section -->
            <section id="students">
                <h1>Students Content</h1>
                <p>Here are the students.</p>
            </section>
            <!-- QR CODE RIGHT SIDE CONTENT -->
            <section id="qr-code">
                <div class="qr-db-content">
                    <h1>Your generated link</h1>
                    <h4><span style="color:#0D6EFD;">Note:</span> This qr code has a unique link for ojt's employer
                        details
                        registration
                    </h4>
                    <?php
function generateQRCodeLink($url, $user_id)
{
    // Append the username to the URL
    $url .= '?teacher=' . urlencode($user_id); //username is from session
    // Generate QR code using qrcode.js library
    echo '<div id="qrcode"></div>';
    echo '<script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>';
    echo '<script>';
    echo 'new QRCode(document.getElementById("qrcode"), "' . $url . '");';
    echo '</script>';
    // Add save button to download QR code image
    echo '<button id="save_btn">Save QR Code</button>';
    // JavaScript to save QR code image when "Save QR Code" button is clicked
    echo '<script>';
    echo 'var saveBtn = document.getElementById("save_btn");';
    echo 'var canvas = document.querySelector("canvas");';
    echo 'saveBtn.addEventListener("click", function() {';
    echo 'var dataUrl = canvas.toDataURL();';
    echo 'var filename = "QR Code.png";';
    echo 'saveBtn.innerHTML = "Downloading...";';
    echo 'saveBtn.disabled = true;';
    echo 'var link = document.createElement("a");';
    echo 'link.download = filename;';
    echo 'link.href = dataUrl;';
    echo 'link.click();';
    echo 'saveBtn.innerHTML = "Save QR Code";';
    echo 'saveBtn.disabled = false;';
    echo '});';
    echo '</script>';
}
generateQRCodeLink('https://ojtabulate.com/employee-registration.php', $user_id);
?>
                </div>
            </section>
            <section id="setting">
                <h1>Account Details</h1>
                <div class="profile-row-1">
                    <h1>Profile</h1> <br>
                    <h4><span class="profile-info">Name:</span><?php echo $teacher_row['ojt_full_name']; ?></h4> <br>
                    <h4><span class="profile-info">Username:</span><?php echo $teacher_row['ojt_teachers_username']; ?>
                    </h4> <br>
                    <h4><span class="profile-info">Phone:</span> <?php echo $teacher_row['ojt_teachers_phone']; ?> </h4><br>
                    <h4><span class="profile-info">Email:</span><?php echo $teacher_row['ojt_teachers_email']; ?></h4>
                    <br>
                    <button class="trigger btn-btn-primary" id="btn-edit-profile">Edit</button>
                    <br>
                </div>
                <!-- Modal -->
                <div class="modal">
                    <div class="modal-content">
                        <span class="close-button">&times;</span>
                        <div class="employe-edit-div">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-7 employee-form">
                                        <div class="employee-heading">
                                            <h2>Profile Details</h2>
                                        </div>
                                        <form method="POST" action="">
                                            <?php

                                               echo "
                                                        <div class='form-group'>
                                                        <label for='fullname'>Fullname</label>
                                                        <input type='text' class='form-control'  name='fullname' value='$fullname' >
                                                    </div>
                                                        <div class='form-group'>
                                                            <label for='username'>Username:</label>
                                                            <input type='text' class='form-control'  name='username' value='$tusername'>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label for='phone'>Phone</label>
                                                            <input type='tel' class='form-control'  name='phone' value='$phone'>
                                                        </div>
                                                        <div class='form-group'>
                                                            <label for='email'>Email</label>
                                                            <input type='email' class='form-control'  name='email' value='$email'>
                                                        </div>
                                                        <button type='submit' id='btn-edit-profile' name='btn-edit-profile' >Submit</button>
                                                        ";
                                                ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <script>
                const modal = document.querySelector(".modal");
                const trigger = document.querySelector(".trigger");
                const closeButton = document.querySelector(".close-button");

                function toggleModal() {
                    modal.classList.toggle("show-modal");
                }

                function windowOnClick(event) {
                    if (event.target === modal) {
                        toggleModal();
                    }
                }

                trigger.addEventListener("click", toggleModal);
                closeButton.addEventListener("click", toggleModal);
                window.addEventListener("click", windowOnClick);
                </script>
                <!--- END - Modal -->
            </section>
        </div>
    </div>
    <script src="../public/assets/jscodes.js" async defer></script>
    <!-- Qr code -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcode-generator/1.4.4/qrcode.min.js"></script>
</body>

</html>