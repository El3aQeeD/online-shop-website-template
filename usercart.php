<?php
session_start();
include_once 'db.php';
$PID=$_REQUEST["PID"];
$UserId=$_SESSION["UserId"];
if(isset($_SESSION["UserId"])){
    $sql="SELECT * FROM user_product WHERE PId=$PID and BId=".$_SESSION["UserId"] ;
    $row=$conn->query($sql);
    $q=$row->fetch_assoc();
   
    }
    else
    {
        echo "0";
    }

if($row->num_rows==0)
{
if(isset($_SESSION["UserId"])){


$sql2="INSERT into user_product (BId,PId,Qty) Values ($UserId,$PID,$_SESSION[qty])";
$execute2=$conn->query($sql2);

}
}
else{
    $sql4="UPDATE user_product set Qty = $_SESSION[qty]+$q[Qty]  WHERE BId=$UserId and PId=$PID ";
    $execute4=$conn->query($sql4);   
}
$sql6="SELECT * FROM user_product WHERE BId=".$_SESSION["UserId"] ;
    $row6=$conn->query($sql6);
    echo $row6->num_rows;

?>