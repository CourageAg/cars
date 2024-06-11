<?php include 'includes/header.php'; ?>

<main>

<link rel="stylesheet" href="styles/contact.css">
    <section class="contact">
        <div class="container">
            <h2>Contact Us</h2>
            <p>Feel free to reach out to us for any inquiries or feedback.</p>
            <form class="contact-form" method="post" action="process_contact_form.php">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
                
                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                
                <label for="message">Your Message:</label>
                <textarea id="message" name="message" placeholder="Enter your message" required></textarea>
                
                <button type="submit">Send Message</button>
            </form>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
