<!-- filepath: /c:/Users/Jiz/OneDrive/SOMOSF5/Aerolinea/resources/views/flight_logs.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Flight Logs</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Flight Logs</h1>
    <table>
        <thead>
            <tr>
                <th>Flight Number</th>
                <th>Log Entry</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($logs as $log): ?>
                <tr>
                    <td><?= $log['flight_number'] ?></td>
                    <td><?= $log['entry'] ?></td>
                    <td><?= $log['date'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>