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
    header('location: login.html'); // Redirect to the home page or login page if the user is not logged in
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
    <link rel="stylesheet" href="CSS/admin-hrm.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="loader.css?v=<?php echo time(); ?>">
    <title>My HRM's</title>
</head>


<body class="bg-white">
    <!-- Navbar -->
    <div class="loader loader-double"></div>
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
                    <a style="color: #ffffff;" class="nav-link support-link" href="admin-myhrm.php"><i class="fa fa-solid fa-angle-left fa-xl" style="color: #ffffff; background-color: transparent;"></i>&nbsp;Back</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Navbar -->

    <div class="container  bg-light">
        <div class="row p-3" style="background-color: #313949;">
            <center>
                <h2 style=" color: white; letter-spacing: 5px; font-weight: 600; ">EMPLOYEE DETAILS</h2>
            </center>
        </div>
        <form method="post" id="employee-details">
            <div class="row p-5">
                <h6>Is this an employee or a freelancer?</h6>
                <br>
                <div class="container mt-2" style="border-left:2px solid black;">
                    <input class="mt-3" type="radio" id="Employee" name="emp_type" value="Employee">
                    <label for="Employee">Employee</label><br>
                    <input class="mt-3" type="radio" id="Freelancer" name="emp_type" value="Freelancer">
                    <label for="Freelancer">Freelancer</label><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="col mb-4">
                        <div class="form-outline">
                            <label class="form-label" for="employee_name">Name</label>
                            <input type="text" name="employee_name" id="employee_name" class="form-control" required oninput="allowOnlyAlphabets(event)" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col mb-4">
                        <div class="form-outline">
                            <label class="form-label" for="employee_email">Email</label>
                            <input type="email" name="employee_email" id="employee_email" class="form-control" required />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="col mb-4">
                        <div class="form-outline">
                            <label class="form-label" for="employee_hire_date">Hire Date</label>
                            <input type="date" name="employee_hire_date" id="employee_hire_date" class="form-control" required />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col mb-4">
                        <div class="form-outline">
                            <label class="form-label" for="employee_job_title">Job Title</label>
                            <input type="text" name="employee_job_title" id="employee_job_title" class="form-control" oninput="allowOnlyAlphabets(event)" required />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="col mb-4">
                        <div class="form-outline">
                            <label class="form-label" for="employee_department">Department</label>
                            <select class="form-control" name="employee_department" id="employee_department">
                                <option value="Human Resource">Human Resource</option>
                                <option value="Information Technology">Information Technology</option>
                                <option value="Recruitment">Recruitment</option>
                                <option value="Operation">Operations</option>
                                <option value="Sales">Sales</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col mb-4">
                        <div class="form-outline">
                            <label class="form-label" id="employee-manager" for="employee-manager">Manager</label>
                            <select class="form-control" name="employee_manager" id="">
                                <option value="Abhishek Dubey">Abhishek Dubey</option>
                                <option value="Abhishek Dubey">Jaideep Singh Rajprohit</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="col mb-4">
                        <div class="form-outline">
                            <label class="form-label" for="employee-salary"><span>Annual Salary <span></span> <span class="info-icon" data-toggle="tooltip" data-placement="top" title="Annual salary is the current CTC (cost to company) for this employee, not including variable pay. If you have a monthly CTC, please multiply by 12. XPayroll will automatically create an ideal salary structure.">
                                        <i class="fas fa-info-circle"></i>
                                    </span></span></span></label>
                            <input type="text" name="employee_salary" id="employee-salary" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col mb-4">
                        <div class="form-outline">
                            <label class="form-label" for="employee-city">Location</label>
                            <select name="employee_city" class="form-control" id="employee-city">
                                <option hidden>Select Location</option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                <option value="Daman and Diu">Daman and Diu</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Ladakh">Ladakh</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Odisha">Odisha</option>
                                <option value="Pondicherry">Pondicherry</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Tamil Nadu (Tiruchirapalli)">Tamil Nadu (Tiruchirapalli)</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="West Bengal">West Bengal</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-auto">
                    <span>
                        <input class="btn btn-primary" id="indian" name="indian" type="checkbox" value="Indian">
                        <label for="indian" class="form-check-label h6">Resident of India</label>
                    </span>
                </div>
            </div>


            <div class="row p-2 mb-5 justify-content-end">
                <input class="btn btn-lg btn-primary" style="width: 15vh;" type="submit" value="Continue">
            </div>


        </form>
    </div>





    <!-- ____________________________________________________________________________________________________________________________________________________________________ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Add this script at the end of your HTML file -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Function to allow only alphabets in the input field
        function allowOnlyAlphabets(event) {
            var input = event.target;
            var regex = /[^a-zA-Z\s]/g;
            input.value = input.value.replace(regex, '');
        }

        $(document).on('submit', '#employee-details', function(e) {
            e.preventDefault();
            $('.loader').addClass('is-active');
            $.ajax({
                url: "insert_employee_details.php",
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(data) {
                    $('.loader').removeClass('is-active');

                    if (data == '1') {
                        alert("We will send a mail to Abhishek Dubey, asking them to complete their profile and put in details like bank information, phone number etc. You can do this manually as well, by going to their profile. Until this is done, Workart will not process payments to Abhishek Dubey.");
                        window.location = "admin-myhrm.php";
                    } else if (data == '2') {
                        alert("Employee with this email already associated with Workart.");
                    } else if (data == '3') {
                        alert("Hire date can't be a past date.");
                    } else {
                        alert("An error occurred. Please try again later.");
                    }
                },
                error: function() {
                    alert("An error occurred. Please try again later.");
                }
            });
        });
    </script>

</body>

</html>