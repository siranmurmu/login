<?php
$dbcon=mysqli_connect("localhost","root","","test_login1");
$id=$_GET['id'];

$del="DELETE FROM users WHERE id='$id'";
$dbcon->query($del);
header("location: admin_home.php");
?>