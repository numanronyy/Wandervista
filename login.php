<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "wandervista");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
unset($_SESSION['error']); // Clear the error message after displaying it

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    $result = $mysqli->query("SELECT id, fullname, password, is_admin FROM users WHERE email = '$email'");
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['is_admin'] = $user['is_admin'];

            if ($user['is_admin'] == 1) {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: home.php");
            }
            exit();
        } else {
            $_SESSION['error'] = "Incorrect password.";
        }
    } else {
        $_SESSION['error'] = "User not found.";
    }
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('imgs/log in.jpg');
            font-family: 'Open Sans', sans-serif;
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
            margin-top: 50px;
        }
        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="center-container">
        <div class="login-container">
            <h2 class="text-center">Login</h2>
            <?php if ($error): ?>
                <div class="alert alert-danger text-center"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
                <p class="text-center">Don't have an account? <a href="register.php">Register here</a></p>
            </form>
        </div>
    </div>
</body>
</html>
