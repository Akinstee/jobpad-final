<?php
session_start();
require_once("Db.php");

// if(empty($_SESSION['admin_id'])){
// header("Location: index.php");
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="content-wrapper" style="margin-left: 0px;">
    <section id="applicants" class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Welcome <b>Admin</b></h3>
                        </div>
                        <div class="box-body no-padding">
                            <ul class="nav nav-pils nav-stacked">
                            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                            <li><a href="active-jobs.php"><i class="fa fa-briefcase"></i>Active Jobs</a></li>
                            <li><a href="applications.php"><i class="fa fa-address-card-o"></i>Applicants</a></li>
                            <li><a href="company.php"><i class="fa fa-building"></i>Companies</a></li>
                            <li><a href="logout.php"><i class="fa fa-arrow-circle-o-right"></i>Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 bg-white padding-2">

                <h3>Applicants Database</h3>
                <div class="row margin-top-20">
                    <div class="col-md-12">
                        <div class="box-body table-responsive no-padding">
                            <table id="apps" class="table table-hover">
                                <thead>
                                    <th>Applicants</th>
                                    <th>Highest Qualification</th>
                                    <th>Skilss</th>
                                    <th>lga</th>
                                    <th>state</th>
                                    <th>Download Resume</th>
                                </thead>
                                <tbody>
                                    <?php 
                                        $sql = "SELECT * FROM applicants";
                                        $result = $con->query($sql);

                                        if($result->num_rows > 0){
                                            while($row = $result->fetch_assoc())
                                            {
                                                $skills = $row['skills'];
                                                $skills = explode(',', $skills);
                                    ?>
                                    <tr>
                                        <td><?php echo $row['applicants_fullname'];?></td>
                                        <td><?php echo $row['qualification'];?></td>
                                        <td>
                                        <?php
                                        foreach($skills as $value){
                                        echo '<span class ="label label-success">'.$value.'</span>';
                                            }
                                        ?>
                                        </td>
                                        <td><?php echo $row['lga']; ?></td>
                                        <td><?php echo $row['state']; ?></td>
                                        <?php if($row['resume'] != ''){?> 
                                        <td><a href="../uploads/resume/<?php echo $row ['resume'];?>" download = "<?php echo $row['fullname'].' Resume';?>"><i class="fa fa-file-pdf-o"></i></a></td>
                                        <?php }else{ ?>
                                        <td>No Resume UPloaded</td><?php }?>
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

                </div>
            </div>
        </div>
    </section>

    <div class="modal modal-success fade" id="modal-success">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="submit" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times:</span></button>
                    <h4 class="modal-title">APplicants Profile</h4>
                </div>
                <div class="modal-body">
                    <h3><b>Applied On</b></h3>
                    <p>24/09/2023</p>
                    <br>
                    <h3><b>Email</b></h3>
                    <p>test@test.com</p>
                    <br>
                    <h3><b>Phone</b></h3>
                    <p>+2348188178294</p>
                    <br>
                    <h3><b>Application Message</b></h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta nulla vitae, quam quas officia iure tempora? Architecto adipisci beatae veniam?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>



