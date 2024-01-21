<?php
include 'connection.php';

$employee_type = $_POST['emp_type'];
$name = $_POST['employee_name'];
$email = $_POST['employee_email'];
$hire_date = $_POST['employee_hire_date'];
$job_title = $_POST['employee_job_title'];
$department = $_POST['employee_department'];
$manager = $_POST['employee_manager'];
$salary = $_POST['employee_salary'];
$city = $_POST['employee_city'];
$resident = $_POST['indian'];
// Generate a unique token or code for the user
$token = bin2hex(random_bytes(16));
$hashedToken = hash('sha256', $token);

// Check if the hire date is in the past
if (strtotime($hire_date) < time()) {
    echo 3;
} else {
    // Check if the email already exists in the database
    $checkEmailQuery = "SELECT email FROM workart_staff WHERE email = ?";
    $stmtCheckEmail = $conn->prepare($checkEmailQuery);
    $stmtCheckEmail->bind_param("s", $email);
    $stmtCheckEmail->execute();
    $result = $stmtCheckEmail->get_result();

    if ($result->num_rows > 0) {
        echo 2;
    } else {
        // Your SQL query with placeholders for values
        $insertquery = "INSERT INTO workart_staff (type, name, email, hire_date, job_title, department, manager, salary, city, resident,employee_token) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
        $stmt = $conn->prepare($insertquery);

        if (!$stmt) {
            die("Error: " . $conn->error);
        }

        // Bind the parameters
        $stmt->bind_param("sssssssssss", $employee_type, $name, $email, $hire_date, $job_title, $department, $manager, $salary, $city, $resident, $token);

        // Execute the query
        $res = $stmt->execute();

        require 'Mail\phpmailer\PHPMailerAutoload.php';

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';

        $mail->Username = 'ad0652222@gmail.com';
        $mail->Password = 'erey tkij tlxt cdxv';

        $mail->setFrom('ad0652222@gmail.com', 'WORKART HR SOLUTIONS');
        $mail->addAddress($_POST['employee_email']);

        $mail->isHTML(true);
        $mail->Subject = 'Welcome to Workart';



        // Store the token in the user's session
        session_start();
        $_SESSION["user_token"] = $hashedToken;
        $_SESSION["session_start_time"] = time();

        $mail->Body = '<html>
            <body>
                <div class="container-fluid" style="background-color:rgb(29,33,58); padding-left:5vw; padding-right:5vw; padding-bottom:5vw;">
                    <div class="container" style="background-color:rgb(17,20,33); padding-top:10vw; padding-right:10vw;padding-left:10vw;">
                        <div class="row">
                            <center>
                                <h3 style="color: white;">WELCOME</h3>
                                <h3 style="color: white;">WORKART HR SOLUTIONS</h3>
                            </center>
                        </div>
                        <div class="row" style="padding:5vw;">
                            <center>
                                <img style="width: 50%;" src="https://ci6.googleusercontent.com/proxy/dpXrC2-Rg3NQAWsqo6_qkoL9qAtPn-_UrzEkTlYsYVd9YTpXMakrepgmVyAPSl4N1GMzqILauGGjcOjgoOy_1MIr2KV_JDCizcsbVP9vNfaPE6ilupfZuEBJV6WF=s0-d-e1-ft#https://payroll-assets.razorpay.com/assets/mailer/employee-welcome-new.gif" alt="">
                            </center>
                        </div>
                        <div class="row">
                            <p style="color: white;">Hey <span style="color:rgb(11,233,233);">' . $name . ',</span></p>
                            <br>
                            <p style="color: white;">Workart has invited you to be a part of Workart family on the position of ' . $job_title . '</p>
                            <p style="color: white;">Department : <span>' . $department . '</span></p>
                            <br>
                            <br>
                            <p style="color: white;">Let\'s get started by setting up your account! Takes under 5mins. Pinky Swear!</p>
                        </div>
                        <div class="row" style=" padding-top:3vw;" >
                        <a href="http://localhost/workart/employee_pass_set.php?token=' . $hashedToken . '"> <button style="background-color:rgb(32,138,255); padding:2vw; color:white;">Get Started</button> </a>
                        </div>
                        <div class="row">
                            <p style=" color:gray; margin-top:5vw; margin-bottom:5vw;">© Workart</p>
                        </div>
                    </div>
                </div>
            </body>
        </html>';


        // $mail->SMTPDebug = 2; // Add this line for debugging

        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 1;
        }
    }
}
