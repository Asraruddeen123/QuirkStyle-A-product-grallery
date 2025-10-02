<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us - QuirkStyle</title>
  <link rel="stylesheet" href="contact.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
  <div class="container">
    <div class="left-side">
      <h2>Why Send Us Your Feedback?</h2>
      <p>Your feedback helps us improve and provide you with better products and services. Here are some benefits:</p>
      <ul>
        <li>Receive personalized responses to your inquiries.</li>
        <li>Contribute to the enhancement of our offerings.</li>
        <li>Be part of our community and share your valuable opinions.</li>
        <li>Help us understand your needs and preferences better.</li>
      </ul>
      
    </div>
    <div class="right-side contact-form">
      <h1>Share Your Feedback Here:</h1>
      <form action="" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="namef" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="emailf" required>

        <label for="message">Message:</label>
        <textarea id="message" name="messagef" required></textarea>

        <button type="submit">Send Message</button>
      </form>
    </div>
  </div>

  <?php
  // Enable error reporting
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Get form data
      $namef = $_POST['namef'];
      $emailf = $_POST['emailf'];
      $messagef = $_POST['messagef'];

      // Validate form data
      if (empty($namef) || empty($emailf) || empty($messagef)) {
        echo "<script>Swal.fire('Error', 'All fields are required!', 'error');</script>";
          exit();
      }

      // Database connection
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "mydb";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // Prepare and bind
      $stmt = $conn->prepare("INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)");
      if ($stmt === false) {
          die("Error preparing statement: " . $conn->error);
      }

      $stmt->bind_param("sss", $namef, $emailf, $messagef);

      // Execute the statement
      if ($stmt->execute()) {
        echo "<script>alert('Thank you for your feedback!');</script>";
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
