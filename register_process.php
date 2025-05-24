<?php
session_start();
// Database connection
$conn = new mysqli("localhost", "root", "", "wandervista");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if the email is banned
    $stmt = $conn->prepare("SELECT id FROM banned_users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['error'] = "This email is banned and cannot register.";
        header("Location: register.php");
        exit();
    }

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "Error: Passwords do not match.";
        exit();
    }

    // Check if the email already exists in the database
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Error: Email already registered.";
        exit();
    }

    // Hash the password before storing it
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into the database
    $stmt = $conn->prepare("INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $fullname, $email, $password_hash);

    if ($stmt->execute()) {
        header("Location: login.php?success=1");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
