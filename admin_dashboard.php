<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "wandervista");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if user is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] != 1) {
    header("Location: login.php");
    exit();
}

// Fetch all users
$users = $mysqli->query("SELECT id, fullname, email FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; }
        .container { max-width: 800px; margin: 50px auto; padding: 20px; background: #fff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table th, table td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        .btn { padding: 8px 12px; text-decoration: none; color: #fff; border-radius: 5px; }
        .btn.edit { background: #ffc107; color: #000; }
        .btn.delete { background: #dc3545; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $users->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['fullname']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td>
                        <a href="update_profile.php?id=<?php echo $row['id']; ?>" class="btn edit">Edit</a>
                        <a href="process.php?delete=true&id=<?php echo $row['id']; ?>" class="btn delete" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
