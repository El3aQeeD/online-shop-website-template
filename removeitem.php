<?php
session_start();
include_once 'db.php';
$PID=$_REQUEST["PID"];



if(isset($_SESSION["UserId"])){
$UserId=$_SESSION["UserId"];

$sql2="Delete from user_product where PId=$PID and BId=$_SESSION[UserId]";
$execute2=$conn->query($sql2);

}