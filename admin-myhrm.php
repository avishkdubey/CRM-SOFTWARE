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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <link rel="stylesheet" href="CSS/admin-hrm.css">
    <link rel="stylesheet" href="CSS/loader.css">
    <title>My HRM's</title>
</head>


<body>
    <!-- Navbar -->
    <nav class="navbar navbar-primary sticky-top p-1" style="background-color: #313949;">
        <div class="row">
            <a class="navbar-brand d-flex" href="admindash.html" style="color: black; margin-right:20px;">
                <img src="web-images/cropped-workart-white-500-2.png" style="width: 5rem; margin-bottom: 25px;" alt="">
                <h4 style="margin-left: 20px; color: white; margin-top: 8px;">HRM's</h4>
            </a>
        </div>
        <div class="menu-icon p-3">
            <ul class="navbar-nav" id="list">
                <li class="nav-item">
                    <a style="color: #ffffff;" class="nav-link support-link" href="admindash.php"><i class="fa fa-solid fa-angle-left fa-xl" style="color: #ffffff; background-color: transparent;"></i>&nbsp;Back</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Navbar -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 bg-light" style="border:2px solid black;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="card m-2 col-md upper-option" id="card">
                                        <a href="admin-myhrm.php">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-2"><i class="fa-solid fa-money-bill-trend-up icon"></i></div>
                                                    <div class="col-md-10">Employee Payslip</div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card m-2 col-md upper-option" id="card">
                                        <a href="admin-myhrm.php">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-2"><i class="fa-solid fa-clipboard-user icon"></i></div>
                                                    <div class="col-md-10">Employee Attendance</div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 p-3">
                            <div class="container" style="border:2px solid green; background-color:#313949c2;">
                            <h4 class="p-2 text-white">QUICK LINKS</h4>
                            <hr>
                            <ul class="p-2" id="quick-links">
                                <li><a href="add-employee.php">Add an employee or contractor</a></li>
                                <hr>
                                <li><a href="">Create an announcement</a></li>
                                <hr>
                            </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4" style=" background-color:#313949;">
                <center>
                    <div class="card-container p-2">
                        <span class="pro">Admin</span>
                        <img class="round" src="web-images\user (1).jpg" alt="user" style="width:20vw;" />
                        <h3><?= $fetch['admin_name']; ?></h3>
                        <h4>(WA0<?= $fetch['admin_id']; ?>)</h4>
                        <h6 style="text-transform: uppercase; "></h6><?= $fetch['admin_designation']; ?></h6>
                        <!-- <div class="buttons">
                            <button class="primary">
                                Message
                            </button>
                            <button class="primary ghost">
                                Following
                            </button>
                        </div> -->
                    </div>
                </center>
                <!-- <div class="container-fluid mt-5">
                    <div class="row">
                        <div class="col-md-6">
                            <center>
                                <p class="text-muted">NEXT PAYROLL</p>
                                <p class="text-muted">10/12/2023</p>
                            </center>
                        </div>
                        <div class="col-md-6">
                             <center>
                                <p class="text-muted">ACCOUNT BALANCE</p>
                                <p class="text-muted">💵&nbsp;25000</p>
                            </center>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</body>

</html>