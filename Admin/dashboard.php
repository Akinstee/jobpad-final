<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
require_once("partials/header.php");
require_once("Db.php");
if(!isset($_SESSION['admin_id'])){
    header('location:index.php');
}
$admin_id = $_SESSION['admin_id'];
// if(empty($_POST['admin_id'])){
//     header("Location:index.php");
//     exit();
// }

// Establish a database connection
$conn = new PDO('mysql:host=localhost;dbname=jobpad', 'root', 'root');

// Check for connection errors
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Get the total number of active companies
$sql = "SELECT COUNT(*) FROM company WHERE active = 1";
$result = $conn->query($sql);
$totalActiveCompanies = $result->fetchColumn();

// Get the total number of pending company approval
$sql = "SELECT COUNT(*) FROM company WHERE active = 2";
$result = $conn->query($sql);
$totalPendingCompanyApproval = $result->fetchColumn();

// Get the total number of registered candidates
$sql = "SELECT COUNT(*) FROM applicants WHERE active = 1";
$result = $conn->query($sql);
$totalRegisteredCandidates = $result->fetchColumn();

// Get the total number of pending applicants approval
$sql = "SELECT COUNT(*) FROM applicants WHERE active = 0";
$result = $conn->query($sql);
$totalPendingApplicantsApproval = $result->fetchColumn();

// Get the total number of job posts
$sql = "SELECT COUNT(*) FROM job_posts";
$result = $conn->query($sql);
$totalJobPosts = $result->fetchColumn();

// Get the total number of job applications
$sql = "SELECT COUNT(*) FROM job_applications";
$result = $conn->query($sql);
$totalJobApplications = $result->fetchColumn();
?>



    <div class="content-wrapper" style="margin-left: 0px;">
    <section id="applicants" class="content-header">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                        <h3 class="box-title">Welcome <b><?php echo $admin_id?></b></h3>
                        </div>
                        <div class="box-body no-padding">
                            <ul class="nav nav-pills nav-stacked">
                                <li class="active"><a href="dashboard.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                                <li class="active"><a href="active-jobs.php"><i class="fa fa-briefcase"></i>Active Jobs</a></li>
                                <li class="active"><a href="applications.php"><i class="fa fa-address-card-o"></i>Applications</a></li>
                                <li class="active"><a href="companies.php"><i class="fa fa-building"></i>Companies</a></li>
                                <li class="active"><a href="logout.php"><i class="fa fa-arow-circle-o-right"></i>Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 bg-white padding-2">
                    <h3>Job Pad Statistics</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-box bg-c-yellow">
                                <span class="info-box-icon bg-red"><i class="ion ion-briefcase"></i></span>
                                <div class="inf-box-content">
                                    <span class="info-box-text">Active Company Registered</span>
                                    <?php $sql = "SELECT * FROM company WHERE active = 1";
                                    $result = $conn->query($sql);
                                    if($result->rowCount() >0){
                                        $total = $result->rowCount();
                                    }else{
                                        $total = 0;
                                    }
                                    ?>
                                    <span class="info-box-number"><?php echo $total = 0;?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box bg-c-yellow">
                                <span class="info-box-icon bg-red"><i class="ion ion-briefcase"></i></span>
                                <div class="info-box-content"><span class="info-box-text">Pending Company Approval</span>
                                <?php 
                                    $sql = "SELECT * FROM company WHERE active= 2";
                                    $result = $conn->query($sql);
                                    if($result->rowCount() >0){
                                        $total = $result->rowCount();
                                    }else{
                                        $total = 0;
                                    }
                                ?>
                                 <span class="info-box-number"><?php echo $total;?></span>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box bg-c-yellow">
                                <span class="info-box-icon bg-green"><i class="ion ion-person-stalker"></i></span>
                                <div class="info-box-content"><span class="info-box-text">Registered Candidates</span>
                                <?php 
                                    $sql = "SELECT * FROM applicants WHERE active= 1";
                                    $result = $conn->query($sql);
                                    if($result->rowCount() >0){
                                        $total = $result->rowCount();
                                    }else{
                                        $total = 0;
                                    }
                                ?>
                                 <span class="info-box-number"><?php echo $total;?></span>
                            </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-box bg-green">
                                <span class="info-box-icon bg-red"><i class="ion ion-person-stalker"></i></span>
                                <div class="info-box-content"><span class="info-box-text">Pending Apllicants Approval</span>
                                <?php 
                                    $sql = "SELECT * FROM applicants WHERE active= '0'";
                                    $result = $conn->query($sql);
                                    if($result->rowCount() >0){
                                        $total = $result->rowCount();
                                    }else{
                                        $total = 0;
                                    }
                                ?>
                                 <span class="info-box-number"><?php echo $total;?></span>
                            </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="info-box bg-c-yellow">
                                        <span class="info-box-icon bg-aqua"><i class="ion ion-person-add"></i></span>
                                        <div class="info-box-content"><span class="info-box-text">Total Job Posts</span>
                                            <?php 
                                                $sql = "SELECT * FROM job_posts";
                                                $result = $conn->query($sql);
                                                if($result->rowCount() >0){
                                                    $total = $result->rowCount();
                                                }else{
                                                    $total = 0;
                                                }
                                            ?>
                                            <span class="info-box-number"><?php echo $total;?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-box        bg-c-yellow">
                                <span class="info-box-icon bg-red"><i class="ion ion-ios-browsers"></i></span>
                                <div class="info-box-content"><span class="info-box-text">Total Applications</span>
                                <?php 
                                    $sql = "SELECT * FROM job_applications";
                                    $result = $conn->query($sql);
                                    if($result->rowCount() >0){
                                        $total = $result->rowCount();
                                    }else{
                                        $total = 0;
                                    }
                                ?>
                                 <span class="info-box-number"><?php echo $total;?></span>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <div class="control-sidebar-bg"></div>
</div>

<!--JQuery-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>

<?php 
require_once("partials/footer.php");
?>
