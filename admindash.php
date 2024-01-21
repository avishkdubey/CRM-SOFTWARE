<?php
session_start();
if (isset($_SESSION['admin_email'])) {
    $admin_email = $_SESSION['admin_email'];

    // Your database connection code should be included here
    include("connection.php");

    $sel = "SELECT * FROM admin WHERE admin_email = '$admin_email'";
    $que = mysqli_query($conn, $sel) or die('Error');

    if (mysqli_num_rows($que) > 0) {
        $fetch = mysqli_fetch_assoc($que);
    }

    // Rest of your code that displays user information, etc.
} else {
    header('location: admin-login-page.php'); // Redirect to the home page or login page if the user is not logged in
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord</title>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS\admindash2.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <!-- Include Bootstrap JavaScript and its dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</head>



<body>
    <!-- Navbar -->
    <nav class="navbar navbar-primary sticky-top p-1" style="background-color: #313949;">
        <div class="row">
            <a class="navbar-brand d-flex" href="admindash.php" style="color: black; margin-right:20px;">
                <img src="web-images/cropped-workart-white-500-2.png" style="width: 5rem; margin-bottom: 25px;" alt="">
            </a>
        </div>
        <div class="container options mr-5">
            <ul class="d-flex">
                <li class="dropdown-toggle p-2">
                    <div class="dropdown">
                        <span>Candidate</span>
                        <div class="dropdown-content">
                            <ul class="candidate">
                                <li><a class="menu-item" style="text-decoration: none; color: black;" href="">Application</a></li>
                                <li><a class="menu-item" style="text-decoration: none; color: black;" href="">Submissions</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="p-2"><a href="#">Client</a></li>
            </ul>
            <ul>
                <li><button id="myBtn" style="background-color: transparent; padding-right: 10px; padding-left: 10px;"><a href="#"><i class="fa-solid fa-bullhorn fa-beat-fade fa-sm" style="color: #ffffff;"></i></a></button></li>
            </ul>
        </div>


        <div class="menu-icon">
            <div class="container"><i class="fa-solid fa-bars fa-lg p-2" style="color: white;"></i></div>
            <div class="dropdown-menu">
                <a class="menu-item" href="#"><ion-icon name="people-outline"></ion-icon> People</a>
                <a class="menu-item" href="#"><ion-icon name="settings-outline"></ion-icon> Settings</a>
                <a class="menu-item" href="#"><ion-icon name="chatbubbles-outline"></ion-icon> Chat</a>
                <a class="menu-item" href="manage-team.html"><i class="fa fa-solid fa-people-group"></i> Manage Team</a>
                <center>
                    <lable style="font-weight: 700;">View As</lable>
                </center>
                <a>
                    <div class="div mb-3">
                        <div class="ul">
                            <form>
                                <select name="" id="select" class="custom-select">
                                    <option value="">JAYDEEP SINGH RAJPUROHIT</option>
                                    <option value="">GANESH</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </a>
                <a class="menu-item" href="admin-logout.php"><ion-icon name="log-out-outline"></ion-icon> Log Out</a>
            </div>
        </div>
    </nav>
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <h1>📣</h1>
                    </div>
                    <div class="col-md-6"><span class="close">&times;</span></div>
                </div>
            </div>

            <p>Some text in the Modal..</p>
        </div>

    </div>
    <!-- Navbar -->
    <div class="container-fluid bg-light p-5">
        <div class="row">
            <div class="main__title">
                <img src="web-images\result.png" alt="" />
                <div class="main__greeting">

                    <h1>Hello,
                        <?= $fetch['admin_name']; ?>
                    </h1>
                    <div class="d-flex">
                        <p>Good Day To You.. &nbsp;
                        <h5>😄</h5>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-light" style="width: 100%; padding-bottom:15rem;">
        <div class="row d-flex" id="quick-link">
            <span class="d-flex">
                <h5>Quick Links</h5>&nbsp;&nbsp;<i class="fa-solid fa-link fa-beat-fade fa-2xs mt-3 " style="color: #835DD4;"></i>
            </span>
        </div>
        <div class="row" style="margin-top: -25px;">
            <div class="card m-2 col-md upper-option" id="card">
                <a href="admin-myhrm.php">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2"><i class="fa-solid fa-money-bill-trend-up icon"></i></div>
                            <div class="col-md-10">My HRMS</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class=" card m-2 col-md upper-option" id="card">
                <a href="job-opening.html">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2"><i class="fa fa-solid fa-book icon"></i></div>
                            <div class="col-md-10">Job Openings</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class=" card m-2 col-md upper-option" id="card">
                <a href="talentpool.php">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2"><i class="fa fa-solid fa-people-group icon"></i></div>
                            <div class="col-md-10">Talent Pool</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="card m-2 col-md" id="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4"><i class="fa fa-solid fa-gear icon"></i></div>
                        <div class="col-md-8">Application Tracker</div>
                    </div>
                </div>
            </div>
            <div class="card m-2 col-md" id="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4"><i class="fa fa-solid fa-upload icon"></i></div>
                        <div class="col-md-8">Import Candidates</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card m-2 col-md-2" id="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2"><i class="fa fa-solid fa-gauge-high icon"></i></div>
                        <div class="col-md-10">Recruiter Report</div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container-fluid bg-white">
            <div class="row p-5">
                <div class="custom-select-container">
                    <select name="custom-select2" id="custom-select2" class="custom-select2">
                        <option value="" hidden>Date Filter</option>
                        <option value="">Today</option>
                        <option value="">Yesterday</option>
                        <option value="">Last Week</option>
                        <option value="">Last 7 Days</option>
                        <option value="">Last 30 Days</option>
                        <option value="" disabled>--------------------</option>
                        <option value="">Last Month</option>
                        <option value="">Last 3 Months</option>
                        <option value="">Last 12 Months</option>
                        <option value="" disabled>--------------------</option>
                        <option value="">Specific dates...</option>
                        <option value="">Relative dates...</option>
                        <option value="">Exclude...</option>
                    </select>
                </div>
            </div>



            <div class="container-fluid bg-light">
                <div class="row p-2">
                    <div class="col-md-4">
                        <div id="myPlot" style="width: 100%; max-width: 700px"></div>
                    </div>
                    <div class="col-md-4">
                        <div id="myPlot1" style="width:100%;max-width:700px"></div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mt-1">
                                    <center>
                                        <h1 class="mt-5" style="font-weight: 800;">3</h1>
                                        <p style="font-size: 1.2rem; width: 100%; height: 6rem; "># Offered Candidates
                                        <p>
                                    </center>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mt-1">
                                    <center>
                                        <h1 class="mt-5" style="font-weight: 800;">45</h1>
                                        <p style="font-size: 1.2rem; width: 100%; height: 6rem; "># Joining
                                        <p>
                                    </center>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mt-2">
                                    <center>
                                        <h1 class="mt-5" style="font-weight: 800;">18%</h1>
                                        <p style="font-size: 1.2rem; width: 100%; height: 6rem; "># Client Acceptance %
                                        <p>
                                    </center>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mt-2">
                                    <center>
                                        <h1 class="mt-5" style="font-weight: 800;">L</h1>
                                        <p style="font-size: 1.2rem; width: 100%; height: 6rem; ">#
                                            Joined CTC Amount
                                        <p>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mt-5 w-100">
            <div class="row mt-3" id="scheduled">
                <span class="d-flex">
                    <h3>Scheduled Calls</h3>
                    &nbsp;&nbsp;
                    <ion-icon data-bs-toggle="collapse" class="drop-icon" data-bs-target="#demo" name="caret-down-circle-outline"></ion-icon></button>
                </span>
            </div>


            <div class="row collapse" id="demo">
                <div class="row">
                    <div class="col-md" style=" display: inline-block;">
                        <div class="row p-5">
                            <div class="custom-select-container">
                                <div class="row">
                                    <form action=" " class="custom-select-form col-md-2 p-2">
                                        <select name="custom-select1" class="custom-select2">
                                            <option value="" hidden>Recruiter</option>
                                            <option value="">Today</option>
                                            <option value="">Yesterday</option>
                                            <option value="">Last Week</option>
                                            <option value="">Last 7 Days</option>
                                            <option value="">Last 30 Days</option>
                                            <option value="" disabled>--------------------</option>
                                            <option value="">Last Month</option>
                                            <option value="">Last 3 Months</option>
                                            <option value="">Last 12 Months</option>
                                            <option value="" disabled>--------------------</option>
                                            <option value="">Specific dates...</option>
                                            <option value="">Relative dates...</option>
                                            <option value="">Exclude...</option>
                                        </select>
                                    </form>
                                    <form action="" class="custom-select-form col-md-2 p-2">
                                        <select name="custom-select2" class="custom-select2">
                                            <option value="" hidden>Client</option>
                                            <option value="">Today</option>
                                            <option value="">Yesterday</option>
                                            <option value="">Last Week</option>
                                            <option value="">Last 7 Days</option>
                                            <option value="">Last 30 Days</option>
                                            <option value="" disabled>--------------------</option>
                                            <option value="">Last Month</option>
                                            <option value="">Last 3 Months</option>
                                            <option value="">Last 12 Months</option>
                                            <option value="" disabled>--------------------</option>
                                            <option value="">Specific dates...</option>
                                            <option value="">Relative dates...</option>
                                            <option value="">Exclude...</option>
                                        </select>
                                    </form>
                                    <form action="" class="custom-select-form col-md-2 p-2">
                                        <select name="custom-select3" class="custom-select2">
                                            <option value="" hidden>Date</option>
                                            <option value="">Today</option>
                                            <option value="">Yesterday</option>
                                            <option value="">Last Week</option>
                                            <option value="">Last 7 Days</option>
                                            <option value="">Last 30 Days</option>
                                            <option value="" disabled>--------------------</option>
                                            <option value="">Last Month</option>
                                            <option value="">Last 3 Months</option>
                                            <option value="">Last 12 Months</option>
                                            <option value="" disabled>--------------------</option>
                                            <option value="">Specific dates...</option>
                                            <option value="">Relative dates...</option>
                                            <option value="">Exclude...</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Candidate Name</th>
                            <th scope="col">Job</th>
                            <th scope="col">Stage</th>
                            <th scope="col">Scheduled At</th>
                            <th scope="col">Client</th>
                            <th scope="col">Recruiter</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="">Akshay bajaj</a></td>
                            <td>Relationship Manager ( Direct Channel ) @ Kotak Life Insurance</td>
                            <td>Screening</td>
                            <td>Wed, Sep 20, 2023, 2:00 PM</td>
                            <td><a href="">Kotak Life Insurance</a></td>
                            <td><a href="">JAYDEEP SINGH RAJPUROHIT</a></td>
                        </tr>
                        <tr>
                            <td><a href="">Akshay bajaj</a></td>
                            <td>Relationship Manager ( Direct Channel ) @ Kotak Life Insurance</td>
                            <td>Screening</td>
                            <td>Wed, Sep 20, 2023, 2:00 PM</td>
                            <td><a href="">Kotak Life Insurance</a></td>
                            <td><a href="">JAYDEEP SINGH RAJPUROHIT</a></td>
                        </tr>
                    </tbody>
                </table>
                <hr class="mt-5">
            </div>
        </div>

        <div class="container-fluid mt-2 w-100">
            <div class="row mt-3" id="scheduled1">
                <span class="d-flex">
                    <h3>Pending Screening</h3>
                    &nbsp;&nbsp;
                    <ion-icon data-bs-toggle="collapse" class="drop-icon" style="font-size: 2rem;" data-bs-target="#demo1" name="caret-down-circle-outline"></ion-icon>
                </span>
            </div>

            <div class="row mt-3 collapse" id="demo1">
                <div class="d-flex">
                    <div class="card m-2" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Senior Visa Counselor @ SWEC Visa Consultant Pvt Ltd (J003106)</h5>
                            <p class="card-text text-muted">1 pending for screening</p>
                            <p class="card-text text-muted">7 Jun, 23</p>
                            <a href="#" class="card-link" style="float: right;"><ion-icon style="font-size: 1.5rem;" name="eye-outline"></ion-icon></a>
                        </div>
                    </div>

                    <div class="card m-2" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Senior Visa Counselor @ SWEC Visa Consultant Pvt Ltd (J003106)</h5>
                            <p class="card-text text-muted">1 pending for screening</p>
                            <p class="card-text text-muted">7 Jun, 23</p>
                            <a href="#" class="card-link" style="float: right;"><ion-icon style="font-size: 1.5rem;" name="eye-outline"></ion-icon></a>
                        </div>
                    </div>
                </div>
                <hr class="mt-5">
            </div>
        </div>
        <div class="container-fluid mt-2 w-100">
            <div class="row mt-3" id="scheduled2">
                <span class="d-flex">
                    <h3>No Recruiter Assigned</h3>
                    &nbsp;&nbsp;
                    <ion-icon data-bs-toggle="collapse" class="drop-icon" style="font-size: 2rem;" data-bs-target="#demo2" name="caret-down-circle-outline"></ion-icon>
                </span>
            </div>
            <div class="row mt-3 collapse" id="demo2">
                <div class="d-flex">
                    <div class="container-flex">
                        <div class="row">
                            <div class="col-md">
                                <div class="card m-2" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">CRM ( Corporate Solution Group )CSG @ Kotak Life
                                            Insurance
                                            (J003096)
                                        </h5>
                                        <p class="card-text text-muted">Activation date: 1st Oct</p>
                                        <div class="row">
                                            <a href=""><input type="button" class="btn btn-lg w-100 btn-primary" value="View Job"></a>
                                        </div>
                                        <div class="row p-2">
                                            <form action="" class="d-flex">
                                                <div class="col-md-10">
                                                    <select style="width: 25vh;" name="custom-select3" class="custom-select2" aria-placeholder="Select Recruiter(s)">
                                                        <option hidden>Select Recruiter(s)</option>
                                                        <option value="">Ganesh</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="submit" class="btn btn-sm btn-success ml-2 mt-1" value="Assign">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="card m-2" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">CRM ( Corporate Solution Group )CSG @ Kotak Life
                                            Insurance
                                            (J003096)
                                        </h5>
                                        <p class="card-text text-muted">Activation date: 1st Oct</p>
                                        <div class="row">
                                            <a href=""><input type="button" class="btn btn-lg w-100 btn-primary" value="View Job"></a>
                                        </div>
                                        <div class="row p-2">
                                            <form action="" class="d-flex">
                                                <div class="col-md-10">
                                                    <select style="width: 25vh;" name="custom-select3" class="custom-select2" aria-placeholder="Select Recruiter(s)">
                                                        <option hidden>Select Recruiter(s)</option>
                                                        <option value="">Ganesh</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="submit" class="btn btn-sm btn-success ml-2 mt-1" value="Assign">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="card m-2" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">CRM ( Corporate Solution Group )CSG @ Kotak Life
                                            Insurance
                                            (J003096)
                                        </h5>
                                        <p class="card-text text-muted">Activation date: 1st Oct</p>
                                        <div class="row">
                                            <a href=""><input type="button" class="btn btn-lg w-100 btn-primary" value="View Job"></a>
                                        </div>
                                        <div class="row p-2">
                                            <form action="" class="d-flex">
                                                <div class="col-md-10">
                                                    <select style="width: 25vh;" name="custom-select3" class="custom-select2" aria-placeholder="Select Recruiter(s)">
                                                        <option hidden>Select Recruiter(s)</option>
                                                        <option value="">Ganesh</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="submit" class="btn btn-sm btn-success ml-2 mt-1" value="Assign">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="card m-2" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">CRM ( Corporate Solution Group )CSG @ Kotak Life
                                            Insurance
                                            (J003096)
                                        </h5>
                                        <p class="card-text text-muted">Activation date: 1st Oct</p>
                                        <div class="row">
                                            <a href=""><input type="button" class="btn btn-lg w-100 btn-primary" value="View Job"></a>
                                        </div>
                                        <div class="row p-2">
                                            <form action="" class="d-flex">
                                                <div class="col-md-10">
                                                    <select style="width: 25vh;" name="custom-select3" class="custom-select2" aria-placeholder="Select Recruiter(s)">
                                                        <option hidden>Select Recruiter(s)</option>
                                                        <option value="">Ganesh</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="submit" class="btn btn-sm btn-success ml-2 mt-1" value="Assign">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="card m-2" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">CRM ( Corporate Solution Group )CSG @ Kotak Life
                                            Insurance
                                            (J003096)
                                        </h5>
                                        <p class="card-text text-muted">Activation date: 1st Oct</p>
                                        <div class="row">
                                            <a href=""><input type="button" class="btn btn-lg w-100 btn-primary" value="View Job"></a>
                                        </div>
                                        <div class="row p-2">
                                            <form action="" class="d-flex">
                                                <div class="col-md-10">
                                                    <select style="width: 25vh;" name="custom-select3" class="custom-select2" aria-placeholder="Select Recruiter(s)">
                                                        <option hidden>Select Recruiter(s)</option>
                                                        <option value="">Ganesh</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="submit" class="btn btn-sm btn-success ml-2 mt-1" value="Assign">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mt-5">
            </div>
        </div>
        <div class="container-fluid mt-2 w-100">
            <div class="row mt-3" id="scheduled3">
                <span class="d-flex">
                    <h3>Active Jobs</h3>
                    &nbsp;&nbsp;
                    <ion-icon data-bs-toggle="collapse" class="drop-icon" style="font-size: 2rem;" data-bs-target="#demo3" name="caret-down-circle-outline"></ion-icon>
                </span>
            </div>

            <div class="row collapse" id="demo3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Job</th>
                            <th scope="col">Assigned recruiter in Job</th>
                            <th scope="col">Target</th>
                            <th scope="col">Pipeline</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="row">
                                    <center>
                                        <div class="card" style="width: 20rem;">
                                            <div class="card-body">
                                                <p class="card-text">frontend@J004645</p>
                                                <p class="card-text">Kotak Life Insurance&nbsp;&nbsp;<ion-icon name="trash-outline" style="font-size: 1.3rem;"></ion-icon>&nbsp;&nbsp;&nbsp;<ion-icon name="create-outline" style="font-size: 1.3rem;"></ion-icon></p>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <a href=""> <button class="btn btn-outline-success">Add
                                                    Candidate</button></a>
                                        </div>
                                    </center>
                                </div>

                            </td>
                            <td>
                                <div class="row">
                                    <center>
                                        <div class="row">
                                            <form action="" class="d-flex">
                                                <select name="custom-select3" class="custom-select2" aria-placeholder="Select Recruiter(s)">
                                                    <option hidden>Select Recruiter(s)</option>
                                                    <option value="">Ganesh</option>
                                                </select>
                                                <input type="submit" class="btn btn-sm btn-success ml-2" style="margin-left: 2vh;" value="Assign">
                                            </form>
                                        </div>
                                        <div class="row mt-2">
                                            <a href=""> <button class="btn btn-outline-primary">Manage Team</button></a>
                                        </div>
                                    </center>
                                </div>
                            </td>
                            <td>Assign team before proceeding</td>
                            <td>
                                <div class="row p-1">
                                    <div class="col-md-3">
                                        <center>
                                            <h5>LEADS</h5>
                                            <h5>0</h5>
                                        </center>
                                    </div>
                                    <div class="col-md-3">
                                        <center>
                                            <h5>OFFERED</h5>
                                            <h5>0</h5>
                                        </center>
                                    </div>
                                    <div class="col-md-3">
                                        <center>
                                            <h5>JOINED</h5>
                                            <h5>0</h5>
                                        </center>
                                    </div>
                                    <div class="col-md-3">
                                        <center>
                                            <h5>INPROCESS</h5>
                                            <h5>0</h5>
                                        </center>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <center>
                                        <div class="card" style="width: 18rem;">
                                            <div class="card-body">
                                                <p class="card-text">frontend@J004645</p>
                                                <p class="card-text">Kotak Life Insurance&nbsp;&nbsp;<ion-icon name="trash-outline" style="font-size: 1.3rem;"></ion-icon>&nbsp;&nbsp;&nbsp;<ion-icon name="create-outline" style="font-size: 1.3rem;"></ion-icon></p>
                                            </div>
                                        </div>
                                        <div class="row mt-2 collapse">
                                            <a href=""> <button class="btn btn-outline-success">Add
                                                    Candidate</button></a>
                                        </div>
                                    </center>
                                </div>

                            </td>
                            <td>
                                <div class="row">
                                    <center>
                                        <div class="row">
                                            <form action="" class="d-flex">
                                                <select name="custom-select3" class="custom-select2" aria-placeholder="Select Recruiter(s)">
                                                    <option hidden>Select Recruiter(s)</option>
                                                    <option value="">Ganesh</option>
                                                </select>
                                                <input type="submit" class="btn btn-sm btn-success ml-2" style="margin-left: 2vh;" value="Assign">
                                            </form>
                                        </div>
                                        <div class="row mt-2">
                                            <a href=""> <button class="btn btn-outline-primary">Manage Team</button></a>
                                        </div>
                                    </center>
                                </div>
                            </td>
                            <td>Assign team before proceeding</td>
                            <td>
                                <div class="row p-1">
                                    <div class="col-md-3">
                                        <center>
                                            <h5>LEADS</h5>
                                            <h5>0</h5>
                                        </center>
                                    </div>
                                    <div class="col-md-3">
                                        <center>
                                            <h5>OFFERED</h5>
                                            <h5>0</h5>
                                        </center>
                                    </div>
                                    <div class="col-md-3">
                                        <center>
                                            <h5>JOINED</h5>
                                            <h5>0</h5>
                                        </center>
                                    </div>
                                    <div class="col-md-3">
                                        <center>
                                            <h5>INPROCESS</h5>
                                            <h5>0</h5>
                                        </center>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <center>
                                        <div class="card" style="width: 18rem;">
                                            <div class="card-body">
                                                <p class="card-text">frontend@J004645</p>
                                                <p class="card-text">Kotak Life Insurance&nbsp;&nbsp;<ion-icon name="trash-outline" style="font-size: 1.3rem;"></ion-icon>&nbsp;&nbsp;&nbsp;<ion-icon name="create-outline" style="font-size: 1.3rem;"></ion-icon></p>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <a href=""> <button class="btn btn-outline-success">Add
                                                    Candidate</button></a>
                                        </div>
                                    </center>
                                </div>

                            </td>
                            <td>
                                <div class="row">
                                    <center>
                                        <div class="row">
                                            <form action="" class="d-flex">
                                                <select name="custom-select3" class="custom-select2" aria-placeholder="Select Recruiter(s)">
                                                    <option hidden>Select Recruiter(s)</option>
                                                    <option value="">Ganesh</option>
                                                </select>
                                                <input type="submit" class="btn btn-sm btn-success ml-2" style="margin-left: 2vh;" value="Assign">
                                            </form>
                                        </div>
                                        <div class="row mt-2">
                                            <a href=""> <button class="btn btn-outline-primary">Manage Team</button></a>
                                        </div>
                                    </center>
                                </div>
                            </td>
                            <td>Assign team before proceeding</td>
                            <td>
                                <div class="row p-1">
                                    <div class="col-md-3">
                                        <center>
                                            <h5>LEADS</h5>
                                            <h5>0</h5>
                                        </center>
                                    </div>
                                    <div class="col-md-3">
                                        <center>
                                            <h5>OFFERED</h5>
                                            <h5>0</h5>
                                        </center>
                                    </div>
                                    <div class="col-md-3">
                                        <center>
                                            <h5>JOINED</h5>
                                            <h5>0</h5>
                                        </center>
                                    </div>
                                    <div class="col-md-3">
                                        <center>
                                            <h5>INPROCESS</h5>
                                            <h5>0</h5>
                                        </center>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <center>
                                        <div class="card" style="width: 18rem;">
                                            <div class="card-body">
                                                <p class="card-text">frontend@J004645</p>
                                                <p class="card-text">Kotak Life Insurance&nbsp;&nbsp;<ion-icon name="trash-outline" style="font-size: 1.3rem;"></ion-icon>&nbsp;&nbsp;&nbsp;<ion-icon name="create-outline" style="font-size: 1.3rem;"></ion-icon></p>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <a href=""> <button class="btn btn-outline-success">Add
                                                    Candidate</button></a>
                                        </div>
                                    </center>
                                </div>

                            </td>
                            <td>
                                <div class="row">
                                    <center>
                                        <div class="row">
                                            <form action="" class="d-flex">
                                                <select name="custom-select3" class="custom-select2" aria-placeholder="Select Recruiter(s)">
                                                    <option hidden>Select Recruiter(s)</option>
                                                    <option value="">Ganesh</option>
                                                </select>
                                                <input type="submit" class="btn btn-sm btn-success ml-2" style="margin-left: 2vh;" value="Assign">
                                            </form>
                                        </div>
                                        <div class="row mt-2">
                                            <a href=""> <button class="btn btn-outline-primary">Manage Team</button></a>
                                        </div>
                                    </center>
                                </div>
                            </td>
                            <td>
                                <center>
                                    <div class="row">
                                        <p> No target Set Yet</p>
                                    </div>
                                    <div class="row mt-2">
                                        <a href=""> <button class="btn btn-outline-success">Assign Target</button></a>
                                    </div>
                                </center>
                            </td>
                            <td>
                                <div class="row p-1">
                                    <div class="col-md-3">
                                        <center>
                                            <h5>LEADS</h5>
                                            <h5>117</h5>
                                        </center>
                                    </div>
                                    <div class="col-md-3">
                                        <center>
                                            <h5>OFFERED</h5>
                                            <h5>0</h5>
                                        </center>
                                    </div>
                                    <div class="col-md-3">
                                        <center>
                                            <h5>JOINED</h5>
                                            <h5>0</h5>
                                        </center>
                                    </div>
                                    <div class="col-md-3">
                                        <center>
                                            <h5>INPROCESS</h5>
                                            <h5>0</h5>
                                        </center>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <center>
                                        <div class="card" style="width: 18rem;">
                                            <div class="card-body">
                                                <p class="card-text">frontend@J004645</p>
                                                <p class="card-text">Kotak Life Insurance&nbsp;&nbsp;<ion-icon name="trash-outline" style="font-size: 1.3rem;"></ion-icon>&nbsp;&nbsp;&nbsp;<ion-icon name="create-outline" style="font-size: 1.3rem;"></ion-icon></p>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <a href=""> <button class="btn btn-outline-success">Add
                                                    Candidate</button></a>
                                        </div>
                                    </center>
                                </div>

                            </td>
                            <td>
                                <div class="row">
                                    <center>
                                        <div class="row">
                                            <form action="" class="d-flex">
                                                <select name="custom-select3" class="custom-select2" aria-placeholder="Select Recruiter(s)">
                                                    <option hidden>Select Recruiter(s)</option>
                                                    <option value="">Ganesh</option>
                                                </select>
                                                <input type="submit" class="btn btn-sm btn-success ml-2" style="margin-left: 2vh;" value="Assign">
                                            </form>
                                        </div>
                                        <div class="row mt-2">
                                            <a href=""> <button class="btn btn-outline-primary">Manage Team</button></a>
                                        </div>
                                    </center>
                                </div>
                            </td>
                            <td>
                                <center>
                                    <div class="row">
                                        <p> No target Set Yet</p>
                                    </div>
                                    <div class="row mt-2">
                                        <a href=""> <button class="btn btn-outline-success">Assign Target</button></a>
                                    </div>
                                </center>
                            </td>
                            <td>
                                <div class="row p-1">
                                    <div class="col-md-3">
                                        <center>
                                            <h5>LEADS</h5>
                                            <h5>1</h5>
                                        </center>
                                    </div>
                                    <div class="col-md-3">
                                        <center>
                                            <h5>OFFERED</h5>
                                            <h5>0</h5>
                                        </center>
                                    </div>
                                    <div class="col-md-3">
                                        <center>
                                            <h5>JOINED</h5>
                                            <h5>0</h5>
                                        </center>
                                    </div>
                                    <div class="col-md-3">
                                        <center>
                                            <h5>INPROCESS</h5>
                                            <h5>0</h5>
                                        </center>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <hr class="mt-5">
                <div class="row">
                    <center><a href=""><button class="btn btn-outline-primary">View All</button></a></center>
                </div>
                <hr class="mt-3">
            </div>

        </div>
        <!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->



        <!-- 
        <div class="container-fluid mt-5">
            <div class="row mt-3">
                <h3>My Team</h3>
            </div>
            <hr>
            <div class="row">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Recruiters</th>
                            <th scope="col">Assigned Jobs in my team</th>
                            <th scope="col">Targets</th>
                            <th scope="col">Pipeline</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Ganesh</td>
                            <td>
                                <div class="row">
                                    <center>
                                        <div class="row">
                                            <form action="" class="d-flex">
                                                <select name="custom-select3" class="custom-select2"
                                                    aria-placeholder="Select Recruiter(s)">
                                                    <option hidden>Select Recruiter(s)</option>
                                                    <option value="">Ganesh</option>
                                                </select>
                                                <input type="submit" class="btn btn-sm btn-success ml-2"
                                                    style="margin-left: 2vh;" value="Assign">
                                            </form>
                                        </div>
                                        <div class="row mt-2">
                                            <a href=""> <button class="btn btn-outline-primary">Manage Team</button></a>
                                        </div>
                                    </center>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <p>Screened Candidates&nbsp;<ion-icon name="time-outline"></ion-icon></p>
                                    <center>
                                        <div class="w-80" id="progressbar"></div>
                                    </center>
                                    <center>
                                        <div class="row mt-2">
                                            <a href=""> <button class="btn btn-outline-primary">View
                                                    Targets</button></a>
                                        </div>
                                    </center>

                                </div>
                            </td>
                            <td>
                                <div class="row p-1">
                                    <div class="col-md-3">
                                        <center>
                                            <h5>LEADS</h5>
                                            <h5>0</h5>
                                        </center>
                                    </div>
                                    <div class="col-md-3">
                                        <center>
                                            <h5>OFFERED</h5>
                                            <h5>0</h5>
                                        </center>
                                    </div>
                                    <div class="col-md-3">
                                        <center>
                                            <h5>JOINED</h5>
                                            <h5>0</h5>
                                        </center>
                                    </div>
                                    <div class="col-md-3">
                                        <center>
                                            <h5>INPROCESS</h5>
                                            <h5>0</h5>
                                        </center>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> -->
        <div class="container-fluid p-3 mt-3">
            <div class="row mt-3">
                <h3>Recently Offered Candidates</h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-8">
                    <div class="row recent last-div">
                        <div class="col-md">
                            <div class="root">
                                <article class="content">
                                    <h5 class="card-subtitle mb-2">Ravi Bhambhani - Joined</h5>
                                    <p class="card-text">Joining date: 18th Sep, 2023</p>
                                    <p class="card-text text-muted">Agency Manager (Agency Channel) @ Kotak Life
                                        Insurance with 10.90 LPA CTC</p>
                                </article>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="root">
                                <article class="content">
                                    <h5 class="card-subtitle mb-2">Ravi Bhambhani - Joined</h5>
                                    <p class="card-text">Joining date: 18th Sep, 2023</p>
                                    <p class="card-text text-muted">Agency Manager (Agency Channel) @ Kotak Life
                                        Insurance with 10.90 LPA CTC</p>
                                </article>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="root">
                                <article class="content">
                                    <h5 class="card-subtitle mb-2">Ravi Bhambhani - Joined</h5>
                                    <p class="card-text">Joining date: 18th Sep, 2023</p>
                                    <p class="card-text text-muted">Agency Manager (Agency Channel) @ Kotak Life
                                        Insurance with 10.90 LPA CTC</p>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <a href="" style="float: right;">View All &nbsp;&nbsp;&nbsp;<ion-icon name="arrow-forward-outline"></ion-icon></a>
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
        // Data and Layout for myPlot
        const xArray1 = [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150];
        const yArray1 = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15];

        const data1 = [{
            x: xArray1,
            y: yArray1,
            mode: "lines"
        }];

        const layout1 = {
            xaxis: {
                range: [40, 160],
                title: "Sent Time"
            },
            yaxis: {
                range: [5, 16],
                title: "#CVs Sent"
            },
            title: "#CVs Sent Timeline"
        };

        // Display myPlot using Plotly
        Plotly.newPlot("myPlot", data1, layout1);
    </script>


    <script>
        const xArray = ["In Process By Client", "Joined", "Pending For Internal Screening"];
        const yArray = [5, 3, 2];

        const data = [{
            x: xArray,
            y: yArray,
            type: "bar"
        }];

        const layout = {
            title: "Candidates Distribution",
            annotations: xArray.map((label, index) => ({
                x: label,
                y: yArray[index] + 0.2, // You can adjust the position of the text
                text: yArray[index],
                font: {
                    family: 'Arial',
                    size: 12,
                    color: 'black'
                },
                showarrow: false,
            }))
        };

        Plotly.newPlot("myPlot1", data, layout);
    </script>

    <!-- -------------------------------Progressbar--------------------------------------------- -->

    <script>
        $(function() {
            $("#progressbar").progressbar({
                value: 20
            });
        });
    </script>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>

</html>