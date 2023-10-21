<?php

//To Handle Session Variables
session_start();

if(empty($_SESSION['applicants_id'])) {
    header("Location: ../index.php");
    exit();
}

//Include Database Connection from Db file
require_once("../Db.php");

?>

<h2><i>Edit Profile</i></h2>
<p>You can Update your details in this section</p>
    <div class="row">
        <form action="update_profile.php" method="post" enctype="multipart/form-data">
            <?php 
                $sql = "SELECT * FROM applicants WHERE applicants_id = '$_SESSION[applicants_id]'";
                $result = $conn->query($sql);

                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                ?>

                <div class="col-md-6 latest-job">
                    <div class="form-group">
                        <label>Applicant Fullname</label>
                        <input type="text" class="form-control input-lg" name="fullname" value="<?php echo $row['fullname']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <input type="text" class="form-control input-lg" name="gender" value="<?php echo $row['gender']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control input-lg" name="email" value="<?php echo $row['email']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control input-lg" name="password" value="<?php echo $row['password']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="text" class="form-control input-lg" name="dob" value="<?php echo $row['dob']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>phone</label>
                        <input type="phone" class="form-control input-lg" name="phone" value="<?php echo $row['phone']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" id="address" rows="5" class="form-control input-lg" placeholder="Address"><?php echo $row['address'];?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Local GOvernment Area</label>
                        <input type="text" class="form-control input-lg" id="lga" name="lga" onkeypress="return validateName(event);" value="<?php echo $row['lga']; ?>" placeholder="lga">
                    </div>
                    <div class="form-group">
                        <label>State</label>
                        <input type="text" class="form-control input-lg" id="state" name="state" onkeypress="return validateName(event);" value="<?php echo $row['state']; ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-flat btn-success">Update Profile</button>
                    </div>
                </div>
                <div class="col-md-6 latest-job">
                    <div class="form-group">
                        <label for="contactno">Contact Number</label>
                        <input type="text" class="form-control input-lg" id="contactno" name="contactno" placeholder="Contact Number" onkeypress="return validatePhone(event);" minlength="11" maxlength="11" value="<?php echo $row['contactno']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="qualification">Qualification</label>
                        <input type="text" class="form-control" id="qualification" name="qualification" placeholder="Qualification" value="<?php echo $row['qualification']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="experience">Experience</label>
                        <input type="text" class="form-control input-lg" id="experience" name="experience" value="<?php echo $row['experience']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Skills</label>
                            <textarea class="form-control" name="skills" id="skills" rows="5" name="skills" onkeypress="return validateName(event);"><?php echo $row['skills']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="resume">Resume</label>
                        <input type="text" class="form-control input-lg" id="resume" name="resume" value="<?php echo $row['resume']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Upload/Change Resume</label>
                        <input type="file" name="file" class="btn btn-default">
                    </div>
                </div>
                </div>
                    <?php
                    }
                }
            ?>
        </form>
        <?php if(isset($_SESSION['uploadError'])) { ?>
            <div class="row">
                <div class="col-md-12 text-center">
                    <?php echo $_SESSION['uploadError']; ?>
    </div>
       
                </div>
            </div>
            <?php } ?>


    <script type="text/javascript">
        function validatePhone(event){
            var key = window.event ? event.keyCode : event.which;

            if(event.keyCode == 8 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 39) {
                return true;
            } else if(key < 48 || key > 57) {
                return false;
            }else return true;
        }

            function valadateName(event) {
                var key = window.event ? event.keyCode : event.which;
                if(event.keyCode == 8 || event.keyCode == 127 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 32) {
                return true;
            } else if(key < 65 || key > 90 && key < 97 || key > 122) {
                return false;
            }else return true;
            }
    </script>