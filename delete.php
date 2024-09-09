<?php

session_start();

if ($_SESSION["login_status"] == false) {
    echo "Unauthorized access";
    die;
}
if ($_SESSION['usertype'] != 'Vendor') {
    echo "Forbidden access";
    die;
}

    $pid=$_GET['pid'];

    echo "<h1>$pid</h1>";
    include "../shared/connection.php";
    mysqli_query($conn,"delete from product where pid=$pid");
    header("location:view.php");
?>