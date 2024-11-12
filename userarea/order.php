
<?php
include('../config/database.php');
include('../config/common_function.php');
$db=new Database();

if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];

}

//getting total iteam & total price of all iteams

$ip_address=getIPAddress();
$total_price=0;
$cart_price_query="select * from cart2 where ip_address='$ip_address'";
$result=$db->select($cart_price_query);
if($result){
    $invoicenumber=mt_rand();
    $status='panding';
    while($row=mysqli_fetch_array($result)){
        $product_id=$row['product_id'];
        $product_query="select * from product where product_id=$product_id";
        $res=$db->select($product_query);
        if($res){
            while($rows=mysqli_fetch_array($res)){
                $productprice=array($rows['price']);
                $productvalue=array_sum($productprice);
                $total_price+=$productvalue;
            }
        }

    }
}

//-------------getting quantity from cart--------------------//
$get_cart="select * from cart2";
$cartres=$db->select($get_cart);
if($cartres){
    $get_item_quantity=mysqli_fetch_array($cartres);
    $quantity=$get_item_quantity['quantity'];
    if($quantity==0){
        $quantity=1;
        $subtotal=$total_price;
    }else{
        $quantity=$quantity;
        $subtotal=$total_price*$quantity;

    }
}

$insert_query="insert into user_order (user_id, ammount_due,total_product, invoice_number,
 order_date, order_status)values($user_id, $subtotal,$quantity, $invoicenumber,NOW(),
  '$status')";
  $query_res=$db->insert($insert_query);
  if($query_res){
    echo"<script>window.open('profile.php', '_self')</script>";
  }

  
$insert_query_panding="insert into order_panding (user_id,invoice_number,
product_id,quantity, order_status)values($user_id, $invoicenumber, $product_id,
$quantity,'$status')";
 $query_res_pandig=$db->insert($insert_query_panding);
 if($query_res_pandig){

}
//---------------delete item from cart-----------//

$del_query="Delete from cart2 where ip_address='$ip_address'";
$del_res=$db->delete($del_query);
if($del_res){

}

?>
