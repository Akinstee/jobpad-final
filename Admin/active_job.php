<?php
session_start();

if(empty($_SESSION['admin_id'])){
    header("Location: index.php");
    exit();
}

require_once("..db.php");
?>

<h3>Active Job Posts</h3>
<div class="row margin-top-20">
    <div class="col-md-12">
        <div class="box-body table-responsive no-padding">
            <table id="Dat1" class="table table-hover">
                <thead>
                    <th>Job Name</th>
                    <th>Company Name</th>
                    <th>Date Created</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT job_posts.*, company.fullname FROM job_posts INNER JOIN company ON job_posts.company_id=company.company_id";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0){
                            $i = 0;
                            while($row = $result->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?php echo $row['job_title']; ?></td>
                                <td><?php echo $row['fullname']; ?></td>
                                <td><?php echo $row("d-M-Y", strtotime($row['created_at'])); ?></td>
                                <td><a href="view_job_post.php?id=<?php echo $row['job_post_id']; ?>"><i class="fa fa-address-card-o"></i></a></td>
                                <td><a href="edit_job_post.php?id=<?php echo $row['job_post_id']; ?>"><i class="fa fa-spanner-o"></i></a></td>
                                <td><a href="delete_job_post.php?id=<?php echo $row['job_post_id']; ?>"><i class="fa fa-address-trash"></i></a></td>
                            </tr>
                                <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
    $(function (){
        $('Dat1').Datatable({
            'paging' : true,
            'lengthChange' : false,
            'searching' : false,
            'ordering' : true,
            'info' : true,
            'autoWidth' : false,
        });
    });
</script>