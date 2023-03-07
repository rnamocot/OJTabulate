<?php
   session_start();
   if (!isset($_SESSION['username'])) {
       header('Location: index.php');
       exit();
   }
   $username = $_SESSION['username'];
   require_once ('../includes/dashboard_queries.php');
   $user_id=getUserid($username);
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
               <span class="db-username" style="color:#1e35cc;">Dashboard</span>
            </p>
            <i class="bx bx-menu-alt-right btn-menu"></i>
         </div>
         <ul class="nav-links">
            <li>
               <a href="#" onclick="showContent('profile')" class="active">
               <i class='bx bx-user'></i>
               <span class="title">My profile</span>
               </a>
               <span class="tooltip">My profile</span>
            </li>
            <li>
               <a href="#" onclick="showContent('student-employer')" class="active">
               <i class='bx bx-user'></i>
               <span class="title">Student Employer</span>
               </a>
               <span class="tooltip">Student Employer</span>
            </li>
            <li>
               <a href="#" onclick="showContent('students')" class="active">
               <i class='bx bx-street-view'></i>
               <span class="title">My Students</span>
               </a>
               <span class="tooltip">My Students</span>
            </li>
            <li>
               <a href="#" onclick="showContent('qr-code')" class="active">
               <i class='bx bx-qr-scan'></i>
               <span class="title">QR Code</span>
               </a>
               <span class="tooltip">QR Code</span>
            </li>
            <li>
               <a href="#" onclick="showContent('setting')" class="active">
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
            <section id="profile">
               <h1>Teacher Content</h1>
               <p>Here are the teachers.</p>
            </section>
            <!-- employer section -->
            <section id="student-employer">
               <h1>Employer Details</h1>
               <p>Here are the employer.</p>
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
                  <h4><span style="color:#0D6EFD;">Note:</span> This qr code has a unique link for ojt's employer details
                     registration
                  </h4>
                  <?php
                     function generateQRCodeLink($url,$user_id) {
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
                       echo 'var filename = "' . basename($url) . '.png";';
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
                     generateQRCodeLink('http://localhost/ojt_managemntv1-main/employee-registration.php',$user_id);
                     ?>
               </div>
            </section>
            <section id="setting">
               <h1>Setting Content</h1>
               <p>Here are the settings.</p>
            </section>
         </div>
      </div>
   </body>
</html>