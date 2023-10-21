<?php 
session_start();

require_once("Db.php");
?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet"  href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Applicants Registration</title>
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
        <div class="content-wrapper" style="margin-left: 0px;">

    <section class="content-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12 latest-job margin-top-50 margin-bottom-20">
                    <h1 class="text-center">Latest Jobs</h1>
                    <div class="input-group input-group-lg">
                        <input type="text" id="searchBar" class="form-control" placeholder="Search Job">
                        <span class="input-group-btn">
                            <button type="button" id="searchBtn" class="btn btn-info btn-flat">Go</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="applicants" class="content header">
        <div class="cntainer">
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-solid">
                        <div class="box-header with border">
                            <h3 class="box-title">Filters</h3>
                        </div>
                        <div class="box-body no-padding">
                            <ul class="nav nav-pills nav-stacked tree" data-widget="tree">
                                <li class="treeview menu-open">
                                    <a href="#"><i class="fa fa-plane text-red"></i>State <span class="pull-right"><i class="fa fa-angle-down pull-right"></i></span></a>
                                    <ul class="treview-menu">
                                        <li><a href="" class="stateSearch" data-target="Lagos"><i class="fa fa-circle-o text-yellow"></i>Lagos State</a></li>
                                        <li><a href="" class="stateSearch" data-target="Ogun"><i class="fa fa-circle-o text-yellow"></i>Ogun State</a></li>
                                        <li><a href="" class="stateSearch" data-target="Oyo"><i class="fa fa-circle-o text-yellow"></i>Oyo State</a></li>
                                        <li><a href="" class="stateSearch" data-target="Abuja"><i class="fa fa-circle-o text-yellow"></i>Abuja</a></li>
                                        <li><a href="" class="stateSearch" data-target="Rivers"><i class="fa fa-circle-o text-yellow"></i>River State</a></li>
                                    </ul>
                                </li>
                                <li class="treeview menu-open">
                                    <a href="#"><i class="fa fa-plane text-red"></i>Experience <span class="pull-right"><i class="fa fa-angle-down pull-right"></i></span></a>
                                    <ul class="treeview-menu">
                                        <li><a href="#" class="experienceSearch" data-target="1"><i class="fa fa-circle-o text-yellow"></i> > 1 year</a></li>
                                        <li><a href="#" class="experienceSearch" data-target="2"><i class="fa fa-circle-o text-yellow"></i> > 2 years</a></li>
                                        <li><a href="#" class="experienceSearch" data-target="3"><i class="fa fa-circle-o text-yellow"></i> > 3 years</a></li>
                                        <li><a href="#" class="experienceSearch" data-target="4"><i class="fa fa-circle-o text-yellow"></i> > 4 years</a></li>
                                        <li><a href="#" class="experienceSearch" data-target="5"><i class="fa fa-circle-o text-yellow"></i> > 5 years</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-md-9">
                    <?php

                    $limit = 4;
                    
                    $sql = "SELECT COUNT(job_posts_id) AS id FROM job_posts";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0){
                        $roow = $result->fetch_assco();
                        $total_records = $row['id'];
                        $total_pages = ceil($total_recors / $limit);
                    }else{
                        $total_pages = 1;
                    }
                    ?>

                    <div id="target-content">

                    </div>
                    <div class="text-center">
                        <ul class="pagination text-center" id="pagination"></ul>
                    </div>

                </div>

            </div>
        </div>
    </section>

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
    
    <script src="app.js "></script>
<!-- iCheck -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min/js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="app.js "></script>
    <script>
    function Pagination(){
        $("#pagination").twbsPagination({
            totalPages: <?php echo $totla_pages; ?>,
            visible: 10,
            onPageClick: function(e, page){
                e.preventDefault();
                $("#target-content").html("loading..."),
                $("#target-content").html("jobpagination.php?pages="+page);
            }
        });
    }
</script>

<script>
  $(function () {
      Pagination();
  });
</script>

<script>
    $(".experienceSearch").on("click", function(e){
        e.preventDefault();
        var searchResult = $(this).data("target");
        var filter = "experience";
        if(searchResult != ""){
            $("#Pagination").twbsPagination('destroy');
            Search(searchResult, filter);
        }else{
            $("#Pagination").twbsPagination('destroy');
            Pagination();
        }
    });
</script>

<script>
    $(".stateSearch").on("click", function(e){
        e.preventDefault();
        var searchResult = $(this).data("target");
        var filter = "state";
        if(searchResult != ""){
            $("#Pagination").twbsPagination('destroy');
            Search(searchResult, filter);
        }else{
            $("#Pagination").twbsPagination('destroy');
            Pagination();
        }
    });
</script>
<script>
    function Search(val, filter){
        $("#pagination").twbsPagination({
            totalPages: <?php echo $totla_pages; ?>,
            visible: 10,
            onPageClick: function (e, page) {
                e.preventDefault();
                val = encodeURLComponent(val);
                $("#target-content").html("loading...");
                $("#target-content").load("#search.php?page="+page +"&search="+val+"&filter"+filter);
            }
        });
    }
</script>
</body>
</html>