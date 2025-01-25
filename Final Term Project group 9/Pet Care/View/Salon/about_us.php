<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Tans Yam Spotter</title>
    <style>
    /* Your existing CSS styles here */
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
        color: #333;
    }

    header {
        background-color: #2c3e50;
        color: #ecf0f1;
        text-align: center;
        padding: 20px;
    }

    section {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        color: #2c3e50;
    }

    p {
        line-height: 1.6;
    }

    address {
        font-style: normal;
    }

    footer {
        text-align: center;
        padding: 10px;
        background-color: #2c3e50;
        color: #ecf0f1;
        position: fixed;
        bottom: 0;
        width: 100%;
    }
    </style>
</head>

<body>
    <header>
        <h1>Welcome to Tans Yam Spotter</h1>
    </header>

    <section>
        <h2>About Us</h2>
        <p>
            Tans Yam Spotter is not just a restaurant; it's an experience. We are passionate about delivering delicious
            and authentic yam-based dishes to our customers. Our menu is carefully crafted to satisfy your taste buds
            and leave you craving for more.
        </p>

        <p>
            At Tans Yam Spotter, we believe in using fresh and high-quality ingredients to create mouthwatering dishes
            that showcase the rich flavors of yam. Whether you're a yam enthusiast or trying it for the first time, our
            diverse menu has something for everyone.
        </p>
    </section>

    <section>
        <h2>Our Mission</h2>
        <p>
            Our mission is to provide a delightful culinary experience by serving delectable yam dishes that reflect our
            commitment to quality, taste, and customer satisfaction. We strive to be a leading destination for yam
            lovers, offering a blend of tradition and innovation in every dish.
        </p>
    </section>

    <section>
        <h2>Contact Us</h2>
        <p>
            Have questions or want to reach out to us? Feel free to contact our team:
        </p>
        <address>
            Email: info@tansyamspotter.com<br>
            Phone: 017 9095-2728
        </address>

        <!-- "Go Back to index.php" button added here -->
        <button onclick="goToIndex()">Go Back to index.php</button>
    </section>

    <footer>
        &copy; 2023 Tans Yam Spotter. All rights reserved.
    </footer>

    <!-- JavaScript function for the "Go Back to index.php" button -->
    <script>
    function goToIndex() {
        window.location.href = 'index.php';
    }
    </script>
</body>

</html>