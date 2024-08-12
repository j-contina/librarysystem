<?php
include('connection.php');
$success_message = ''; // Define a variable to hold the success message
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (fname, lname, email, password) VALUES ('$firstname','$lastname', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        $success_message = "Registration successful!"; // Set the success message
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
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
            background: rgba(255, 255, 255, 0.9); /* More transparent and modern background */
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
        .success-message {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
            font-size: 16px;
            border: 1px solid #d6e9c6;
        }
    </style>
</head>
<body>

    <div class="container content-container">
        <div class="text-container">
            <h2>Welcome to Our Library System</h2>
            <p>Discover a world of knowledge and resources. Register now to access our extensive collection of books, journals, and digital content. Enjoy personalized recommendations, manage your borrowed items, and participate in community events. Our library is your gateway to learning and growth.</p>
        </div>
        <div class="form-container">
            <?php if ($success_message != ''): ?>
                <div class="success-message"><?php echo $success_message; ?></div>
            <?php endif; ?>
            <h2>Create Account</h2>
            <form method="post" action="">
                <div class="mb-3">
                    <label for="fname" class="form-label">First Name</label>
                    <input class="form-control" type="text" name="fname" id="fname" placeholder="First Name" required>
                </div>
                <div class="mb-3">
                    <label for="lname" class="form-label">Last Name</label>
                    <input class="form-control" type="text" name="lname" id="lname" placeholder="Last Name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input class="form-control" type="email" name="email" id="email" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Register</button>
                <div class="text-center mt-3">
                    <a href="login.php" class="text-light">Already have an account? Log In</a>
                </div>
            </form>
        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
</body>
</html>
