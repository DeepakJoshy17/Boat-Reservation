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

function manage_route($action) {
    global $conn;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $route_name = $_POST['route_name'];
        $start_location = $_POST['start_location'];
        $end_location = $_POST['end_location'];

        if ($action == 'add') {
            $query = "INSERT INTO Routes (route_name, start_location, end_location) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sss", $route_name, $start_location, $end_location);
            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Route added successfully.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
            }
            $stmt->close();
        } elseif ($action == 'edit') {
            $route_id = $_POST['route_id'];
            $query = "UPDATE Routes SET route_name = ?, start_location = ?, end_location = ? WHERE route_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sssi", $route_name, $start_location, $end_location, $route_id);
            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Route updated successfully.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
            }
            $stmt->close();
        } elseif ($action == 'remove') {
            $route_id = $_POST['route_id'];
            $query = "DELETE FROM Routes WHERE route_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $route_id);
            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Route removed successfully.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
            }
            $stmt->close();
        }
        $conn->close();
    }
}

$action = isset($_POST['action']) ? $_POST['action'] : '';
manage_route($action);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Routes</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php include 'includes/headeradmin.php'; ?>

    <div class="container mt-5">
        <h1 class="mb-4">Manage Routes</h1>

        <!-- Add Route -->
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">Add Route</h2>
                <form action="manage_routes.php" method="post">
                    <input type="hidden" name="action" value="add">
                    <div class="mb-3">
                        <label for="route_name" class="form-label">Route Name:</label>
                        <input type="text" id="route_name" name="route_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="start_location" class="form-label">Start Location:</label>
                        <input type="text" id="start_location" name="start_location" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="end_location" class="form-label">End Location:</label>
                        <input type="text" id="end_location" name="end_location" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Route</button>
                </form>
            </div>
        </div>

        <!-- Edit Route -->
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">Edit Route</h2>
                <form action="manage_routes.php" method="post">
                    <input type="hidden" name="action" value="edit">
                    <div class="mb-3">
                        <label for="route_id_edit" class="form-label">Route ID:</label>
                        <input type="number" id="route_id_edit" name="route_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="route_name_edit" class="form-label">Route Name:</label>
                        <input type="text" id="route_name_edit" name="route_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="start_location_edit" class="form-label">Start Location:</label>
                        <input type="text" id="start_location_edit" name="start_location" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="end_location_edit" class="form-label">End Location:</label>
                        <input type="text" id="end_location_edit" name="end_location" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-warning">Update Route</button>
                </form>
            </div>
        </div>

        <!-- Remove Route -->
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Remove Route</h2>
                <form action="manage_routes.php" method="post">
                    <input type="hidden" name="action" value="remove">
                    <div class="mb-3">
                        <label for="route_id_remove" class="form-label">Route ID:</label>
                        <input type="number" id="route_id_remove" name="route_id" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Remove Route</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
<?php include 'includes/footer.php'; ?>
</html>


