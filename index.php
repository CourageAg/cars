<?php include 'includes/header.php'; ?>

<section class="hero">
    <h1>Find Your Perfect Car</h1>
    <p>Book unique cars from local hosts around the world.</p>
    <button class="cta-button">Get Started</button>
</section>

<section class="slider">
    <div class="slides">
        <div class="slide" style="background-image: url('images/slider1.jpg');"></div>
        <div class="slide" style="background-image: url('images/slider2.jpg');"></div>
        <div class="slide" style="background-image: url('images/slider3.jpg');"></div>
    </div>
    <div class="slider-nav">
        <span class="prev">&lt;</span>
        <span class="next">&gt;</span>
    </div>
</section>

<section class="cars">
    <h2>Available Cars</h2>
    <div class="car-list">
        <?php
        include 'includes/config.php';
        $sql = "SELECT * FROM cars LIMIT 14";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='car-card'>";
                echo "<img src='images/" . $row['image'] . "' alt='" . $row['name'] . "'>";
                echo "<h3>" . $row['name'] . "</h3>";
                echo "<p>" . $row['description'] . "</p>";
                echo "<p>Price per day: $" . $row['price_per_day'] . "</p>";
                echo "<a href='car.php?id=" . $row['id'] . "' class='book-button'>View Details</a>";
                echo "</div>";
            }
        } else {
            echo "No cars available";
        }
        $conn->close();
        ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
