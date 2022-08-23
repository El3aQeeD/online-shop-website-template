<?php
session_start();
include_once 'db.php';
$PID=$_REQUEST["PID"];



if(isset($_SESSION["UserId"])){
$UserId=$_SESSION["UserId"];

$sql2="INSERT into user_product (BId,PId,Qty) Values ($UserId,$PID,$_SESSION[qty])";
$execute2=$conn->query($sql2);

}


if(isset($_SESSION["UserId"])){
    $sql="SELECT * FROM user_product WHERE BId=".$_SESSION["UserId"];
    $row=$conn->query($sql);
    echo $row->num_rows;
    }
    else
    {
        echo "0";
    }


?>