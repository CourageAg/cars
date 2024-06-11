<?php
include 'includes/header.php';
include 'includes/config.php';
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user information
$user_sql = "SELECT * FROM users WHERE id = $user_id";
$user_result = $conn->query($user_sql);
$user = $user_result->fetch_assoc();

// Update user information
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    
    // Handle profile image upload
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
        $profile_image = $_FILES['profile_image']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($profile_image);
        move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file);

        // Update user info with profile image
        $update_sql = "UPDATE users SET username='$username', email='$email', profile_image='$profile_image' WHERE id=$user_id";
    } else {
        // Update user info without profile image
        $update_sql = "UPDATE users SET username='$username', email='$email' WHERE id=$user_id";
    }

    if ($conn->query($update_sql) === TRUE) {
        echo "Profile updated successfully!";
        header('Location: profile.php');
        exit();
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}

// Fetch user bookings
$sql = "SELECT * FROM bookings INNER JOIN cars ON bookings.car_id = cars.id WHERE bookings.user_id = $user_id";
$result = $conn->query($sql);

$total_spent = 0;
?>

<section class="profile">
    <h2>Your Profile</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
        </div>
        <div class="form-group">
            <label for="profile_image">Profile Image:</label>
            <input type="file" id="profile_image" name="profile_image">
        </div>
        <button type="submit">Update Profile</button>
    </form>

    <h2>Your Bookings</h2>
    <div class="booking-list">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $start_date = new DateTime($row['start_date']);
                $end_date = new DateTime($row['end_date']);
                $interval = $start_date->diff($end_date);
                $days = $interval->days + 1; 
                $total_price = $days * $row['price_per_day'];
                $total_spent += $total_price;
                
                echo "<div class='booking-card'>";
                echo "<h3>" . $row['name'] . "</h3>";
                echo "<p>From: " . $row['start_date'] . " To: " . $row['end_date'] . "</p>";
                echo "<p>Price per day: $" . $row['price_per_day'] . "</p>";
                echo "<p>Total price: $" . $total_price . "</p>";
                echo "</div>";
            }
        } else {
            echo "You have no bookings";
        }
        ?>
    </div>

    <h2>Total Amount Spent</h2>
    <p>$<?php echo $total_spent; ?></p>
</section>

<?php include 'includes/footer.php'; ?>
