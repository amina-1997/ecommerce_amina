<?php
  include('../config/database.php');

$db= new Database();

if(isset($_POST['submit'])){
    $title=$_POST['product_title'];
    $description=$_POST['product_description'];
    $keyword=$_POST['prodct_keyword'];
    $catagory=$_POST['catagory'];
    $brand=$_POST['brand'];
    $price=$_POST['product_price'];

    $status='true';

    //accessing image

    $image1=$_FILES['image1']['name'];
    $image2=$_FILES['image2']['name'];
    $image3=$_FILES['image3']['name'];

    //accessing image tmp name

    
    $tmp1=$_FILES['image1']['tmp_name'];
    $tmp2=$_FILES['image2']['tmp_name'];
    $tmp3=$_FILES['image3']['tmp_name'];

    //checking empty condition

    if($title=='' or $description=='' or $keyword=='' or $catagory=='' or $brand=='' or $price=='' or $image1==''
     or $image2=='' or $image3==''){
        echo "<sctipt>('please fill all the avalible fields')</script>";
        exit();
     }else{
        move_uploaded_file($tmp1,"upload/$image1");
        move_uploaded_file($tmp2,"upload/$image2");
        move_uploaded_file($tmp3,"upload/$image3");

        //insert query

        $query="insert into product(title,description,keyword,catagory_id,brand_id,price,image_1,image_2,image_3,date,status)
        values('$title','$description',' $keyword',' $catagory','$brand','$price','$image1','$image2','$image3',NOW(),'$status')";

        $res=$db->insert($query);
        if($res){
            echo "<script>alert('inserted successfully')</script>";
            echo "<script>window.open('home.php?view-products')</script>";
        }else{
            echo "<script>alert('process failed')</script>";

        }
     }


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert product</title>

    <!-----------------bootstarp------------------>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!----------------------FONT ICON----------------->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script class="jquery-3.7.1.min.js"></script>

 <link rel="stylesheet" href="style.css" type="text/css">

</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Product </h1>
    </div>
        <!------------------from------------------------------------->
        <form action="" method="post" enctype="multipart/form-data">

        <!------------------title------------------------------------->

        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" name="product_title" id="product_title" placeholder="enter product title" class="form-control"
             autocomplete="off" required>
        </div>
             
        <!------------------description------------->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" name="product_description" id="product_description" placeholder="enter product description" class="form-control"
             autocomplete="off" required>
        </div>

        <!----------------product keyword--------------->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_keyword" class="form-label">Product Keyword</label>
            <input type="text" name="prodct_keyword" id="product_keyword" placeholder="enter product keyword" 
            class="form-control"
             autocomplete="off" required>
        </div>

        <!----------------product catagory--------------->
       
            <div class="form-outline mb-4 w-50 m-auto">
            <select name="catagory" id="" class="form-select">
                <option value="">select catagory</option>

                <?php
                    $sql="select * from catagory";
                    $res=$db->select($sql);
                    if($res){
                        while($row=mysqli_fetch_assoc($res)){
                            $catagory=$row['catagory'];
                            $cat_id=$row['catagory_id'];
                          echo "<option value='$cat_id'>$catagory</option>";
                            
                        }
                    }

                ?>

            </select>
        </div>

        
        <!----------------product brand--------------->


        <div class="form-outline mb-4 w-50 m-auto">
            <select name="brand" id="" class="form-select">
                <option value="">select brand</option>

                
                <?php
                    $sql="select * from brand";
                    $res=$db->select($sql);
                    if($res){
                        while($row=mysqli_fetch_assoc($res)){
                            $brand=$row['brand_title'];
                            $brand_id=$row['brand_id'];
                          echo "<option value='$brand_id'>$brand</option>";
                            
                        }
                    }

                ?>

            </select>
        </div>

        <!------------------image1------------->

        <div class="form-outline mb-4 w-50 m-auto">
             <label for="image1" class="form-label">Image 1</label>
             <input type="file" name="image1" id="image1" class="form-control"
              autocomplete="off" required>
        </div>

        
        <!------------------image2------------->

        <div class="form-outline mb-4 w-50 m-auto">
             <label for="image2" class="form-label">Image 2</label>
             <input type="file" name="image2" id="image2" class="form-control"
              autocomplete="off" required>
        </div>

        
        <!------------------image3------------->

        <div class="form-outline mb-4 w-50 m-auto">
             <label for="image3" class="form-label">Image 3</label>
             <input type="file" name="image3" id="image3" class="form-control"
              autocomplete="off" required>
        </div>
        
        
        <!----------------product price--------------->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" name="product_price" id="product_price" placeholder="enter product price" 
            class="form-control"
             autocomplete="off" required>
        </div>

        <!----------------submit--------------->
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="submit" value="insert product" class="btn btn-info">
        </div>










            
             





        </form>
    
</body>
</html>