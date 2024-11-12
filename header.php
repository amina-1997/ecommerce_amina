<?php
include('config/database.php');
$db = new Database();
include('config/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WATCH LOVER - E-commerce</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #1c1c1e;
            color: #e0e0e0;
            font-family: Arial, sans-serif;
            min-height: 100vh;  /* Ensure the body takes full height */
            display: flex;
            flex-direction: column;
        }
        .navbar-brand {
            font-weight: bold;
            color: #f5c518 !important;
        }
        .nav-link {
            color: #e0e0e0 !important;
        }
        .nav-link:hover {
            color: #f5c518 !important;
        }
        /* Ensure footer stays at the bottom */
        .content-wrapper {
            flex: 1;  /* This makes the content area take up remaining space */
        }
    </style>
</head>
<body>

<!-- Main Navbar -->
<div class="container-fluid p-0 fixed-top mb-5">
    <!-- First Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">WATCH LOVER</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="home.php">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="./display_all.php#product-section">PRODUCTS</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">CONTACT</a></li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <?php
                    if (!isset($_SESSION['username'])) {
                        echo "<li class='nav-item'><a class='nav-link' href='#'>WELCOME TO SHOPPING</a></li>";
                        echo "<li class='nav-item'><a class='nav-link' href='userarea/user_re.php'>Register</a></li>";
                        echo "<li class='nav-item'><a class='nav-link' href='userarea/userlogin.php'>Login</a></li>";
                    } else {
                        echo "<li class='nav-item'><a class='nav-link' href='userarea/profile.php'>Welcome, ".$_SESSION['username']."</a></li>";
                        echo "<li class='nav-item'><a class='nav-link' href='userarea/logout.php'>Logout</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Second Navbar for Dropdowns and Extra Features -->
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#extraNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="extraNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Brands Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#product-section" id="brandDropdown" role="button" data-bs-toggle="dropdown">
                            Brands
                        </a>
                        <ul class="dropdown-menu bg-dark" aria-labelledby="brandDropdown">
                            <?php getbrand(); ?>
                        </ul>
                    </li>

                    <!-- Categories Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#product-section" id="categoryDropdown" role="button" data-bs-toggle="dropdown">
                            Categories
                        </a>
                        <ul class="dropdown-menu bg-dark" aria-labelledby="categoryDropdown">
                            <?php getcatagory(); ?>
                        </ul>
                    </li>
                    <!-- Cart -->
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> Cart <sup><?php cart_item(); ?></sup></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">TOTAL: <?php total_price(); ?>/-</a>
                    </li>
                </ul>
                <!-- Search Form -->
                <form class="d-flex" action="search_product.php#product-section" method="get">
                    <input class="form-control me-2" type="search" placeholder="Search" name="search_data">
                    <button type="submit" class="btn btn-outline-light" name="search_data_product">Search</button>
                </form>
            </div>
        </div>
    </nav>
</div>
<br><br>
<br><br>
<br><br>
<div class="content-wrapper"> <!-- Content Wrapper for Main Content -->
