<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Bangladesh - Destinations</title>

    <!-- Bootstrap CSS for responsiveness -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Open+Sans:wght@300;400&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #F4F4F4;
            margin: 0;
            padding: 0;
        }

        /* Header */
        .header {
            text-align: center;
            padding: 50px 0;
            background-color: #6A9AB0;
            color: white;
        }

        .header h1 {
            font-size: 3.5rem;
            font-family: 'Papyrus', fantasy;
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

        /* Search Bar */
        .search-bar {
            display: flex;
            justify-content: center;
            padding: 15px;
            background-color: #6A9AB0;
        }

        .search-bar input {
            padding: 10px;
            width: 300px;
            border-radius: 25px;
            border: 2px solid #fff;
            font-size: 1.2rem;
        }

        .search-bar button {
            padding: 10px 20px;
            margin-left: 10px;
            border-radius: 25px;
            background-color: #3A6D8C;
            color: white;
            border: none;
            cursor: pointer;
        }

        /* Destinations Section */
        .destinations-section {
            padding: 30px;
            background-color: white;
        }

        .destinations-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .destination-item {
            flex: 1 1 300px;
            max-width: 320px;
            text-align: center;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .destination-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .destination-item h3 {
            font-size: 1.5rem;
            color: #001F3F;
            padding: 10px;
            background-color: #6A9AB0;
            margin: 0;
        }

        .destination-description {
            padding: 10px;
            font-size: 1.2rem;
            color: #333;
        }

        /* Footer */
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #6A9AB0;
            color: white;
            padding: 5px;
            text-align: center;
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

    <!-- Header -->
    <div class="header">
        <h1>Popular Destinations in Bangladesh</h1>
    </div>

    <!-- Search Bar -->
    <div class="search-bar">
        <input type="text" placeholder="Search destinations..." />
        <button>Search</button>
    </div>

    <!-- Destinations Section -->
    <div class="destinations-section">
        <h2 class="text-center">Explore These Beautiful Destinations</h2>
        <div class="destinations-container">
            <!-- Destination Item 1 -->
            <div class="destination-item">
                <img src="https://upload.wikimedia.org/wikipedia/commons/2/2b/Curzon_Hall.jpg" alt="Dhaka">
                <h3>Dhaka</h3>
                <div class="destination-description">The vibrant capital city of Bangladesh, full of culture and
                    history.</div>
            </div>
            <!-- Destination Item 2 -->
            <div class="destination-item">
                <img src="imgs/Cox's.jpg " alt="Cox's Bazar">
                <h3>Cox's Bazar</h3>
                <div class="destination-description">Home to the world's longest natural sea beach, perfect for
                    relaxation.</div>
            </div>
            <!-- Destination Item 3 -->
            <div class="destination-item">
                <img src="imgs/Sundarban.jpg" alt="Sundarbans">
                <h3>Sundarbans</h3>
                <div class="destination-description">A UNESCO World Heritage site, famous for its tiger population and
                    unique mangrove forests.</div>
            </div>
            <!-- Destination Item 4 -->
            <div class="destination-item">
                <img src="imgs/srimangal.jpg" alt="Srimangal">
                <h3>Srimangal</h3>
                <div class="destination-description">Known as the 'Tea Capital of Bangladesh', it's a peaceful retreat
                    surrounded by lush greenery.</div>
            </div>
            <!-- Destination Item 5 -->
            <div class="destination-item">
                <img src="imgs/Ratargul Swamp Forest.jpg " alt="Ratargul swamp forest">
                <h3>Ratargul swamp forest</h3>
                <div class="destination-description">A stunning freshwater swamp forest, ideal for boating and exploring
                    nature.</div>
            </div>
            <!-- Destination Item 6 -->
            <div class="destination-item">
                <img src="imgs/Shajek.png" alt="Shajek">
                <h3>Shajek</h3>
                <div class="destination-description">A hidden gem with tranquil hills and cool weather, ideal for
                    hiking.</div>
            </div>

            <!-- Destination Item 7 -->
            <div class="destination-item">
                <img src="imgs/Bandarban.jpg" alt="Bandarban">
                <h3>Bandarban</h3>
                <div class="destination-description">Known for its breathtaking hills and remote hill-tribes.</div>
            </div>
            <!-- Add more destinations as needed -->
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Explore Bangladesh. All rights reserved.</p>
    </footer>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>