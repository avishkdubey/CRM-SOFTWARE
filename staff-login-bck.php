<?php
include 'connection.php';

$email = $_POST['employee-email'];
$password = $_POST['employee-password'];

$checkquery = "SELECT * FROM workart_staff WHERE email = ? AND employee_password = ?";
$stmt = $conn->prepare($checkquery);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$checkresult = $stmt->get_result();

if (mysqli_num_rows($checkresult) > 0) {
    session_start();
    $_SESSION["staff_email"] = $email;
    echo 1; // Match found
} else {
    echo 3; // No match found
}
?>
