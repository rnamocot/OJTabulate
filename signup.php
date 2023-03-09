<?php
require_once('./includes/methods_queries.php');
session_start();
if (isset($_POST['btn-register'])) {
    $fullname = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $check_sql = "SELECT ojt_teachers_username FROM ojt_teachers WHERE ojt_teachers_username = '$username'";
    $check_result = mysqli_query($conn, $check_sql);
    if (mysqli_num_rows($check_result) > 0) {
        $registration_error = "Username already exists. Please choose a different one.";
    } else {
        if ($password == $confirm_password) {
            if (registerUser($fullname,$username, $password, $email, $phone)) {
                $_SESSION['ojt_teacher_id'] = $ojt_teacher_id;
                $_SESSION['username'] = $username;
                header("Location: thank-you.php");
                exit();
            } else {
                $registration_error = "Registration failed. Please try again.";
            }
        } else {
            $registration_error = "Passwords do not match. Please try again.";
        }
    }
}
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
    <link href="./public/assets/style.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./public/images/logo.jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg ">
        <div class="container ">
            <a class="navbar-brand" href="index.php">
                <img src="./public/images/logo.jpg" class=" mainlogo" alt="Logo" />
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
                    <a href="signup.php" class="nav-link nav-signup" >Sign up</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="main-wrapper page-login">
        <div class="container content-wrapper loginpage-sec">
            <div class="row" id="login-section">
                <div class="col-xs-12 col-sm-8 col-md-8" id="left-content">
                    <h1><span class="heading-highlight">OJTabulate </span><br>Internship Management <br>Strategies for
                        Success</h1>
                    <h3>You are on your way to becoming excellent educators and mentors for the next generation. As you
                        embark on this journey, we wish you all the best and hope that you gain valuable insights,
                        knowledge, and experience that will help you in your future careers.</h3>
                    <div class="teacher-div" href="#">
                        <img src="./public/images/teacher2.png" class="banner-img" alt="Logo" />
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4" id="right-content">
                    <div class="mainform-login">
                        <div class="signup-heading">
                            <h2 class="signup-heading">Please fill in this form to create an account.</h2>
                        </div>
                        <form action="" method="post">
                        <div class="container">
                            <input type="text" placeholder="Fullname" name="name" id="name" required>
                            <input type="text" placeholder="Username" name="username"value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>" required>
                            <?php if (!empty($registration_error) && strpos($registration_error, 'Username already exists') !== false): ?>
                            <p class="error-message"><?php echo $registration_error; ?></p>
                            <?php endif; ?>
                            <input type="text" placeholder="Email" name="email" id="email" required>
                            <input type="text" placeholder="Phone" name="phone" id="phone" required>
                            <input type="password" placeholder="Password" name="password" id="psw" required>
                            <input type="password" placeholder="Confirm Password" name="confirm_password"
                                id="psw-repeat" required>
                            <p class="p-terms">By creating an account you agree to our <a href="#">Terms & Privacy</a>.
                            </p><br>
                            </p>
                            <button type="submit" value="Register" class="btn-registerbtn"
                                name="btn-register">Register</button>
                                <br>
                                <p class="p-terms">Alreay have an account? <a href="index.php">Login here</a>.
                        </div>
                    </form>
                    </div>
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
                                <img src="./public/images/logo.jpg" class="d-inline-block align-text-top mainlogo"
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