<?php
include 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['id'];
            header('Location: profile.php');
            exit();
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "User not found";
    }
}
?>

<?php include 'includes/header.php'; ?>
<section class="login">
    <h2>Login</h2>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</section>
<?php include 'includes/footer.php'; ?>
