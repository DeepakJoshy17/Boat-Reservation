<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db_connection.php';

// Fetch all stops for selection
$stops_result = $conn->query("SELECT stop_id, location FROM Route_Stops");

// Handle search and booking
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['search_boats'])) {
        // Search boats based on stops and date
        $schedule_date = $_POST['schedule_date'];
        $start_stop_id = $_POST['start_stop'];
        $end_stop_id = $_POST['end_stop'];

        // Get route IDs and stop orders for the start and end stops
        $stmt = $conn->prepare("
            SELECT rs1.route_id AS start_route_id, rs1.stop_order AS start_order, rs2.route_id AS end_route_id, rs2.stop_order AS end_order
            FROM Route_Stops rs1
            JOIN Route_Stops rs2 ON rs1.route_id = rs2.route_id
            WHERE rs1.stop_id = ? AND rs2.stop_id = ?
        ");
        $stmt->bind_param("ii", $start_stop_id, $end_stop_id);
        $stmt->execute();
        $route_ids_result = $stmt->get_result();
        $route_ids = $route_ids_result->fetch_assoc();
        $stmt->close();

        // Check if both stops are on the same route and in the correct order
        if ($route_ids && $route_ids['start_route_id'] === $route_ids['end_route_id'] && $route_ids['start_order'] < $route_ids['end_order']) {
            $route_id = $route_ids['start_route_id'];

            // Fetch boats available on this route and schedule date
            $stmt = $conn->prepare("
                SELECT s.schedule_id, b.boat_id, b.boat_name
                FROM Boats b
                JOIN Schedules s ON b.boat_id = s.boat_id
                WHERE s.route_id = ? AND DATE(s.arrival_time) = ?
            ");
            $stmt->bind_param("is", $route_id, $schedule_date);
            $stmt->execute();
            $boats_result = $stmt->get_result();
            $stmt->close();

            if ($boats_result->num_rows === 0) {
                $no_boats_message = "No boats available for the selected stops and schedule date.";
            }
        } else {
            $no_boats_message = "No boats available for the selected stops.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Your Seat</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <div class="container mt-5">
        <h1 class="mb-4">Search and Book Your Seat</h1>

        <!-- Search Form -->
        <form method="post" action="" class="mb-4">
            <div class="mb-3">
                <label for="schedule_date" class="form-label">Schedule Date:</label>
                <input type="date" id="schedule_date" name="schedule_date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="start_stop" class="form-label">Start Stop:</label>
                <select id="start_stop" name="start_stop" class="form-select" required>
                    <option value="">-- Select Start Stop --</option>
                    <?php while ($stop = $stops_result->fetch_assoc()): ?>
                        <option value="<?= htmlspecialchars($stop['stop_id']) ?>"><?= htmlspecialchars($stop['location']) ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="end_stop" class="form-label">End Stop:</label>
                <select id="end_stop" name="end_stop" class="form-select" required>
                    <option value="">-- Select End Stop --</option>
                    <?php
                    // Reset pointer for the stops query
                    $stops_result->data_seek(0);
                    while ($stop = $stops_result->fetch_assoc()): ?>
                        <option value="<?= htmlspecialchars($stop['stop_id']) ?>"><?= htmlspecialchars($stop['location']) ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <button type="submit" name="search_boats" class="btn btn-primary">Search Boats</button>
        </form>

        <?php if (isset($no_boats_message)): ?>
            <div class="alert alert-warning"><?= htmlspecialchars($no_boats_message) ?></div>
        <?php elseif (isset($boats_result)): ?>
            <h2 class="mb-4">Available Boats</h2>
            <div class="row">
                <?php while ($boat = $boats_result->fetch_assoc()): ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($boat['boat_name']) ?></h5>
                                <form method="get" action="seatview.php">
                                    <input type="hidden" name="boat_id" value="<?= htmlspecialchars($boat['boat_id']) ?>">
                                    <input type="hidden" name="schedule_id" value="<?= htmlspecialchars($boat['schedule_id']) ?>">
                                    <input type="hidden" name="start_stop_id" value="<?= htmlspecialchars($start_stop_id) ?>">
                                    <input type="hidden" name="end_stop_id" value="<?= htmlspecialchars($end_stop_id) ?>">
                                    <button type="submit" class="btn btn-primary">Select Boat</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php include 'includes/footer.php'; ?>
</html>
