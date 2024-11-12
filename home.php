<?php
include('header.php');

?>
  <style>
  .card-img-top {

    width:100%;
    height:150px;
    object-fit:contain;

  }
  body{
    overflow-x:hidden;
  }

  
</style>

<?php
      cart();
    ?>
      
<!----------------third child--------------->
<div class="bg-light text-warning text-center"><br>
    <h3 class="pb-3">product <span class="text-danger">store</span></h3>
</div>

<!-----------------FOURTH CHILD---------------->
<div class="row">
  <div class="col-md-10">
<!----------product---------->
    <div class="row">


    <?php
    //------------calling function---------

      getproduct();
      getuniquecatagory();
      getuniquebrand();
     /* $ip = getIPAddress();  
      echo 'User Real IP Address - '.$ip;  */
    ?>
        </div>
      </div>
    

<!----------------last child Include footer---------------->
<?php
  include('footer.php');
?>












</body>
</html>