<?php
if(isset($_GET['edit_catagory'])){
    $edit_cat=$_GET['edit_catagory'];

    $cat_sql="select * from catagory where catagory_id=$edit_cat";
    $res=$db->select($cat_sql);
    if($res){
        while($row=mysqli_fetch_assoc($res)){
            $cat_title=$row['catagory'];
        }
    }
}
if(isset($_POST['submit'])){
    $cat_t=$_POST['catagory_t'];
    $upcat="update catagory set catagory='$cat_t' where catagory_id=$edit_cat";
    $upres=$db->update($upcat);
    if($upres){
        echo"<script>alert('updeted successfully')</script>";
        echo"<script>window.open('home.php?view_catagory')</script>";
    }
}

?>
<div class="container mt-3">
    <h3 class="text-center">edit catagory</h3>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-2 w-50 m-auto">
            <lavel class="form-level">Edit catagory</lavel>
            <input type="text" class="form-control" name="catagory_t" 
            value="<?php echo $cat_title ?>">
        </div>
        <input type="submit" name="submit" value="update" class="btn btn-info
        px-3 mb-1">
    </form>
</div>