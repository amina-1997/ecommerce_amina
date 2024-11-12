<?php
if(isset($_GET['edit_brand'])){
    $edit_b=$_GET['edit_brand'];

    $brand_sql="select * from brand where brand_id=$edit_b";
    $res=$db->select($brand_sql);
    if($res){
        while($row=mysqli_fetch_assoc($res)){
            $brand_title=$row['brand_title'];
        }
    }
}
if(isset($_POST['submit'])){
    $brand_t=$_POST['brand_t'];
    $upb="update brand set brand_title='$brand_t' where brand_id=$edit_b";
    $upres=$db->update($upb);
    if($upres){
        echo"<script>alert('updeted successfully')</script>";
        echo"<script>window.open('home.php?view_brand')</script>";
    }
}

?>
<div class="container mt-3">
    <h3 class="text-center">edit brand</h3>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-2 w-50 m-auto">
            <lavel class="form-level">Edit brand</lavel>
            <input type="text" class="form-control" name="brand_t" 
            value="<?php echo $brand_title ?>">
        </div>
        <input type="submit" name="submit" value="update" class="btn btn-info
        px-3 mb-1">
    </form>
</div>