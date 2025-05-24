<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "wandervista");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch user data
$user_id = $_SESSION['user_id'];
$result = $mysqli->query("SELECT fullname, email FROM users WHERE id = '$user_id'");
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; }
        .profile-container { max-width: 400px; margin: 50px auto; padding: 20px; background: #fff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
        .btn { display: block; padding: 10px; margin: 10px 0; text-align: center; text-decoration: none; color: #fff; background: #007bff; border-radius: 5px; }
        .btn.logout { background: #dc3545; }
        .btn.edit { background: #ffc107; color: #000; }
    </style>
</head>
<body>
    <div class="profile-container">
        <h1>Welcome, <?php echo htmlspecialchars($user['fullname']); ?></h1>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <a href="update_profile.php" class="btn edit">Edit Profile</a>
        <a href="home.php" class="btn">Home</a>
        <a href="logout.php" class="btn logout">Logout</a>
    </div>
</body>
</html>
