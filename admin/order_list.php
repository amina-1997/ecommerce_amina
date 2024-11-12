<h3 class="text-center mt-5">All Orders List</h3>
<table class="table table-bordered mt-5">
   

            
                

                <?php
                $sql="select * from user_order";
                $res=$db->select($sql);
                if($res=='0'){
                    echo"<h2 class='text-center mt-5 text-danger'>NO ORDER YET</h2>";
                }else{
                    ?>
                <thead class="bg-info">
                <tr>
                    <th>ID</th>
                    <th>DUE AMOUNT</th>
                    <th>TOTAL PRODUCT</th>
                    <th>INVOICE NO</th>
                    <th>ORDER DATE</th>
                    <th>STATUS</th>
                    <th>DALETE</th>
                </tr>
                </thead>


                <?php
                    $number=0;
                    while($row=mysqli_fetch_assoc($res)){
                        $order_id=$row['order_id'];
                        $number++;
                        ?>
                <tbody>

                    <tr>
                    <td><?php echo $number ?></td>
                    <td><?php echo $row['ammount_due'];?></td>
                    <td><?php echo $row['total_product'];?></td>
                    <td><?php echo $row['invoice_number'];?></td>
                    <td><?php echo $row['order_date'];?></td>
                    <td><?php echo $row['order_status'];?></td>
 <td><a href="home.php?delete_order=<?php echo $order_id;?>" onclick=
        "return confirm('are you sure you want to delete')"><i class="fa-solid fa-trash"></i></a></td>

        </tr>

              <?php      
                }
                
                }
            
            ?>

           
    </tbody>
</table>