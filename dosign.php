<?php
session_start();

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
        $_SESSION["error"]=0;
        header("location:adduser.php?error=".$_SESSION["error"]."&name=".$name."&phone=".$phone."&address=".$address."&email=".$email."&password=".$password);
    }
    else
    {
        $_SESSION["error"]=1;
        header("location:sign.php?error=".$_SESSION["error"]);
    }
}

?>