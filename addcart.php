<?php

$pid=$_GET['pid'];
session_start();
$_SESSION['userid'];

include "../shared/connection.php";

$sql_status=mysqli_query($conn,"insert into cart(userid,pid) values('$_SESSION[userid]',$pid)");

if($sql_status)
{
    echo "<h1>Product successfully added to cart</h1>";
}
else
{
    echo "<h1>Product not added to cart</h1>";
}
?>
