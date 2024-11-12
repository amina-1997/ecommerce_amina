
<h2 class="text-danger mb-2">Delete Account</h2>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4">
            <input type="submit" name="delete" class="form-control w-50 m-auto"
             value="Delete Account">
        </div>

        <div class="form-outline mb-4">
            <input type="submit" name="d_delete" class="form-control w-50 m-auto"
             value="Don't Delete Account">
        </div>
    </form>
<?php
$usersession=$_SESSION['admin_name'];
if(isset($_POST['delete'])){
    $deletesql="delete from admin_table where admin_name='$usersession' ";
    $delresult=$db->delete($deletesql);
    if($delresult){
     echo"<script>alert('account deleted successfully')</script>";
     session_destroy();

     echo"<script>window.open('home.php','_self')</script>";
    }
}

if(isset($_POST['d_delete'])){
    echo"<script>window.open('home.php','_self')</script>";

}



?>