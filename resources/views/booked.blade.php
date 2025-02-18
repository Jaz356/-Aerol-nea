<!-- filepath: /c:/Users/Jiz/OneDrive/SOMOSF5/Aerolinea/resources/views/booked.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booked Flights</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Booked Flights</h1>
    <div class="buttons">
        <a href="flight_board.php?status=unbooked" class="button">Unbooked Flights</a>
        <a href="booked.php" class="button">Booked Flights</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Passenger Name</th>
                <th>Flight Number</th>
                <th>Destination</th>
                <th>Departure Time</th>
                <th>Arrival Time</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bookings as $booking): ?>
                <tr>
                    <td><?= $booking['passenger_name'] ?></td>
                    <td><?= $booking['flight_number'] ?></td>
                    <td><?= $booking['destination'] ?></td>
                    <td><?= $booking['departure_time'] ?></td>
                    <td><?= $booking['arrival_time'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>