<?php
session_start();

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Connect to the database
    $servername = "localhost"; // Change as needed
    $username = "root"; // Change as needed
    $password = ""; // Change as needed
    $dbname = "librarysystem"; // Change as needed

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        header("Location: index.php?contact_success=false#contactModal");
        exit();
    }

    // Get user ID if logged in
    $stud_id = isset($_SESSION['stud_id']) ? $_SESSION['stud_id'] : NULL;

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO contact_message (stud_id, name, email, message) VALUES (?, ?, ?, ?)");
    if ($stmt === false) {
        header("Location: index.php?contact_success=false#contactModal");
        exit();
    }

    $stmt->bind_param("isss", $stud_id, $name, $email, $message);

    // Execute
    if ($stmt->execute()) {
        header("Location: index.php?contact_success=true#contactModal");
    } else {
        header("Location: index.php?contact_success=false#contactModal");
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
