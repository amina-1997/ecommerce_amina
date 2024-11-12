<?php
  include('../config/database.php');
  $db= new Database();

session_start();

if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];

    $sql="select * from user_order where order_id=$order_id";
    $res=$db->select($sql);
    if($res){
        $row=mysqli_fetch_assoc($res);
            $invoice_no=$row['invoice_number'];
            $amount_due=$row['ammount_due'];
        }
    
}

if(isset($_POST['submit'])){
    $invoice_no=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment-mode'];

    $query="insert into user_payment(order_id, invoice_number, amount, payment_mode)values
    ($order_id, $invoice_no, $amount,'$payment_mode')";
    $result=$db->insert($query);
    if($result){
        echo"<script>alert('Your payment successfully completed')</script>";
        echo"<script>window.open('profile.php?my_orders','_self')</script>";
    }

    $updatesql="update user_order set order_status='Complete' where order_id=$order_id";
    $updateres=$db->update($updatesql);
    if($updateres){

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
    
<!-----------------bootstarp------------------>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body class="bg-secondary">
    <div class="container mt-5">
    <h3 class="text-light text-center">CONFIRM PAYMENT</h3>

        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_number"
                 value="<?php echo $invoice_no; ?>">
            </div>

            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="form-control" class="text-light">Amount</label>
            <input type="text" class="form-control w-50 m-auto" name="amount"  
            value="<?php echo $amount_due; ?>">
            </div>

            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment-mode" class="form-select w-50 m-auto">
                    <option>Select Payment Mode</option>
                    <option>UPI</option>
                    <option>paypal</option>
                    <option>netbanking<option>
                    <option>cash on delivery</option>
                    <option>Pay offline</option>

                </select>
            </div>

            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" name="submit" value="CONFIRM" 
                class="my-2 mx-3 w-50 m-auto bg-info border-0">
            </div>

        </form>
    </div>
    
</body>
</html>