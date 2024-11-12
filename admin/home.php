<?php
include('../config/database.php');
$db = new Database();
include('../config/common_function.php');

session_start();

if (!isset($_SESSION['admin_name'])) {
    header("Location: adminlogin.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../style.css" class="css">
    <style>
        .img {
            width: 70px;
            height: 70px;
        }
        
        body {
            overflow-x: hidden;
        }

        .footer {
            background-color: #17a2b8;
            color: white;
        }

        .nav-link {
            text-decoration: none;
            color: white;
        }

        .nav-link:hover {
            color: #ffc107; /* Change color on hover */
        }

        .dropdown-menu {
            right: 0;
            left: auto;
        }
        .p01{
            background-color: #17a2b8;

        }
    </style>
</head>
<body>
    <div class="container-fluid">

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-dark text-light p-0 fixed-top">
            <div class="container-fluid">
            <img src="../image/w1.jpg" alt="Logo" class="round rounded-circle" style="height: 50px;">
                <h3>Admin pannel</h3>
                
                <div class="navbar navbar-expand-lg">
                    <ul class="navbar-nav ms-auto">
                        <!-- Profile Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <!-- Profile Image -->
                                <img src="admin-img/<?php
                                    $admin_name = $_SESSION['admin_name'];
                                    $admin_image = "SELECT * FROM admin_table WHERE admin_name='$admin_name'";
                                    $admin_res = $db->select($admin_image);
                                    if ($admin_res) {
                                        while ($row_image = mysqli_fetch_assoc($admin_res)) {
                                            $image = $row_image['admin_image'];
                                            echo $image;
                                        }
                                    }
                                ?>" alt="Profile Image" class="rounded-circle" style="width: 40px; height: 40px;">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="home.php?editaccount">Edit Profile</a></li>
                                <li><a class="dropdown-item" href="home.php?changepassword">Change Password</a></li>
                                <li><a class="dropdown-item" href="home.php?deleteaccount">Delete Account</a></li>
                                <li><a class="dropdown-item text-danger" href="admin_logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <br><br><br>
        <!-- Manage Details Header -->
        <div class="p01 text-center p-2">
            <h3>Manage Details</h3>
        </div>

        <div class="row mb-3">
            <div class="col-sm-3 text-center">
                <!-- Buttons for Actions -->
                <div class="d-grid gap-2">
                    <button class="btn btn-info"><a href="insert_product.php" class="nav-link">Insert Product</a></button>
                    <button class="btn btn-info"><a href="home.php?view-products" class="nav-link">View Products</a></button>
                    <button class="btn btn-info"><a href="home.php?insert_catagori" class="nav-link">Insert Category</a></button>
                    <button class="btn btn-info"><a href="home.php?view_catagory" class="nav-link">View Categories</a></button>
                    <button class="btn btn-info"><a href="home.php?insert_brand" class="nav-link">Insert Brand</a></button>
                    <button class="btn btn-info"><a href="home.php?view_brand" class="nav-link">View Brands</a></button>
                    <button class="btn btn-info"><a href="home.php?order_list" class="nav-link">All Orders</a></button>
                    <button class="btn btn-info"><a href="home.php?all_payment" class="nav-link">All Payments</a></button>
                    <button class="btn btn-info"><a href="home.php?user_list" class="nav-link">User List</a></button>
                    <button class="btn btn-danger"><a href="admin_logout.php" class='nav-link'>Logout</a></button>
                </div>
            </div>

        <!-- Dynamic Content Loading -->
        <div class="col-sm-9 text-center">
            <?php
          
            if (isset($_GET['insert_catagori'])) {
                include('insert_catagori.php');
            }
         
            if (isset($_GET['insert_brand'])) {
                include('insert_brand.php');
            }
            if (isset($_GET['view-products'])) {
                include('viewproduct.php');
            }
            if (isset($_GET['edit_products'])) {
                include('edit_product.php');
            }
            if (isset($_GET['delete_products'])) {
                include('delete_product.php');
            }
            if (isset($_GET['view_catagory'])) {
                include('view_catagory.php');
            }
            if (isset($_GET['view_brand'])) {
                include('view_brand.php');
            }
            if (isset($_GET['edit_catagory'])) {
                include('edit_catagory.php');
            }
            if (isset($_GET['delete_brand'])) {
                include('delete_brand.php');
            }
            if (isset($_GET['delete_catagory'])) {
                include('delete_catagory.php');
            }
            if (isset($_GET['order_list'])) {
                include('order_list.php');
            }
            if (isset($_GET['delete_order'])) {
                include('delete_order.php');
            }
            if (isset($_GET['all_payment'])) {
                include('all_payment.php');
            }
            if (isset($_GET['delete_payment'])) {
                include('delete_payment.php');
            }
            if (isset($_GET['user_list'])) {
                include('user_list.php');
            }
            if (isset($_GET['delete_user'])) {
                include('delete_user.php');
            }
            if (isset($_GET['editaccount'])) {
                include('admin_edit.php');
            }
            if (isset($_GET['deleteaccount'])) {
                include('delete_admin.php');
            }
            if (isset($_GET['changepassword'])) {
                include('change_adpass.php');
            }
            ?>
        </div>
        </div>

        <!-- Footer -->
        <div class="footer p-3 text-center">
            <p>Copyright &copy; threebrothers.com 2024</p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
