<h3 class="text-center mt-5">All Payments</h3>
<table class="table table-bordered mt-5">
   

            
                

                <?php
                $sql_pay="select * from user_payment";
                $res_pay=$db->select($sql_pay);
                if($res_pay=='0'){
                    echo"<h2 class='text-center mt-5 text-danger'>NO PAYMENT YET</h2>";
                }else{
                    ?>
                <thead class="bg-info">
                <tr>
                    <th>SL</th>
                    <th>INVOICE NO</th>
                    <th>AMOUNT</th>
                    <th>PAYMENT MODE</th>
                    <th>ORDER DATE</th>
                    <th>DALETE</th>
                </tr>
                </thead>


                <?php
                    $number=0;
                    while($row=mysqli_fetch_assoc($res_pay)){
                        $order_id=$row['order_id'];
                        $payment_id=$row['payment_id'];
                        $number++;
                        ?>
                <tbody>

                    <tr>
                    <td><?php echo $number ?></td>
                    <td><?php echo $row['invoice_number'];?></td>
                    <td><?php echo $row['amount'];?></td>
                    <td><?php echo $row['payment_mode'];?></td>
                    <td><?php echo $row['date'];?></td>
 <td><a href="home.php?delete_payment=<?php echo $order_id;?>" onclick=
        "return confirm('are you sure you want to delete')"><i class="fa-solid fa-trash"></i></a></td>

        </tr>

              <?php      
                }
                
                }
            
            ?>

           
    </tbody>
</table>