<?php
include("connection.php");
session_start();

$response = array('status' => 'error', 'message' => 'An error occurred.');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Get user ID if logged in
    $stud_id = isset($_SESSION['stud_id']) ? $_SESSION['stud_id'] : NULL;

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO contact_messages (stud_id, name, email, message) VALUES (?, ?, ?, ?)");
    
    if ($stmt === false) {
        $response['message'] = "Prepare failed: " . htmlspecialchars($conn->error);
        echo json_encode($response);
        exit();
    }

    // Handle NULL value for stud_id
    $stmt->bind_param("isss", $stud_id, $name, $email, $message);

    // Execute
    if ($stmt->execute()) {
        $response['status'] = 'success';
        $response['message'] = "Thank you, $name! Your message has been received.";
    } else {
        $response['message'] = "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}

echo json_encode($response);
?>
