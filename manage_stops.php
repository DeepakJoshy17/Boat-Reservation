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

function manage_stop($action) {
    global $conn;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $route_id = $_POST['route_id'];
        $stop_id = $_POST['stop_id'] ?? null; // Optional for 'edit' and 'remove'
        $location = $_POST['location'] ?? null; // Optional for 'edit'
        $stop_order = $_POST['stop_order'] ?? null; // Optional for 'edit'
        $arrival_time = $_POST['arrival_time'] ?? null;

        if ($action == 'add') {
            // Add to Route_Stops
            $query = "INSERT INTO Route_Stops (route_id, location, stop_order) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($query);
            if (!$stmt) {
                die("Prepare failed: " . $conn->error);
            }
            $stmt->bind_param("isi", $route_id, $location, $stop_order);
            if ($stmt->execute()) {
                $stop_id = $stmt->insert_id; // Get the last inserted stop_id
                $query_time = "INSERT INTO Route_Stop_Times (route_id, stop_id, arrival_time) VALUES (?, ?, ?)";
                $stmt_time = $conn->prepare($query_time);
                if (!$stmt_time) {
                    die("Prepare failed: " . $conn->error);
                }
                $stmt_time->bind_param("iis", $route_id, $stop_id, $arrival_time);
                if ($stmt_time->execute()) {
                    echo "<div class='alert alert-success'>Stop added successfully.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error: " . $stmt_time->error . "</div>";
                }
                $stmt_time->close();
            } else {
                echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
            }
            $stmt->close();
        } elseif ($action == 'edit') {
            $query = "UPDATE Route_Stops SET location = ?, stop_order = ? WHERE stop_id = ?";
            $stmt = $conn->prepare($query);
            if (!$stmt) {
                die("Prepare failed: " . $conn->error);
            }
            $stmt->bind_param("sii", $location, $stop_order, $stop_id);
            if ($stmt->execute()) {
                $query_time = "UPDATE Route_Stop_Times SET arrival_time = ? WHERE route_id = ? AND stop_id = ?";
                $stmt_time = $conn->prepare($query_time);
                if (!$stmt_time) {
                    die("Prepare failed: " . $conn->error);
                }
                $stmt_time->bind_param("iis", $arrival_time, $route_id, $stop_id);
                if ($stmt_time->execute()) {
                    echo "<div class='alert alert-success'>Stop updated successfully.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error: " . $stmt_time->error . "</div>";
                }
                $stmt_time->close();
            } else {
                echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
            }
            $stmt->close();
        } elseif ($action == 'remove') {
            $query = "DELETE FROM Route_Stop_Times WHERE route_id = ? AND stop_id = ?";
            $stmt_time = $conn->prepare($query);
            if (!$stmt_time) {
                die("Prepare failed: " . $conn->error);
            }
            $stmt_time->bind_param("ii", $route_id, $stop_id);
            if ($stmt_time->execute()) {
                $query_stop = "DELETE FROM Route_Stops WHERE route_id = ? AND stop_id = ?";
                $stmt_stop = $conn->prepare($query_stop);
                if (!$stmt_stop) {
                    die("Prepare failed: " . $conn->error);
                }
                $stmt_stop->bind_param("ii", $route_id, $stop_id);
                if ($stmt_stop->execute()) {
                    echo "<div class='alert alert-success'>Stop removed successfully.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error: " . $stmt_stop->error . "</div>";
                }
                $stmt_stop->close();
            } else {
                echo "<div class='alert alert-danger'>Error: " . $stmt_time->error . "</div>";
            }
            $stmt_time->close();
        }
        $conn->close();
    }
}

$action = isset($_POST['action']) ? $_POST['action'] : '';
manage_stop($action);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Stops</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <!-- Add your custom CSS here if needed -->
</head>
<body>
    <?php include 'includes/headeradmin.php'; ?>

    <div class="container mt-5">
        <h1 class="mb-4">Manage Stops</h1>

        <!-- Add Stop -->
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">Add Stop</h2>
                <form action="manage_stops.php" method="post">
                    <input type="hidden" name="action" value="add">
                    <div class="mb-3">
                        <label for="route_id" class="form-label">Route ID:</label>
                        <input type="number" id="route_id" name="route_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location:</label>
                        <input type="text" id="location" name="location" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="stop_order" class="form-label">Stop Order:</label>
                        <input type="number" id="stop_order" name="stop_order" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="arrival_time" class="form-label">Arrival Time:</label>
                        <input type="time" id="arrival_time" name="arrival_time" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Stop</button>
                </form>
            </div>
        </div>

        <!-- Edit Stop -->
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">Edit Stop</h2>
                <form action="manage_stops.php" method="post">
                    <input type="hidden" name="action" value="edit">
                    <div class="mb-3">
                        <label for="stop_id_edit" class="form-label">Stop ID:</label>
                        <input type="number" id="stop_id_edit" name="stop_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="route_id_edit" class="form-label">Route ID:</label>
                        <input type="number" id="route_id_edit" name="route_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="location_edit" class="form-label">Location:</label>
                        <input type="text" id="location_edit" name="location" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="stop_order_edit" class="form-label">Stop Order:</label>
                        <input type="number" id="stop_order_edit" name="stop_order" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="arrival_time_edit" class="form-label">Arrival Time:</label>
                        <input type="time" id="arrival_time_edit" name="arrival_time" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-warning">Update Stop</button>
                </form>
            </div>
        </div>

        <!-- Remove Stop -->
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Remove Stop</h2>
                <form action="manage_stops.php" method="post">
                    <input type="hidden" name="action" value="remove">
                    <div class="mb-3">
                        <label for="stop_id_remove" class="form-label">Stop ID:</label>
                        <input type="number" id="stop_id_remove" name="stop_id" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Remove Stop</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
