<?php
session_start();
include_once 'db.php';

$paymentmethod=$_REQUEST["payment"];

$Extraaddresss=$_REQUEST["address"];
$Total=$_REQUEST["Total"];


$sql="INSERT INTO myorder (BId,TotalPaymentAmount,PaymentMethodId,ShipmentExtraAddress) VALUES (".$_SESSION["UserId"].",".$Total.",".$paymentmethod.",'$Extraaddresss')";
//echo $sql;
$execute=$conn->query($sql);
$lastId=$conn->insert_id;

$sql="SELECT * FROM user_product WHERE BId=".$_SESSION["UserId"];
$execute=$conn->query($sql);
while($Data=$execute->fetch_assoc())
{
                $sql2="SELECT * FROM product WHERE Id=".$Data["PId"];
                $execute2=$conn->query($sql2);
                $Data2=$execute2->fetch_assoc();
                $totproductPrice= $Data["Qty"] * $Data2["Price"];
    $sql3="INSERT INTO orderdetails (OId,PId,Qty,PriceOfBuy) VALUES ($lastId,".$Data["PId"].",".$Data["Qty"].",".$totproductPrice.")";
    $execute3=$conn->query($sql3);
}

$sql="SELECT * FROM user_product WHERE BId=".$_SESSION["UserId"];
$execute=$conn->query($sql);
while($Data=$execute->fetch_assoc())
{
    $sql2="DELETE FROM user_product WHERE BId=".$_SESSION["UserId"];
    $execute2=$conn->query($sql2);
}
header("location:index.php");
?>