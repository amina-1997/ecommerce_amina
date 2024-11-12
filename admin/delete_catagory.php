<?php
if(isset($_GET['delete_catagory'])){
    $d_catagory=$_GET['delete_catagory'];

    $catsql="delete from catagory where catagory_id=$d_catagory";
    $catr=$db->delete($catsql);
    if($catr){
        echo"<script>confirm('deleted successfully')</script>";
    echo"<script>window.open('home.php?view_catagory','_self')</script>";
    }
}
?>