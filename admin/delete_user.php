<?php
if(isset($_GET['delete_user'])){
    $d_user=$_GET['delete_user'];

    $usql="delete from user_table where user_id=$d_user";
    $ur=$db->delete($usql);
    if($ur){
        echo"<script>confirm('deleted successfully')</script>";
    echo"<script>window.open('home.php?user_list','_self')</script>";
    }
}
?>