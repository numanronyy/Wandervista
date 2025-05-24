<?php
session_start();
// Retrieve error message from the session
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
// Clear the error message from the session after displaying it
unset($_SESSION['error']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>

    <!-- Bootstrap CSS for responsiveness -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Open+Sans:wght@300;400&display=swap"
        rel="stylesheet">
    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
        /* Background container */
        .bg-image {
            position: relative;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .bg-image img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            filter: brightness(0.8) sepia(0.3) hue-rotate(70deg);
        }

        /* Form container styling */
        .form-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
            max-width: 500px;
            z-index: 1;
        }

        .form-control,
        button[type="submit"] {
            width: 100%;
            display: block;
        }

        .btn-primary {
            background-color: #b4abab;
            /* Dark green for the button */
            border-color: #848785;
            margin-top: 20px;
        }

        .btn-primary:hover {
            background-color: #565a57;
            /* Slightly darker green on hover */
            border-color: #434644;
        }

        .form-control:focus {
            border-color: #303331;
            /* Green border on focus */
            box-shadow: 0 0 0 0.25rem rgba(44, 110, 73, 0.25);
            /* Greenish glow */
        }

        a {
            color: rgb(62, 26, 207);
            /* Green links */
        }

        a:hover {
            color: rgb(62, 26, 207);
            /* Darker green on hover */
            text-decoration: underline;
        }


        /* Navbar */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #b2d5e5;
            padding: 15px 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 999;
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
            color: white;
            font-family: 'Papyrus', fantasy;
            padding: 5px 10px;
            border-radius: 5px;
            /* Optional: Keep or remove rounded corners */
        }


        .navbar-nav>.active>a,
        .navbar-nav>li>a {
            background-color: #e7f3f8;
            color: white;
            border-radius: 25px;
            padding: 10px 20px;
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s;
            margin-right: 15px;
        }

        .navbar-nav>.active>a:hover,
        .navbar-nav>li>a:hover {
            background-color: #3e6773;

        }

        .navbar-nav>li {
            margin-right: 10px;
        }

        /* Toggle Button */
        .toggle-button {
            position: fixed;
            top: 50px;
            left: 15px;
            background-color: #3E5D6A;
            color: white;
            border: none;
            padding: 15px 10px;
            font-size: 1.5rem;
            cursor: pointer;
            border-radius: 5px;
            z-index: 1000;
            transition: background-color 0.3s;
        }

        .toggle-button:hover {
            background-color: #5A7F8D;
        }

        body {
            background-color: #f4f4f4;
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarResponsive">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">WanderVista </a>
            </div>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav">
                    <li><a href="home.php">Home</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <!-- If the user is logged in -->
                        <li class="nav-item"><a class="nav-link" href="profile.php"> <?php echo $_SESSION['fullname']; ?>!</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <!-- If the user is not logged in -->
                        <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <?php endif; ?>
                    <li><a href="destinations.php">Destinations</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="bg-image">
        <img src="imgs/register.jpg" alt="Background">

        <div class="form-container">
            <!-- Error Message -->
            <?php if ($error): ?>
                <div class="alert alert-danger text-center">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>
            <!-- Registration form -->
            <h2 class="text-center mb-4">Register</h2>
            <form action="register_process.php" method="POST">
                <!--  Name  -->
                <div class="mb-3">
                    <label for="fullname" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter your name"
                        required>
                </div>

                <!-- Email i -->
                <div class="mb-3">
                    <label for="email" class="form-label"><br>Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email"
                        required>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label"><br>Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Create a password" required>
                </div>

                <!-- Confirm Password  -->
                <div class="mb-3">
                    <label for="confirm-password" class="form-label"><br>Confirm Password</label>
                    <input type="password" class="form-control" id="confirm-password" name="confirm_password"
                        placeholder="Confirm your password" required>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary w-100 mt-3">Register</button>

                <!--  login page -->
                <p class="text-center mt-3"><br>Already have an account? <a href="login.php">Login here</a></p>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS (optional, not required for CSS-only solution) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Registration form validation
        document.querySelector("form").addEventListener("submit", function(event) {
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirm-password").value;
            const email = document.getElementById("email").value;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(email)) {
                alert("Please enter a valid email address.");
                event.preventDefault();
                return;
            }

            if (password !== confirmPassword) {
                alert("Passwords do not match!");
                event.preventDefault();
                return;
            }

            if (password.length < 6) {
                alert("Password must be at least 6 characters long.");
                event.preventDefault();
                return;
            }
        });
    </script>
</body>

</html>