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
  <link rel="icon" type="image/x-icon" href="../public/images/fav.png">
  <!-- Qr code -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcode-generator/1.4.4/qrcode.min.js"></script>
</head>
<body>
  <div class="sidebarleft expand">
    <div class="nav-header">
      <p class="logo">
        <img src="../public/images/logomain.png" class="dashboard-logo" alt="Logo" /> <br>
        <span class="db-username" style="color:#1e35cc;">Dashboard</span>
      </p>
      <i class="bx bx-menu-alt-right btn-menu"></i>
    </div>
    <ul class="nav-links">
      <li>
        <a href="#" onclick="showContent('students')">
          <i class='bx bx-street-view'></i>
          <span class="title">Student Profile</span>
        </a>
        <span class="tooltip">Student Profile</span>
      </li>
	  <li>
        <a href="#" onclick="showContent('setting')">
          <i class="bx bx-cog"></i>
          <span class="title">Profile Settings</span>
        </a>
        <span class="tooltip">Profile Settings</span>
      </li>
      <li>
        <a href="logout.php" onclick="showLogoutModal()">
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
    </div>
    <!-- Default content -->
    <div id="default-content">
      <div class="home-db-div">
        <div class="table-header">
          <h2>OJT-Employer List</h2>
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
        </table>
      </div>
    </div>
    <!-- END - Default content -->
    <!-- SUPERVISOR CODE RIGHT SIDE CONTENT -->
    <section id="supervisor">
      <div class="home-db-div">
        <div class="table-header">
          <h2>OJT-Employee</h2>
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
        </table>
      </div>
    </section>
    <!-- END - SUPERVISOR CODE RIGHT SIDE CONTENT -->
    <section id="teacher">
      <h1>Teacher Content</h1>
      <p>Here are the teachers.</p>
    </section>
    <section id="students">
      <h1>Students Content</h1>
      <p>Here are the students.</p>
    </section>
    <section id="setting">
      <h1>Setting Content</h1>
      <p>Here are the settings.</p>
    </section>
  </div>
  <script src="../public/assets/jscodes.js" async defer></script>
</body>
</html>