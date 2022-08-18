<?php

$name=$_REQUEST["name_us"];
$phone=$_REQUEST["phone_us"];
$address=$_REQUEST["address_us"];
$email=$_REQUEST["emauil_us"];
$password=$_REQUEST["pass_us"];
$conpass=$_REQUEST["conf_pass_us"];
if(isset($phone))
{
    if($password==$conpass)
    {
        header("location:adduser.php");
    }
    else
    {
        header("location:sign.php?error=1");
    }
}

?>