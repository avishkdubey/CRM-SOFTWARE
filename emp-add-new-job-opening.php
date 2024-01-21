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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <link rel="stylesheet" href="CSS\emp-job-opening.css">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #f1f1f1;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-primary sticky-top p-1" style="background-color: #313949;">
        <div class="row">
            <a class="navbar-brand d-flex" href="admindash.html" style="color: black; margin-right:20px;">
                <img src="web-images/cropped-workart-white-500-2.png" style="width: 5rem; margin-bottom: 25px;" alt="">
                <h4 style="margin-left: 20px; color: white; margin-top: 8px;">Add New Job</h4>
            </a>
        </div>
        <div class="menu-icon p-3">
            <ul class="navbar-nav" id="list">
                <li class="nav-item">
                    <a style="color: #ffffff;" class="nav-link support-link" href="emp-job-opening.php"><i class="fa fa-solid fa-angle-left fa-xl" style="color: #ffffff; background-color: transparent;"></i>&nbsp;Back</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Navbar -->
    <div class=" container py-3 bg-light" style="width:170vh;">

        <div style="margin-left:34px;" class="main__title">
            <div class="main__greeting">
                <h4>Create New Job</h4>
            </div>
            <hr>
        </div>
        <div class="form container" style="display: grid;">
            <!-- <........................................................................................................................................> -->

            <form action="" class="row" id="form">
                <div class="row">
                    <center>
                        <div class="col-md-8 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="address">Select Client</label>
                                <select class="form-control form-control-sm" name="client" required>
                                    <option hidden>Select Client</option>
                                    <option value="Kotak">Kotak</option>
                                    <option value="MAhindra">Mahindra</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 mt-auto mb-auto">
                            <input type="button" id="myBtn" class="btn btn-outline-success btn-sm" value="Add New Client">
                        </div>
                    </center>
                </div>
                <div class="col-md-6">
                    <br>
                    <input type="number" name="emp_id" hidden value="<?= $fetch['employee_id']; ?>" required>
                    <div class="row">
                        <div class="col mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="Designation">Designation</label>
                                <input type="text" name="designation" id="Designation" class="form-control form-control-sm" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-4">
                            <div class="form-group">
                                <label for="min_ctc">Minimum CTC (in LPA)</label>
                                <input type="number" name="min_ctc" id="min_ctc" class="form-control form-control-sm" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-4">
                            <div class="form-group">
                                <label for="max_ctc">Maximum CTC (in LPA)</label>
                                <input type="number" name="max_ctc" id="max_ctc" class="form-control form-control-sm" required />
                            </div>
                        </div>
                    </div>

                </div>
                <!-- second-div -->
                <div class="col-md-6">
                    <div class="row" style="margin-top:2vw;">
                        <div class="col mb-4">
                            <div class="form-group">
                                <label for="min_experience">Minimum Experience (in Years)</label>
                                <input type="number" name="min_experience" id="min_experience" class="form-control form-control-sm" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-4">
                            <div class="form-group">
                                <label for="max_experience">Maximum Experience (in Years)</label>
                                <input type="number" name="max_experience" id="max_experience" class="form-control form-control-sm" required />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-4">
                            <div class="form-group">
                                <label for="city">Location</label>
                                <select class="form-control form-control-sm mt-2" id="city" name="city" required style="padding-top:13px;" required>
                                    <option hidden>Select City</option>
                                    <option value="Gwalior">Gwalior</option>
                                    <option value="Gwalior">Ahemdabad</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end pt-3 mt-5">
                        <button type="reset" class="btn btn-light btn-lg">Reset all</button>
                        <button type="submit" class="btn btn-primary btn-lg ms-2">Submit</button>
                    </div>
                </div>

            </form>
            <!--<........................................................................................................................................> -->

        </div>
    </div>





    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="container">
                <span class="close" style="float: right;">&times;</span>
                <form action="" class="row" id="client">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="client-name">Client Name</label>
                                <input type="text" name="client-name" id="client-name" class="form-control form-control-sm" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="head_city">Headquarter City</label>
                                <select class="form-control" name="head_city" id="head_city">
                                    <option hidden>Select City</option>
                                    <option value="">1</option>
                                    <option value="">1</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" style="height: 18vh;"></textarea>
                        </div>
                        <div class="form-group col-md-12 mt-3">
                            <center><input type="submit" class="btn btn-success p-2" id="add" value="Add"></center>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>






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