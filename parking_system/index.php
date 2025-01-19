<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parking System</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your external style.css -->
</head>
<body>
    <div class="form-container"> <!-- Form Container Div -->
        <h1>Parking Reservation Form</h1>
        <form action="process.php" method="POST">
            <label for="username">Name:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" required><br><br>

            <label for="vehicle_type">Vehicle Type:</label>
            <input type="text" id="vehicle_type" name="vehicle_type" required><br><br>

            <label for="license_plate">License Plate:</label>
            <input type="text" id="license_plate" name="license_plate" required><br><br>

            <label for="lot_id">Parking Lot ID:</label>
            <input type="number" id="lot_id" name="lot_id" required><br><br>

            <label for="duration">Duration (hours):</label>
            <input type="number" id="duration" name="duration" required><br><br>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
