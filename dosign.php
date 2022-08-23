<?php
session_start();
include_once 'db.php';
$name=$_REQUEST["name_us"];
$phone=$_REQUEST["phone_us"];
$address=$_REQUEST["address_us"];
$email=$_REQUEST["emauil_us"];
$password=$_REQUEST["pass_us"];
$conpass=$_REQUEST["conf_pass_us"];
if($phone != 1)
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
else
{
    
    $sql="SELECT * FROM user where Email='$email' AND Password='$password'";
    
    $Execute=$conn->query($sql);
    
    if($row=$Execute->num_rows>0){
        $DataUser=$Execute->fetch_assoc();
        $_SESSION["error"]=0;
        $_SESSION["UserId"]=$DataUser["Id"];
        header('location:index.php');
    }
    else
    {
        $_SESSION["error"]=1;
        header('location:sign.php');
    }
    

}

?>