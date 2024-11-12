


<?php
    //getting product common function

    function getproduct(){
      $db=new Database();

      //condition to check isset or not

        if(!isset($_GET['catagory'])){
          if(!isset($_GET['brand'])){

        $sql="select * from product order by product_id desc limit 9";
        $res= $db->select($sql);
        if($res){
          while($row=mysqli_fetch_assoc($res)){
            
    
          ?>
               <div class="col-md-4  mb-2">

                  <div class="card" style="height:300px;">
                      <img src="admin/upload/<?php echo $row['image_1'] ;?>" class="card-img-top mt-2" alt="">
                      <div class="card-body">
                          <h5 class="card-title"><?php echo $row['title']; ?></h5>
                          <p class="card-text text-danger"><?php echo $row['price']; ?>/-</p>
                          <a href="home.php?add_to_cart=<?php echo $row['product_id']; ?>" class="btn btn-info">Add Cart</a>
                          <a href="product_details.php?product_id=<?php echo $row['product_id'] ;?>" class="btn btn-secondary">View More</a>
    
                      </div>
                    
                  </div>
              </div>
                
<?php
          }
        }
        
    }
  }
  }


//-------------get all product page-display_all.php --------------



function get_all_product(){
  $db=new Database();

  //condition to check isset or not

    if(!isset($_GET['catagory'])){
      if(!isset($_GET['brand'])){

    $sql="select * from product order by rand()";
    $res= $db->select($sql);
    if($res){
      while($row=mysqli_fetch_assoc($res)){

      ?>
  <div class="col-md-4 my-4">
    <div class="card h-100 shadow-sm">
        <!-- Image Section -->
        <img src="admin/upload/<?php echo $row['image_1']; ?>" class="card-img-top img-fluid m-auto mt-5" style="width:200px; object-fit: cover;" alt="Product Image">
        
        <!-- Card Body -->
        <div class="card-body text-center">
            <h5 class="card-title"><?php echo $row['title']; ?></h5>
            <p class="card-text text-primary fw-bold"><?php echo $row['price']; ?>/-</p>
            
            <!-- Buttons -->
            <a href="home.php?add_to_cart=<?php echo $row['product_id']; ?>" class="btn btn-info btn-sm me-2">Add Cart</a>
            <a href="product_details.php?product_id=<?php echo $row['product_id']; ?>" class="btn btn-secondary btn-sm">View More</a>
        </div>
    </div>
</div>

            
<?php
      }
    }
    
}
}
}










//getting unique catagory

function getuniquecatagory(){
  $db=new Database();

  //condition to check isset or not

    if(isset($_GET['catagory'])){
      $catagory_id =$_GET['catagory'];


    $sql="select * from product where catagory_id = '$catagory_id'";
    $result= $db->select($sql);
  
  
  if($result=="0"){

    echo "<h2 class='text-center text-danger p-5'>this catagory is not available</h2>";
      }
  
    if($result){
      while($row=mysqli_fetch_assoc($result)){


       ?> 
        <div class="col-md-4 mb-2">

              <div class="card" style="height:300px;">
                  <img src="./admin/upload/<?php echo $row['image_1'] ;?>" class="card-img-top" alt="">
                  <div class="card-body">
                      <h5 class="card-title"><?php echo $row['title'] ;?></h5>
                      <p class="card-text"><?php echo $row['price'] ;?>/-</p>
                      <a href="home.php?add_to_cart=<?php echo $row['product_id']; ?>" class="btn btn-info">Add Cart</a>


                      <a href="product_details.php?product_id=<?php echo $row['product_id'] ;?>" class="btn btn-secondary">View More</a>


                  </div>
              </div>
            </div>
          



     <?php   

      }
        
    }
    
}

}


//getting unique brand

