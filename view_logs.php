<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Check if admin is logged in, if not, redirect to login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: admindashboard.php");
    exit;
}

include 'db_connection.php';

function fetch_logs() {
    global $conn;
    $query = "SELECT * FROM Admin_Logs ORDER BY log_time DESC";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<div class='table-responsive'>";
        echo "<table class='table table-striped table-bordered'>";
        echo "<thead><tr><th>ID</th><th>Admin ID</th><th>Action</th><th>Log Time</th><th>Description</th></tr></thead>";
        echo "<tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>{$row['log_id']}</td><td>{$row['admin_id']}</td><td>{$row['action']}</td><td>{$row['log_time']}</td><td>{$row['description']}</td></tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "<div class='alert alert-info'>No logs found.</div>";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Logs</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <!-- Add your custom CSS here if needed -->
</head>

<body>
    <?php include 'includes/headeradmin.php'; ?>

    <div class="container mt-5">
        <h1 class="mb-4">Admin Logs</h1>
        <?php fetch_logs(); ?>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php include 'includes/footer.php'; ?>
</html>

