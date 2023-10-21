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
        body {
            font-family: sans-serif;
        }

        .navbar {
        background-color: #222222;
        color: white;
        }

        .navbar-brand {
        font-size: 24px;
        font-weight: bold;
        }

        .navbar-nav {
        margin-left: auto;
        }

        .navbar-link {
        color: white;
        }

        .navbar-link:hover {
        color: lightgray;
        }

        .content-wrapper {
        margin-top: 20px;
        }

        .content-header {
        background-color: #f5f5f5;
        padding: 20px;
        }

        .content-header h1 {
        text-align: center;
        font-size: 36px;
        }

        .latest-job {
        margin-bottom: 20px;
        }

        .latest-job h3 {
        text-align: center;
        font-size: 24px;
        }

        .small-box {
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .small-box .inner {
        text-align: center;
        }

        .small-box a {
        text-decoration: none;
        color: white;
        background-color: #222222;
        padding: 10px;
        border-radius: 5px;
        }

        .small-box a:hover {
        background-color: #333333;
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
            JOBPAD
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

    <div class="content-wrapper" style="margin-left: 0px;">

        <section class="content-header">
            <div class="container">
                <div class="row latest-job margin-top-50 margin-bottom-20">
                    <h1 class="text-center margin-bottom-20"><b>Login In</b></h1>
                    <div class="col-md-6 latest-job">
                        <div class="small-box bg-yellow padding-5">
                            <div class="inner">
                                <h3 class="text-center">Applicants Login</h3>
                            </div>
                            <a href="login_applicants.php" class="small-box-footer">Login <i class="fa fa-arrow-circle-right"></i> </a>
                        </div>
                    </div>
                    <div class="col-md-6 latest-job">
                        <div class="small-box bg-red padding-5">
                            <div class="inner">
                                <h3 class="text-center">Company Login</h3>
                            </div>
                            <a href="login_company.php" class="small-box-footer">Login <i class="fa fa-arrow-circle-right"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
</body>
</html> 