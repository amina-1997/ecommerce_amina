<?php
include('header.php')
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
<div class="bg-light text-center">
    <h3 class="py-3"><b>All products store</b></h3>
    <div class="text-center">
    </div>
</div>

<!-----------------FOURTH CHILD---------------->
<div class="row bg-dark">
  <div class="col-md-10 m-3">
<!----------product---------->
    <div class="row">


    <?php
    //------------calling function---------->

    get_all_product();
      getuniquecatagory();
      getuniquebrand();

    ?>
        </div>
      </div>
    






      </div>  
    </div>






<!----------------last child footer---------------->
<?php
  include('footer.php');
?>



