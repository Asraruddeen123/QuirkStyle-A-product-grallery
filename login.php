<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="login1.css">
  <title>LOGIN</title>
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <?php
                include "config.php";
                session_start();

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Capture the form data
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                   

                    // SQL query to check credentials
                    $sql = "SELECT NAME FROM users WHERE email = ? AND password = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ss", $email, $password);
                    $stmt->execute();
                    $stmt->store_result();

                    if ($stmt->num_rows > 0) {
                        $stmt->bind_result($NAME);
                        $stmt->fetch();
                        // Set session variables
                        $_SESSION['email'] = $email;
                        $_SESSION['NAME'] = $NAME;
                        header('Location: admin.php');
                    } else {
                        echo "<p>Invalid email or password.</p>";
                    }

                    // Close the connection
                    $stmt->close();
                    $conn->close();
                }
                ?>
                <form action="" method="POST">
                    <h3>Login</h3>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email" required>
                        <label>Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" required>
                        <label>Password</label>
                    </div>
                    <div class="forget">
                        <label><input type="checkbox" name="remember"> Remember Me</label>
                        <label><a href="#">Forget Password</a></label>
                    </div>
                    <button type="submit">Log in</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
