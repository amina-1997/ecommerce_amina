<?php

//-------------session start---------------//
@session_start();

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>
</head>
<body>


<!-----------------bootstarp------------------>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!----------------------FONT ICON----------------->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script class="jquery-3.7.1.min.js"></script>

 <link rel="stylesheet" href="style.css" type="text/css">


<style>
    
  .card-img-top {

    width:100%;
    height:150px;
    object-fit:contain;

  }

  .nav-link{
    color:white;
  }
</style>

</head>
<body>


<div class="container-fluid p-0">
        
<!-------------frist child----------------->
 <nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="#">WATCH LOVER</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="../home.php">HOME</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">PRODUCTS</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="user_re.php">RAGISTR</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">CONTACT</a>
        </li>


        </ul>
        <form class="d-flex" action="search_product.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" 
            name="search_data">
            <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
        </form>
        </div>
    </div>
    </nav>

  
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary text-light ">
      <ul class="navbar-nav me-auto">
                    
    <?php
if(!isset($_SESSION['username'])){

  echo" <li class='nav-item'>
          <a class='nav-link' href='#'>WELCOME TO SHOPPING</a>
        </li>";
}else{
  echo"
    <li class='nav-item'>
          <a class='nav-link' href='#'>welcome ".$_SESSION['username']."</a>
        </li>
        ";
}
if(!isset($_SESSION['username'])){

    echo"
    <li class='nav-item'>
          <a class='nav-link' href='userlogin.php'>Login</a>
        </li>
        ";
}else{
    echo"
    <li class='nav-item'>
    <a class='nav-link' href='logout.php'>Logout</a>
  </li>
  ";

}


?>
  
    </ul>
</nav>


<div class="bg-light">
    <h3 class="text-center">watch lover</h3>
    
</div>



<div class="row px-1">
    <div class="col-md-12">
        <div class="row">
        <?php

      if(!isset($_SESSION['username'])){
            include('userlogin.php');
        }else{
          
            ?>


<?php
include('../config/database.php');
include('../config/common_function.php');
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
            <a href="https://paypal.com"><img src="../image/download.png" 
            alt="" width="180px"></a>
            </div>
            <div class="col-md-6">
            <a href="order.php?user_id=<?php echo $user_id ?>" id="pay"
             class="text-danger"><h1>payment offline</h1></a>
            </div>
           
        </div>
    </div>
</body>
</html>

            <?php

        }
        ?>



    </div>
    </div>
    </div>
 






</body>
</html>