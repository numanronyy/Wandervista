<?php
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "wandervista");

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate input fields
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "All fields are required!";
        header("Location: login.php");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format!";
        header("Location: login.php");
        exit();
    }

    // Debug: Print the email to check if it's correct
    // echo "Email: " . $email; // Uncomment this for debugging

    // Check if the email exists in the database
    $stmt = $conn->prepare("SELECT id, fullname, password, is_admin FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $fullname, $hashed_password, $is_admin);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Set session variables
            $_SESSION['user_id'] = $id;
            $_SESSION['fullname'] = $fullname;
            $_SESSION['email'] = $email;
            $_SESSION['is_admin'] = $is_admin;

            // Redirect to admin dashboard if user is admin, otherwise to profile
            if ($is_admin == 1) {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: home.php");
            }
            exit();
        } else {
            $_SESSION['error'] = "Invalid password.";
        }
    } else {
        $_SESSION['error'] = "Email not registered.";
    }

    // Redirect back to login page with an error
    header("Location: login.php");
    exit();
}
