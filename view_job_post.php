<?php
session_start();

require_once("Db.php");
?>

<div class="content-wrapper" style="margin-left: 0px;">
    <?php

        $sql = "SELECT * FROM job_posts INNER JOIN company ON job_post.company_id=company.company_id WHERE job_post_id='$_GET[id]'";
        $result = $conn->query($sql);
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
        ?>

                <section id="applicants" class="content-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 bg-white padding-2">
                                <div class="pull-left">
                                    <h2><b><i><?php echo $row['job_title']; ?></i></b></h2>
                                </div>
                                <div class="pull-right">
                                    <a href="" class="btn btn-default btn-lg btn-flat margin-top-20"><i class="fa fa-arrow-circle-left"></i>Back</a>
                                </div>
                                <div class="clearfix"></div>
                                <hr>
                                <div>
                                    <p> <span class="margin-right-10"><i class="fa fa-location-arrow text-green"></i><?php echo $row['lga']; ?> </span> <i class="fa fa-calendar text-green"></i> <?php echo date("d-M-Y", strtotime($row['created_at'])); ?></p>
                                </div>
                                <div>
                                    <?php echo stripcslashes($row['description']); ?>
                                </div>
                                <?php
                                if(isset($_SESSION['applicants_id']) && empty($_SESSION['companyLogged'])) { ?>
                                <div>
                                    <a href="apply.php?id=<?php echo $row['job_post_id']; ?>" class="btn btn-success btn-flat margin-top-50">Apply</a>
                                </div>
                                <?php } ?>


                            </div>
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="uploads/logo/<?php echo $row['logo']; ?>" alt="companylogo">
                                    <div class="caption text-center">
                                        <h3><?php echo $row['fullname']; ?></h3>
                                        <p><a href="#" class="btn btn-primary btn-flat" role="button">More Info</a>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4"><a href=""><i class="fa fa-address-card-o"></i>Apply</a></div>
                                            <div class="col-md-4"><a href=""><i class="fa fa-warning"></i>Report</a></div>
                                            <div class="col-md-4"><a href=""><i class="fa fa-envelope"></i>Email</a></div>
                                        </div>
                                    </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            <?php
            }
        }
        ?>
</div>