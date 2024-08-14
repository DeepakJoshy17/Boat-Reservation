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

function manage_schedule($action) {
    global $conn;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $boat_id = $_POST['boat_id'];
        $route_id = $_POST['route_id'];
        $departure_time = $_POST['departure_time'];
        $arrival_time = $_POST['arrival_time'];

        if ($action == 'add') {
            $query = "INSERT INTO Schedules (boat_id, route_id, departure_time, arrival_time, status) VALUES (?, ?, ?, ?, 'Scheduled')";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("iiss", $boat_id, $route_id, $departure_time, $arrival_time);
            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Schedule added successfully.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
            }
            $stmt->close();
        } elseif ($action == 'edit') {
            $schedule_id = $_POST['schedule_id'];
            $query = "UPDATE Schedules SET boat_id = ?, route_id = ?, departure_time = ?, arrival_time = ? WHERE schedule_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("iisi", $boat_id, $route_id, $departure_time, $arrival_time, $schedule_id);
            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Schedule updated successfully.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
            }
            $stmt->close();
        } elseif ($action == 'remove') {
            $schedule_id = $_POST['schedule_id'];
            $query = "DELETE FROM Schedules WHERE schedule_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $schedule_id);
            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Schedule removed successfully.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
            }
            $stmt->close();
        }
        $conn->close();
    }
}

$action = isset($_POST['action']) ? $_POST['action'] : '';
manage_schedule($action);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Schedules</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <!-- Add your custom CSS here if needed -->
</head>

<body>
    <?php include 'includes/headeradmin.php'; ?>

    <div class="container mt-5">
        <h1 class="mb-4">Manage Schedules</h1>

        <!-- Add Schedule -->
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">Add Schedule</h2>
                <form action="manage_schedules.php" method="post">
                    <input type="hidden" name="action" value="add">
                    <div class="mb-3">
                        <label for="boat_id" class="form-label">Boat ID:</label>
                        <input type="number" id="boat_id" name="boat_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="route_id" class="form-label">Route ID:</label>
                        <input type="number" id="route_id" name="route_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="departure_time" class="form-label">Departure Time:</label>
                        <input type="datetime-local" id="departure_time" name="departure_time" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="arrival_time" class="form-label">Arrival Time:</label>
                        <input type="datetime-local" id="arrival_time" name="arrival_time" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Schedule</button>
                </form>
            </div>
        </div>

        <!-- Edit Schedule -->
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">Edit Schedule</h2>
                <form action="manage_schedules.php" method="post">
                    <input type="hidden" name="action" value="edit">
                    <div class="mb-3">
                        <label for="schedule_id_edit" class="form-label">Schedule ID:</label>
                        <input type="number" id="schedule_id_edit" name="schedule_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="boat_id_edit" class="form-label">Boat ID:</label>
                        <input type="number" id="boat_id_edit" name="boat_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="route_id_edit" class="form-label">Route ID:</label>
                        <input type="number" id="route_id_edit" name="route_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="departure_time_edit" class="form-label">Departure Time:</label>
                        <input type="datetime-local" id="departure_time_edit" name="departure_time" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="arrival_time_edit" class="form-label">Arrival Time:</label>
                        <input type="datetime-local" id="arrival_time_edit" name="arrival_time" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-warning">Update Schedule</button>
                </form>
            </div>
        </div>

        <!-- Remove Schedule -->
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Remove Schedule</h2>
                <form action="manage_schedules.php" method="post">
                    <input type="hidden" name="action" value="remove">
                    <div class="mb-3">
                        <label for="schedule_id_remove" class="form-label">Schedule ID:</label>
                        <input type="number" id="schedule_id_remove" name="schedule_id" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Remove Schedule</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
<?php include 'includes/footer.php'; ?>
</html>
