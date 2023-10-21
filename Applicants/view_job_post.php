<?php
session_start();

if(empty($_SESSION['applicants_id'])) {
    header("Location: ../index.php");
    exit();
}

//Include Database Connection from Db file
require_once("../Db.php");

$sql = "SELECT * FROM job_applications WHERE applicants_id='$_SESSION[applicants_id]' AND job_post_id='$_GET[id]'";
$result=$conn->query($sql);
if($result->num_rows > 0)
{
    $sql1 = "SELECT * FROM job_posts INNER JOIN company ON job_post_id.company_id=company.company_id WHERE job_post_id='$_GET[id]'";
$result1=$conn->query($sql1);
if($result1->num_rows > 0){
    $row = $result1->fetch_assoc();
}
}else{
    header("Location: dashboard.php");
    exit();
}
?>

<!--Content Wrapper-->
<div class="content-wrapper" style="margin-left: 0px;">

    <section id="applicants" class="content-header">
        <div class="container">
            <div class="row">
                <div class="col-md-9 bg-white padding-2">
                    <div class="pull-left">
                        <h2><b><i><?php echo $row['job_title']; ?></i></b></h2>
                    </div>
                    <div class="pull-right">
                        <a href="dashboard.php" class="btn btn-default btn-lg mt-20"><i class="fa fa-arrow-circle-left"></i>Back</a>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div>
                        <p><span class="margin-right-10"><i class="fa fa-location-arrow text-green"></i> <?php echo $row['lga']; ?></span><i class="fa fa-calendar text-green"></i> <?php echo date("d-M-Y", strtotime($row['created_at'])); ?></p>
                    </div>
                </div>
                <div>
                    <?php echo $row['description']; ?>
                </div>
            </div>

            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="..uploads/logo/<?php echo $row['logo']; ?>" alt="logo">
                    <div class="caption text-center">
                        <h3><?php echo $row['fullname']; ?></h3>
                        <p><a href="#" class="btn btn-primary btn-flat" role="button">More Info</a></p>
                        <hr>
                        <div class="row">
                            <div class="col-md-4"><a href=""><i class="fa fa-warning">Report</i></a></div>
                            <div class="col-md-4"><a href=""><i class="fa fa-envelope">Email</i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
