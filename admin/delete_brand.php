<?php
if(isset($_GET['delete_brand'])){
    $d_brand=$_GET['delete_brand'];

    $dsql="delete from brand where brand_id=$d_brand";
    $dr=$db->delete($dsql);
    if($dr){
        echo"<script>confirm('deleted successfully')</script>";
    echo"<script>window.open('home.php?view_brand','_self')</script>";
    }
}
?>