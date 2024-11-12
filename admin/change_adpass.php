<h2 class="text-danger mb-2">change password</h2>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4">
            <input type="password" name="oldpass" class="form-control w-50 m-auto"
             placeholder="type old password">
        </div>

        <div class="form-outline mb-4">
            <input type="password" name="newpass" class="form-control w-50 m-auto"
            placeholder="type new password">
        </div>

        <div class="form-outline mb-4">
            <input type="password" name="conpass" class="form-control w-50 m-auto"
            placeholder="retype new password">
        </div>

        <div class="form-outline mb-4">
        <input type="submit" name="submit" value="update" class="bg-info border-0">
        </div>

    </form>

   <?php 
	if(isset($_POST['submit'])){
        $aid=$_SESSION['id'];

		$oldpass = $_POST['oldpass'];
		$newpass = $_POST['newpass'];
		$re_pass = $_POST['conpass'];
		
		
		if( empty($oldpass)||empty($newpass)||empty($re_pass)){
			
			echo "<script>
				alert('every field must be fullfilled!');
			</script>";
			}else{
				
				$sql= "select * from admin_table where admin_id='$aid'";
				$result = $db->select($sql);
				
			if($result){
				
				while($rows = mysqli_fetch_assoc($result)){
						
					if($rows['admin_password'] ==$oldpass){
							
						if($newpass==$re_pass){
							
							$sql2 = "update admin_table set admin_password = '$re_pass' where admin_id ='$aid'";
							
							$res = $db->update($sql2);
								
								if($res){
									echo "<script>
										alert('password changed successfully');
										window.open('adminlogin.php');
									</script>";
									}else{
										echo "<script>
											alert('process failed!');
										</script>";
									}
								
								
						}else{
							echo "<script>
								alert('type new password correctly.process failed!');
							</script>";
							}
							
						}else{
							echo "<script>
								alert('old password is worng');
							</script>";
							}
				}
			}
		}
			
	}
?>
