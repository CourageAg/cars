<?php
include 'includes/header.php';
include 'includes/config.php';

// Get the car ID from the URL
if (isset($_GET['id'])) {
    $car_id = intval($_GET['id']);
    
    // Fetch car details from the database
    $sql = "SELECT * FROM cars WHERE id = $car_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $car = $result->fetch_assoc();
    } else {
        echo "Car not found";
        exit();
    }
} else {
    echo "Invalid car ID";
    exit();
}
?>

<section class="car-details">
    <div class="container">
        <div class="car-image">
            <img src="images/<?php echo $car['image']; ?>" alt="<?php echo $car['name']; ?>">
        </div>
        <div class="car-info">
            <h2><?php echo $car['name']; ?></h2>
            <p><?php echo $car['description']; ?></p>
            <p class="price">Price per day: $<?php echo $car['price_per_day']; ?></p>
            <form id="bookingForm" action="book.php" method="POST">
                <input type="hidden" name="car_id" value="<?php echo $car['id']; ?>">
                <input type="hidden" name="price_per_day" value="<?php echo $car['price_per_day']; ?>">
                <label for="startDate">Start Date:</label>
                <input type="date" id="startDate" name="startDate" required>
                <label for="endDate">End Date:</label>
                <input type="date" id="endDate" name="endDate" required>
                <div class="total-amount" id="totalAmount">
                    Total Amount: $0
                </div>
                <button type="button" onclick="calculateTotal()">Calculate Total</button>
                <button type="submit">Book Now</button>
            </form>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<script>
    function calculateTotal() {
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;
        const ratePerDay = <?php echo $car['price_per_day']; ?>;

        if (startDate && endDate) {
            const start = new Date(startDate);
            const end = new Date(endDate);
            const timeDiff = end - start;
            const daysBooked = timeDiff / (1000 * 60 * 60 * 24) + 1; // Include the end date

            if (daysBooked > 0) {
                const totalAmount = daysBooked * ratePerDay;
                document.getElementById('totalAmount').innerText = 'Total Amount: $' + totalAmount.toFixed(2);
            } else {
                alert('End date must be after start date.');
            }
        } else {
            alert('Please select both start and end dates.');
        }
    }
</script>

<style>
.car-details {
    padding: 50px 0;
}

.car-details .container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: flex-start;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.car-details .car-image {
    flex: 1;
    min-width: 300px;
    margin-right: 20px;
}

.car-details .car-image img {
    width: 100%;
    height: auto;
    border-radius: 10px;
}

.car-details .car-info {
    flex: 2;
    min-width: 300px;
}

.car-details .car-info h2 {
    font-size: 28px;
    margin-bottom: 20px;
    color: #2c3e50;
}

.car-details .car-info p {
    font-size: 16px;
    margin-bottom: 15px;
    color: #7f8c8d;
}

.car-details .car-info .price {
    font-size: 20px;
    color: #e74c3c;
    margin-bottom: 20px;
}

.car-details .car-info form {
    display: flex;
    flex-direction: column;
}

.car-details .car-info label {
    font-size: 14px;
    margin-bottom: 5px;
    color: #34495e;
}

.car-details .car-info input[type="date"] {
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.car-details .car-info .total-amount {
    margin: 10px 0;
    font-size: 18px;
    color: #2c3e50;
}

.car-details .car-info button {
    padding: 10px;
    margin: 5px 0;
    background-color: #3498db;
    border: none;
    border-radius: 5px;
    color: #ecf0f1;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.car-details .car-info button:hover {
    background-color: #2980b9;
}
</style>
