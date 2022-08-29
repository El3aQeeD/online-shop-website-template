<?php
session_start();
include_once 'db.php';

$paymentmethod=$_REQUEST["payment"];

$Extraaddresss=$_REQUEST["address"];
$Total=$_REQUEST["Total"];


$sql="INSERT INTO myorder (BId,TotalPaymentAmount,PaymentMethodId,ShipmentExtraAddress) VALUES (".$_SESSION["UserId"].",".$Total.",".$paymentmethod.",'$Extraaddresss')";
//echo $sql;
$execute=$conn->query($sql);
header("location:index.php");
?>