<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Us</title>
    <link rel="stylesheet" href="mailing.css">
</head>
<body>
<div class="container">
    <div class="left-side">
        <div class="subscription-form">
            <h2>Join Our Mailing List</h2>
            <form action="" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>

                <label for="contact">Contact:</label>
                <input type="tel" id="contact" name="contact" required><br>

                <button type="submit">Subscribe</button>
            </form>
        </div>
    </div>
    <div class="right-side">
        <h2>Why Subscribe to Our Mailing List?</h2>
        <p>Stay updated with the latest news, exclusive offers, and special discounts. By subscribing to our mailing list, you'll be the first to know about our new products and services.</p>
        <ul>
            <li>Exclusive Discounts: Get special discounts available only to our subscribers.</li>
            <li>Early Access: Be the first to know about new product launches and updates.</li>
            <li>Special Offers: Receive unique offers and promotions directly to your inbox.</li>
        </ul>
    </div>
</div>

<?php
// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    // Validate form data
    if (empty($name) || empty($email) || empty($contact)) {
        echo "<script>alert('All fields are required!');</script>";
        exit();
    }

    // Database connection
    $servername = "localhost"; // Adjust based on your server configuration
    $username = "root"; // Replace with your database username
    $password = ""; // Replace with your database password
    $dbname = "mydb"; // The database we created earlier

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO subscriptions (name, email, contact) VALUES (?, ?, ?)");
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("sss", $name, $email, $contact);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Thank you for subscribing!');</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>
</body>
</html>
