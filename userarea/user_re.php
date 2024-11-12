<?php

include('../config/database.php');
include('../config/common_function.php');
$db=new Database();

if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $useremail=$_POST['useremail'];
    $password=$_POST['password'];
    //-------------------HASH PASSWORD------------------//
    $hash_password=password_hash($password,PASSWORD_DEFAULT);
    $con_password=$_POST['con_password'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $image=$_FILES['image']['name'];
    $image_tmp=$_FILES['image']['tmp_name'];
    $ip_address=getIPAddress();
//------------------select query----------------//

$sql_select="select * from user_table where username='$username' or user_email='$useremail'";
$res=$db->select($sql_select);
if($res>'0'){
    
    echo"<script>alert('this username or email all ready exist')</script>";

    }elseif($password!=$con_password){
    echo"<script>alert('confirm password do not match')</script>";


}else{
    //------------insert query--------------------------------//
    move_uploaded_file($image_tmp,"./user-img/$image");
    $sql="insert into user_table(username, user_email, password, user_image, user_ip, user_address, 
    user_phone)values('$username','$useremail','$hash_password','$image','$ip_address','$address','$phone')";

    $result=$db->insert($sql);
    if($result){
      echo"<script>alert('registered successfully')</script>";
      echo"<script>window.open('checkout.php')</script>";

    }else{
       echo"<script>alert('prossess failed')</script>";

    }
}

$cart_query="select * from cart2 where ip_address='$ip_address'";
$cart_result=$db->select($cart_query);
if($cart_query>0){
  $_SESSION['username']=$username;
    echo"<script>window.open('checkout.php','_self')</script>";

}else{
  echo"<script>window.open('../home.php','_self')</script>";

}
}





?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user registration</title>
    
<!-----------------bootstarp------------------>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
 rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
 crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</head>
<body style="background:#bdc3c7;">

<!-------------navbar(parent div)----------------->
<div class="container-fluid p-0">
    <h1 class="text-center bg-dark text-warning"> <a class="navbar-brand" href="../product_details.php">WATCH LOVER</a></h1>
    <div class="row">
    <div class="col-sm-8 m-auto">

    <form action="" method="post" enctype="multipart/form-data" class="bg-light p-5 my-3">
    <h3 class="text-center"> <a class="navbar-brand" href="../product_details.php">User Registration</a></h3>

    <!----------username--------------->
            <div class="form-outline mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" 
                placeholder="enter your name" autocomplete="off" required="required">
            </div>

            
    <!----------user email--------------->
            <div class="form-outline mb-3">
                <label for="useremail" class="form-label">User Email</label>
                <input type="text" name="useremail" id="useremail" class="form-control" 
                placeholder="enter your email" autocomplete="off" required="required">
            </div>

    <!----------user image--------------->
            <div class="form-outline mb-3">
                <label for="image" class="form-label">User image</label>
                <input type="file" name="image" id="image" class="form-control" 
                 autocomplete="off">
            </div>

     <!----------user password--------------->
            <div class="form-outline mb-3">
                <label for="password" class="form-label">User password</label>
                <input type="password" name="password" id="password" class="form-control" 
                 autocomplete="off"  placeholder="enter your password" required="required">
            </div>

 <!----------confirm user password--------------->
             <div class="form-outline mb-3">
                <label for="con_password" class="form-label">User confirm password</label>
                <input type="password" name="con_password" id="con_password" class="form-control" 
                 autocomplete="off"  placeholder="enter your confirm password" required="required">
            </div>

             <!----------user address--------------->
             <div class="form-outline mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control" 
                 autocomplete="off"  placeholder="enter your address" required="required">
            </div> 
            
            <!----------user phone--------------->
             <div class="form-outline mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="phone" name="phone" id="phone" class="form-control" 
                 autocomplete="off"  placeholder="enter your phone" required="required">
            </div>
                <div class="d-grib">
                <input type="submit" name="submit" value="ragister" class="login-btn btn btn-info py-2">

                </div>
            <div>
            <p class="small fw-bold mt-2 pt-1">Allready have an account ? <a href="userlogin.php"
             class="text-danger"> LOGIN NOW</a></p>
            </div>

    </form>
    </div>
    </div>

    <?php
    include('../footer.php');
    ?>
</div>
</body>
</html>