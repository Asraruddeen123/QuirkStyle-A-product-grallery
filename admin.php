<?php
session_start();

// Redirect to login if user is not logged in
if (!isset($_SESSION['email']) || !isset($_SESSION['NAME'])) {
    header("Location: login.php");
    exit();
}

// Handle logout
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}

// Handle file upload and form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category'])) {
    include "config.php"; // Include database configuration

    // Directory to store uploaded images
    $target_dir = "uploads/";
    $image = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $image);

    // Validate uploaded file (optional)
    // You can add validation here if needed

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO products (category_id, image_path, title, description, price) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $category_id, $image, $title, $description, $price);

    // Set parameters and execute SQL
    $category_id = $_POST['category'];
    $title = $_POST['Title'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    if ($stmt->execute()) {
        echo "<script>alert('Product added successfully');window.location='admin.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <header>
<h1>QuirkStyle!</h1>

    <ul>
      <li><form method="POST" style="display:inline;">
                        <button type="logout" class="logout-btn" name="logout" id="logoutbtn">Logout</button>
                    </form>
                </li> <!-- Logout form -->       
    </ul>
 
    </header>
<h2>Admin Dashboard</h2>
    <div class="container">
        <div class="categories">
            <form id="" action="" method="POST" enctype="multipart/form-data">
                <select name="category" id="category" required>
                    <option value="">Choose categories</option>
                    <?php
                    // Fetch categories from database
                    include "config.php";
                    $sql = "SELECT * FROM category";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['cat_id'] . "'>" . $row['cat_name'] . "</option>";
                        }
                    }
                    // Close database connection
                    $conn->close();
                    ?>
                </select>
                <label for="image">Upload image:</label>
                <input type="file" name="image" id="image" required>

                <label for="Title">Title:</label>
                <textarea id="Title" name="Title" required></textarea>

                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>

                <label for="price">Price:</label>
                <input type="text" id="price" name="price" required>

                <br><input type="submit" value="Submit">
            </form>
        </div>
    </div>

 
    
</body>
</html>
