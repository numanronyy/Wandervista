<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Website - About Us</title>

    <!-- Bootstrap CSS for responsiveness -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Open+Sans:wght@300;400&display=swap"
        rel="stylesheet">
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

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

        header {
            text-align: center;
            padding: 20px;
            background-color: #cad4df;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            font-size: 2.5em;
            color: white
        }

        .about-section {
            text-align: center;
            padding: 30px;
            background-color: #ffffff;
        }

        .about-section h2 {
            font-size: 1.2em;
            max-width: 700px;
            margin: 0 auto;
            color: #8e8484;
        }

        .about-section p {
            font-size: 1.1em;
            max-width: 700px;
            margin: 0 auto;
            color: #555;
        }

        .image-section {
            margin-top: 20px;
            background-image: url('imgs/about us.jpg');
            background-size: cover;
            background-position: center;
            height: 300px;
            border-radius: 10px;
            position: relative;
        }

        .image-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100px;
            height: 100px;
            background-color: rgba(128, 128, 255, 0.8);
            border-radius: 50%;
        }

        .values-section {
            text-align: center;
            padding: 40px 20px;
            background-color: #f9f9f9;
        }

        .values-section h2 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        .values-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .value-item {
            flex: 1;
            max-width: 200px;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .value-item img {
            width: 50px;
            height: 50px;
            margin-bottom: 10px;
        }

        .value-item h3 {
            font-size: 1.2em;
            color: #3b3b3b;
            margin-bottom: 10px;
        }

        .value-item p {
            font-size: 0.9em;
            color: #a6a5a5;
        }

        footer {
            background-color: #2d2d2d;
            color: white;
            text-align: center;
            padding: 20px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        footer p {
            font-size: 1em;
        }

        footer a {
            color: #f4f4f9;
            text-decoration: none;
            margin-left: 10px;
        }

        footer a:hover {
            text-decoration: underline;
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
                <a class="navbar-brand" href="home.php">WanderVista</a>
            </div>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav">
                    <li><a href="home.php">Home</a></li>

                    <?php if (isset($_SESSION['user_id'])): ?>
                        <!-- If the user is logged in -->
                        <li class="nav-item"><a class="nav-link" href="profile.php">My Profile</a></li>
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


    <header>
        <h1>About Us</h1>
        <h2>Welcome to Our Travel Website</h2>
    </header>

    <section class="about-section">
        <h3>
            Discover breathtaking destinations, unique experiences, and personalized journeys tailored just for you.
            Our mission is to make your travel dreams a reality while embracing environmental sustainability, balance,
            and impact.
        </h3>
        <div class="image-section">
        </div>
    </section>

    <section class="values-section">
        <h2>Our Values</h2>
        <div class="values-container">
            <div class="value-item">
                <img src="imgs/sustainability.jpg" alt="Sustainability">
                <h3>Sustainability</h3>
                <p>We prioritize eco-friendly travel to protect the environment.</p>
            </div>
            <div class="value-item">
                <img src="imgs/security.jpg" alt="Security">
                <h3>Security</h3>
                <p>Your safety and privacy are our top priorities.</p>
            </div>
            <div class="value-item">
                <img src="imgs/Balance.jpg" alt="Balance">
                <h3>Balance</h3>
                <p>We offer a mix of relaxation and adventure in our itineraries.</p>
            </div>
            <div class="value-item">
                <img src="imgs/impact.jpg" alt="Impact">
                <h3>Impact</h3>
                <p>We create positive impacts on local communities.</p>
            </div>
        </div>
    </section>
    <footer>
        <p>&copy; 2024 Travel Website. All rights reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of
                Service</a></p>
    </footer>
</body>

</html>