function getuniquebrand(){
  $db=new Database();

  //condition to check isset or not

    if(isset($_GET['brand'])){
      $brand_id =$_GET['brand'];


    $sql="select * from product where brand_id = '$brand_id'";
    $result= $db->select($sql);
  
  
  if($result=="0"){

    echo "<h2 class='text-center text-danger p-5'>this brand is not available</h2>";
      }
  
    if($result){
      while($row=mysqli_fetch_assoc($result)){


       ?> 
        <div class="col-md-4 mb-2">
              <div class="card" style="height:300px;">
                  <img src="./admin/upload/<?php echo $row['image_1'] ;?>" class="card-img-top" alt="">
                  <div class="card-body">
                      <h5 class="card-title"><?php echo $row['title'] ;?></h5>
                      <p class="card-text"><?php echo $row['price'] ;?>/-</p>
                      <a href="home.php?add_to_cart=<?php echo $row['product_id']; ?>" class="btn btn-info">Add Cart</a>


                      <a href="product_details.php?product_id=<?php echo $row['product_id'] ;?>" class="btn btn-secondary">View More</a>


                  </div>
              </div>
          </div>



     <?php   

      }
        
    }
    
}
}





//------------------brand function----------------------

    function getbrand(){
      $db=new Database();

      $query="select * from brand ";
      $res=$db->select($query);
      if($res){
        while($row=mysqli_fetch_assoc($res)){

          $brandi=$row['brand_id'];
          $brandt=$row['brand_title'];
          ?>

     <li class="nav-item">
     <a href="home.php?brand=<?php echo $brandi ;?>" class="nav-link text-light"><?php echo $brandt ?></a>
    </li>


  <?php
        }
      }
   
   

    }
    

//------------------catagory function----------------------

function getcatagory(){
  $db=new Database();

  
  $sql="select * from catagory";
  $res=$db->select($sql);

  if($res){
    while($rows=mysqli_fetch_assoc($res)){
    $catagory=$rows['catagory'];
    $catid=$rows['catagory_id'];

?>

<li class="nav-item">
  <a href="home.php?catagory=<?php echo $catid ;?>" class="nav-link text-light"><?php echo $catagory; ?></a>
</li>

<?php
  }

}

}


//------------get searching products---------------

 function search_product(){

  $db=new Database();

  //condition to check isset or not
if(isset($_GET['search_data_product'])){
  $search_data_value=$_GET['search_data'];

  $search_query="select * from product where keyword like'% $search_data_value%'";

    $res= $db->select($search_query);
    
  if($res=="0"){

    echo "<h2 class='text-center text-danger p-5'>No result match, No products found of this category</h2>";
      }
    if($res){
      while($row=mysqli_fetch_assoc($res)){

      ?>
           <div class="col-md-4  mb-2">

              <div class="card" style="height:300px;">
                  <img src="admin/upload/<?php echo $row['image_1'] ;?>" class="card-img-top" alt="">
                  <div class="card-body">
                      <h5 class="card-title"><?php echo $row['title']; ?></h5>
                      <p class="card-text"><?php echo $row['price'] ;?>/-</p>
                      <a href="home.php?add_to_cart=<?php echo $row['product_id']; ?>" class="btn btn-info">Add Cart</a>

                      
                      <a href="product_details.php?product_id=<?php echo $row['product_id'] ;?>" class="btn btn-secondary">View More</a>


                  </div>
                
              </div>
          </div>
            
<?php
      }
    }
    
}
 }

//------------view details--------------

function view_details(){
  
  $db=new Database();

  //condition to check isset or not
  if(isset($_GET['product_id'])){
    if(!isset($_GET['catagory'])){
      if(!isset($_GET['brand'])){

        $product_id=$_GET['product_id'];

    $sql="select * from product where product_id='$product_id'";
    $res= $db->select($sql);
    if($res){
      while($row=mysqli_fetch_assoc($res)){

      ?>
           <div class="col-md-4  mb-2">

              <div class="card">
                  <img src="admin/upload/<?php echo $row['image_1'] ;?>" class="card-img-top" alt="">
                  <div class="card-body">
                      <h5 class="card-title"><?php echo $row['title']; ?></h5>
                      <p class="card-text"><?php echo $row['price'] ;?>/-</p>
                      <p class="card-text"><?php echo $row['description'] ;?></p>
                      <a href="home.php?add_to_cart=<?php echo $row['product_id']; ?>" class="btn btn-info">Add Cart</a>


                      <a href="home.php" class="btn btn-secondary">Go Home</a>

                  </div>
                
              </div>
          
      </div>
          
    <div class="col-md-8 bg-light">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center text-info mb-5">Related products</h4>
            </div>
          <div class="col-sm-1"></div>
         <div class="col-md-4">
            <img src="admin/upload/<?php echo $row['image_2'] ;?>" alt="">
        </div>
        
        <div class="col-md-4">
            <img src="admin/upload/<?php echo $row['image_3'] ;?>" alt="">
        </div>

      

    </div>
    
            
<?php
      }
    }
    
}
}

}
}
//------------------------------------------add to cart-------------------------------------
//----------------ip address-------------

