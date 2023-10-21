<?php
session_start();

require_once("Db.php");

$limit = 4;

if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}

$start_from = ($page-1) * $limit;

$sql = "SELECT * FROM job_posts LIMIT $start_from, $limit";
$result = $conn->query($sql);
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $sql1 = "SELECT * FROM company WHERE company_id='$row[company_id]'";
        $result1 = $conn->query($sql1);
        if($result1->num_rows > 0){
            while($row1 = $result1->fetch_assoc())
            {
        ?>

        <div class="attachment-block clearfix">
            <img src="uploads/logo/<?php echo $row1['logo']; ?>" alt="Attachment Image" class="attachment-img">
            <div class="attachment-pushed">
                <h4 class="attachment-heading"><a href="view_job_post.php?id=<?php echo $row['job_post_id']; ?>"><?php echo $row['job_title']; ?></a> <span class="attachment-heading pull-right">$<?php echo $row['maximumsalary']; ?>Month</span> </h4>
                <div class="attachment-text">
                    <div><strong><?php echo $row1['fullname']; ?> | <?php echo $row1['state']; ?> | Experience <?php echo $row['experience']; ?> Years </strong></div>
                </div>
            </div>
        </div>

<?php
            }
        }
    }
}

$conn->close();
?>