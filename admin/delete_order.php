<?php
if(isset($_GET['delete_order'])){
    $d_order=$_GET['delete_order'];

    $usql="delete from user_order where order_id=$d_order";
    $ur=$db->delete($usql);
    if($ur){
        echo"<script>confirm('deleted successfully')</script>";
    echo"<script>window.open('home.php?order_list')</script>";
    }
}
?>