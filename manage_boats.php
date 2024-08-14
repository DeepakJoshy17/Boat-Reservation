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

function manage_boat($action) {
    global $conn;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $boat_name = $_POST['boat_name'];
        $capacity = $_POST['capacity'];
        $status = $_POST['status'];

        if ($action == 'add') {
            $query = "INSERT INTO Boats (boat_name, capacity, status) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sis", $boat_name, $capacity, $status);
            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Boat added successfully.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
            }
            $stmt->close();
        } elseif ($action == 'edit') {
            $boat_id = $_POST['boat_id'];
            $query = "UPDATE Boats SET boat_name = ?, capacity = ?, status = ? WHERE boat_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sisi", $boat_name, $capacity, $status, $boat_id);
            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Boat updated successfully.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
            }
            $stmt->close();
        } elseif ($action == 'remove') {
            $boat_id = $_POST['boat_id'];
            $query = "DELETE FROM Boats WHERE boat_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $boat_id);
            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Boat removed successfully.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
            }
            $stmt->close();
        }
        $conn->close();
    }
}

// Determine action based on request
$action = isset($_POST['action']) ? $_POST['action'] : '';
manage_boat($action);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Boats</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
</head>
<?php include 'includes/headeradmin.php'; ?>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Manage Boats</h1>
        
        <!-- Add Boat -->
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">Add Boat</h2>
                <form action="manage_boats.php" method="post">
                    <input type="hidden" name="action" value="add">
                    <div class="mb-3">
                        <label for="boat_name" class="form-label">Boat Name:</label>
                        <input type="text" id="boat_name" name="boat_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="capacity" class="form-label">Capacity:</label>
                        <input type="number" id="capacity" name="capacity" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status:</label>
                        <input type="text" id="status" name="status" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Boat</button>
                </form>
            </div>
        </div>
        
        <!-- Edit Boat -->
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">Edit Boat</h2>
                <form action="manage_boats.php" method="post">
                    <input type="hidden" name="action" value="edit">
                    <div class="mb-3">
                        <label for="boat_id_edit" class="form-label">Boat ID:</label>
                        <input type="number" id="boat_id_edit" name="boat_id" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="boat_name_edit" class="form-label">Boat Name:</label>
                        <input type="text" id="boat_name_edit" name="boat_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="capacity_edit" class="form-label">Capacity:</label>
                        <input type="number" id="capacity_edit" name="capacity" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="status_edit" class="form-label">Status:</label>
                        <input type="text" id="status_edit" name="status" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-warning">Update Boat</button>
                </form>
            </div>
        </div>
        
        <!-- Remove Boat -->
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Remove Boat</h2>
                <form action="manage_boats.php" method="post">
                    <input type="hidden" name="action" value="remove">
                    <div class="mb-3">
                        <label for="boat_id_remove" class="form-label">Boat ID:</label>
                        <input type="number" id="boat_id_remove" name="boat_id" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Remove Boat</button>
                </form>
            </div>
        </div>
    </div>
</body>

<?php include 'includes/footer.php'; ?>

</html>
