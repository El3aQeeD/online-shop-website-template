<?php

include_once 'db.php';
include_once 'header.php';

$UserId=$_SESSION["UserId"];
?>

<?php
            $PID=$_REQUEST["PID"];
            $sql="SELECT * FROM product WHERE Id=$PID";
            $execute=$conn->query($sql);
            $Data=$execute->fetch_assoc();

            ?>
    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src=<?php echo $Data["Photo"];?> alt="Image">
                        </div>
                
                </div>
            </div>
            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3><?php echo $Data["Name"];?></h3>

                    <h3 class="font-weight-semi-bold mb-4"><?php echo $Data["Price"];?> L.E</h3>

                    <div class="d-flex mb-3">
                        <strong  class="text-dark mr-3">Sizes:</strong>
                        <form>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="size-1" name="size">
                                <label class="custom-control-label" for="size-1">XS</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="size-2" name="size">
                                <label class="custom-control-label" for="size-2">S</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="size-3" name="size">
                                <label class="custom-control-label" for="size-3">M</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="size-4" name="size">
                                <label class="custom-control-label" for="size-4">L</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="size-5" name="size">
                                <label class="custom-control-label" for="size-5">XL</label>
                            </div>
                        </form>
                    </div>
                    
                    <div  class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">

                            <div class="input-group-btn">

                            
                                <button type="button" onclick="decreaseqty(<?php echo $_SESSION['qty']; ?>)" class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                    
                                </button>
                               
                            
                            </div>
                            <input type="text" name="qty" class="form-control bg-secondary border-0 text-center" value="<?php echo $_SESSION["qty"]; ?>">
                           
                            <div class="input-group-btn">
                                
                                    
                                <button type="button" onclick="increaseqty(<?php echo $_SESSION['qty']; ?>)" class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                               
                            </div>
                            
                        </div>
                        <script>
                            function decreaseqty(qty){
                                var xmlhttp = new XMLHttpRequest();
                                    xmlhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        document.getElementById("num").innerHTML = this.responseText;
                                    }
                                    };
                                    xmlhttp.open("GET","decreasecart.php?QTY="+qty,true);
                                    xmlhttp.send();
                                    
                            }
                            function increaseqty(qty){
                                var xmlhttp = new XMLHttpRequest();
                                    xmlhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        document.getElementById("num").innerHTML = this.responseText;
                                    }
                                    };
                                    xmlhttp.open("GET","increasecart.php?QTY="+qty,true);
                                    xmlhttp.send();
                                    
                            }
                        </script>

                        <button class="btn btn-primary px-3" type="button" onclick="showUser(<?php echo $PID; ?>)" ><i class="fa fa-shopping-cart mr-1"></i> Add To
                            Cart
                            </button>
                            <script>

                            function showUser(PID) {
                                
                                    var xmlhttp = new XMLHttpRequest();
                                    xmlhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        document.getElementById("num").innerHTML = this.responseText;
                                    }
                                    };
                                    xmlhttp.open("GET","usercart.php?PID="+PID,true);
                                    xmlhttp.send();
                                }
                                
                                </script>

                            
                            

                            
                            
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Product Description</h4>
                            <p><?php echo $Data["Description"];?></p>
                        </div>

                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->
<?php
include_once 'footer.php';
?>