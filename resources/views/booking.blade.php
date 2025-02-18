<!-- filepath: /c:/Users/Jiz/OneDrive/SOMOSF5/Aerolinea/resources/views/booking.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book a Flight</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Book a Flight</h1>
    <form action="book_flight.php" method="POST">
        <label for="flight_id">Flight ID:</label>
        <input type="text" id="flight_id" name="flight_id" required>
        <label for="passenger_name">Passenger Name:</label>
        <input type="text" id="passenger_name" name="passenger_name" required>
        <button type="submit">Book Flight</button>
    </form>
</body>
</html>