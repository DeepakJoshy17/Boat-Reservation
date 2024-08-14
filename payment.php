<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $boat_id = $_POST['boat_id'];
    $schedule_id = $_POST['schedule_id'];
    $user_id = $_POST['user_id'];
    $selected_seats = $_POST['selected_seats'];
    $start_stop_id = $_POST['start_stop_id']; // Retrieve the start stop ID
    $end_stop_id = $_POST['end_stop_id'];     // Retrieve the end stop ID
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

            // Bind the actual start_stop_id and end_stop_id values
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
        
        // Assuming $booking_id is from the last inserted booking for the user or a proper mechanism to retrieve it
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
