<?php
// Database configuration
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'parking_system';

// Connect to the database
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$username = $_POST['username'];
$phone_number = $_POST['phone_number'];
$vehicle_type = $_POST['vehicle_type'];
$license_plate = $_POST['license_plate'];
$lot_id = $_POST['lot_id'];
$duration = $_POST['duration'];

// Check for available parking space in the specified lot
$sql_space_check = "SELECT space_id FROM parkingspace WHERE lot_id = $lot_id AND availability_status = 'Available' LIMIT 1";
$result = $conn->query($sql_space_check);

if ($result->num_rows > 0) {
    $space = $result->fetch_assoc();
    $space_id = $space['space_id'];

    // Insert reservation directly into the `reservation` table
    $sql_reservation = "INSERT INTO reservation (username, phone_number, vehicle_type, license_plate, parking_id, duration, status)
                        VALUES ('$username', '$phone_number', '$vehicle_type', '$license_plate', '$space_id', '$duration', 'Confirmed')";
    if ($conn->query($sql_reservation) === TRUE) {
        // Update the availability status of the parking space
        $sql_update_space = "UPDATE parkingspace SET availability_status = 'Reserved' WHERE space_id = $space_id";
        $conn->query($sql_update_space);

        echo "Reservation successful! Your reservation ID is: " . $conn->insert_id;
    } else {
        echo "Error in reservation: " . $conn->error;
    }
} else {
    echo "No available parking spaces in this lot.";
}

// Close the connection
$conn->close();
?>
