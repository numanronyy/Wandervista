<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WanderVista - Explore Bangladesh</title>

    <!-- Bootstrap CSS for responsiveness -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Open+Sans:wght@300;400&display=swap"
        rel="stylesheet">

    <style>
        /* Global Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Open Sans', sans-serif;
            background-color: #c7d8e8;
            color: #2098cc;
            overflow-x: hidden;
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

        /* Sidebar */
        .sidebar {
            height: 100%;
            width: 200px;
            position: fixed;
            top: 70px;
            left: -200px;
            background-color: #4A6C7C;
            color: white;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
            z-index: 998;
            transition: left 0.3s ease;
        }

        .sidebar.active {
            left: 0;
        }

        .sidebar a {
            text-decoration: none;
            color: white;
            padding: 15px;
            display: block;
            font-size: 1.2rem;
            border-bottom: 1px solid white;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #3E5D6A;
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

        /* Main content section */
        .main-content {
            margin-left: 0;
            padding-top: 80px;
            transition: margin-left 0.3s ease;
        }

        .main-content.shift {
            margin-left: 200px;
        }

        /* Hero Section */
        .hero {
            padding: 150px 20px;
            background-image: url('imgs/home 2.jpg');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            text-align: center;
        }


        .hero h1 {
            font-size: 3.5rem;
            font-family: 'Papyrus', fantasy;
            margin: auto;
        }

        .hero p {
            font-size: 1.5rem;
            color: #f1f1f1;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Search Bar */
        .search-bar {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .search-bar input {
            padding: 10px;
            width: 300px;
            border-radius: 25px;
            border: 2px solid #3E5D6A;
            font-size: 1.2rem;
            outline: none;
        }

        .search-bar button {
            padding: 10px 20px;
            margin-left: 10px;
            border-radius: 25px;
            background-color: #3E5D6A;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
            transition: background-color 0.3s;
        }

        .search-bar button:hover {
            background-color: #5A7F8D;
        }

        /* Carousel Section */
        .carousel-container {
            margin-left: 20px;
            width: calc(100% - 200px);
            margin-top: 50px;
        }

        .carousel-container.shift {
            margin-left: 200px;
        }

        .carousel-inner img {
            width: 50%;
            height: auto;
            object-fit: cover;
            margin: 0 auto;
        }

        .carousel-caption {
            position: absolute;
            bottom: 50%;
            transform: translateY(50%);
            text-align: center;
            color: white;
            font-size: 2.5rem;
            font-family: 'Roboto', sans-serif;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        /* About Section */
        .about {
            background-color: #f1f1f1;
            padding: 50px;
            text-align: center;
            font-size: 1.2rem;
        }

        .about h2 {
            font-size: 2.5rem;
            color: #4A6C7C;
            margin-bottom: 20px;
        }

        /* Footer */
        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #7fa8bb;
            color: white;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Toggle Button -->
    <button class="toggle-button" onclick="toggleSidebar()">☰ Menu</button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <a href="#"><br><br>Dhaka</a>
        <a href="#">Cox's Bazar</a>
        <a href="#">Sundarbans</a>
    </div>


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


    <!-- Main Content -->
    <div class="main-content" id="mainContent">

        <!-- Hero Section -->
        <div class="hero">
            <h1>Explore the Beauty of Bangladesh</h1>
            <p>Discover the hidden gems and vibrant cities of Bangladesh. Let WanderVista guide you through a journey of
                unforgettable experiences and breathtaking landscapes.</p>
            <div class="search-bar">
                <input type="text" placeholder="Search destinations..." />
                <button>Search</button>
            </div>
        </div>

        <!-- Carousel Section -->
        <div class="carousel-container">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                    <li data-target="#myCarousel" data-slide-to="4"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="imgs/dhaka.jpg" alt="Dhaka">
                        <div class="carousel-caption">
                            <h1>Dhaka - The City of Mosques</h1>
                        </div>
                    </div>
                    <div class="item">
                        <img src="imgs/cox's bazar.jpg" alt="Cox's Bazar">
                        <div class="carousel-caption">
                            <h1>Cox's Bazar - World's Longest Beach</h1>
                        </div>
                    </div>
                    <div class="item">
                        <img src="imgs/sundarbans.jpg" alt="Sundarbans">
                        <div class="carousel-caption">
                            <h1>Sundarbans - The Mangrove Forest</h1>
                        </div>
                    </div>
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <!-- About Section -->
        <div class="about">
            <h2>About WanderVista</h2>
            <p>WanderVista is a travel platform designed to help you discover the best travel destinations in
                Bangladesh. Whether you're exploring the bustling city of Dhaka, relaxing on the pristine beaches of
                Cox's Bazar, or marveling at the biodiversity of the Sundarbans, WanderVista offers curated experiences
                to make your journey unforgettable. We provide all the information you need to plan your next adventure
                with ease and confidence. Join us as we explore the beauty, culture, and wonders of Bangladesh!</p>
        </div>

    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 WanderVista. All rights reserved.</p>
    </footer>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById("sidebar");
            const mainContent = document.getElementById("mainContent");
            sidebar.classList.toggle("active");
            mainContent.classList.toggle("shift");
        }
    </script>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>

</html>