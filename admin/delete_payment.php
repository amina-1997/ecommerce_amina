<?php
if(isset($_GET['delete_payment'])){
    $d_order=$_GET['delete_payment'];

    $usql="delete from user_payment where order_id=$d_order";
    $ur=$db->delete($usql);
    if($ur){
        echo"<script>confirm('deleted successfully')</script>";
    echo"<script>window.open('home.php?all_payment','_self')</script>";
    }
}
?>