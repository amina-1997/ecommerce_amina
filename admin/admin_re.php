<?php

include('../config/database.php');
include('../config/common_function.php');
$db = new Database();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $useremail = $_POST['useremail'];
    $password = $_POST['password'];
    //-------------------HASH PASSWORD------------------//
    $con_password = $_POST['con_password'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    //------------------select query----------------//
    $sql_select = "select * from admin_table where admin_name='$username' or admin_email='$useremail'";
    $res = $db->select($sql_select);
    if ($res > 0) {
        echo "<script>alert('This username or email already exists')</script>";
    } elseif ($password != $con_password) {
        echo "<script>alert('Confirm password does not match')</script>";
    } else {
        //------------insert query--------------------------------//
        move_uploaded_file($image_tmp, "./admin-img/$image");
        $sql = "insert into admin_table(admin_name, admin_email, admin_password, admin_image)values
        ('$username','$useremail','$password','$image')";
        $result = $db->insert($sql);
        if ($result) {
            echo "<script>alert('Registered successfully')</script>";
            echo "<script>window.open('adminlogin.php')</script>";
        } else {
            echo "<script>alert('Process failed')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- Custom CSS for Design -->
    <style>
        body {
            background-color: #f7f9fc;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            padding: 50px 15px;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo-container a {
            font-size: 30px;
            font-weight: bold;
            color: #007bff;
            text-decoration: none;
        }

        .form-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width:50%;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-outline {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 8px;
            padding: 10px;
        }

        .submit-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            font-size: 16px;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
        }

        .register-link a {
            color: #dc3545;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .form-row img {
            max-width: 100%;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<!-- Logo Section -->
<div class="container">
    <div class="logo-container">
        <a href="../home.php">WATCH LOVER</a>
    </div>

    <!-- Registration Form -->
    <div class="form-container m-auto">
        <h2>Admin Registration</h2>

        <form action="" method="post" enctype="multipart/form-data w-50 m-auto">
            
            <!-- Admin Name -->
            <div class="form-outline">
                <label for="username" class="form-label">Admin Name</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Enter your name" required>
            </div>

            <!-- Admin Email -->
            <div class="form-outline">
                <label for="useremail" class="form-label">Admin Email</label>
                <input type="email" name="useremail" id="useremail" class="form-control" placeholder="Enter your email" required>
            </div>

            <!-- Admin Image -->
            <div class="form-outline">
                <label for="image" class="form-label">Admin Image</label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>

            <!-- Admin Password -->
            <div class="form-outline">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
            </div>

            <!-- Confirm Password -->
            <div class="form-outline">
                <label for="con_password" class="form-label">Confirm Password</label>
                <input type="password" name="con_password" id="con_password" class="form-control" placeholder="Confirm your password" required>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <input type="submit" name="submit" value="Register" class="submit-btn">
            </div>

            <!-- Login Link -->
            <div class="register-link">
                <p>Already have an account? <a href="adminlogin.php">Login Now</a></p>
            </div>
        </form>
    </div>
</div>

</body>
</html>
