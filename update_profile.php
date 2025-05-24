<?php
session_start();

// Database connection
$mysqli = new mysqli("localhost", "root", "", "wandervista");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch user data from the database
$user_id = $_SESSION['user_id'];
$result = $mysqli->query("SELECT fullname, email FROM users WHERE id = '$user_id'");
$user = $result->fetch_assoc();
$user_name = $user['fullname'];
$user_email = $user['email'];

// Handle profile update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $new_name = $mysqli->real_escape_string($_POST['fullname']);
    $new_email = $mysqli->real_escape_string($_POST['email']);
    $mysqli->query("UPDATE users SET fullname='$new_name', email='$new_email' WHERE id='$user_id'");
    header("Location: profile.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .profile-container {
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }
        .profile-container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .form-group {
            margin: 15px 0;
        }
        input[type="text"], input[type="email"] {
            width: 90%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            display: inline-block;
            padding: 12px 20px;
            margin: 5px;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background 0.3s;
        }
        .btn:hover { background-color: #218838; }
    </style>
</head>
<body>
    <div class="profile-container">
        <h1>Update Your Profile</h1>
        <form method="POST" action="update_profile.php">
            <div class="form-group">
                <label for="fullname">Full Name:</label>
                <input type="text" id="fullname" name="fullname" value="<?php echo htmlspecialchars($user_name); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user_email); ?>" required>
            </div>
            <button type="submit" name="update" class="btn">Update Profile</button>
        </form>
    </div>
</body>
</html>
