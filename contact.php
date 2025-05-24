<?php
session_start();

// Retrieve error message from the session
$success = isset($_SESSION['success']) ? $_SESSION['success'] : '';
// Clear the error message from the session after displaying it
unset($_SESSION['success']);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Travel Website</title>

    <!-- Bootstrap CSS for responsiveness -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Open+Sans:wght@300;400&display=swap"
        rel="stylesheet">
    <style>
        /* General styling for body */
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #F4F4F4;
            margin: 0;
            padding: 0;
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

        /* Header section */
        .header {
            text-align: center;
            background: url('imgs/contact us.jpg') no-repeat center center/cover;
            color: rgb(252, 247, 247);
            padding: 60px 20px;
        }

        .header h1 {
            font-size: 48px;
            margin: 0;
        }

        .header p {
            margin: 10px 0;
        }

        /* Main contact section */
        .contact-container {
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            background: linear-gradient(135deg, #333130, #304da3);
            padding: 40px 20px;
        }

        .contact-card {
            text-align: center;
            padding: 20px;
            max-width: 300px;
            background: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            border: 3px solid #464545;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .contact-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }

        .contact-card h3 {
            color: #ff5722;
            margin-bottom: 10px;
            font-size: 22px;
        }

        .contact-card p {
            color: #333;
            font-size: 16px;
        }

        .contact-card a {
            color: #ff5722;
            text-decoration: none;
            font-weight: bold;
        }

        /* Map section */
        .map-container {
            margin: 20px 0;
            text-align: center;
        }

        iframe {
            width: 90%;
            height: 400px;
            border: 0;
        }

        /* Footer section */
        .footer {
            background: #222;
            color: #ddd;
            padding: 20px 0;
            text-align: center;
        }

        .footer a {
            color: #ff5722;
            margin: 0 10px;
            text-decoration: none;
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
                        <li class="nav-item"><a class="nav-link" href="profile.php">My profile</a></li>
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

    <!-- Header Section -->
    <div class="header">
        <h1>CONTACT US</h1>
        <h2>Need an expert? Feel free to leave your contact information, and we’ll get in touch with you shortly.</h2>
    </div>

    <!-- Error Message -->
    <?php if ($success): ?>
        <div class="alert alert-success text-center">
            <?php echo htmlspecialchars($success); ?>
        </div>
    <?php endif; ?>

    <!-- Contact Form -->
    <div class="container" style="margin: 40px auto;">
        <form action="contact_process.php" method="POST" class="form-horizontal">
            <div class="form-group">
                <label for="name" class="control-label col-sm-2">Full Name:</label>
                <div class="col-sm-10">
                    <input type="text" name="name" id="name" class="form-control" required placeholder="Enter your full name">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="control-label col-sm-2">Email:</label>
                <div class="col-sm-10">
                    <input type="email" name="email" id="email" class="form-control" required placeholder="Enter your email">
                </div>
            </div>
            <div class="form-group">
                <label for="message" class="control-label col-sm-2">Message:</label>
                <div class="col-sm-10">
                    <textarea name="message" id="message" class="form-control" rows="5" required placeholder="Enter your message"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Contact Section -->
    <div class="contact-container">
        <div class="contact-card">
            <h3>VISIT US</h3>
            <p>Come and visit us at our office:</p>
            <p><strong>2 Elizabeth St, Dhaka,Bangladesh</strong></p>
        </div>
        <div class="contact-card">
            <h3>CALL US</h3>
            <p>We’re available at:</p>
            <p><strong>+8808926794</strong></p>
        </div>
        <div class="contact-card">
            <h3>EMAIL US</h3>
            <p>Contact us at:</p>
            <p><a href="mailto:noreply@noland.com">jakiajim230@gmail.com</a></p>
        </div>
    </div>

    <!-- Map Section -->
    <div class="map-container">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14604.26056319191!2d90.3754021!3d23.777176!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bf59e0d6b507%3A0x2f032b0f0fb7df57!2sDhaka%2C%20Bangladesh!5e0!3m2!1sen!2sbd!4v1695142015797!5m2!1sen!2sbd"
            allowfullscreen="" loading="lazy"></iframe>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <p>&copy; 2024 Travel Website | Follow us on:
            <a href="#">Facebook</a>
            <a href="#">Twitter</a>
            <a href="#">Instagram</a>
        </p>
    </div>
</body>

</html>