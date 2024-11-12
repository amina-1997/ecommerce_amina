<?php
include('../config/database.php');
include('../config/common_function.php');
$db = new Database();
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- Custom CSS for Design -->
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }

        .login-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .form-label {
            font-weight: bold;
        }

        .login-btn {
            background-color: #0d6efd;
            color: #fff;
            border: none;
            padding: 10px 20px;
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
    </style>
</head>
<body>

<div class="container my-5">
    <div class="row justify-content-center">
        <h1 class="text-center bg-dark p-2 fixed-top" style="z-index: 1;">
            <a href="../home.php" class="text-warning" style="text-decoration:none;">Watch Lover</a>
        </h1>
        <div class="col-md-6">
            <div class="login-container">
                <h2 class="text-center mb-4">User Login</h2>

                <!-- Login Form -->
                <form action="" method="post">
                    <!-- Username -->
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" required autocomplete="off">
                    </div>

                    <!-- Password -->
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required autocomplete="off">
                    </div>

                    <!-- Login Button -->
                    <div class="d-grid">
                        <input type="submit" name="user_login" value="Login" class="login-btn py-2">
                    </div>

                    <!-- Register Link -->
                    <div class="register-link mt-3">
                        <p>Don't have an account? <a href="user_re.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<?php
if (isset($_POST['user_login'])) {
    $user_name = $_POST['username'];
    $user_password = $_POST['password'];
    $user_ip = getIPAddress();

    $pass_query = "SELECT * FROM user_table WHERE username='$user_name'";
    $res = $db->select($pass_query);

    if ($res && mysqli_num_rows($res) > 0) {
        $row_data = mysqli_fetch_assoc($res);
        if (password_verify($user_password, $row_data['password'])) {
            $_SESSION['username'] = $user_name;

            $query = "SELECT * FROM cart2 WHERE ip_address='$user_ip'";
            $select_cart = $db->select($query);

            if ($select_cart) {
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('profile.php', '_self')</script>";
            } else {
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('profile.php', '_self')</script>";
            }

        } else {
            echo "<script>alert('Invalid password')</script>";
        }
    } else {
        echo "<script>alert('Invalid username')</script>";
    }
}
?>
