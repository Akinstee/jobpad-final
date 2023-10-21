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
    <!--header-->
    <header>
        <h1 class="header-title">
            FIND YOUR<br><span>PERFECT JOB</span><br>EASILY
        </h1>
    </header>
    <!--Search-->
    <div class="search-wrapper">
        <div class="search-box">
            <div class="search-card">
                <input class="search-input" type="text" placeholder="job title or Keywords">
                <button class="search-button">Search</button>
            </div>
        </div>
    </div>
    <!--Filter box-->
    <div class="filter-box">
        <div class="filter-dropdown">
            <select name="job-level" id="job-level" class="filter-select">
                <option value="Job Level">Job Level</option>
                <option value="Job Level">Entry</option>
                <option value="Job Level">Mid Level</option>
                <option value="Job Level">Senior Level</option>
            </select>
            <select name="job-function" id="job-function" class="filter-select">
                <option value="Job Level">Job Function</option>
                <option value="Job Level">IT</option>
                <option value="Job Level">Management</option>
                <option value="Job Level">Education</option>
            </select>
            <select name="employment" id="employment" class="filter-select">
                <option value="employment">Employment Type</option>
                <option value="employment">Internship</option>
                <option value="employment">Part Time</option>
                <option value="employment">Full Time</option>
            </select>
            <select name="location Type" id="location_type" class="filter-select">
                <option value="location">Location</option>
                <option value="location">Remote</option>
                <option value="location">Hybrid</option>
                <option value="location">Onsite</option>
            </select>
            <select name="location" id="location" class="filter-select">
                <option value="location">Location</option>
                <option value="location">US</option>
                <option value="location">UK</option>
                <option value="location">Canada</option>
                <option value="location">Nigeria</option>
                <option value="location">Kenya</option>
                <option value="location">Spain</option>
            </select>
            <select name="education" id="education" class="filter-select">
                <option value="Education">Education</option>
                <option value="Education">High School</option>
                <option value="Education">Diploma</option>
                <option value="Education">Certificate</option>
                <option value="Education">Bachelor's Degree</option>
                <option value="Education">Master's Degree</option>
                
            </select>
        </div>
        <div class="filter-chosen">
            <div class="chosen-card">
                Remote <i class="fas fa-times-circle"></i>
            </div>
            <div class="chosen-card">
                Full Time <i class="fas fa-times-circle"></i>
            </div>
            <div class="chosen-card">
                Financial Tech <i class="fas fa-times-circle"></i>
            </div>
            <div class="chosen-card">
                Entry Level <i class="fas fa-times-circle"></i>
            </div>
        </div>
    </div>
    <!--Job Listing-->
    <section class="job-list" id="jobs">
        <div class="job-card">
            <div class="job-name">
                <img src="img/Tesla.png" alt="" class="job-profile">
                <div class="job-detail">
                    <h4>Tesla</h4>
                    <h3>Mechanical Engineer</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>
            <div class="job-label">
                <a href="#" class="label-a">HTML</a>
                <a href="#" class="label-b">CSS</a>
                <a href="#" class="label-c">Javascript</a>
            </div>
            <div class="job-posted">
                Posted 2 mins ago
            </div>
        </div>
        <div class="job-card">
            <div class="job-name">
                <img src="img/ebay.png" alt="" class="job-profile">
                <div class="job-detail">
                    <h4>ebay</h4>
                    <h3>Business Development</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>
            <div class="job-label">
                <a href="#" class="label-a">HTML</a>
                <a href="#" class="label-b">CSS</a>
                <a href="#" class="label-c">Javascript</a>
            </div>
            <div class="job-posted">
                Posted 2 mins ago
            </div>
        </div>
        <div class="job-card">
            <div class="job-name">
                <img src="img/tictok.png" alt="" class="job-profile">
                <div class="job-detail">
                    <h4>Tictok</h4>
                    <h3>Digital Marketing</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>
            <div class="job-label">
                <a href="#" class="label-a">HTML</a>
                <a href="#" class="label-b">CSS</a>
                <a href="#" class="label-c">Javascript</a>
            </div>
            <div class="job-posted">
                Posted 15 mins ago
            </div>
        </div>
        <div class="job-card">
            <div class="job-name">
                <img src="img/youtube-svg.png" alt="" class="job-profile">
                <div class="job-detail">
                    <h4>Youtube</h4>
                    <h3>UI UX Designer</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>
            <div class="job-label">
                <a href="#" class="label-a">HTML</a>
                <a href="#" class="label-b">CSS</a>
                <a href="#" class="label-c">Javascript</a>
            </div>
            <div class="job-posted">
                Posted an hour ago
            </div>
        </div>
        <div class="job-card">
            <div class="job-name">
                <img src="img/Amazon.png" alt="" class="job-profile">
                <div class="job-detail">
                    <h4>Amazon</h4>
                    <h3>Software Engineer</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>
            <div class="job-label">
                <a href="#" class="label-a">HTML</a>
                <a href="#" class="label-b">CSS</a>
                <a href="#" class="label-c">Javascript</a>
            </div>
            <div class="job-posted">
                Posted an hour ago
            </div>
        </div>
        <button class="job-more">More List</button>
    </section>
    <!--Jobs-->
    <section class="join">
        <div class="join-detail">
            <h1 class="section-title">LETS START YOUR NEW JOB SEARCH WITH US</h1>
            <p>Lorem ipsum dolor sit amet.</p>
        </div>
        <button class="join-button">Join Now</button>
    </section>
    <!--featured Company-->
    <section class="featured" id="companies">
        <h1 class="section-title">Featured Companies</h1>
        <p>Lorem ipsum dolor sit amet.</p>
        <div class="featured-wrapper">
            <div class="featured-card">
                <img src="img/ebay.png" alt="ebay" class="featured-image">
                <p>Ebay</p>
                <button class="featured-button">View 2 jobs</button>
            </div>
            <div class="featured-card">
                <img src="img/youtube-svg.png" alt="youtube" class="featured-image">
                <p>Youtube</p>
                <button class="featured-button">View 2 jobs</button>
            </div>
            <div class="featured-card">
                <img src="img/Tesla.png" alt="Tesla" class="featured-image">
                <p>Tesla</p>
                <button class="featured-button">View 2 jobs</button>
            </div>
            <div class="featured-card">
                <img src="img/Amazon.png" alt="Amazon" class="featured-image">
                <p>Amazon</p>
                <button class="featured-button">View 2 jobs</button>
            </div>
            <div class="featured-card">
                <img src="img/tictok.png" alt="tictok" class="featured-image">
                <p>Tictok</p>
                <button class="featured-button">View 2 jobs</button>
            </div>
            <div class="featured-card">
                <img src="img/google.png" alt="google" class="featured-image">
                <p>Google</p>
                <button class="featured-button">View 2 jobs</button>
            </div>
            <div class="featured-card">
                <img src="img/facebook.png" alt="facebook" class="featured-image">
                <p>Facebook</p>
                <button class="featured-button">View 1 jobs</button>
            </div>
            <div class="featured-card">
                <img src="img/apple.png" alt="apple" class="featured-image">
                <p>Apple</p>
                <button class="featured-button">View 3 jobs</button>
            </div>
        </div>
    </section>
    <!--Testimony-->
    <section class="testimony" id="testimony">
        <h1 class="section-title">Testimonial</h1>
        <p>Let's See what our clients Says about us</p>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <i class="fas fa-quote-left"></i>
                    <h3>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</h3>
                    <div class="testimony-pic">
                        <img src="img/profile-1.jpg" alt="">
                        <p>John Smith</p>
                        <span>Business Development</span>
                    </div>
                </div>
                <div class="swiper-slide">
                    <i class="fas fa-quote-left"></i>
                    <h3>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</h3>
                    <div class="testimony-pic">
                        <img src="img/profile-2.jpg" alt="">
                        <p>Ean Taylor</p>
                        <span>Data Analyst</span>
                    </div>
                </div>
                <div class="swiper-slide">
                    <i class="fas fa-quote-left"></i>
                    <h3>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</h3>
                    <div class="testimony-pic">
                        <img src="img/profile-3.jpg" alt="">
                        <p>Tyler Joshua</p>
                        <span>Web Developer</span>
                    </div>
                </div>
                <div class="swiper-slide">
                    <i class="fas fa-quote-left"></i>
                    <h3>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</h3>
                    <div class="testimony-pic">
                        <img src="img/profile-4.jpg" alt="">
                        <p>Albert John</p>
                        <span>Product Analyst</span>
                    </div>
                </div>
                <div class="swiper-slide">
                    <i class="fas fa-quote-left"></i>
                    <h3>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</h3>
                    <div class="testimony-pic">
                        <img src="img/profile-5.jpg" alt="">
                        <p>Julia Robert</p>
                        <span>Marketing Officer</span>
                    </div>
                </div> 
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <section class="blog" id="blog">
        <h1 class="section-title">Career Advices</h1>
        <p>Learn more career tips from Company's recruiter</p>
        <div class="blog-wrapper">
            <div class="blog-card">
                <img src="img/joblove.jpg" alt="" class="blog-image">
                <div class="blog-detail">
                    <span>11 Oct 2023</span>
                    <h4>How to enjoy your Work</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <hr class="divider">
                    <a href ="#" class="blog-more">Read More</a>
                </div>
            </div>
            <div class="blog-card">
                <img src="img/blog-2.jpg" alt="" class="blog-image">
                <div class="blog-detail">
                    <span>24 Oct 2023</span>
                    <h4>10 Tips for Technical Interview</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <hr class="divider">
                    <a href ="#" class="blog-more">Read More</a>
                </div>
            </div>
            <div class="blog-card">
                <img src="img/blog-3.jpg" alt="" class="blog-image">
                <div class="blog-detail">
                    <span>31 Oct 2023</span>
                    <h4>Managing Time Effectively</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <hr class="divider">
                    <a href ="#" class="blog-more">Read More</a>
                </div>
            </div>
        </div>
    </section>
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
