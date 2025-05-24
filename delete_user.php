<?php
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "wandervista");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user ID is provided in the POST request
if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    // Fetch the user's email before deleting
    $sql = "SELECT email FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->fetch();
    $stmt->close();

    // Delete the user completely from the database
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        // Insert banned email into banned_users table
        $sql = "INSERT INTO banned_users (email) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $_SESSION['success'] = "User deleted and banned successfully.";
    } else {
        $_SESSION['error'] = "Failed to delete user.";
    }

    // Redirect back to the admin panel
    header("Location: admin.php");
    exit();
} else {
    // If no user_id is provided, redirect to the admin panel
    $_SESSION['error'] = "Invalid request.";
    header("Location: admin.php");
    exit();
}
?>
