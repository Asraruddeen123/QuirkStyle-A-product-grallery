<?php
// Database connection
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Retrieve the category from the query parameter
$category = isset($_GET['category']) ? $_GET['category'] : '';

$category_name = '';
// Fetch related products based on the category
$products = [];

if ($category > 0) {
    // Fetch the category name
    $stmt = $conn->prepare("SELECT cat_name FROM category WHERE cat_id = ?");
    $stmt->bind_param("i", $category);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        $category_name = $row['cat_name'];
    }
    
    $stmt->close();

}



if ($category) {
    $stmt = $conn->prepare("SELECT title, price, image_path, description FROM products WHERE category_id = ?");
    $stmt->bind_param("i", $category);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - <?= htmlspecialchars($category_name) ?></title>
    <link rel="stylesheet" href="products.css">
</head>
<body>

    <h1>Products in Category: <?= htmlspecialchars(ucfirst($category_name)) ?></h1>
    <div class="products">
        <?php if (!empty($products)): ?>
            <ul>
                <?php foreach ($products as $product): ?>
                    <li>
                        <img src="<?= htmlspecialchars($product['image_path']) ?>" alt="<?= htmlspecialchars($product['title']) ?>">
                        <p><?= htmlspecialchars($product['title']) ?></p>
                        <p>$<?= htmlspecialchars($product['price']) ?></p>
                        <p><?= htmlspecialchars($product['description']) ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No products found in this category.</p>
        <?php endif; ?>
    </div>
  
  
</body>
</html>
