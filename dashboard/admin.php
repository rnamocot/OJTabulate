<?php
   session_start();
   if (!isset($_SESSION['username_admin'])) {
       header('Location: ../index.php');
       exit();
   }
   $username = $_SESSION['username_admin'];
   require_once ('../includes/admin_dashboard_queries.php');
//    $teacher_row=getUserid($username);

   $ojtTeachers = getTeacherUsers();
   $ojtEmployers=getEmployers();
   $ojtEmployerssecondtab=getEmployers();
   $ojtStudents=getStudents();
   $adminprofile=adminlogin($username);
   
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
    <style>
    #admin-db .db-right-header {
      padding: 20px;
      background-color: #fff;
     border-radius: 10px;
     }
   </style>
    <div class="main-db-right db-right-content" id="admin-db">
        <div class="db-right-header">
            <div id="default-content">
              <h1>OJT Supervisor</h1>
                <div class="table-header">
                    <input class="form-control search-box" type="text" placeholder="Search name...">
                </div>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Employee Name</th>
                        <th>Supervisor Name</th>
                        <th>Phone </th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                    <!-- call the getEmployer method to display employee data -->
                    <?php  
                    while ($row = mysqli_fetch_assoc($ojtEmployers)) {
                        echo "<tr>
                            <td>" . $row['ojt_employee_id'] ."</td>
                            <td>" . $row['ojt_employee_name'] ."</td>
                            <td>" . $row['ojt_employee_supervisor'] . "</td>
                            <td>" . $row['ojt_employee_phone'] . "</td>
                            <td>" . $row['ojt_employee_email'] . "</td>
                            <td>" . $row['ojt_employee_address'] . "</td>
                            <td><a href='../edit/edit_employee.php?id=".$row['ojt_employee_id']."'>Edit</a></td>
                        </tr>";
                    }
                    ?>
                </table>
            </div>
            <!-- Supervisor section -->
            <section id="supervisor">
                <h1>OJT Supervisor</h1>
                <div class="table-header">
                    <input class="form-control search-box" type="text" placeholder="Search name...">
                </div>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Employee Name</th>
                        <th>Supervisor Name</th>
                        <th>Phone </th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                    <!-- call the getEmployer method to display employee data -->
                    <?php  
                    while ($row = mysqli_fetch_assoc($ojtEmployerssecondtab)) {
                        echo "<tr>
                            <td>" . $row['ojt_employee_id'] ."</td>
                            <td>" . $row['ojt_employee_name'] ."</td>
                            <td>" . $row['ojt_employee_supervisor'] . "</td>
                            <td>" . $row['ojt_employee_phone'] . "</td>
                            <td>" . $row['ojt_employee_email'] . "</td>
                            <td>" . $row['ojt_employee_address'] . "</td>
                            <td><a href='../edit/edit_employee.php?id=".$row['ojt_employee_id']."'>Edit</a></td>
                        </tr>";
                    }
                    ?>
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
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                    <!-- call the Teachers method to display employee data -->
                    <?php  
                    while ($row = mysqli_fetch_assoc($ojtTeachers)) {
                        echo "<tr>
                            <td>" . $row['ojt_teachers_id'] . "</td>
                            <td>" . $row['ojt_full_name'] . "</td>
                            <td>" . $row['ojt_teachers_username'] . "</td>
                            <td>" . $row['ojt_teachers_email'] . "</td>
                            <td>" . $row['ojt_teachers_phone'] . "</td>
                        </tr>";
                    }
                    ?>
                </table>
            </section>
            <!-- END - Employer section -->
            <section id="students">
                <h1>Students</h1>
                <input class="form-control search-box" type="text" placeholder="Search name...">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>UsernameName</th>
                        <th>Stundent Name</th>
                        <th>Phone </th>
                        <th>Email</th>
                        <th>Address</th>
                    </tr>
                    <!-- call the getEmployer method to display employee data -->
                    <?php  
                    while ($row = mysqli_fetch_assoc($ojtStudents)) {
                        echo "<tr>
                            <td>" . $row['ojt_students_id'] ."</td>
                            <td>" . $row['ojt_students_username'] ."</td>
                            <td>" . $row['ojt_students_name'] . "</td>
                            <td>" . $row['ojt_students_phone'] . "</td>
                            <td>" . $row['ojt_employee_email'] . "</td>
                            <td>" . $row['ojt_employee_address'] . "</td>
                        </tr>";
                    }
                    ?>
                </table>
            </section>
            <section id="setting">
                <div class="profile-row-1">
                    <h1>My Information details</h1> <br>
                    <h4><span class="profile-info">ID:</span><?php echo $adminprofile['ojt_admin_id']; ?></h4> <br>
                    <h4><span class="profile-info">Username:</span><?php echo   $adminprofile['ojt_admin_username']; ?></h4> 
                </div>
            </section>
        </div>
    </div>
</body>
</html>