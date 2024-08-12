<?php
include('connection.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Set session variables
            $_SESSION['user_logged_in'] = true;
            $_SESSION['user_first_name'] = $row['fname'];
            header("Location: index.php"); // Redirect to a welcome page or dashboard
            exit();
        } else {
            // Set error message and redirect
            $_SESSION['error_message'] = "Invalid password. Please try again.";
            header("Location: login.php");
            exit();
        }
    } else {
        // Set error message and redirect
        $_SESSION['error_message'] = "No user found with that email!";
        header("Location: login.php");
        exit();
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <style>
    body {
        background: url('img/library_img2.jpg') no-repeat center center fixed;
        background-size: cover;
        color: #fff;
        font-family: 'Arial', sans-serif;
    }

    .content-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        min-height: 100vh;
        padding: 20px;
    }

    .text-container {
        max-width: 450px;
        padding: 30px;
        background-color: rgba(255, 255, 255, 0.8);
        color: #333;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .text-container h2 {
        font-size: 32px;
        margin-bottom: 20px;
    }

    .text-container p {
        font-size: 18px;
        line-height: 1.6;
    }

    .form-container {
        background: rgba(255, 255, 255, 0.9);
        padding: 30px;
        border-radius: 10px;
        max-width: 400px;
        width: 100%;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .form-container h2 {
        color: #333;
        font-size: 28px;
        margin-bottom: 20px;
        text-align: center;
    }

    .form-container .form-control {
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        font-size: 16px;
    }

    .form-container .form-control:focus {
        border-color: #5cb85c;
        box-shadow: none;
    }

    .btn-success {
        background-color: #5cb85c;
        border: none;
        padding: 10px;
        font-size: 18px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-success:hover {
        background-color: #4cae4c;
    }

    .text-light {
        color: #5cb85c !important;
    }

    .error-message {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        border-radius: 0.25rem;
        padding: 1rem;
        margin-bottom: 1rem;
        text-align: center;
    }
    </style>
</head>

<body>

    <div class="container content-container">
        <div class="text-container" style="color: black">
            <h2>Welcome Back to the Library System</h2>
            <p>Log in to access your personalized library experience. Manage your borrowed items, explore new
                collections, and stay updated with our latest events and offers.</p>
        </div>
        <div class="form-container">
            <h2 class="text-center">Log In</h2>
            
            <?php
            // Display error message if it exists
            if (isset($_SESSION['error_message'])) {
                echo '<div class="error-message">' . htmlspecialchars($_SESSION['error_message']) . '</div>';
                // Clear the error message after displaying it
                unset($_SESSION['error_message']);
            }
            ?>

            <form method="post" action="">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input class="form-control" type="email" name="email" id="email" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input class="form-control" type="password" name="password" id="password" placeholder="Password"
                        required>
                </div>
                <button type="submit" class="btn btn-success w-100">Log In</button>
                <div class="text-center mt-3">
                    <a href="register.php" class="text-light">Don't have an account? Register</a>
                </div>
            </form>
        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
</body>

</html>
