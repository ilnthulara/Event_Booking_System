<?php
    // Database connection
    include ('connection.php');

    // Get event details
    $event_id = $_GET['event_id'];
    $sql = "SELECT * FROM events WHERE id = $event_id";
    $result = $conn->query($sql);
    $event = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Seat Selection</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
</head>
<body style="background: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);">
    <div class="container mt-5">
        <h2>Book Event: <?php echo $event['event_name']; ?></h2>
        <form action="confirm_booking.php" method="POST" class="mt-3">
            <input type="hidden" name="event_id" value="<?php echo $event['id']; ?>">
            <div class="mb-3">
                <label for="customer_name" class="form-label">Your Name</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" required>
            </div>
            <div class="mb-3">
                <label for="customer_email" class="form-label">Your Email</label>
                <input type="email" class="form-control" id="customer_email" name="customer_email" required>
            </div>
            <div class="mb-3">
                <label for="seats_booked" class="form-label">Number of Seats</label>
                <input type="number" class="form-control" id="seats_booked" name="seats_booked" min="1" max="<?php echo $event['total_seats']; ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Confirm Booking</button>
        </form>
    </div>
</body>
</html>
