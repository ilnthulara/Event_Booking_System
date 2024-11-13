<?php
    // Database connection
    include ('connection.php');

    // Insert booking
    $event_id = $_POST['event_id'];
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $seats_booked = $_POST['seats_booked'];

    // Update seats
    $update_seats = "UPDATE events SET total_seats = total_seats - $seats_booked WHERE id = $event_id";
    $conn->query($update_seats);

    // Save booking
    $sql = "INSERT INTO bookings (event_id, customer_name, customer_email, seats_booked)
            VALUES ($event_id, '$customer_name', '$customer_email', $seats_booked)";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">   
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<?php
    if ($conn->query($sql) === TRUE) {
        echo "<div class='ticket-confirmation'>";
        echo "<h1>Booking Confirmed</h1>";
        echo "<p>Thank you, $customer_name. Your booking for Event ID $event_id is confirmed.</p>";
        echo "<p><strong>Seats Booked:</strong> $seats_booked</p>";
        echo "<p><strong>Ticket ID:</strong> " . $conn->insert_id . "</p>";
        echo "</div>";
        echo "<br>";
        echo "<a class='btn btn-primary' href='index.php'>Back to Events</a>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
?>
</body>
</html>
