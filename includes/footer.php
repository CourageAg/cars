<footer class="footer">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

        .footer {
            background-color: #000;
            color: #fff;
            padding: 50px 0;
            font-family: 'Roboto', sans-serif;
        }

        .footer .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer .footer-section {
            flex: 1 1 300px;
            margin: 20px;
        }

        .footer .footer-section h2 {
            font-size: 24px;
            margin-bottom: 15px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .footer .footer-section p {
            margin-bottom: 15px;
            font-size: 16px;
            line-height: 1.8;
        }

        .footer .footer-section .contact span {
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
            line-height: 1.8;
        }

        .footer .footer-section .socials a {
            margin-right: 15px;
            color: #fff;
            font-size: 20px;
            transition: color 0.3s;
        }

        .footer .footer-section .socials a:hover {
            color: #FD746C;
        }

        .footer .footer-section ul {
            list-style: none;
            padding: 0;
        }

        .footer .footer-section ul li {
            margin-bottom: 10px;
        }

        .footer .footer-section ul a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s;
        }

        .footer .footer-section ul a:hover {
            color: #FD746C;
        }

        .footer .footer-section .contact-form input,
        .footer .footer-section .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .footer .footer-section .contact-form button {
            background: #FD746C;
            border: none;
            padding: 15px 20px;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .footer .footer-section .contact-form button:hover {
            background: #fff;
            color: #FD746C;
        }

        .footer .footer-bottom {
            text-align: center;
            padding: 20px;
            background: rgba(0, 0, 0, 0.9);
            margin-top: 20px;
            font-size: 14px;
        }
    </style>

    <div class="footer-content">
        <div class="footer-section about">
            <h2>Drey</h2>
            <p>
                Drey car rentals has got you.
            </p>
            <div class="contact">
                <span><i class="fas fa-phone"></i> &nbsp; +233 249327474</span>
                <span><i class="fas fa-envelope"></i> &nbsp; info@drey.com</span>
            </div>
            <div class="socials">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <div class="footer-section links">
            <h2>Quick Links</h2>
            <ul>
                <a href="#"><li>Home</li></a>
                <a href="#"><li>About</li></a>
                <a href="#"><li>Services</li></a>
                <a href="#"><li>Contact</li></a>
            </ul>
        </div>

        <div class="footer-section contact-form">
            <h2>Contact Us</h2>
            <form action="index.php" method="post">
                <input type="email" name="email" class="text-input contact-input" placeholder="Your email address..." required>
                <textarea name="message" class="text-input contact-input" placeholder="Your message..." required></textarea>
                <button type="submit" class="btn btn-big contact-btn">
                    <i class="fas fa-envelope"></i>
                    Send
                </button>
            </form>
        </div>
    </div>

    <div class="footer-bottom">
        &copy; Drey|Designed by Drey
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</footer>
