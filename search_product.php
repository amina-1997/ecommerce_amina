<?php
include('header.php');
?>

<style>
    .card-img-top {
        width: 100%;
        height: 150px;
        object-fit: contain;
    }
</style>

<?php
cart();
?>

<!----------------third--------------->  
<div class="bg-light text-center mt-5">
    <h3 class="text-warning">Product <span class="text-danger"> Store</span></h3>
    <div class="text-center">
    </div>
</div>

<!-----------------FOURTH CHILD---------------->
<div class="row">
    <div class="col-md-10">
        <!-- Product Section -->
        <div class="row">
            <?php
            search_product();     
            getuniquecatagory();  
            getuniquebrand();     
            ?>
        </div>
    </div>

   
</div>

<?php
include('footer.php');
?>

</body>
</html>
