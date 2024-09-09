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

    $oid=$_GET['oid'];
    include "../shared/connection.php";
echo $oid;
    mysqli_query($conn,"update orders set confirmed=1 where orderid=$oid");
    header("location:order.php");
?>