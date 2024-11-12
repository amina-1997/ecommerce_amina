<?php

  if(isset($_POST['brand_submit'])){
    $brand=$_POST['insert_brands'];

    
    //select data from database
    $select_query="select * from brand where brand_title ='$brand'";
    $result=$db->select($select_query);
    if($result> '0'){
      echo"<script>
      alert('this brand is present inside the database') </script>";

    }else{


    $query="insert into brand(brand_title)values('$brand')";
    $res=$db->insert($query);
    if($res){
      echo"<script>alert('BRAND inserted successfully')</script>";
      echo"<script>window.open('home.php?view_brand')</script>";

    }
    }
  }


?>


<h2 class="text-center my-2">insert brand</h2>


<form action="" method="post" class="md-2">

<div class="input-group mb-2 w-90">
  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="insert_brands" placeholder="insert brands"
   aria-label="brands" aria-describedby="basic-addon1">
</div>
    
<div class="input-group mb-2 m-auto w-10">
  <button type="submit" class="bg-info p-2 border-0 text-light" name="brand_submit">insert brands</button>
</div>

</form>