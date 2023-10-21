<div class="content-wrapper" style="margin-left: 0px;">

    <section id="applicants" class="content-header">
        <div class="container">
            <div class="row">
                <div class="col-md-9 bg-white padding-2">
                    <div class="pull-left">
                        <h2><b><i><?php echo $row['job_title']; ?></i></b></h2>
                    </div>
                    <div class="pull-right">
                        <a href="active_job.php" class="btn btn-default btn-lg btn-flat mt-20"><i class="fa fa-arrow-circle-left"></i>Back</a>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div>
                        <p><span class="margin-right-10"><i class="fa fa-location-arrow text-green"></i> <?php echo $row['lga']; ?> </span><i class="fa fa-calendar text-green"></i> <?php echo date("d-M-Y", strtotime($row['created_at'])); ?> </p>
                    </div>
                    <div>
                        <?php echo stripcslashes($row['lga']); ?>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="thumbnail">
                        <img src="../uploads/logo/"<?php echo $row['logo']; ?> alt="companylogo">
                        <div class="caption text-center">
                            <h3><?php echo $row['fullname']; ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>