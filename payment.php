
<?php
include('config/database.php');
include('config/common_function.php');
$db=new Database();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment</title>

        
<!-----------------bootstarp------------------>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style>
#pay{
    text-decoration:none;

}
</style>

</head>
<body>

<!-------------php access user id-------------->
<?php

$user_ip=getIPAddress();
$get_users="select * from user_table where user_ip='$user_ip'";
$result=$db->select($get_users);
if($result){
$run_query=mysqli_fetch_array($result);
$user_id=$run_query['user_id'];
}
?>
    <div class="container mt-5"><br>
        <h1 class="text-center"><b style="text-decoration:underline;">payment</b></h1><br>
        <div class="row d-flex justify-content-center align-items-center mx-5">
        <div class="col-md-6">
            <a href="https://paypal.com"><img src="image/download.png" 
            alt="" width="180px"></a>
            </div>
            <div class="col-md-6">
            <a href="userarea/order.php?user_id=<?php echo $user_id ?>" id="pay"
             class="text-danger"><h1>payment offline</h1></a>
            </div>
           
        </div>
    </div>
</body>
</html>