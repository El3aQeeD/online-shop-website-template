<?php
session_start();
include_once 'db.php';
$PID=$_REQUEST["PID"];


echo $PID;
if(isset($_SESSION["UserId"])){
$UserId=$_SESSION["UserId"];
if($_REQUEST["F"]==0)
{
    $sql2="UPDATE user_product set Qty = $_REQUEST[QTY]-1  WHERE BId=$UserId and PId=$PID ";
    $execute2=$conn->query($sql2);    
}
if($_REQUEST["F"]==1)
{
$sql2="UPDATE user_product set Qty = $_REQUEST[QTY]+1  WHERE BId=$UserId and PId=$PID ";
$execute2=$conn->query($sql2);
}
}
?>