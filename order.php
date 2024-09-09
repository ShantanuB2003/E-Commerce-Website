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

include "menu.html";

include "../shared/connection.php";
$query = mysqli_query($conn, "SELECT * FROM product JOIN orders ON product.pid = orders.pid");

echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'></script>";

echo "<h2 id='orders'>My orders</h2>";



while ($dbrow =mysqli_fetch_assoc($query)) {
    $query2 = mysqli_query($conn, "SELECT  * FROM user WHERE userid = '{$_SESSION['userid']}'");
    $username_row = mysqli_fetch_assoc($query2);
    $confirmationButtonHtml = "";
    $disabled = "";
    
    if ($dbrow['confirmed'] == 1) {
        $confirmationButtonHtml = "Confirmed";
        $disabled = "disabled";
    } else {
        $confirmationButtonHtml = "Confirm order";
    }

    echo "<div class='card'>
            <div class='d-flex'>
            </div>
            <div class='name'>$dbrow[name]</div>
            <div class='price'>Rs. $dbrow[price]/-</div>
            <div>
                <img src='$dbrow[impath]' class='imgSrc'>
            </div>
            <div class='detail'>$dbrow[detail]</div>
            <a href='confirm.php?oid=$dbrow[orderid]'>
                <button class='btn btn-success' id='cbtn' $disabled>$confirmationButtonHtml</button>
            </a>
          </div>";
}

echo "<style>
    #orders {
        text-align:center;
        padding:10px;
        color:white;
        background-color:gray;
    }
    .card {
        padding:10px;
        display: inline-block;
        margin: 20px 20px 30px 20px;
        width: 200px;
        height: 450px;
        text-align: center;
        background-color: red;
        border-radius: 10px;
        color: white;
    }
    .name {
        font-size: 20px;
    }
    .price {
        color: chartreuse;
    }
    .imgSrc {
        height: 200px;
        width: 180px;
    }
    .detail {
        margin-top:10px;
        margin-bottom:10px;
        max-height:70px;
        min-height:70px;
        overflow:auto;
    }
    h2 {
        color:white;
        text-align:center;
        background-color:gray;
        padding:10px;
    }
</style>";

?>