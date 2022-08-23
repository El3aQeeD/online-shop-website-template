<?php
include_once 'db.php';
include_once 'header.php';
$count=0;
?>
<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
<h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Featured Products</span></h2>
<div class="row px-xl-5">
<?php 
$sql="SELECT * FROM product";
$execute=$conn->query($sql);
$_SESSION["qty"]=1;
while($Data=$execute->fetch_assoc()){

?>
    
        
        
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src=<?php echo $Data["Photo"];?> alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="productdetail.php?PID=<?php echo $Data["Id"];?>"><i class="fa fa-shopping-cart"></i></a>
                            
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href=""><?php echo $Data["Name"]; ?></a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5><?php echo $Data["Price"]; ?> L.E</h5>
                        </div>
                        
                    </div>
                </div>
            </div>
        
    

<!-- Products End -->
<?php

}
?>
        </div>
</div>

<?php
include_once 'footer.php';
?>
