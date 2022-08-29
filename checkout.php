<?php
include_once 'db.php';
include_once 'header.php';
?>
<!-- Checkout Start -->
<form method="POST" action="docheckout.php">
<div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Detialed Address</label>
                            <input class="form-control" type="text" placeholder="Street Name" name="address" required>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Products</h6>
                        
                        <?php 
                        $subtotal=0;
            $sql="SELECT * FROM user_product WHERE BId=".$_SESSION["UserId"];
            $execute=$conn->query($sql);
            while($Data=$execute->fetch_assoc()){
                $sql2="SELECT * FROM product WHERE Id=".$Data["PId"];
                $execute2=$conn->query($sql2);
                $Data2=$execute2->fetch_assoc();
            ?>
                        <div class="d-flex justify-content-between">
                            <p><?php echo $Data2["Name"]; ?></p>
                            <p><?php echo  $total=$Data2["Price"]*$Data["Qty"]; $subtotal+=$total; ?> L.E</p>
                        </div>

                        
                    
                    <?php
                    }
                ?>
                </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6><?php echo $subtotal;  ?> L.E</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">10 L.E</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5><?php echo $subtotal+10;  ?> L.E</h5>
                        </div>
                    </div>
                </div>
                
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal" value="1" required>
                                <label class="custom-control-label" for="paypal">Cash on delivery</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck" value="2" required>
                                <label class="custom-control-label" for="directcheck">Visa</label>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-block btn-primary font-weight-bold py-3" >Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input value="<?php echo $subtotal+10;  ?>" name="Total" hidden> 
    </form>
    <!-- Checkout End -->