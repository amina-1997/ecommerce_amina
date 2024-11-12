<h3 class="text-center text-success">All Catagories</h3>

<table class="table table-bordered mt-5">
    <thead class="bg-info">
       <tr>
        <th>Id</th>
        <th>catagory title</th>
        <th>edit</th>
        <th>delete</th>
       </tr>
        
    </thead>
    <tbody class="bg-secondary text-light">
    <?php

$cat_sql="select * from catagory";
$car_result=$db->select($cat_sql);
if($car_result){
    $number=0;
    while($row=mysqli_fetch_assoc($car_result)){
        $number++;

      ?><tr>
        <th><?php echo $number ?></th>
        <th><?php echo $row ['catagory']; ?></th>
        
    
        <td><a href="home.php?edit_catagory=<?php echo $row ['catagory_id'] ;?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
        <td><a href="home.php?delete_catagory=<?php echo $row ['catagory_id'];?>" onclick=
        "return confirm('are you sure you want to delete')"><i class="fa-solid fa-trash"></i></a></td>

        </tr>
    <?php
    }
}


?>
    </tbody>
</table>