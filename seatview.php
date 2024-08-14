<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db_connection.php';

if (isset($_GET['boat_id']) && isset($_GET['schedule_id']) && isset($_GET['start_stop_id']) && isset($_GET['end_stop_id'])) {
    $boat_id = $_GET['boat_id'];
    $schedule_id = $_GET['schedule_id'];
    $start_stop_id = $_GET['start_stop_id'];
    $end_stop_id = $_GET['end_stop_id']; // Retrieve end_stop_id

    // Fetch stop order for the selected start location
    $start_stop_order_query = "
        SELECT stop_order 
        FROM Route_Stops 
        WHERE stop_id = ?
    ";
    $stmt = $conn->prepare($start_stop_order_query);
    if (!$stmt) {
        die('Error preparing statement: ' . $conn->error);
    }
    $stmt->bind_param("i", $start_stop_id);
    $stmt->execute();
    $start_stop_order_result = $stmt->get_result();
    $start_stop_order_row = $start_stop_order_result->fetch_assoc();
    $start_stop_order = $start_stop_order_row['stop_order'];
    $stmt->close();

    // Fetch available seats for the selected boat
    $stmt = $conn->prepare("
        SELECT s.seat_id, s.seat_number, s.type
        FROM Seats s
        WHERE s.boat_id = ?
    ");
    if (!$stmt) {
        die('Error preparing statement: ' . $conn->error);
    }
    $stmt->bind_param("i", $boat_id);
    $stmt->execute();
    $seats_result = $stmt->get_result();
    $stmt->close();

    // Fetch booked seats and their associated end stop orders
    $booked_seats_query = "
        SELECT sb.seat_id, rs.stop_order AS end_stop_order 
        FROM Seat_Bookings sb
        JOIN Route_Stops rs ON sb.end_stop_id = rs.stop_id
        WHERE sb.schedule_id = ?
    ";
    $stmt = $conn->prepare($booked_seats_query);
    if (!$stmt) {
        die('Error preparing statement: ' . $conn->error);
    }
    $stmt->bind_param("i", $schedule_id);
    $stmt->execute();
    $booked_seats_result = $stmt->get_result();

    $booked_seats = [];
    while ($row = $booked_seats_result->fetch_assoc()) {
        $booked_seats[$row['seat_id']] = $row['end_stop_order'];
    }
    $stmt->close();

} else {
    echo "<div class='alert alert-danger'>No boat, schedule, or start/end stop selected.</div>";
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
        /* Styling for the boat container and seats */
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
            cursor: not-allowed;
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
            <input type="hidden" name="start_stop_id" value="<?= htmlspecialchars($start_stop_id) ?>">
            <input type="hidden" name="end_stop_id" value="<?= htmlspecialchars($end_stop_id) ?>"> <!-- Pass end_stop_id -->
            <input type="hidden" name="user_id" value="<?= htmlspecialchars($_SESSION['user_id']) ?>">
            <input type="hidden" name="selected_seats" id="selected-seats" value="">
            <button type="submit" id="book-selected" class="btn btn-success">Pay Now</button>
        </form>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const seats = <?= json_encode($seats_result->fetch_all(MYSQLI_ASSOC)) ?>;
            const bookedSeats = <?= json_encode($booked_seats) ?>;
            const startStopOrder = <?= $start_stop_order ?>; // Get the start stop order from PHP
            const seatContainer = document.getElementById('seat-container');
            const selectedSeats = document.getElementById('selected-seats');

            // Render seats
            seats.forEach(seat => {
                const seatElement = document.createElement('div');
                seatElement.classList.add('seat', 'available');

                // Check if the seat is booked and if it should be available based on stop orders
                if (bookedSeats[seat.seat_id]) {
                    const endStopOrder = bookedSeats[seat.seat_id];
                    if (startStopOrder >= endStopOrder) {
                        // Make it available
                        seatElement.classList.add('available');
                    } else {
                        // Keep it booked
                        seatElement.classList.remove('available');
                        seatElement.classList.add('booked');
                        seatElement.style.cursor = 'not-allowed';
                    }
                }

                seatElement.dataset.seatId = seat.seat_id;
                seatElement.textContent = seat.seat_number;
                seatElement.addEventListener('click', function () {
                    if (this.classList.contains('available')) {
                        this.classList.add('selected');
                    } else if (this.classList.contains('selected')) {
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
</html>
