<?php
session_start();

if(isset($_SESSION['applicants_id']) || isset($_SESSION['company_id'])){
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet"  href="bootstrap/css/bootstrap.min.css">
    <!--Font-->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&family=Nunito&display=swap" rel="stylesheet">
    <!--Icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!--Bootstrap-->
    <!--Swiper-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Applicants Registration</title>
    <style>
      .container {
  margin: 0 auto;
  width: 100%;
  max-width: 960px;
}

.row-cols-lg {
  columns: 2;
  column-gap: 1.5rem;
}

.form-group {
  margin-bottom: 1rem;
}

.form-group label {
  display: block;
  margin-bottom: .5rem;
}

.form-group input {
  width: 100%;
  padding: .375rem .75rem;
  font-size: 1rem;
  line-height: 1.5;
  border: 1px solid #ccc;
  border-radius: .25rem;
}

.form-group select {
  width: 100%;
  padding: .375rem .75rem;
  font-size: 1rem;
  line-height: 1.5;
  border: 1px solid #ccc;
  border-radius: .25rem;
}

.btn {
  display: inline-block;
  font-weight: 400;
  text-align: center;
  vertical-align: middle;
  user-select: none;
  border: 1px solid transparent;
  padding: .375rem .75rem;
  font-size: 1rem;
  line-height: 1.5;
  border-radius: .25rem;
  transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out;
}

.btn-primary {
  color: #fff;
  background-color: #007bff;
  border-color: #007bff;
}

.btn-primary:hover {
  color: #fff;
  background-color: #0069d9;
  border-color: #0062cc;
}

.row {
  display: flex;
  flex-wrap: wrap;
  margin-right: -15px;
  margin-left: -15px;
}

.col-md-6 {
  flex: 0 0 50%;
  max-width: 50%;
}

.text-center {
  text-align: center;
}

#passwordError {
  display: none;
}

#passwordError.active {
  display: block;
}


    </style>

