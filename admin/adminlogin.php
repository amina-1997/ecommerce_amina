<?php
include('../config/database.php');
include('../config/common_function.php');
$db = new Database();
//----------session start------------//
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- Custom CSS for Design -->
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Arial', sans-serif;
        }

        .login-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
            margin-top: 100px;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: bold;
        }

        .login-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            font-size: 16px;
        }

        .login-btn:hover {
            background-color: #0056b3;
        }

        .register-link {
            font-size: 14px;
            text-align: center;
        }

        .register-link a {
            color: #dc3545;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo-container a {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="logo-container">
        <a href="../home.php">Watch Lover</a>
    </div>
    <div class="login-container">
        <h2>Admin Login</h2>

        <!-- Login Form -->
        <form action="" method="post">
            <!-- Admin Email -->
            <div class="form-outline mb-4">
                <label for="email" class="form-label">Admin Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required">
            </div>

            <!-- Admin Password -->
            <div class="form-outline mb-4">
                <label for="password" class="form-label">Admin Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required">
            </div>

            <!-- Submit Button -->
            <div class="d-grid mb-4">
                <input type="submit" name="admin_login" value="Login" class="login-btn py-2">
            </div>

            <!-- Register Link -->
            <div class="register-link">
                <p>Don't have an account? <a href="admin_re.php">Register</a></p>
            </div>
        </form>
    </div>
</div>

</body>
</html>

<?php
if (isset($_POST["admin_login"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        $message = "Email & password must be fulfilled";

    } else {

        $sql = "SELECT * FROM admin_table WHERE admin_email='$email' AND admin_password ='$password'";

        $result = $db->select($sql);

        if ($result) {
            while ($rows = mysqli_fetch_assoc($result)) {
                session_start();
                $_SESSION['name'] = "naima";
                $_SESSION['id'] = $rows['admin_id'];
                $_SESSION['admin_name'] = $rows['admin_name'];

                echo "<script>alert('Login successfully')</script>";

                header("location: home.php");
                exit();
            }

        } else {
            echo "<script>alert('Email & password did not match')</script>";

        }
    }
}
?>
