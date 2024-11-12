<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    

</head>
<?php
$username=$_SESSION['username'];
$sql="select * from user_table where username='$username'";
$res=$db->select($sql);
if($res){
    while($row=mysqli_fetch_assoc($res)){
    $user_id=$row['user_id'];
}
}




?>
<body>
<h2 class="text-center">All My Orders</h2>
<table class="table table-bordered mt-5">
    <thead>
        <tr>
            <th>Serial N.</th>
            <th>Amount due</th>
            <th>Total products</th>
            <th>Invoice number</th>
            <th>Date</th>
            <th>Complete/Incomplete</th>
            <th>status</th>
        </tr>
    </thead>
    <?php
    $order_details="select * from user_order where user_id='$user_id'";
    $resulat=$db->select($order_details);
    if($resulat){
        $number=1;

        while($rows=mysqli_fetch_assoc($resulat)){
            $order_id=$rows['order_id'];
            $order_status=$rows['order_status'];
            if($order_status=='panding'){
                $order_status='incomplete';
            }else{
                $order_status='complete';

            }
              
?>
<tbody>
    <tr>
        <td><?php echo $number; ?></td>
        <td><?php echo $rows['ammount_due'];?></td>
        <td><?php echo $rows['total_product']?></td>
        <td><?php echo $rows['invoice_number'];?></td>
        <td><?php echo $rows['order_date'];?></td>
        <td><?php echo $order_status ?></td>

        <?php
        if($order_status=='complete'){
            echo"<td>paid</td>";
        }else{

          echo"<td><a href='confirm_payment.php?order_id=$order_id' class='text-dark' 
          style='text-decoration:none;'>
          confirm</a></td>
           ";
        }
        
        ?>
        </tr>
    </tbody>




     <?php 
        $number++;

                   }   }
      
    
    ?>
    
</table>
</body>
</html>