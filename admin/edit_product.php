<div class="container mt-5">
    <h1 class="text-center">Edit Products</h1>
    <?php
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    $editsql="select * from product where product_id=$edit_id";
    $result=$db->select($editsql);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $catagory_id=$row['catagory_id'];
            $brand_id=$row['brand_id'];

            $catagory_sql="select * from catagory where catagory_id=$catagory_id";
            $catres=$db->select($catagory_sql);
            if($catres){
                while($catrow=mysqli_fetch_assoc($catres)){
                    $catagory_title=$catrow['catagory'];
                }
            }

            $brand_sql="select * from brand where brand_id=$brand_id";
            $brandres=$db->select($brand_sql);
            if($brandres){
                while($brandrow=mysqli_fetch_assoc($brandres)){
                    $brand_title=$brandrow['brand_title'];
                }
            }
            
?>



<form action="" method="post" enctype="multipart/form-data" class="w-50 m-auto">
        <div class="form-outline mb-4">
            <label for="product_t" class="form-label">product title</label>
            <input type="text" name="product-title" id="product_t" 
             value="<?php echo $row['title']?>" class="form-control"  required="required"
           >
        </div>

        <div class="form-outline mb-4">
            <label for="product_d" class="form-label">product Description</label>
           <textarea name="product_dsc" id="" class="form-control" row="10"  required="required">
            <?php echo $row['description']?></textarea>
           <script>
				CKEDITOR.replace('productd_dsc');
			</script>
        </div>

        <div class="form-outline mb-4">
            <label for="product_k" class="form-label">product keywords</label>
            <input type="text" name="product-key" value="<?php echo $row['keyword']?>" 
            id="product_k" class="form-control"  required="required">
        </div>

        <div class="form-outline mb-4">
        <label class="form-label">Select Catagory</label>
            <select name="select-catagory" id="" class="form-select"  required="required">
                <option value="<?php echo $catagory_title ?>"><?php echo $catagory_title ?></option>
                <?php
                $catsql="select * from catagory ";
                $catre=$db->select($catsql);
                 if($catre){
                while($cat=mysqli_fetch_assoc($catre)){
                    $catagory_title=$cat['catagory'];
                    $catagory_id=$cat['catagory_id'];

                    echo"<option value='$catagory_id'>$catagory_title</option>";
                }
            }
              
            ?>
            </select>
        </div>

        <div class="form-outline mb-4">
        <label class="form-label">Select Brand</label>
            <select name="select-brands" id="" class="form-select"  required="required">
                <option value="<?php echo $brand_title ?>"><?php echo $brand_title ?></option>
            <?php
                $bsql="select * from brand ";
                $bre=$db->select($bsql);
                 if($bre){
                while($brand_row=mysqli_fetch_assoc($bre)){
                    $brand_title=$brand_row['brand_title'];
                    $brand_id=$brand_row['brand_id'];

                    echo"<option value='$brand_id'>$brand_title</option>";
                }
            }
              
            ?>
            
            </select>
        </div>

        <div class="form-outline mb-4">
        <label for="product_i1" class="form-label">Image-1</label>
            <div class="d-flex m-auto">
            <input type="file" name="image-1" id="product_i1" class="form-control
            w-90 m-auto"  required="required">
            <img src="upload/<?php echo $row['image_1']?>" alt="" class="img">
            </div>
           
        </div>

        <div class="form-outline mb-4">
        <label for="product_i2" class="form-label">Image-2</label>
            <div class="d-flex m-auto">
            <input type="file" name="image-2" id="product_i2" class="form-control 
            w-90 m-auto"  required="required">
            <img src="upload/<?php echo $row['image_2']?>" alt="" class="img">
            </div>
           
        </div>

        <div class="form-outline mb-4">
        <label for="product_i3" class="form-label mb-4">Image-3</label>
            <div class="d-flex m-auto">
            <input type="file" name="image-3" id="product_i3" class="form-control
            w-90 m-auto"  required="required">
            <img src="upload/<?php echo $row['image_3']?>" alt="" class="img">
            </div>
        </div>

        <div class="form-outline mb-4">
            <label for="product_p" class="form-label">product Price</label>
            <input type="text" name="product-price" value="<?php echo $row['price']?>"
             id="product_p" class="form-control"  required="required">
            
        </div>

        <div>
            <input type="submit" name="edit" value="UPDATE" class="btn btn-info
            px-3 mb-3">
        </div>
<?php
    }
    }

}

?>



    </form>
</div>

<?php
if(isset($_POST['edit'])){
    $product_t=$_POST['product-title'];
    $product_d=$_POST['product_dsc'];
    $product_key=$_POST['product-key'];
    $product_c=$_POST['select-catagory'];
    $product_b=$_POST['select-brands'];
    $product_price=$_POST['product-price'];

    $img_1=$_FILES['image-1']['name'];
    $img_2=$_FILES['image-2']['name'];
    $img_3=$_FILES['image-3']['name'];

    $img_tmp_1=$_FILES['image-1']['tmp_name'];
    $img_tmp_2=$_FILES['image-2']['tmp_name'];
    $img_tmp_3=$_FILES['image-3']['tmp_name'];

    if(empty($product_t) || empty($product_d) || empty($product_key) || empty($product_c) || empty($product_b)
    || empty($product_price) || empty($img_1) || empty($img_2) || empty($img_3)){
    echo"<script>alert('please fill all the feild')</script>";
    }else{
        move_uploaded_file($img_tmp_1, "upload/$img_1");
        move_uploaded_file($img_tmp_2,"upload/$img_2");
        move_uploaded_file($img_tmp_3, "upload/$img_3");

        $edit_update="update product set catagory_id='$product_c', brand_id='$product_b', title='$product_t',
        description='$product_d', keyword='$product_key', price='$product_price',image_1='$img_1',
        image_2='$img_2', image_3='$img_3', date=NOW() where product_id='$edit_id'";

        $update_res=$db->update($edit_update);
        if($update_res){
    echo"<script>alert('updated successfully')</script>";
           echo"<script>window.open('home.php?view-products') </script>";
        }
    }
}

?>