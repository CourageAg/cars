<?php
include 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    
    $car_id = intval($_POST['car_id']);
    $user_id = $_SESSION['user_id'];
    $start_date = $_POST['startDate'];
    $end_date = $_POST['endDate'];
    $price_per_day = floatval($_POST['price_per_day']);
    
    $start = new DateTime($start_date);
    $end = new DateTime($end_date);
    $days_booked = $start->diff($end)->days + 1;
    $total_amount = $days_booked * $price_per_day;

    // Insert the booking into the database
    $sql = "INSERT INTO bookings (user_id, car_id, start_date, end_date, total_amount) VALUES ('$user_id', '$car_id', '$start_date', '$end_date', '$total_amount')";

    if ($conn->query($sql) === TRUE) {
        header('Location: success.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    header('Location: index.php');
    exit();
}
?>
