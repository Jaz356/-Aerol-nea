<!-- filepath: /c:/Users/Jiz/OneDrive/SOMOSF5/Aerolinea/resources/views/flight_board.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Flight Board</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Flight Board</h1>
    <table>
        <thead>
            <tr>
                <th>Flight Number</th>
                <th>Destination</th>
                <th>Departure Time</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($flights as $flight): ?>
                <tr>
                    <td><?= $flight['number'] ?></td>
                    <td><?= $flight['destination'] ?></td>
                    <td><?= $flight['departure_time'] ?></td>
                    <td><?= $flight['status'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>