<?php
    // Database connection
    include ('connection.php');

    // Handle search query
    $search_query = isset($_GET['search']) ? $_GET['search'] : '';

    // Fetch events based on search query
    $sql = "SELECT * FROM events WHERE 
            event_name LIKE '%$search_query%' OR 
            event_date LIKE '%$search_query%' OR 
            venue LIKE '%$search_query%'";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Booking System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">   
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Available Events</h1>

        <!-- Search Form -->
        <form class="d-flex mt-4 mb-4" action="index.php" method="GET">
            <input class="form-control me-2" type="search" name="search" placeholder="Search by event name, date, or venue" value="<?php echo htmlspecialchars($search_query); ?>">
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Event Name</th>
                    <th>Date</th>
                    <th>Venue</th>
                    <th>Total Seats</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0) { ?>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['event_name']; ?></td>
                            <td><?php echo $row['event_date']; ?></td>
                            <td><?php echo $row['venue']; ?></td>
                            <td><?php echo $row['total_seats']; ?></td>
                            <td>
                                <a href="book.php?event_id=<?php echo $row['id']; ?>" class="btn btn-primary">Book Now</a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="5" class="text-center">No events found for "<?php echo htmlspecialchars($search_query); ?>"</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>