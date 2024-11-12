<?php
  include('../config/database.php');
  $db= new Database();
include('../config/common_function.php');

session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome <?php echo $_SESSION['username']?></title>

<!-----------------bootstarp------------------>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!----------------------FONT ICON----------------->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script class="jquery-3.7.1.min.js"></script>

<link rel="stylesheet" href="style.css" type="text/css">


<style>
    .nav-link{
      color:white;
    }
    .nav-item, .nav-link:hover{
      color:yellow;
    }
  .card-img-top {

    width:100%;
    height:150px;
    object-fit:contain;

  }
  body{
    overflow-x:hidden;
  }

  .profile_img{
    height:100%;
    width:90%;
    margin:auto;
    display:block;
    object-fit:contain;
    border-radius:50%;
    padding:5px;

  }
  .edit_img{
    width:100px;
    height:100px;
    object-fit:contain;

  }
</style>

</head>
<body>

<!-------------navbar(parent div)----------------->
<div class="container-fluid p-0">
        
<!-------------frist child----------------->
 <nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-warning" href="#">WATCH LOVER</a>

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
          <a class="nav-link" href="#">CONTACT</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i>
          <sup><?php cart_item(); ?></sup></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">TOTAL PRICE:<?php total_price();?>-/</a>
        </li>

        </ul>
        <form class="d-flex" action="../search_product.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" 
            name="search_data">
            <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
        </form>
        </div>
    </div>
    </nav>

    <!----------calling cart function------------->

    <?php
      cart();
    ?>
      
<!----------------second child--------------->
  
  
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
          <a class='nav-link' href='userarea/userlogin.php'>Login</a>
        </li>
        ";
}else{
    echo"
    <li class='nav-item'>
    <a class='nav-link' href='userarea/logout.php'>Logout</a>
  </li>
  ";

}


?>
  
    </ul>
</nav>

<div class="row">
    <div class="col-sm-2">
    <ul class="navbar-nav bg-secondary text-center mb-2" style="height:100%;">
    
        <?php
        $user_name=$_SESSION['username'];
        $user_image="select * from user_table where username='$user_name'";
        $user_res=$db->select($user_image);
        if($user_res){
            $row_image=mysqli_fetch_array($user_res);
            $user_image=$row_image['user_image'];
            ?>
        <li class="nav-item">
            <img src="user-img/<?php echo $user_image ;?>" class="profile_img my-2"alt="">
        </li>


    <?php
        }


        ?>
       

        <li class="nav-item">
            <a href="profile.php?edit_account" class="nav-link text-light">edit account</a>
        </li>

        <li class="nav-item">
            <a href="profile.php?panding_order" class="nav-link text-light">panding orders</a>
        </li>

        <li class="nav-item">
            <a href="profile.php?my_orders" class="nav-link text-light">my orders</a>
        </li>

        <li class="nav-item">
            <a href="profile.php?delete_account" class="nav-link text-light">delete account</a>
        </li>
        <li class="nav-item">
            <a href="../home.php.php" class="nav-link text-danger"><b>LOGOUT</b></a>
        </li><br>
        <br><br> <br>

       



    </ul>

    </div>
    <div class="col-sm-10 mt-5 text-center">
    <?php  
    user_order_details();
    if(isset($_GET['edit_account'])){
      include('edit_account.php');
    }

    if(isset($_GET['my_orders'])){
      include('user_order.php');
    }

    if(isset($_GET['delete_account'])){
      include('delete.php');
    }
    ?>
    </div>
</div>




<!----------------last child Include footer---------------->
<?php
  include('../footer.php');
?>



</body>
</html>