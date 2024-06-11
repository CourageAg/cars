<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turo Clone</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/contact.css">
    <link rel="stylesheet" href="styles/slider.css">
    <link rel="stylesheet" href="styles/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
<header class="header">
    <nav class="navbar">
        <a href="index.php" class="logo"><img src="images/logo.png" alt="Turo Clone"></a>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="cars.php">Browse Cars</a></li>
            <li><a href="#">How It Works</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <div class="nav-buttons">
            <?php if (isset($_SESSION['username'])): ?>
                <a href="profile.php" class="login">Profile</a>
                <a href="logout.php" class="sign-up">Logout</a>
            <?php else: ?>
                <a href="login.php" class="login">Login</a>
                <a href="register.php" class="sign-up">Sign Up</a>
            <?php endif; ?>
        </div>
    </nav>
</header>
<main>