function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER(',',['HTTP_X_FORWARDED_FOR'])[0];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
/*$ip = getIPAddress();  
echo 'User Real IP Address - '.$ip;  */

//------------------cart function---------------
function cart() {
  if(isset($_GET['add_to_cart'])){
  $db=new Database();

    $ip = getIPAddress(); 

    $product_id=$_GET['add_to_cart'];

    $query="select * from cart2 where ip_address='$ip' and product_id='$product_id'";
    $result=$db->select($query);
    if($result){
    $num_row=mysqli_num_rows($result);
     }
     if($num_row>0){
    echo "<script>alert('this product is all ready added cart')</script>";
    echo "<script>window.open('home.php','_self')</script>";

    }else{
      $sql= "insert into cart2(product_id, ip_address, quantity) values ($product_id, '$ip', 0)";
      $res=$db->insert($sql);
    
      echo "<script>alert('product added')</script>";

       echo "<script>window.open('home.php','_self')</script>";

      }
      
    }

  }
//---------------product add to cart --------------------

function cart_item() {
  $db = new Database();
  $ip = getIPAddress(); 

  $row = 0;

  if (isset($_GET['add_to_cart'])) {
      $query = "SELECT * FROM cart2 WHERE ip_address='$ip'";
      $cart_res = $db->select($query);

      if ($cart_res && mysqli_num_rows($cart_res) > 0) {
        $row = mysqli_num_rows($cart_res); 

      }
  } else {
      $query = "SELECT * FROM cart2 WHERE ip_address='$ip'";
      $cart_res = $db->select($query);
      
      if ($cart_res) {
          $row = mysqli_num_rows($cart_res);
      }
  }
  
  echo $row;
}

        
//---------------total price function--------------------

  function total_price(){
    $ip = getIPAddress(); 
    $db=new Database();
    $total_price=0;
    $cart_query="select * from cart2 where ip_address='$ip'";
    $result=$db->select($cart_query);
    if($result){
    while($row=mysqli_fetch_array($result)){
      $product_id=$row['product_id'];

    $product_query="select * from product where product_id='$product_id'";
    $resultp=$db->select($product_query);
    if($resultp){
    while($price_row=mysqli_fetch_array($resultp)){
      $product_price=array($price_row['price']);
      $product_value=array_sum($product_price);
      $total_price+=$product_value;
    

    }
  }
  }
    }
  echo $total_price;

}


//-------------user orders details--------------------------//
function user_order_details(){
  $db=new Database();
  $user_name=$_SESSION['username'];
  $get_user="select * from user_table where username='$user_name'";
  $user_result=$db->select($get_user);
  if($user_result){
    while($row=mysqli_fetch_array($user_result)){
    
      $user_id=$row['user_id'];
      if(!isset($_GET['edit_account'])){
        if(!isset($_GET['my_orders'])){
          if(!isset($_GET['delete_account'])){
          
            $get_order="select * from user_order where user_id=$user_id and 
            order_status='panding'";
            $order_res=$db->select($get_order);
            if($order_res){
            $pending_order=mysqli_num_rows($order_res);
            if($pending_order>0){

              echo "<h3 class='text-center text-info'>you have  $pending_order pending orders</h3>
              <p class='text-center'><a href='profile.php?my_orders'
               class='text-dark'>Order Details</a></p>";
            
             }
            }else{
              echo "<h3 class='text-center text-info'>you have zero pending orders</h3>
              <p class='text-center'><a href='../home.php' class='text-dark'>
              explore products</a></p>";
            
            }
          }
        }
      }else{
        echo "<h3 class='text-center text-info'>User not found.</h3>";
      }
    }
  }
}  
        
        
      
      
      
        
      
?>
