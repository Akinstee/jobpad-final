<?php
session_start();
require("fetch_data.php");
if (!isset($_SESSION['company_id'])) {
    header('location:login.php');
}
$company_id = $_SESSION['company_id'];
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company DashBoard</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="test3.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2 sidebar">
                <div class="d-flex flex-column align-items-center">
                    <img src="img.jpg" alt="" class="img-fluid">
                    <h3 class="mt-3"><?php echo $companyName ?></h3>
                </div>
                <nav class="nav flex-column mt-3"><a href="dashboard.php" class="nav-link active"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    <a href="dashboard.php" class="nav-link active"><i class="fas fa-user-edit"></i>Edit Profile</a>
                    <a href="dashboard.php" class="nav-link active"><i class="fas fa-building"></i>Company Profile</a>
                    <a href="dashboard.php" class="nav-link active"><i class="fas fa-eye"></i>View Jobs</a>
                    <a href="dashboard.php" class="nav-link active"><i class="fas fa-file-alt"></i>Application</a>
                    <a href="add_job.php" class="nav-link active"><i class="fas fa-plus"></i>Add New Job</a>
                    <a href="change_password.php" class="nav-link active"><i class="fas fa-plus"></i>Change Password</a>
                    <a href="settings.php" class="nav-link active"><i class="fas fa-spanner"></i>Settings</a>
                    <a href="../logout.php" class="nav-link active"><i class="fas fa tachometer-alt"></i>Logout</a>
                </nav>
            </div>
            <div class="col-md-9 col-lg-10 main-content">
                <div class="card">
                    <h1>Welcome <?php echo $companyName; ?></h1>
                    <div class="container border rounded py-3 mt-3">
                        <h2 style="text-align:center;"><b>Add A Job</b></h2>
                        <form action="job_process.php" method="post" class="row row-cols-lg" style="align-items:center;">
                            <div class="row g-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="job_title"><b>Job Title</b></label>
                                        <input type="text" class="form-control" name="job_title" id="job_title" placeholder="Job Title">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="job_description"><b>Job Description</b></label>
                                        <input type="text" class="form-control" name="job_description" id="job_description" placeholder="Job Description">
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="job_level"><b>Job Level</b></label>
                                        <input type="text" class="form-control" name="job_level" id="job_level" placeholder="Job Level">
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="form-group" for="specificSizeSelect"><b>Job Function</b></label>
                                    <select class="form-select" id="specificSizeSelect" name="job_function">
                                        <option selected><b>Job Function</b></option>
                                        <option value="1" name="job_function"><b>IT</b></option>
                                        <option value="2" name="job_function"><b>Management</b></option>
                                        <option value="3" name="job_function"><b>Education</b></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <label class="form-group" for="specificSizeSelect"><b>State</b></label>
                                <select class="form-select specificSizeSelect" name="state" id="stateid">
                                    <option value="">SELECT STATE</option>
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-group" for="specificSizeSelect"><b>Select LGA</b></label>
                                <select class="form-select specificSizeSelect" id="lga" name="lga"></select>
                            </div>


                            <div class="row g-2">
                                <div class="col">
                                    <label class="form-group" for="specificSizeSelect"><b>Employment Type</b></label>
                                    <select class="form-select" name="employment_type" id="employment">
                                        <option selected><b>Employment Type</b></option>
                                        <option value="employment_type"><b>Internship</b></option>
                                        <option value="employment_type"><b>Part Time</b></option>
                                        <option value="employment_type"><b>Full Time</b></option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="form-group" for="specificSizeSelect"><b>Location Type</b></label>
                                    <select class="form-select" name="location_type" id="location_type">
                                        <option selected><b>location Type</b></option>
                                        <option value="location_type"><b>Remote</b></option>
                                        <option value="location_type"><b>Hybrid</b></option>
                                        <option value="location_type"><b>Onsite</b></option>
                                    </select>
                                </div>
                            </div>

                            <div class="row g-2">
                                <div class="col">
                                    <label class="form-group" for="maximum_salary"><b>Minimum Salary</b></label>
                                    <input type="number" min="1000" max="1000000" class="form-control" name="minimumsalary" id="minimumsalary" placeholder="Minimum Salary" required="">
                                </div>
                                <div class="col">
                                    <label class="form-group" for="maximumsalary"><b>Maximum Salary</b></label>
                                    <input type="number" min="1000" max="1000000" class="form-control" name="maximumsalary" id="maximumsalary" placeholder="Maximum Salary" required="">
                                </div>
                            </div>

                            <div class="row g-2">
                                <div class="col">
                                    <label class="form-group" for="experience"><b>Experience</b></label>
                                    <input type="number" min="1000" max="1000000" class="form-control" name="experience" id="experience" placeholder="experience" required="">
                                </div>
                                <div class="col">
                                    <label class="form-group" for="specificSizeSelect"><b>Qualification</b></label>
                                    <select class="form-select" name="qualification" id="qualification">
                                        <option selected><b>Qualification</b></option>
                                        <option value="qualification"><b>High School</b></option>
                                        <option value="qualification"><b>Diploma</b></option>
                                        <option value="qualification"><b>Bachelor Degree</b></option>
                                        <option value="qualification"><b>Masters' Degree</b></option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class=" form-group col-12 g-3 text-center">
                                <button type="submit" class="btn btn-success col-md-4"><b>Sign in</b></button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
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
                fetch(`get_lgas.php?state_id=${selectedStateId}`) // Replace with your API endpoint.
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
</body>

</html>