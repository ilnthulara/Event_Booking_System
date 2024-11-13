<!DOCTYPE html>
<html lang="en">
<head>
    <title>Booking Confirmation</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
<style>
        body {
            background-color: #f8f9fa; /* Light gray background */
        }
        .confirmation-container {
            margin-top: 100px; /* Space above the confirmation box */
            padding: 20px;
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            background-color: white; /* White background for the confirmation box */
        }
        .thank-you-message {
            font-size: 24px; /* Larger font size for emphasis */
            font-weight: bold; /* Bold font */
            color: #28a745; /* Green color */
            margin-bottom: 20px; /* Space below the message */
        }
        .ticket-details {
            font-size: 18px; /* Font size for ticket details */
            margin-bottom: 15px; /* Space below details */
        }
        .btn-return {
            margin-top: 20px; /* Space above button */
        }
    </style>
</head>
<body style="background-image: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);">
    <div class="container confirmation-container">
        <h1 class="text-center">Booking Confirmation</h1>
        <div class="alert alert-success text-center">
            <?php
            // Database connection
            include ('connection.php');

            // Retrieve data from the form
            $event_id = $_POST['event_id'];
            $seats = $_POST['seats'];
            $user_name = $_POST['user_name'];
            $user_email = $_POST['user_email'];

            // Insert booking records and update seat status
            foreach ($seats as $seat_id) {
                // Insert booking into the bookings table
                $conn->query("INSERT INTO bookings (event_id, seat_id, user_name, user_email, payment_status) 
                              VALUES ($event_id, $seat_id, '$user_name', '$user_email', 'paid')");

                // Mark seat as booked in the seats table
                $conn->query("UPDATE seats SET status = 'booked' WHERE seat_id = $seat_id");
            }

            // Confirm booking with the user
            echo "<div class='thank-you-message'>Thank you, $user_name!</div>";
            echo "<div class='ticket-details'>Your booking is confirmed for the event with ID: $event_id. A ticket will be sent to $user_email.</div>";
            ?>
        </div>
        <div class="text-center">
            <a href="index.php" class="btn btn-primary btn-return lato-regular">Return to Event Listings</a>
        </div>
    </div>
</body>
</html>