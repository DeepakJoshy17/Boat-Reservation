<?php
session_start();

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = ""; // Update with your database password
$dbname = "reservation"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form inputs
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmPassword'];
    $role=$_POST['role'];

    // Prepare and execute the insert statement
    $stmt = $conn->prepare("INSERT INTO Users (name, email, phone_number, address, password, role) VALUES (?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        // Prepare failed
        $_SESSION['signup_error'] = "Error preparing statement: " . $conn->error;
        header("Location: signupuserhtml.php");
        exit();
    }

    $stmt->bind_param("ssssss", $name, $email, $phone_number, $address, $password, $role);

    if ($stmt->execute()) {
        // Success, redirect to login page
        $_SESSION['signup_success'] = "Registration successful. You can now log in.";
        header("Location: loginuserhtml.php");
        exit();
    } else {
        // Error, set error message
        $_SESSION['signup_error'] = "Error executing query: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();

// Redirect back to signup page if there are errors
header("Location: signupuserhtml.php");
exit();
?>
