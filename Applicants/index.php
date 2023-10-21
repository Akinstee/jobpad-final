<div class="col-md-9 bg-white padding-2">
    <h2><i>Recent Applications</i></h2>
    <p>You will find job roles you have applied for below</p>

    <?php 
        $sql = "SELECT * FROM job_posts INNER JOIN job_applications ON job_posts.job_post_id=job_applications.job_post_id WHERE job_applications.applicants_id='$_SESSION[applicants_id]'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
        ?>

        <div class="attachment-block clearfix padding-2">
            <h4 class="attachment-heading"><a href="view_job_post.php?id=<?php echo $row['job_post_id']; ?>"><?php echo $row['jb_title']; ?></a></h4>

            <div class="attachment-text padding-2">
                <div class="pull-left"><i class="fa fa-calendar"></i><?php echo $row['created_at	']; ?></div>

                <?php
                if($row['status'] == 0 ){
                    echo '<div class="pull-right"><strong class="text-orange">Pending</strong></div>';
                }else if ($row['status'] ==1) {
                    echo '<div class="pull-right"><strong class="text-red">Rejected</strong></div>';
                }else if ($row['status'] ==2) {
                    echo '<div class="pull-right"><strong class="text-green">Under Review</strong></div>';
                }
                ?>
            </div>
        </div>

        <?php
            }
        }
    ?>
</div>