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

// Fetch boats for selection
$boats = $conn->query("SELECT * FROM Boats");

// Handle add, edit, delete seat operations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_seat'])) {
        // Add seat
        $boat_id = $_POST['boat_id'];
        $seat_number = $_POST['seat_number'];
        $type = $_POST['type'];

        $stmt = $conn->prepare("INSERT INTO Seats (boat_id, seat_number, type) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $boat_id, $seat_number, $type);
        $stmt->execute();
        $stmt->close();
    } elseif (isset($_POST['edit_seat'])) {
        // Edit seat
        $seat_id = $_POST['seat_id'];
        $seat_number = $_POST['seat_number'];
        $type = $_POST['type'];

        $stmt = $conn->prepare("UPDATE Seats SET seat_number = ?, type = ? WHERE seat_id = ?");
        $stmt->bind_param("ssi", $seat_number, $type, $seat_id);
        $stmt->execute();
        $stmt->close();
    } elseif (isset($_POST['delete_seat'])) {
        // Delete seat
        $seat_id = $_POST['seat_id'];

        $stmt = $conn->prepare("DELETE FROM Seats WHERE seat_id = ?");
        $stmt->bind_param("i", $seat_id);
        $stmt->execute();
        $stmt->close();
    }
}

// Fetch seats for selected boat
$selected_boat_id = isset($_GET['boat_id']) ? (int)$_GET['boat_id'] : 0;
$seats = $conn->query("SELECT * FROM Seats WHERE boat_id = $selected_boat_id");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Seats</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <!-- Add your custom CSS here if needed -->
</head>

<body>
    <?php include 'includes/headeradmin.php'; ?>

    <div class="container mt-5">
        <h1 class="mb-4">Admin Seat Management</h1>

        <!-- Boat Selection Form -->
        <form method="get" action="" class="mb-4">
            <div class="mb-3">
                <label for="boat_id" class="form-label">Select Boat:</label>
                <select id="boat_id" name="boat_id" class="form-select" onchange="this.form.submit()">
                    <option value="">-- Select Boat --</option>
                    <?php while ($boat = $boats->fetch_assoc()): ?>
                        <option value="<?= $boat['boat_id'] ?>" <?= $boat['boat_id'] == $selected_boat_id ? 'selected' : '' ?>>
                            <?= htmlspecialchars($boat['boat_name']) ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
        </form>

        <?php if ($selected_boat_id): ?>
            <h2 class="mb-4">Seats for Boat ID <?= $selected_boat_id ?></h2>

            <!-- Add Seat Form -->
            <form method="post" action="" class="mb-4">
                <input type="hidden" name="boat_id" value="<?= $selected_boat_id ?>">
                <div class="mb-3">
                    <label for="seat_number" class="form-label">Seat Number:</label>
                    <input type="text" id="seat_number" name="seat_number" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Seat Type:</label>
                    <input type="text" id="type" name="type" class="form-control" required>
                </div>
                <button type="submit" name="add_seat" class="btn btn-primary">Add Seat</button>
            </form>

            <!-- Existing Seats Table -->
            <h3>Existing Seats</h3>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Seat ID</th>
                        <th>Seat Number</th>
                        <th>Seat Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($seat = $seats->fetch_assoc()): ?>
                        <tr>
                            <form method="post" action="">
                                <td><?= $seat['seat_id'] ?></td>
                                <td><input type="text" name="seat_number" value="<?= htmlspecialchars($seat['seat_number']) ?>" class="form-control" required></td>
                                <td><input type="text" name="type" value="<?= htmlspecialchars($seat['type']) ?>" class="form-control" required></td>
                                <td>
                                    <input type="hidden" name="seat_id" value="<?= $seat['seat_id'] ?>">
                                    <button type="submit" name="edit_seat" class="btn btn-warning">Edit</button>
                                    <button type="submit" name="delete_seat" class="btn btn-danger">Delete</button>
                                </td>
                            </form>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php include 'includes/footer.php'; ?>
</html>
