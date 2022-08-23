<?php

include_once 'db.php';
$name=$_REQUEST["name"];
$phone=$_REQUEST["phone"];
$address=$_REQUEST["address"];
$email=$_REQUEST["email"];
$password=$_REQUEST["password"];

$sql="INSERT INTO user (FullName,Address,PhoneNumber,UserTypeId,Email,Password) VALUES ('$name','$address','$phone',1,'$email','$password')";
$conn->query($sql);
//echo $conn->insert_id;
header('location:sign.php');
?>