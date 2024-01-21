<?php
session_start();
$hashedToken = $_GET['token'];
include('connection.php');

// Retrieve the stored hashed token from the database
$sel = "SELECT employee_token, name, employee_id FROM workart_staff"; // Modify the query to include 'name' or other required fields
$result = mysqli_query($conn, $sel);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $storedToken = $row['employee_token'];

    // Check if the session has expired
    if (isset($_SESSION["session_start_time"])) {
        $sessionTimeout = 24 * 60 * 60; // 24 hours in seconds
        $sessionStartTime = $_SESSION["session_start_time"];
        $currentTime = time();

        if ($currentTime - $sessionStartTime > $sessionTimeout) {
            // Session has expired, destroy it
            session_unset(); // Unset all session values
            session_destroy(); // Destroy the session
            echo "Session has expired. Please Contact Workart Team To Resend The Mail.";
            exit;
        }
    }

    if ($hashedToken === hash('sha256', $storedToken)) {
        // Token is valid
        $fetch = $row; // Store the fetched data in the $fetch variable
    } else {
        echo "Link is Expired";
        exit;
    }
} else {
    echo "Error retrieving the token from the database.";
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
    <link rel="stylesheet" href="CSS/employee_pass_set.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="loader.css?v=<?php echo time(); ?>">
    <title>Create password</title>
</head>


<body class="bg-light">
    <!-- Navbar -->
    <div class="loader loader-double"></div>
    <nav class="navbar navbar-primary sticky-top p-1" style="background-color: #313949;">
        <div class="row">
            <a class="navbar-brand d-flex" href="admindash.html" style="color: black; margin-right:20px;">
                <img src="web-images/cropped-workart-white-500-2.png" style="width: 5rem;" alt="">
            </a>
        </div>
    </nav>
    <!-- Navbar -->
    <div class="container p-5" style="background-color:#464C69;">
        <div class="row ">
            <center>
                <h3 style="color:white;">Hey, <?= $fetch['name']; ?>!</h3>
                <h2 style="color:white;">**Please Set a Password**</h2>
            </center>
        </div>
        <div class="row">
            <center>
                <p style="color:red;">Password should have at least 8 characters.<br>
                    Password should have at least 1 number.<br>
                    Password should have at least 1 uppercase character.<br>
                    Password should have at least 1 lowercase character.</p>
            </center>
        </div>
        <div class="row p-5" style="background-color:#2222228a; margin-left:20vw;margin-right:20vw;">
            <form action="insert_employee_details.php" method="post" id="candidate_pass">
                <input type="number" name="employee_id" value="<?= $fetch['employee_id']; ?>" required hidden>
                <br>
                <div class="col-md-12">
                    <div class="form-outline">
                        <label class="form-label" for="password" style="color:white;">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required />
                    </div>
                </div>
                <br>
                <div class="col-md-12">
                    <div class="form-outline">
                        <label class="form-label" for="password1" style="color:white;">Retype Password</label>
                        <input type="password" name="password1" id="password1" class="form-control" required />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-outline">
                        <center><input type="submit" class="btn btn-primary btn-lg mt-5" name="submit" id="submit" class="form-control" value="Continue" /></center>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>





    <!-- ____________________________________________________________________________________________________________________________________________________________________ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Add this script at the end of your HTML file -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).on('submit', '#candidate_pass', function(e) {
            e.preventDefault();
            $('.loader').addClass('is-active');

            var password = $('#password').val();
            var password1 = $('#password1').val();

            // Check if passwords match and meet your conditions
            if (password !== password1) {
                alert("Passwords do not match");
                $('.loader').removeClass('is-active');
                return;
            }

            // Add your password validation logic here (e.g., length, uppercase, lowercase, numbers)
            if (!isPasswordValid(password)) {
                alert("Please enter a valid password.");
                $('.loader').removeClass('is-active');
                return;
            }

            $.ajax({
                url: "employee_pass_insert.php",
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(data) {
                    $('.loader').removeClass('is-active');

                    if (data == '1') {
                        window.location = "employeedash.php";
                    } else if (data == '2') {
                        alert("Failed to update the password");
                    }
                },
                error: function() {
                    alert("An error occurred. Please try again later.");
                }
            });
        });

        function isPasswordValid(password) {
            // Add your password validation rules here
            // For example, check if the password meets your requirements
            return password.length >= 8 && /[A-Z]/.test(password) && /[a-z]/.test(password) && /\d/.test(password);
        }
    </script>

</body>

</html>