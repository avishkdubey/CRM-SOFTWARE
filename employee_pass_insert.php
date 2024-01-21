<?php
include 'connection.php';

$pass = $_POST['password'];
$emp_id = $_POST['employee_id'];

// Check if the password meets the specified criteria
if (isPasswordValid($pass)) {
    // Prepare the SQL statement using placeholders
$updateQuery = "UPDATE `workart_staff` SET `employee_password` = ?, `employee_token` = NULL WHERE `employee_id` = ?";

// Prepare the statement
$stmt = $conn->prepare($updateQuery);

// Bind the parameters
$stmt->bind_param("ss", $pass, $emp_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo '1'; // Password updated successfully
    } else {
        echo '2'; // Failed to update the password
    }

    // Close the statement
    $stmt->close();
} else {
    echo '3'; // Password does not meet the criteria
}

function isPasswordValid($password) {
    // Check if the password meets your criteria
    return preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/', $password);
}
