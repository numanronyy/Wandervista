<?php
session_start();

// Database connection
$mysqli = new mysqli("localhost", "root", "", "wandervista");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_GET['delete'])) {
    $delete_id = isset($_GET['id']) ? intval($_GET['id']) : $user_id;

    // Check if the logged-in user is an admin or deleting their own account
    $result = $mysqli->query("SELECT is_admin FROM users WHERE id = '$user_id'");
    $user = $result->fetch_assoc();

    if ($delete_id == $user_id || $user['is_admin'] == 1) {
        $mysqli->query("DELETE FROM users WHERE id = '$delete_id'");
        
        if ($delete_id == $user_id) {
            session_destroy();
            header("Location: login.php");
        } else {
            header("Location: admin_dashboard.php");
        }
        exit();
    } else {
        die("Unauthorized action.");
    }
}
?>
