<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db_connection.php';

if (isset($_GET['booking_id'])) {
    $booking_id = intval($_GET['booking_id']); // Ensure the booking_id is an integer

    // Prepare the query
    $stmt = $conn->prepare("
        SELECT b.schedule_id, b.user_id, b.seat_id, b.booking_date, p.amount, p.payment_method
        FROM Seat_Bookings b
        JOIN Payments p ON b.booking_id = p.booking_id
        WHERE b.booking_id = ?
    ");

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("i", $booking_id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    if (!$result) {
        die("No booking found with ID: " . $booking_id);
    }

    $stmt->close();
} else {
    die("<div class='alert alert-danger'>Booking ID is missing.</div>");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <div class="container mt-5">
        <h1 class="mb-4">Booking Confirmation</h1>
        <p><strong>Booking ID:</strong> <?= htmlspecialchars($booking_id) ?></p>
        <p><strong>Schedule ID:</strong> <?= htmlspecialchars($result['schedule_id']) ?></p>
        <p><strong>User ID:</strong> <?= htmlspecialchars($result['user_id']) ?></p>
        <p><strong>Seat ID:</strong> <?= htmlspecialchars($result['seat_id']) ?></p>
        <p><strong>Booking Date:</strong> <?= htmlspecialchars($result['booking_date']) ?></p>
        <p><strong>Amount:</strong> $<?= htmlspecialchars($result['amount']) ?></p>
        <p><strong>Payment Method:</strong> <?= htmlspecialchars($result['payment_method']) ?></p>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php include 'includes/footer.php'; ?>
</html>
