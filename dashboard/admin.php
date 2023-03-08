<?php
   session_start();
   if (!isset($_SESSION['username_admin'])) {
       header('Location: ../index.php');
       exit();
   }
   $username = $_SESSION['username_admin'];
   require_once ('../includes/admin_dashboard_queries.php');
   $teacher_row=getUserid($username)
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
    <link rel="stylesheet" href="../public/assets/dashboard.css">
    <link rel="icon" type="image/x-icon" href="../public/images/logo.jpg">
    <script src="../public/assets/jscodes.js" async defer></script>
    <!-- Qr code -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcode-generator/1.4.4/qrcode.min.js"></script>
</head>

<body>
    <div class="sidebarleft expand">
        <div class="nav-header">
            <p class="logo">
                <img src="../public/images/logo.jpg" class="dashboard-logo" alt="Logo" /> <br>
                <span class="db-username" style="color:#1e35cc;">Admin Dashboard</span>
            </p>
            <i class="bx bx-menu-alt-right btn-menu"></i>
        </div>
        <ul class="nav-links">
            <li>
                <a href="#supervisor" onclick="showContent('supervisor')" class="active">
                    <i class='bx bx-spreadsheet'></i>
                    <span class="title">Supervisor</span>
                </a>
                <span class="tooltip">Supervisor</span>
            </li>
            <li>
                <a href="#teachers" onclick="showContent('teachers')" class="active">
                    <i class='bx bx-user'></i>
                    <span class="title">Teachers</span>
                </a>
                <span class="tooltip">Teachers</span>
            </li>
            <li>
                <a href="#students" onclick="showContent('students')" class="active">
                    <i class='bx bx-street-view'></i>
                    <span class="title">Students</span>
                </a>
                <span class="tooltip">Students</span>
            </li>
            <li>
                <a href="#settings" onclick="showContent('setting')" class="active">
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
                <div class="profile-col-admin">
                    <div class="profile-row-admin">
                        <h2>Employer details</h2>
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
                        </table>
                    </div>
                </div>
            </div>
            <!-- Supervisor section -->
            <section id="supervisor">
                <h1>Employer Details</h1>
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
                    <?php  getTeacherUsers()  ?> 
                </table>
            </section>
            <!-- END - Supervisor section -->

            <!-- employer section -->
            <section id="teachers">
                <h1>Teachers</h1>
                <div class="table-header">
                    <input class="form-control search-box" type="text" placeholder="Search name...">
                </div>
                <table>
                    <tr>
                        <th>Teacher Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                    <!-- call the Teachers method to display employee data -->
                    <?php  getTeacherUsers()  ?>
                </table>
            </section>
            <!-- END - Employer section -->
            <section id="students">
                <h1>Students Content</h1>
                <p>Here are the students.</p>
            </section>
            <section id="setting">
                <h1>Setting Content</h1>
                <p>Your Profile</p>
                <div class="profile-row-1">
                    <h1>My Information details</h1> <br>
                    <h4><span class="profile-info">Username:</span><?php echo $teacher_row['ojt_admin_username']; ?>
                    </h4> <br>
                    <h4><span class="profile-info">Email:</span><?php echo $teacher_row['ojt_teachers_username']; ?></h4>   
                </div>
            </section>
        </div>
    </div>
</body>

</html>