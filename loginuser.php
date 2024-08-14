<?php
session_start();

// Establish connection to MySQL database
$servername = "localhost"; // Your MySQL server name
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "reservation"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to check if email exists
    $sql = "SELECT * FROM Users WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there is a match
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $stored_password = $user['password']; // Retrieve stored password from the database

        // Check if the provided password matches the stored password
        if ($password === $stored_password) {
            // Set session variables based on the user's role
            if ($user['role'] === 'Admin') {
                $_SESSION['admin_id'] = $user['user_id']; // Set admin_id for admins
                header("Location: admindashboard.php");
            } else if ($user['role'] === 'User') {
                $_SESSION['user_id'] = $user['user_id']; // Set user_id for regular users
                header("Location: userhome.php");
            } else {
                // Unknown role, redirect to an error page or logout
                header("Location: loginuserhtml.php");
                exit();
            }
            exit();
        } else {
            // Invalid password
            $_SESSION['login_error'] = "Invalid email or password";
            header("Location: loginuserhtml.php");
            exit();
        }
    } else {
        // Invalid email
        $_SESSION['login_error'] = "Invalid email or password";
        header("Location: loginuserhtml.php");
        exit();
    }
}

// Close MySQL connection
$conn->close();
?>
