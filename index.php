<?php
require_once('./includes/methods_queries.php');
session_start();

if (isset($_SESSION['username'])) {
    header("Location: ./dashboard/teacher.php");
    exit();
}
if (isset($_POST['btn-register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    if ($password == $confirm_password) {
        if (registerUser($username, $password, $email, $phone)) {
            $_SESSION['username'] = $username;
            header("Location: ./dashboard/teacher.php");
            exit();
        } else {
            $registration_error = "Registration failed. Please try again.";
        }
    } else {
        $registration_error = "Passwords do not match. Please try again.";
    }
}
if (isset($_POST['btn-login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (verifyUser($username, $password)) {
        $_SESSION['username'] = $username;
        header("Location: ./dashboard/teacher.php");
        exit();
    } else {
        $login_error = "Invalid username or password. Please try again.";
    }
    }
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OJTabulate - Internship Management: Strategies for Success</title>
    <meta name="description"
        content="Our Internship Management program equips you with the skills and knowledge to effectively manage and develop successful internship programs. Learn practical strategies and gain valuable insights to help you optimize the intern experience and maximize organizational benefits. Join us today to elevate your internship management game!">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <!-- Custom stylesheet -->
    <link href="./public/assets/style.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./public/images/logo.jpg">
    <!--googlefont-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- Navigations -->
    <nav class="navbar navbar-expand-lg ">
        <div class="container ">
            <a class="navbar-brand" href="#">
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
                    <a href="#" class="nav-link nav-signup" data-bs-toggle="modal" data-bs-target="#register">Sign
                        up</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- end Navigation -->
    <div class="main-wrapper page-login">
        <!--content-->
        <div class="container content-wrapper loginpage-sec">
            <div class="row" id="login-section">
                <div class="col-xs-12 col-sm-8 col-md-8" id="left-content">
                    <h1><span class="heading-highlight">OJTabulate </span><br>Internship Management <br>Strategies for Success</h1>
                    <h3>You are on your way to becoming excellent educators and mentors for the next generation. As you
                        embark on this journey, we wish you all the best and hope that you gain valuable insights,
                        knowledge, and experience that will help you in your future careers.</h3>
                    <div class="teacher-div" href="#">
                        <img src="./public/images/teacher2.png" class="banner-img" alt="Logo" />
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4" id="right-content">
                    <div class="mainform-login">
                        <div class="signin-heading">
                            <h2>Log in to your account</h2>
                        </div>
                        <form action="" method="post">
                            <div class="form-inner-container">
                                <input type="text" placeholder="Username" name="username" required>

                                <input type="password" placeholder="Password" name="password" required>
                                <button type="submit" name="btn-login">SIGN IN</button>

                                <!-- error checking -->
                                <?php if (isset($login_error)) { ?>
                                <p class="error-message"><?php echo $login_error; ?></p>
                                <?php } ?>
                                <!-- error checking -->
                            </div>
                            <div class="forgot-reg">
                                <span class="psw">Forgot <a href="#">password?</a></span>
                                <div class="signup-div">
                                    <span>Don't have an account? <a href="#" type="button" class="reg-btn btn-primary"
                                            data-bs-toggle="modal" data-bs-target="#register">Sign up</a></span>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end of login section-->
    </div>
    <!--end of content wrapper-->
    </div>
    <!--end of main wrapper-->
    <!-- Registraion Page -->
    <!-- The Modal -->
    <div class="modal fade" id="register">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h1>Registration</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="container">
                            <p>Please fill in this form to create an account.</p>
                            <input type="text" placeholder="Enter Name" name="name" id="name" required>
                            <input type="text" placeholder="Enter User Name" name="username" id="username" required>
                            <input type="text" placeholder="Enter Email" name="email" id="email" required>
                            <input type="password" placeholder="Enter Password" name="password" id="psw" required>
                            <input type="password" placeholder="Confirm Password" name="confirm_password"
                                id="psw-repeat" required>
                            <p class="p-terms">By creating an account you agree to our <a href="#">Terms & Privacy</a>.
                            </p>
                            <button type="submit" value="Register" class="btn-registerbtn"
                                name="btn-register">Register</button>
                            <!-- error checking -->
                            <?php if (isset($registration_error)) { ?>
                            <p class="error-message"><?php echo $registration_error; ?></p>
                            <?php } ?>
                            <!-- END - error checking -->
                        </div>
                    </form>
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