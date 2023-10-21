<?php
session_start();

if(isset($_SESSION['applicants_id']) || isset($_SESSION['company_id'])){
    header("Location: index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet"  href="bootstrap/css/bootstrap.min.css">
    <!--Font-->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&family=Nunito&display=swap" rel="stylesheet">
    <!--Icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!--Bootstrap-->
    <!--Swiper-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>JobPad</title>
    <style>
      body.hold-transition.login-page {
  background-color: #f5f5f5;
}

.login-box {
  margin: 0 auto;
  max-width: 400px;
  width: 100%;
  margin-top: 20px;
}

.login-logo {
  padding: 10px 0;
  font-size: 24px;
  text-align: center;
}

.login-box-body {
  padding: 20px;
  border-top: 0;
  box-shadow: 0 1px 25px rgba(0, 0, 0, 0.1);
}

.login-box-msg {
  margin-bottom: 15px;
  text-align: center;
}

.form-group {
  margin-bottom: 15px;
}

.has-feedback {
  position: relative;
}

.has-feedback .form-control-feedback {
  position: absolute;
  top: 0;
  right: 0;
  z-index: 2;
  display: block;
  width: 34px;
  height: 34px;
  line-height: 34px;
  text-align: center;
  pointer-events: none;
}

.form-control-feedback .fa,
.form-control-feedback .glyphicon {
  position: absolute;
  top: 0;
  right: 0;
  z-index: 2;
  display: block;
  width: 34px;
  height: 34px;
  line-height: 34px;
  text-align: center;
  pointer-events: none;
}

.row {
  margin-right: -15px;
  margin-left: -15px;
}

.col-xs-8,
.col-sm-8,
.col-md-8,
.col-lg-8 {
  position: relative;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
}

.col-xs-4,
.col-sm-4,
.col-md-4,
.col-lg-4 {
  position: relative;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
}

.btn {
  margin-bottom: 10px;
}

.btn-primary {
  color: #fff;
  background-color: #337ab7;
  border-color: #2e6da4;
}

.btn-primary:hover {
  color: #fff;
  background-color: #286090;
  border-color: #204d74;
}

.text-center {
  text-align: center;
}

p {
  margin-bottom: 10px
}
    </style>
</head>
<body>
    <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <div class="container">
    <a class="navbar-brand" href="index.php">
        <img src="assets/brand/bootstrap-logo.svg" alt="" width="30" height="24">
           <b>JOBPAD</b>
    </a>
  </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse col-md-3" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="jobs.php">Jobs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="signup.php">Sign Up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="contact.php">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="index.php"><b>Job</b>Pad</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Applicants Login</p>

            <form action="checklogin.php" method="post">

                <div class="form-group has-feedback">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group has-feedback">
                    <input type="password" id="email" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <a href="#">I forgot my password</a>
                    </div>
                </div>

                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>


            </form>

            <br>
            <?php
                if(isset($_SESSION['registerCompleted'])) {
                ?>
                <div>
                    <p id="successMessage" class="text-center">Check your email</p>
                </div>
                <?php
                unset($_SESSION['registerCompleted']); }
            ?>
            <?php
                if(isset($_SESSION['loginError'])) {
                    ?>
                    <div>
                        <p class="text-center">Invalid Email/Password Try again!</p>
                    </div>
                    <?php
                    unset($_SESSION['loginError']); }
            ?>
            <?php
                //If User Failed to login then show error message 
                if(isset($_SESSION['userActivated'])) {
                    ?>
                    <div>
                        <p class="text-center">Your Account is Active. You can login</p>
                    </div>
                    <?php
                    unset($_SESSION['userActivated']); }
            ?>
            <?php
            //If User failed to login then show error message
            if(isset($_SESSION['loginActiveError'])) {
                ?>
                <div>
                    <p class="text-center"><?php echo $_SESSION['loginActiveError']; ?></p>
                </div>
                <?php
                unset($_SESSION['loginActiveError']); }
            ?>
        </div>
    </div>

    <!--footer-->
    <footer>
        <div class="footer-wrapper">
            <h3>JOBPAD</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facere, illum!</p>
            <div class="social-media">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a> 
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
        <div class="footer-wrapper">
            <h4>Explore</h4>
            <a href="#">Top Companies</a>
            <a href="#">Terms of Services</a>
            <a href="#">Podcast</a>
            <a href="#">Careers</a>
        </div>
        <div class="footer-wrapper">
            <h4>About</h4>
            <a href="#">FAQ</a>
            <a href="#">Get Inspired</a>
            <a href="#">Blog</a>
        </div>
        <div class="footer-wrapper">
            <h4>Support</h4>
            <a href="#">Customer Services</a>
            <a href="#">Trust & Safety</a>
            <a href="#">Partnership</a>
        </div>
        <div class="footer-wrapper">
            <h4>Community</h4>
            <a href="#">Community</a>
            <a href="#">Invite a Friend</a>
            <a href="#">Event</a>
        </div>
    </footer>
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-2.2.4.min/js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="app.js "></script>

    <script>
        $(function (){
            $('input').icheck({
                checkboxClass: 'icheckbox_square_blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%'
            });
        });
    </script>
    <script type="text/javascript">
        $(function (){
            $("#successMessage:visible").fadeout(8000);
        });
    </script>
    
</body>