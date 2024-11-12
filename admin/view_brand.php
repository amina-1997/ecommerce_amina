<h3 class="text-center text-success">All brands</h3>

<table class="table table-bordered mt-5">
    <thead class="bg-info">
       <tr>
        <th>Id</th>
        <th>brand title</th>
        <th>edit</th>
        <th>delete</th>
       </tr>
        
    </thead>
    <tbody class="bg-secondary text-light">
    <?php

$b_sql="select * from brand";
$b_result=$db->select($b_sql);
if($b_result){
    $number=0;
    while($rows=mysqli_fetch_assoc($b_result)){
        $number++;

      ?><tr>
        <td><?php echo $number ?></td>
        <td><?php echo $rows ['brand_title']; ?></td>
        
    
        <td><a href="home.php?edit_brand=<?php echo $rows ['brand_id'] ;?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
        <td><a href="home.php?delete_brand=<?php echo $rows ['brand_id'];?>" onclick=
        "return confirm('are you sure you want to delete')"><i class="fa-solid fa-trash"></i></a></td>

        </tr>
    <?php
    }
}


?>
    </tbody>
</table>