<?php
include_once 'db.php';
include_once 'header.php';
if(isset($_SESSION["UserId"]))
{
    
}
else
{
    header("location:sign.php");
}


?>
<!-- Cart Start -->
<div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <?php 
                    $sql="SELECT * FROM user_product where BId = '$_SESSION[UserId]'";
                    $execute=$conn->query($sql);
                    while($Data=$execute->fetch_assoc()){
                        $sql2="select * from product where Id= $Data[PId]";
                        $execute2=$conn->query($sql2);
                        $Data2=$execute2->fetch_assoc()
                    ?>
                    <tbody class="align-middle">
                        <tr>
                            <td class="align-middle"><img src=<?php echo $Data2["Photo"] ?> alt="" style="width: 50px;"> <?php echo $Data2["Name"] ?></td>
                            <td class="align-middle"><?php echo $Data2["Price"]."L.E" ?></td>
                            
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value=<?php $sql3="select * from user_product where PId=$Data2[Id] and BId=$_SESSION[UserId]"; $execute3=$conn->query($sql3); $Data3=$execute3->fetch_assoc(); echo $Data3["Qty"];  ?>>
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle"><?php echo $Data3["Qty"]*$Data2["Price"]."L.E";  ?></td>
                            <td class="align-middle"><button type="button" onclick="remove(<?php echo $Data2['Id']?>)"  class="btn btn-sm btn-danger"><i class="fa fa-times"></i> </button></td>
                            <script>
                            function remove(Id)
                            {
                                var xmlhttp = new XMLHttpRequest();
                                    xmlhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        document.getElementById("refresh").innerHTML = this.responseText;
                                        
                                        
                                    }
                                    };
                                    xmlhttp.open("POST","removeitem.php?PID="+Id,true);
                                    xmlhttp.send();
                                    autoRefresh();
                                    function autoRefresh() {
                                            window.location = window.location.href;
                                        }
                                        setInterval('autoRefresh()', 5000);
                            }
                            </script>
                        </tr>
                    </tbody>
                    <?php
                    }
                    ?>
                </table>
            </div>
            <div class="col-lg-4">
                
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>$150</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>$160</h5>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
<?php
include_once 'footer.php';
?>
