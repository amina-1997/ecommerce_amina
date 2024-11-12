<?php

if(isset($_GET['editaccount'])){
    $admin_session_name=$_SESSION['admin_name'];
    $sql="select * from admin_table where admin_name='$admin_session_name'";
    $admin_result=$db->select($sql);
    if($admin_result){
        while($row=mysqli_fetch_assoc($admin_result)){
            $admin_id=$row['admin_id'];
            $admin_name=$row['admin_name'];
            $admin_email=$row['admin_email'];
            $admin_image=$row['admin_image'];
    
        } 
    
    }    }    
              if(isset($_POST['submit'])){
                $update_id=$admin_id;
                $admin_name=$_POST['username'];
                $admin_email=$_POST['useremail'];
                $newadmin_image=$_FILES['userimage']['name'];
                $admin_image_tmp=$_FILES['userimage']['tmp_name'];
                if(empty($admin_image)){
                    $admin_image=$row['admin_image'];
                }else{
                    $new_image_name = time() . '_' . $newadmin_image;
                    move_uploaded_file($admin_image_tmp, "admin-img/$new_image_name");
                    $admin_image=$new_image_name;

                }


                $up_sql="update admin_table set admin_name='$admin_name', admin_email='$admin_email',
                admin_image='$admin_image' where admin_id=$admin_id";

                 $up_res=$db->update($up_sql);
                 if($up_res){
                    echo"<script>alert('updated successfully')</script>";
                    echo"<script>window.open('admin_logout.php','_self')</script>";
                 }

            }
        
        
    




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit account</title>

</head>
<body>

    <h3 class="text-center">Edit Your Account</h3>
    <form action="" method="post" enctype="multipart/form-data" class="w-50 m-auto mt-0">
        <div class="form-outline mb-4">
            <input type="text" name="username"  class="form-control" value="<?php echo $admin_name?>"
            >
        </div>

        <div class="form-outline mb-4">
            <input type="email" name="useremail"  class="form-control" value="<?php echo $admin_email?>">
        </div>

        <div class="form-outline mb-4 d-flex">
            <input type="file" name="userimage"  class="form-control" >
            <img src="admin-img/<?php echo $admin_image ?>"class="edit_img" alt="" width="80px">
        </div>
       

        <div class="form-outline mb-4">
            <input type="submit" name="submit" value="UPDATE" class="btn btn-info">
            </div>

    </form>
</body>
</html>