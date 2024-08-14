user boking 
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db_connection.php';

// Fetch all stops for selection
$stops_result = $conn->query("SELECT DISTINCT location FROM Route_Stops");

// Handle search and booking
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['search_boats'])) {
        // Search boats based on stops and date
        $schedule_date = $_POST['schedule_date'];
        $start_stop = $_POST['start_stop'];
        $end_stop = $_POST['end_stop'];

        // Get route IDs and stop orders for the start and end stops
        $stmt = $conn->prepare("
            SELECT rs1.route_id AS start_route_id, rs1.stop_order AS start_order, rs2.route_id AS end_route_id, rs2.stop_order AS end_order
            FROM Route_Stops rs1
            JOIN Route_Stops rs2 ON rs1.route_id = rs2.route_id
            WHERE rs1.location = ? AND rs2.location = ?
        ");
        $stmt->bind_param("ss", $start_stop, $end_stop);
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
                        <option value="<?= htmlspecialchars($stop['location']) ?>"><?= htmlspecialchars($stop['location']) ?></option>
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
                        <option value="<?= htmlspecialchars($stop['location']) ?>"><?= htmlspecialchars($stop['location']) ?></option>
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
seat view 
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db_connection.php';

if (isset($_GET['boat_id']) && isset($_GET['schedule_id'])) {
    $boat_id = $_GET['boat_id'];
    $schedule_id = $_GET['schedule_id'];

    // Fetch available seats for the selected boat
    $stmt = $conn->prepare("
        SELECT s.seat_id, s.seat_number, s.type
        FROM Seats s
        WHERE s.boat_id = ?
    ");
    $stmt->bind_param("i", $boat_id);
    $stmt->execute();
    $available_seats = $stmt->get_result();
    $stmt->close();
} else {
    echo "<div class='alert alert-danger'>No boat or schedule selected.</div>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Seats</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add the CSS styles from above here */
        .boat-container {
            position: relative;
            width: 80%;
            max-width: 600px;
            margin: 0 auto;
            background: #f5f5f5;
            padding: 30px;
            padding-top: 120px;
            padding-bottom: 50px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            border-radius: 50% 50% 0 0;
        }

        .boat-container::after {
            content: '';
            position: absolute;
            bottom: -100px;
            left: 50%;
            width: 0;
            height: 0;
            border-left: 120px solid transparent;
            border-right: 120px solid transparent;
            border-top: 80px solid #f5f5f5;
            border-radius: 0 0 120px 120px;
            transform: translateX(-50%);
        }

        .boat-name {
            background: #15b9d9;
            color: white;
            padding: 5px;
            margin-top: 20px;
            border-radius: 5px;
            font-size: 1.5em;
            font-weight: bold;
            position: absolute;
            top: 30px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
        }

        .seat {
            display: inline-block;
            width: 40px;
            height: 40px;
            margin: 5px;
            cursor: pointer;
            position: relative;
            border: 2px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            line-height: 40px;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .seat:hover {
            transform: scale(1.5);
            background-color: #202428;
            color: white;
            font-weight: bold;
        }

        .seat.selected {
            background-color: #38c4df;
            color: white;
            font-weight: bold;
        }

        .available {
            background-color: white;
            color: #202428;
            font-weight: bold;
        }

        .booked {
            background-color: lightgrey;
            color: white;
            font-weight: bold;
        }

        .gap {
            display: inline-block;
            width: 20px;
            height: 40px;
            margin: 5px;
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <div class="container mt-5">
        <h1 class="mb-4">Available Seats for Boat ID <?= htmlspecialchars($boat_id) ?></h1>

        <!-- Container for the boat and seats -->
        <div class="boat-container">
            <div class="boat-name">Boat Name</div>
            <div id="seat-container">
                <!-- Seats will be injected here by JavaScript -->
            </div>
        </div>

        <div class="mt-4">
            <button id="select-all" class="btn btn-primary">Select All</button>
            <button id="deselect-all" class="btn btn-secondary">Deselect All</button>
        </div>

        <form id="booking-form" method="post" action="payment.php" class="mt-4">
            <input type="hidden" name="boat_id" value="<?= htmlspecialchars($boat_id) ?>">
            <input type="hidden" name="schedule_id" value="<?= htmlspecialchars($schedule_id) ?>">
            <input type="hidden" name="user_id" value="<?= htmlspecialchars($_SESSION['user_id']) ?>">
            <input type="hidden" name="selected_seats" id="selected-seats" value="">
            <button type="submit" id="book-selected" class="btn btn-success">Pay Now</button>
        </form>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const seats = <?= json_encode($available_seats->fetch_all(MYSQLI_ASSOC)) ?>;
            const seatContainer = document.getElementById('seat-container');
            const selectedSeats = document.getElementById('selected-seats');
            const bookingForm = document.getElementById('booking-form');

            // Render seats
            seats.forEach(seat => {
                const seatElement = document.createElement('div');
                seatElement.classList.add('seat', 'available');
                seatElement.dataset.seatId = seat.seat_id;
                seatElement.textContent = seat.seat_number;
                seatElement.addEventListener('click', function () {
                    if (this.classList.contains('available')) {
                        this.classList.add('selected');
                    } else {
                        this.classList.remove('selected');
                    }
                    updateSelectedSeats();
                });
                seatContainer.appendChild(seatElement);
            });

            // Update hidden input with selected seats
            function updateSelectedSeats() {
                const selected = Array.from(document.querySelectorAll('.seat.selected'))
                    .map(seat => seat.dataset.seatId)
                    .join(',');
                selectedSeats.value = selected;
            }

            // Select all seats
            document.getElementById('select-all').addEventListener('click', function () {
                document.querySelectorAll('.seat.available').forEach(seat => seat.classList.add('selected'));
                updateSelectedSeats();
            });

            // Deselect all seats
            document.getElementById('deselect-all').addEventListener('click', function () {
                document.querySelectorAll('.seat.selected').forEach(seat => seat.classList.remove('selected'));
                updateSelectedSeats();
            });
        });
    </script>
</body>
<?php include 'includes/footer.php'; ?>
</html>
payment code
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $boat_id = $_POST['boat_id'];
    $schedule_id = $_POST['schedule_id'];
    $user_id = $_POST['user_id'];
    $selected_seats = $_POST['selected_seats'];
    $payment_method = 'Credit Card'; // This can be dynamic based on user input
    $amount = 100.00; // Example amount, this should be calculated based on the number of seats

    // Start transaction
    $conn->begin_transaction();

    try {
        // Insert into Seat_Bookings
        $seat_ids = explode(',', $selected_seats);
        foreach ($seat_ids as $seat_id) {
            $stmt = $conn->prepare("
                INSERT INTO Seat_Bookings (schedule_id, user_id, seat_id, start_stop_id, end_stop_id, booking_date, payment_status)
                VALUES (?, ?, ?, ?, ?, NOW(), 'Pending')
            ");
            if ($stmt === false) {
                throw new Exception('Prepare failed: ' . $conn->error);
            }

            // Assuming start_stop_id and end_stop_id are known or can be set to default values
            $start_stop_id = 1; // Replace with actual value
            $end_stop_id = 2;   // Replace with actual value
            $stmt->bind_param("iiiii", $schedule_id, $user_id, $seat_id, $start_stop_id, $end_stop_id);
            if (!$stmt->execute()) {
                throw new Exception('Execute failed: ' . $stmt->error);
            }
            $stmt->close();
        }

        // Insert into Payments
        $stmt = $conn->prepare("
            INSERT INTO Payments (booking_id, amount, payment_method, payment_status)
            VALUES (?, ?, ?, 'Pending')
        ");
        if ($stmt === false) {
            throw new Exception('Prepare failed: ' . $conn->error);
        }
        
        $booking_id = $conn->insert_id; // Get the last inserted booking ID
        $stmt->bind_param("ids", $booking_id, $amount, $payment_method);
        if (!$stmt->execute()) {
            throw new Exception('Execute failed: ' . $stmt->error);
        }
        $payment_id = $stmt->insert_id; // Get the last inserted payment ID
        $stmt->close();

        // Commit transaction
        $conn->commit();

        echo "<div class='alert alert-success'>Booking and payment successful!</div>";
    } catch (Exception $e) {
        // Rollback transaction
        $conn->rollback();
        echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
    }
} else {
    echo "<div class='alert alert-danger'>Invalid request.</div>";
}
?>

 payment end