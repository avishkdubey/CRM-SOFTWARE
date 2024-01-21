<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['admin_email'])) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to the login page or any other page as needed
    header('location: admin-login-page.php');
    exit;
} else {
    // If the user is not logged in, you can redirect them to the login page
    header('location: admin-login-page.php');
    exit;
}
?>
