<?php

  if(isset($_POST['cat_submit'])){
    $catagory=$_POST['cat_title'];

    
    //select data from database
    $select_query="select * from catagory where catagory='$catagory'";
    $result=$db->select($select_query);
    if($result> '0'){
      echo"<script>
      alert('catagory is present inside the database');
    </script>";
    }else{


    $query="insert into catagory (catagory)values('$catagory')";
    $res=$db->insert($query);
    if($res){
      echo"<script>alert('catagory inserted successfully');</script>";
      echo"<script>window.open('home.php?view_catagory')</script>";

    }
    }
  }


?>




<h2 class="text-center my-2">insert catagory</h2>

<form action="" method="post" class="md-2">
<div class="input-group mb-2 w-90">
  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="cat_title" placeholder="insert catagories"
   aria-label="Username" aria-describedby="basic-addon1">
</div>
    
<div class="input-group mb-2 m-auto  w-10">
  <button type="submit" class="bg-info p-2 border-0 text-light my-3" name="cat_submit">insert catagories</button>
</div>

</form>