<?php
include('header.php');
?>

<style> 
 .card-img-top {
        width:100%;
        height: 150px;
        object-fit: contain;
    }
   
</style>

<?php
cart();
?>
<br>
<!---------------- Product Section ---------------->
<div class="container-fluid my-5 bg-light">
  <br>
    <h1 class="text-center py-3 bg-light text-danger">Products <span class="text-warning">details</span></h1>
    <div class="row g-4">
        <?php
        view_details();
        getuniquecatagory();
        getuniquebrand();
        ?>
    </div>
</div>
<br>
<?php
include('footer.php');
?>
