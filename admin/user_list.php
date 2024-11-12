<h3 class="text-center mt-5">All Users</h3>
<table class="table table-bordered mt-5">
   

            
                

                <?php
                $sql_pay="select * from user_table";
                $res_pay=$db->select($sql_pay);
                if($res_pay=='0'){
                    echo"<h2 class='text-center mt-5 text-danger'>NO USER YET</h2>";
                }else{
                    ?>
                <thead class="bg-info">
                <tr>
                    <th>SL</th>
                    <th>USER NAME</th>
                    <th>USER EMAIL</th>
                    <th>USER image</th>
                    <th>USER ADDRESS</th>
                    <th>USER PHONE</th>
                    <th>DALETE</th>
                </tr>
                </thead>


                <?php
                    $number=0;
                    while($row=mysqli_fetch_assoc($res_pay)){
                        $user_id=$row['user_id'];
                        $number++;
                        ?>
                <tbody>

                    <tr>
                    <td><?php echo $number ?></td>
                    <td><?php echo $row['username'];?></td>
                    <td><?php echo $row['user_email'];?></td>
                    <td><img src="../userarea/user-img/<?php echo $row['user_image'];?>"
                     alt="" width="100px"></td>
                    <td><?php echo $row['user_address'];?></td>
                    <td><?php echo $row['user_phone'];?></td>
 <td><a href="home.php?delete_user=<?php echo $user_id;?>" onclick=
        "return confirm('are you sure you want to delete')"><i class="fa-solid fa-trash"></i></a></td>

        </tr>

              <?php      
                }
                
                }
            
            ?>

           
    </tbody>
</table>