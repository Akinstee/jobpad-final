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
    <title>JobPad</title>
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
            <form class="row g-3">
                <h1 class="text-center margin-bottom-20">CREATE COMPANY PROFILE</h1>
                <div class="col-md-6">
                    <label for="fullname">Fullname
                    </label>
                    <input type="text" class="form-control"
                        name="fullname" id="fullname" required/>
                </div>
                <div class="col-md-6">
                    <label for="email">Email Address
                    </label>
                    <input type="email" class="form-control"
                        name="email" id="email" required/>
                </div>
                <div class="col-md-6">
                    <label for="password">Password
                    </label>
                    <input type="password" class="form-control"
                        name="password" id="password" required/>
                </div>
                <div class="col-md-6">
                    <label for="cpassword">Confirm Password
                    </label>
                    <input type="text" class="form-control"
                        name="cpassword" id="cpassword" required/>
                </div>
                <div class="col-md-6">
                    <label for="website">Website
                    </label>
                    <input type="text" class="form-control"
                        name="website" id="website" required/>
                </div>
                <div class="col-md-6">
                    <label for="phone">Company Phone
                    </label>
                    <input type="text" class="form-control"
                        name="phone" id="phone" minlength="11" maxlength="11" autocomplete="off" onkeypress="return validatePhone(event);" required/>
                </div>
                <div class="col-md-6">
                    <label for="image">Attach Company Logo
                    </label>
                    <input type="file" class="form-control"
                        name="image" id="image" required/>
                </div>
                <div class="col-md-6">
                    <label for="position" class="form-label">Your Company Position</label>
                    <select name="position" id="position" class="form-select">
                    <option selected>Select Your Position</option>
                    <option name="position" value="position">C.E.O, C.O.O, M.D</option>
                    <option name="position" value="position">Senior Level: Head of Management, H.R</option>
                        <option name="position" value="position">Middle Level:Unit Head, Supervisor</option>
                        <option name="position" value="position">Junior Level:Staffs</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="employee" class="form-label">Number of Employees</label>
                    <select name="employee" id="employee" class="form-select">
                    <option selected>Select Your Staff Strength</option>
                    <option name="employee" value="employee">1-5</option>
                        <option name="employee" value="employee">6-10</option>
                        <option name="employee" value="employee">11-25</option>
                        <option name="employee" value="employee">26-50</option>
                        <option name="employee" value="employee">51-100</option>
                        <option name="employee" value="employee">101-150</option>
                        <option name="employee" value="employee">150+</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="employment" class="form-label">Type of Employment</label>
                    <select name="employment" id="employment" class="form-select">
                    <option selected>Select Your Type of Employment</option>
                    <option name="employment" id="employment" value="Direct Employment">Direct Employment</option>
                        <option name="employment" id="employment" value=" Recruitment Agency">Recruitment Agency</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="role" class="form-label">Job Role</label>
                    <select name="role" id="role" class="form-select">
                    <option selected>Select Your Type of Role</option>
                    <option name="role" value="Senior Level">Senior Level</option>
                        <option name="role" value="Mid Level">Mid Level</option>
                        <option name="role" value="Junior Level">Junior Level</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="industry" class="form-label">Industry</label>
                    <select name="industry" id="industry" class="form-select">
                    <option selected>Select Your Industry</option>
                    <option value="Accessories/Apparel/Fashion Design">Accessories/Apparel/Fashion Design</option>
                        <option value="Accounting/Consulting/Taxation">Accounting/Consulting/Taxation</option>
                        <option value="Advertising/Event Management/PR">Advertising/Event Management/PR</option>
                        <option value="Agriculture/Dairy Technology">Agriculture/Dairy Technology</option>
                        <option value="Airlines/Hotel/Hospitality/Travel/Tourism/Restaurants">Airlines/Hotel/Hospitality/Travel/Tourism/Restaurants</option>
                        <option value="Animation / Gaming">Animation / Gaming</option>
                        <option value="Architectural Services/ Interior Designing">Architectural Services/ Interior Designing</option>
                        <option value="Auto Ancillary/Automobiles/Components">Auto Ancillary/Automobiles/Components</option>
                        <option value="Banking/Financial Services/Stockbroking/Securities">Banking/Financial Services/Stockbroking/Securities</option>
                        <option value="Banking/FinancialServices/Broking">Banking/FinancialServices/Broking</option>
                        <option value="Biotechnology/Pharmaceutical/Clinical Research">Biotechnology/Pharmaceutical/Clinical Research</option>
                        <option value="Brewery/Distillery">Brewery/Distillery</option>
                        <option value="Cement/Construction/Engineering/Metals/Steel/Iron">Cement/Construction/Engineering/Metals/Steel/Iron</option>
                        <option value="Ceramics/Sanitaryware">Ceramics/Sanitaryware</option>
                        <option value="Chemicals/Petro Chemicals/Plastics">Chemicals/Petro Chemicals/Plastics</option>
                        <option value="Computer Hardware/Networking">Computer Hardware/Networking</option>
                        <option value="Consumer FMCG/Foods/Beverages">Consumer FMCG/Foods/Beverages</option>
                        <option value="Consumer Goods - Durables">Consumer Goods - Durables</option>
                        <option value="Courier/Freight/Transportation/Warehousing">Courier/Freight/Transportation/Warehousing</option>
                        <option value="CRM/ IT Enabled Services/BPO">CRM/ IT Enabled Services/BPO</option>
                        <option value="Education/Training/Teaching">Education/Training/Teaching</option>
                        <option value="Electricals/Switchgears">Electricals/Switchgears</option>
                        <option value="Employment Firms/Recruitment Services Firms">Employment Firms/Recruitment Services Firms</option>
                        <option value="Entertainment/Media/Publishing/Dotcom">Entertainment/Media/Publishing/Dotcom</option>
                        <option value="Export Houses/Textiles/Merchandise">Export Houses/Textiles/Merchandise</option>
                        <option value="FacilityManagement">FacilityManagement</option>
                        <option value="Fertilizers/Pesticides">Fertilizers/Pesticides</option>
                        <option value="FoodProcessing">FoodProcessing</option>
                        <option value="Gems and Jewellery">Gems and Jewellery</option>
                        <option value="Glass">Glass</option>
                        <option value="Government/Defence">Government/Defence</option>
                        <option value="Healthcare/Medicine">Healthcare/Medicine</option>
                        <option value="HeatVentilation/AirConditioning">HeatVentilation/AirConditioning</option>
                        <option value="Insurance">Insurance</option>
                        <option value="KPO/Research/Analytics">KPO/Research/Analytics</option>
                        <option value="Law/Legal Firms">Law/Legal Firms</option>
                        <option value="Machinery/Equipment Manufacturing/Industrial Products">Machinery/Equipment Manufacturing/Industrial Products</option>
                        <option value=">Mining">Mining</option>
                        <option value="NGO/Social Services">NGO/Social Services</option>
                        <option value="Office Automation">Office Automation</option>
                        <option value="Others/Engg. Services/Service Providers">Others/Engg. Services/Service Providers</option>
                        <option value="Petroleum/Oil and Gas/Projects/Infrastructure/Power/Non-conventional Energy">Petroleum/Oil and Gas/Projects/Infrastructure/Power/Non-conventional Energy</option>
                        <option value="Printing/Packaging">Printing/Packaging</option>
                        <option value="Publishing">Publishing</option>
                        <option value="Real Estate">Real Estate</option>
                        <option value="Retailing">Retailing</option>
                        <option value="Security/Law Enforcement">Security/Law Enforcement</option>
                        <option value="Shipping/Marine">Shipping/Marine</option>
                        <option value="Software Services">Software Services</option>
                        <option value="Steel">Steel</option>
                        <option value="Strategy/ManagementConsultingFirms">Strategy/ManagementConsultingFirms</option>
                        <option value="Telecom Equipment/Electronics/Electronic Devices/RF/Mobile Network/Semi-conductor">Telecom Equipment/Electronics/Electronic Devices/RF/Mobile Network/Semi-conductor</option>
                        <option value="Telecom/ISP">Telecom/ISP</option>
                            <option value="Tyres">Tyres</option>
                        <option value="WaterTreatment/WasteManagement">WaterTreatment/WasteManagement</option>
                        <option value="Wellness/Fitness/Sports">Wellness/Fitness/Sports</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="description">Description</label>
                    <textarea class="form-control" placeholder="description" id="description" name="description"></textarea>
                </div>
                <div class="col-md-6">
                    <label for="address">Company Address</label>
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
