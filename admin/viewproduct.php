
<style>
    img{
        width:80px;
        height:80px;
    }
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view products</title>
</head>
<body>
    <h3 class="mt-5">all product</h3>
<table class="table table-bordered m-5 mx-2">
    <thead class="bg-danger">
    <tr>
        <th>Product id</th>
        <th>Product Title</th>
        <th>Image</th>
        <th>Price</th>
        <th>Product sold</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
</tr>
    </thead>
    <?php
    $sql="select * from product";
    $result=$db->select($sql);
    if($result){
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $product_id=$row['product_id'];
            $number++;
?>

<tbody class="bg-info">
        <tr>
            <td><?php echo $number;?></td>
            <td><?php echo $row['title'];?></td>
            <td><img src="upload/<?php echo $row['image_1'];?>" class="img" alt=""></td>
            <td><?php echo $row['price'];?>/-</td>
            <td><?php
            $countpro="select * from order_panding where product_id=$product_id";
            $pres=$db->select($countpro);
            if($pres){
                $pcount=mysqli_num_rows($pres);
                echo $pcount;
            }
            ?>
            </td>
        <td><?php echo $row['status'];?></td>
        <td><a href="home.php?edit_products=<?php echo $product_id ;?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
        <td><a href="home.php?delete_products=<?php echo $product_id ;?>" onclick=
        "return confirm('are you sure you want to delete')"><i class="fa-solid fa-trash"></i></a></td>

        </tr>

<?php
        }
    }
    
    
    
    ?>
   

</table>
</body>
</html>