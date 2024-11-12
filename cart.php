<?php
  include('config/database.php');
  $db= new Database();
include('config/common_function.php');
session_start();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECOMMERCE-cart-details</title>

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

  .cart-img{
    width:80px;
    height:80px;
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
    <a class="navbar-brand text-light" href="#">WATCH LOVER</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="home.php">HOME</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="./display_all.php">PRODUCTS</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">RAGISTR</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">CONTACT</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i>
          <sup class="text-danger"></sup></a>
        </li>

        </ul>
       
        </div>
    </div>
    </nav>

    <!----------calling cart function------------->

    <?php
      
    ?>

<!----------------second child--------------->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary ">
    <ul class="navbar-nav me-auto">
                       
<?php
if(!isset($_SESSION['username'])){

  echo" <li class='nav-item'>
          <a class='nav-link' href='#'>WELCOME TO SHOPPING</a>
        </li>";
}else{
  echo"
    <li class='nav-item'>
          <a class='nav-link' href='userarea/profile.php'>welcome ".$_SESSION['username']."</a>
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

<!----------------third child--------------->
<div class="bg-light text-center">
    <h3>product store</h3>
    <div class="text-center">
    </div>
</div>

<!----------------fourth child table--------------->

<div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table table-bordered text-center">
           
            <tbody>

                         <?php

                            $ip = getIPAddress(); 
                            $db=new Database();
                            $total_price=0;
                            $cart_query="select * from cart2 where ip_address='$ip'";
                            $result=$db->select($cart_query);
                            if($result){
                              ?>

                              <thead>
                              <tr>
                                  <th>Product title</th>
                                  <th>Product Image</th>
                                  <th>Quantity</th>
                                  <th>Total Price</th>
                                  <th>Remove</th>
                                  <th colspan="2">Operations</th>
                              </tr>
                          </thead>
                          <?php

                            while($row=mysqli_fetch_array($result)){
                              $product_id=$row['product_id'];

                            $product_query="select * from product where product_id='$product_id'";
                            $resultp=$db->select($product_query);
                            if($resultp){
                            while($price_row=mysqli_fetch_array($resultp)){
                              $product_price=array($price_row['price']);
                              $table_price=$price_row['price'];
                              $product_title=$price_row['title'];
                              $product_image_1=$price_row['image_1'];
                              $product_value=array_sum($product_price);
                              $total_price+=$product_value;
                            
                         ?>


                <tr>
                    <td><?php echo $product_title?></td>
                    <td><img src="admin/upload/<?php echo $product_image_1?>" alt="" class="cart-img"></td>
                    <td><input type="text" name="qty" class="form-input w-50"></td>

<!--------------------quantity add--------------------->
          <?php 
           $ip = getIPAddress(); 
           if(isset($_POST['update_cart'])){
            $productqty=$_POST['qty'];
            $update_cart="update cart2 set quantity= $productqty where ip_address='$ip' ";
            $cart_update=$db->update($update_cart);
            if($cart_update){
            $total_price=$total_price*$productqty;


           }
          
          }

          ?>

                  <td><?php echo $table_price ?>/-</td>
                  <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id; ?>"></td>
                  <td>
                  <input type="submit" value="update cart" class="bg-info px-3 py-1 border-0 mx-3" name="update_cart">
                  </td>
                  <td>
                  <input type="submit" value="remove cart" class="bg-info px-3 py-1 border-0 mx-3" name="remove_cart">
                  </td>
              </tr>

              <?php
                  }      
                }}
                    }else{
                      echo"<h2 class='text-center text-danger'>cart is empty</h2>";
                    }
                         
                  
                 ?>
              </tbody>

</table>
<div class="d-flex mb-3">
  
<?php

$ip = getIPAddress(); 
$db=new Database();
$cart_query="select * from cart2 where ip_address='$ip'";
$result=$db->select($cart_query);
if($result>'0'){

  ?>
    <h4 class="px-3">Subtotal:<strong class="text-info"><?php echo $total_price?>/-</strong></h4>
    <a href="home.php" class="btn btn-info px-3 py-2 border-0 mx-3">Continue Shopping</a>
   <button class="bg-secondary px-3 py-2 border-0 text-light">
     <a href="userarea/checkout.php" class="text-light 
   text-decoration-none">Checkout</a></button>
    <?php }else{
    echo"<a href='home.php' class='btn btn-info px-3 py-2 border-0 mx-3'>Continue Shopping</a>
      ";
    }
    ?>
    
    </div>
    </div>
</div>

</form>


<!----------------function remove item---------------->
<?php

function remove_item(){
  $db=new Database();

  if(isset($_POST['remove_cart'])){
    foreach($_POST['removeitem'] as $remove_id){
    echo $remove_id;

    $delete_query="Delete from cart2 where product_id=$remove_id";
    $dresult=$db->delete($delete_query);
    if($delete_query){
      
      echo"<script>window.open('cart.php')</script>";
      
    }
  }
    }
  }
  echo $remove_item=remove_item();









?>
<!----------------last child Include footer---------------->
<?php
  include('footer.php');
?>












</body>
</html>