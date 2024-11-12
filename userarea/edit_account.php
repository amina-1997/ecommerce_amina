<?php
if(isset($_GET['edit_account'])){
    $user_session_name=$_SESSION['username'];
    $sql="select * from user_table where username='$user_session_name'";
    $user_result=$db->select($sql);
    if($user_result){
        while($row=mysqli_fetch_assoc($user_result)){
            $user_id=$row['user_id'];
            $user_name=$row['username'];
            $user_email=$row['user_email'];
            $user_address=$row['user_address'];
            $user_phone=$row['user_phone'];
            $user_image=$row['user_image'];
    
        } 
    
    }    }    
              if(isset($_POST['submit'])){
                $update_id=$user_id;
                $user_name=$_POST['username'];
                $user_email=$_POST['useremail'];
                $user_address=$_POST['address'];
                $user_phone=$_POST['userphone'];
                $user_image=$_FILES['userimage']['name'];
                $user_image_tmp=$_FILES['userimage']['tmp_name'];

                move_uploaded_file($user_image_tmp,"user-img/$user_image");

                $up_sql="update user_table set username='$user_name', user_email='$user_email',
                 user_address='$user_address', user_phone='$user_phone', user_image='$user_image'";

                 $up_res=$db->update($up_sql);
                 if($up_res){
                    echo"<script>alert('updated successfully')</script>";
                    echo"<script>window.open('logout.php','_self')</script>";
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
    <form action="" method="post" enctype="multipart/form-data" class="w-50 m-auto">
        <div class="form-outline mb-4">
            <input type="text" name="username"  class="form-control" value="<?php echo $user_name?>"
            >
        </div>

        <div class="form-outline mb-4">
            <input type="email" name="useremail"  class="form-control" value="<?php echo $user_email?>">
        </div>

        <div class="form-outline mb-4 d-flex">
            <input type="file" name="userimage"  class="form-control" >
            <img src="./user-img/<?php echo $user_image ?>"class="edit_img" alt="">
        </div>
        
        <div class="form-outline mb-4">
            <input type="text" name="userphone"  class="form-control" value="<?php echo $user_phone?>">
        </div>
        
        <div class="form-outline mb-4">
            <textarea name="address" id="" row="5" class="form-control"><?php echo $user_address?></textarea>
        </div>


        <div class="form-outline mb-4">
            <input type="submit" name="submit" value="UPDATE" class="btn btn-info">
            </div>

    </form>
</body>
</html>