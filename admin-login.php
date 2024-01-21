<?php
include 'connection.php';

$email = $_POST['email'];
$password = $_POST['password'];

$checkquery = "SELECT * FROM admin WHERE admin_email = ? AND admin_pass = ?";
$stmt = $conn->prepare($checkquery);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$checkresult = $stmt->get_result();

if (mysqli_num_rows($checkresult) > 0) {
    session_start();
    $_SESSION["admin_email"] = $email;
    echo 1; // Match found
} else {
    echo 3; // No match found
}
?>
