<?php
session_start();
if (isset($_SESSION['staff_email'])) {
    $staff_email = $_SESSION['staff_email'];

    // Your database connection code should be included here
    include("connection.php");

    $sel = "SELECT * FROM workart_staff WHERE email = '$staff_email'";
    $que = mysqli_query($conn, $sel) or die('Error');
    $cadidate = "SELECT * FROM candidate_details";
    $cadi = mysqli_query($conn, $cadidate) or die('Error');
    if (mysqli_num_rows($que) > 0) {
        $fetch = mysqli_fetch_assoc($que);
    }

    // Rest of your code that displays user information, etc.
} else {
    header('location: staff-login.php'); // Redirect to the home page or login page if the user is not logged in
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talent Pool</title>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <link rel="stylesheet" href="CSS\talentpool.css">
    <script src="cities.js"></script>
    <script src="only-cities.js"></script>
</head>

<body class="bg-white">
    <!-- Navbar -->
    <nav class="navbar navbar-primary sticky-top p-1" style="background-color: #313949;">
        <div class="row">
            <a class="navbar-brand d-flex" href="admindash.html" style="color: black; margin-right:20px;">
                <img src="web-images/cropped-workart-white-500-2.png" style="width: 5rem; margin-bottom: 25px;" alt="">
                <h4 style="margin-left: 20px; color: white; margin-top: 8px;">Manage Candidates</h4>
            </a>
        </div>
        <div class="menu-icon p-3">
            <ul class="navbar-nav" id="list">
                <li class="nav-item">
                    <a style="color: #ffffff;" class="nav-link support-link" href="employeedash.php"><i class="fa fa-solid fa-angle-left fa-xl" style="color: #ffffff; background-color: transparent;"></i>&nbsp;Back</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Navbar -->


    <div class="container-fluid bg-white p-2">
        <div class="row p-3 mt-2">
            <div class="col-md-6">
                <form action="" id="select-job" class="d-flex">
                    <select name="custom-select" id="custom-select" style="width: 50%;" class="custom-select">
                        <option value="" class="text-muted" hidden>All</option>
                        <option value="">----</option>
                        <option value="">----</option>
                        <option value="">----</option>
                        <option value="">----</option>
                    </select>
                    <input type="submit" class="btn btn-primary" style="margin-left: 2vh;" name="select-job" id="" value="Select Job">
                </form>
            </div>
            <div class="col-md-6 mt-2 d-flex" style="justify-content:right;">
                <div class="container-fluid" style="justify-content:right;">
                    <div class="row" style="justify-content:right;">
                        <button class="btn" id="b1" type="submit" value="submit" data-toggle="modal" data-target="#staticBackdrop" style="background-color: #313949; color: white; width:30%;">+ Add Candidate</button>

                    </div>
                    <div class="row" style="justify-content:right;">
                        <div class="col-md-4 mt-2 d-flex" style="justify-content:right;">
                            <button type="button" class="p-1" style="border-radius:5px; width:10vh;"><strong>Filter</strong><i class="fa-solid fa-filter fa-lg"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid bg-white">
        <div class="row p-2">
            <div class="col-md-10">
                <h4>Active Jobs</h4>
            </div>
            <div class="col-md-2">
                <center>
                    <div class="card" style="border:2px solid #1EBC30; background-color:#E5F9E7; height:5vh;"><span><strong>Total Candidates</strong> : <strong>5824</strong></span></div>
                </center>
            </div>
        </div>
        <hr>
        <div class="row p-3" style="width:100%; overflow-x: scroll; ">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">City</th>
                        <th scope="col">Current CTC</th>
                        <th scope="col">Expected CTC</th>
                        <th scope="col">Exprience</th>
                        <th scope="col">Notice Period</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Age</th>
                        <th scope="col">Current Position</th>
                        <th scope="col">Previous Position</th>
                        <th scope="col">Education</th>
                        <th scope="col">Pref. Location</th>
                        <th scope="col">Key Skills</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($candidateInfo = mysqli_fetch_assoc($cadi)) { ?>
                        <tr>

                            <td>WCA0<?php echo $candidateInfo['candidate_id'] ?></td>
                            <td><?php echo $candidateInfo['candidate_name'] ?></td>
                            <td><?php echo $candidateInfo['candidate_mobile'] ?></td>
                            <td><?php echo $candidateInfo['candidate_email'] ?></td>
                            <td><?php echo $candidateInfo['candidate_alternate_mobile'] ?></td>
                            <td><?php echo $candidateInfo['candidate_current_location'] ?></td>
                            <td><?php echo $candidateInfo['candidate_experience'] ?></td>
                            <td><?php echo $candidateInfo['candidate_current_ctc'] ?></td>
                            <td><?php echo $candidateInfo['candidate_expected_ctc'] ?></td>
                            <td><?php echo $candidateInfo['candidate_notice_period'] ?></td>
                            <td><?php echo $candidateInfo['candidate_position'] ?></td>
                            <td><?php echo $candidateInfo['candidate_last_working_date'] ?></td>
                            <td><?php echo $candidateInfo['candidate_comment'] ?></td>
                            <td><?php echo $candidateInfo['candidate_exit_reason'] ?></td>
                            <td><?php echo $candidateInfo['candidate_resume_link'] ?></td>
                            <td><?php echo $candidateInfo['candidate_naukri_url'] ?></td>
                            <td><?php echo $candidateInfo['candidate_linkedin_url'] ?></td>
                            <td><a href="<?php echo $candidateInfo['candidate_portfolio_url'] ?></">View LinkdIn</a><td>

                            <td>
                                <input type="submit" class="btn btn-sm btn-outline-primary ml-2 p-2" style="margin-left: 2vh;" value="Edit">
                            </td>
                            <td>
                                <input type="submit" class="btn btn-sm btn-outline-success ml-2 p-2" style="margin-left: 2vh;" value="View Resume / Contact">
                            </td>
                        </tr>
                    <?php } ?>


                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-right" style="width: 80%;">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card-header d-flex justify-content-end">
                        <i class="fa fa-close close float-right" data-dismiss="modal"></i>
                    </div>
                    <div class="tabs mt-3">
                        <div class="row">
                            <center>
                                <h4 style="color:#313949;">Candidate Details</h4>
                            </center>
                        </div>
                        <hr>
                        <div class="container">
                            <div class="row">
                                <form action="" class="p-3">

                                    <div class="form-group mt-2">
                                        <label for="member-name">Name <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" id="member-name" name="member-name" placeholder="Enter Name" required>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="member-email">Email address <span style="color: red;">*</span></label>
                                        <input type="email" class="form-control" name="member-email" id="member-email" aria-describedby="emailHelp" placeholder="Enter email" required>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="member-phone">Phone <span style="color: red;">*</span></label>
                                        <input type="number" class="form-control" id="member-phone" name="member-phone" placeholder="Enter Phone Number" required>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="sts">Current State <span style="color: red;">*</span></label>
                                        <select onchange="print_city('state', this.selectedIndex);" id="sts" name="stt" class="form-select" required></select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="state">Current City <span style="color: red;">*</span></label>
                                        <select id="state" class="form-select" required></select>
                                    </div>
                                    <script language="javascript">
                                        print_state("sts");
                                    </script>
                                    <div class="form-group mt-2">
                                        <label for="city-select">Looking For Jobs In <span style="color: red;">*</span></label>
                                        <select class="form-select" required id="city-select" required></select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="candidate-experience">Candidate Experience <span style="color: red;">*</span></label>
                                        <select class="form-select" required id="candidate-experience" required></select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="candidate-notice-period">Notice period (in days) <span style="color: red;">*</span></label>
                                        <input type="number" class="form-control" name="" id="candidate-notice-period" required>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="candidate-present-ctc">Present CTC (in LPA) <span style="color: red;">*</span></label>
                                        <input type="number" class="form-control" name="" id="candidate-present-ctc" placeholder="For Example : 3" required>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="candidate-expected-ctc">Expected CTC (in LPA) <span style="color: red;">*</span></label>
                                        <input type="number" class="form-control" name="" id="candidate-expected-ctc" placeholder="For Example : 12" required>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="candidate-experience">Experiences <span style="color: red;">*</span></label>
                                        <button onclick="addExperienceSection()" class="btn btn-outline-success" id="add-experience">+ Add Experience</button>
                                    </div>
                                    <div id="experience-container"></div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <script>
        // JavaScript se select element ko prapt karen
        var citySelect = document.getElementById('city-select');

        // Shehron ki list
        var cities = [
            "Select City",
            "Mumbai",
            "Delhi",
            "Bangalore",
            "Kolkata",
            "Chennai",
            "Hyderabad",
            "Pune",
            "Ahmedabad",
            "Jaipur",
            "Lucknow",
            "Kanpur",
            "Nagpur",
            "Patna",
            "Indore",
            "Thane",
            "Bhopal",
            "Visakhapatnam",
            "Vadodara",
            "Ludhiana",
            "Rajkot",
            "Agra",
            "Srinagar",
            "Gwalior",
            // Add more cities as needed
        ];


        // Shehron ki list ko select element mein daalna
        for (var i = 0; i < cities.length; i++) {
            var option = document.createElement('option');
            option.text = cities[i];
            citySelect.add(option);
        }
    </script>
    <script>
        // JavaScript to generate options for candidate experience
        var experienceSelect = document.getElementById('candidate-experience');

        for (var years = 0; years <= 50; years++) {
            for (var months = 0; months < 12; months++) {
                var optionText = years + ' Year ' + months + ' Month';
                var optionValue = years + ' Year ' + months + ' Month';
                var option = document.createElement('option');
                option.value = optionValue;
                option.text = optionText;
                experienceSelect.appendChild(option);
            }
        }
    </script>
    <script>
        // Function to add a new experience section
        function addExperienceSection() {
            const container = document.getElementById("experience-container");

            // Create a new row for the experience section
            const row = document.createElement("div");
            row.className = "row p-2";

            // Create the individual form fields for the experience section
            const experienceFields = `
    <div class="col-md-4">
      <div class="form-group">
        <label for="experience-company">Company <span style="color: red;">*</span></label>
        <input type="text" class="form-control" required>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="experience-title">Title <span style="color: red;">*</span></label>
        <input type="text" class="form-control" required>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="experience-from">From <span style="color: red;">*</span></label>
        <input type="date" class="form-control" required>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="experience-until">Until <span style="color: red;">*</span></label>
        <input type="date" class="form-control" required>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <button class="btn btn-danger mt-4" onclick="removeExperienceSection(this)">Remove</button>
      </div>
    </div>
  `;

            // Set the innerHTML of the row to the experienceFields
            row.innerHTML = experienceFields;

            // Append the row to the container
            container.appendChild(row);
        }

        // Event listener for the "+ Add Experience" button
        const addExperienceButton = document.getElementById("add-experience");
        addExperienceButton.addEventListener("click", addExperienceSection);

        // Function to remove the experience section
        function removeExperienceSection(button) {
            const row = button.closest(".row");
            row.remove();
        }
    </script>
</body>

</html>