</head>
<body>
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
    <div class="container border rounded py-3 mt-5 mb-5">
    <form action="addapplicant.php" id="regApplicants" method="post" style="align-items:center;" enctype="multipart/form-data" class="row g-2">
            <h1 class="text-center margin-bottom-20">CREATE YOUR PROFILE</h1>
                <div class="col-md-6">
                    <label for="applicant_fullname">Full Name</label>
                    <input type="text" class="form-control" name="applicant_fullname"  id="applicant_fullname">
                </div>

                <div class="col-md-6">
                    <label for="position" class="form-label">Gender</label>
                    <select name="position" id="position" class="form-select">
                        <option selected>Select Your Gender</option>
                        <option name="male" value="male">Male</option>
                        <option name="female" value="female">Female</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="cpassword" id="cpassword">
                </div>
                <div class="col-md-6">
                    <label for="dob" class="form-label">Date Of Birth</label>
                    <input type="date" class="form-control" name="dob" id="dob" min="1960-01-01" max="2005-12-31">
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">Contact Number</label>
                    <input type="password" class="form-control" name="phone" id="phone" minlength="11" maxlength="11" autocomplete="off" onkeypress="return validatePhone(event);" required>
                </div>
                <div class="col-md-6">
                    <label for="address">Address</label>
                    <textarea class="form-control" placeholder="address" id="address" name="address"></textarea>  
                </div>
                
                <div class="col-md-6">
                    <label for="lga" class="form-label">Select Local Government Area</label>
                    <select name="lga" id="lga" class="form-select">
                    <option value="lga" selected="lga">Select Local Government Area</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="state" class="form-label">Select State</label>
                    <select name="state" id="state" class="form-select">
                    <option value="state" selected="state">Select State</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="qualification" class="form-label">Qualification</label>
                    <select name="qualification" id="qualification" class="form-select">
                    <option value="qualification" selected="qualification">Qualification</option>
                    <option value="qualification">Higher School Certificate</option>
                        <option value="qualification">National Diploma</option>
                        <option value="qualification">Degree(B.Sc.)</option>
                        <option value="qualification">Higher Degree</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="experience" class="form-label">Experience</label>
                    <select name="experience" id="qualification" class="form-select">
                    <option value="experience" selected="experience">Select Years of Experience</option>
                        <option value="experience">A year</option>
                        <option value="experience">1 - 3yrs</option>
                        <option value="experience">4 - 6yrs</option>
                        <option value="experience">7 - 10yrs</option>
                        <option value="experience">11 - 15yrs</option>
                        <option value="experience">16 - 20yrs</option>
                        <option value="experience">21yrs and above</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="skills">Skills</label>
                    <textarea class="form-control" placeholder="skills" id="skills" name="skills"></textarea>  
                </div>
                <div class="col-md-6">
                    <h5>Resume: </h5>
                    <label for="photo" style="color: red;">File Format PDF Only!</label>
                    <input type="file" name="resume" id="resume" required />
                </div>
                <div class="col-md-6">
                    <label for="photo">Picture</label>
                    <input type="file" name="photo" id="photo" required />
                </div>
                

                <div class="col-12">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                    I accept terms & conditions
                    </label>
                    </div>
                </div>
                <div class="form-group justify-item-center" >
                    <button type="submit" class="btn btn-primary col-md-6 mb-3">Register</button>
                </div>
                <?php
                //if user already registered with this emai, then show error.
                if(isset($_SESSION['registerError'])){
                    ?>
                <div class="form-group">
                    <label style="color:red;">Email Already Exists! Choose a different Email Address</label>
                </div>
                <?php
                unset($_SESSION['registerError']);}
                ?>

                <?php
                //if user already registered with this emai, then show error.
                if(isset($_SESSION['uploadError'])){ ?>
                <div class="form-group">
                    <label style="color:red;"><?php echo $_SESSION['uploadError']; ?></label>
                </div>
                <?php
                unset($_SESSION['uploadError']);} ?>
        </form>

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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
  <script type="text/javascript">
        function validatePhone(event){
            var key = window.event ? event.keyCode : event.which;

            if(event.key == 8 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 39){
                return true;
            }else if(key < 48 || keyCode > 57){
                return false;
            }else return true;
        }
    </script>
    <script>
        $("#regCompanies").on("submit", function(e){
            e.preventDefault();
            if( $('#password').val() !=$('#cpassword').val()){
                $('#passwordError').show();
            }else{
                $(this).unbind('submit').submit();
            }
        });
    </script>

<script src="assets/jquery.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
        // Function to populate the "State" dropdown.
        function populateStates() {
            const stateDropdown = document.getElementById("stateid");

            // Fetch the states from the server (you need to create an API endpoint for this).
            fetch("get_states.php") // Replace with your API endpoint.
                .then((response) => response.json())
                .then((data) => {
                    data.forEach((state) => {
                        const option = document.createElement("option");
                        option.value = state.state_id;
                        option.textContent = state.state_name;
                        stateDropdown.appendChild(option);
                    });
                });
        }

        // Function to populate the "LGA" dropdown based on the selected "State".
        function populateLGAs(selectedStateId) {
            const lgaDropdown = document.getElementById("lga");
            lgaDropdown.innerHTML = ""; // Clear previous options.

            if (selectedStateId) {
                // Fetch the LGAs based on the selected state (you need to create an API endpoint for this).
                fetch(`get_lgas.php?state_id=${selectedStateId}`) 
                    .then((response) => response.json())
                    .then((data) => {
                        data.forEach((lga) => {
                            const option = document.createElement("option");
                            option.value = lga.lga_id;
                            option.textContent = lga.lga_name;
                            lgaDropdown.appendChild(option);
                        });
                    });
            }
        }

        // Add event listeners to trigger the population of "State" and "LGA" dropdowns.
        document.addEventListener("DOMContentLoaded", function() {
            populateStates();

            const stateDropdown = document.getElementById("stateid");
            stateDropdown.addEventListener("change", function() {
                const selectedStateId = this.value;
                populateLGAs(selectedStateId);
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min/js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
