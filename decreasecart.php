<?php
session_start();
include_once 'db.php';

if($_SESSION["qty"]!=1){
$_SESSION["qty"]--;

}

/*if(isset($_SESSION["UserId"])){
    $sql="UPDATE user_product SET Qty=[] WHERE PId=$PID and BId=$_SESSION[UserId]";
    $row=$conn->query($sql);
    echo $row->num_rows;
    }
    else
    {
        echo "0";
    }
*/




?>