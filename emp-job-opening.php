<?php
session_start();
if (isset($_SESSION['staff_email'])) {
    $staff_email = $_SESSION['staff_email'];

    // Your database connection code should be included here
    include("connection.php");

    $sel = "SELECT * FROM workart_staff WHERE email = '$staff_email'";
    $que = mysqli_query($conn, $sel) or die('Error');

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs</title>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <link rel="stylesheet" href="CSS\emp-job-opening.css">
</head>

<body class="bg-white">
    <!-- Navbar -->
    <nav class="navbar navbar-primary sticky-top p-1" style="background-color: #313949;">
        <div class="row">
            <a class="navbar-brand d-flex" href="admindash.html" style="color: black; margin-right:20px;">
                <img src="web-images/cropped-workart-white-500-2.png" style="width: 5rem; margin-bottom: 25px;" alt="">
                <h4 style="margin-left: 20px; color: white; margin-top: 8px;">Manage Job openings</h4>
            </a>
        </div>
        <div class="menu-icon p-3">
            <ul class="navbar-nav" id="list">
                <li class="nav-item">
                    <a style="color: #ffffff;" class="nav-link support-link" href="admindash.html"><i class="fa fa-solid fa-angle-left fa-xl" style="color: #ffffff; background-color: transparent;"></i>&nbsp;Back</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Navbar -->


    <div class="container-fluid bg-white p-3">
        <div class="row p-3 mt-2">
            <div class="col-md-4 d-flex">
                <form action="" class="d-flex">
                    <input class="form-control mr-sm-2" style="width: 25rem;" type="search" placeholder="Search Keyword" aria-label="Search">
                    &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <div class="col-md-4 mt-2 d-flex">
                <label for="client" style="width:20vh; margin-left: 20vh;"><strong>Select Client :</strong></label>

                <select id="client" class="form-select" aria-label="Default select example">
                    <option selected hidden>Select Client</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="col-md-4 mt-2 d-flex">
               <a href="emp-add-new-job-opening.php"> <button class="btn" style="background-color: #313949; color: white;">+ Add New Job Openings</button></a>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-white">
        <div class="row p-2">
            <h4>Active Jobs</h4>
        </div>
        <hr>
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Job Posted On</th>
                        <th scope="col">Companies</th>
                        <th scope="col">Location</th>
                        <th scope="col">Industry</th>
                        <th scope="col">Leads</th>
                        <th scope="col">Offered</th>
                        <th scope="col">Inprocess</th>
                        <th scope="col">Joined</th>
                        <th scope="col">Recruiter</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Share JD</th>
                        <th scope="col">Delete Job</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td>28 Sep, 23</td>
                        <th>frontend @ Kotak Life Insurance (J004645)</th>
                        <td>Gwalior</td>
                        <td>Banking</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>Ganesh</td>
                        <td>
                            <input type="submit" class="btn btn-sm btn-outline-primary ml-2" style="margin-left: 2vh;" value="Edit">
                        </td>
                        <td>
                            <center><i class="fa-solid fa-share"></i></center>
                        </td>
                        <td>
                            <center><i class="fa-solid fa-trash-can" style="color: #ff0000;"></i></center>
                        </td>

                    </tr>
                    <tr>

                        <td>28 Sep, 23</td>
                        <th>frontend @ Kotak Life Insurance (J004645)</th>
                        <td>Gwalior</td>
                        <td>Banking</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>Ganesh</td>
                        <td>
                            <input type="submit" class="btn btn-sm btn-outline-primary ml-2" style="margin-left: 2vh;" value="Edit">
                        </td>
                        <td>
                            <center><i class="fa-solid fa-share"></i></center>
                        </td>
                        <td>
                            <center><i class="fa-solid fa-trash-can" style="color: #ff0000;"></i></center>
                        </td>

                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</body>

</html>