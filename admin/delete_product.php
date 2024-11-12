<?php
if(isset($_GET['delete_products'])){
    $delete_id=$_GET['delete_products'];

    $delete_srl="delete from product where product_id='$delete_id'";
    $deleteres=$db->delete($delete_srl);
    if($deleteres){
    echo"<script>confirm('deleted successfully')</script>";
    echo"<script>window.open('home.php?view-products','_self')</script>";

    }else{

    }
}


?>