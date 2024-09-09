<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    

<?php
    session_start();
    if($_SESSION["login_status"]==false){
        echo "unauthorized access";
        die;
    }
    if($_SESSION['usertype']!='Customer'){
        echo "firbitten access";
        die;
    }
    include "menu.html";

    echo "<h2>My cart</h2>";

    include "../shared/connection.php";
    $query = mysqli_query($conn, "select * from cart join product on cart.pid=product.pid where cart.userid='$_SESSION[userid]' ");
    $total=0;
    while ($dbrow = mysqli_fetch_assoc($query)) {
        $total=$total+$dbrow['price'];
        echo "<div class='card'>
        <div class='name'>$dbrow[name]</div>
            <div class='price'>Rs. $dbrow[price]/-</div>
                <div>
                <img src='$dbrow[impath]' class='imgSrc'>
                </div>
                <div class='detail'>$dbrow[detail]</div>
                <a href='deleteCart.php?cartid=$dbrow[cartid]'>
                    <button class='btn btn-success'>Remove</button>
                </a>
            </div>";
            if (!isset($_SESSION['pid'])) {
                $_SESSION['pid'] = $dbrow['pid'];
            }
    }
    $query2=mysqli_query($conn, "select * from cart join product on cart.pid=product.pid where cart.userid='$_SESSION[userid]' ");
    $dbrow=mysqli_fetch_assoc($query2);
    if($total!=0){
    echo "<div class='payment'> 
                <h3>Total : $total/-</h3>
                <a href='pay.php?cartid=$dbrow[cartid]'>
                    <button class='btn btn-success btn-lg' id='paybtn'>Pay</button>

                </a>
        </div>";
    }
?>

<style>
    body{
    }
    h3{
        display:inline-block;
    }
    .payment{
        background-color:yellow;
        padding:20px;
        display:inline-block;
        border-top-left-radius:10px;
        border-top-right-radius:10px;
        position:fixed;
        bottom:0;
        left:50%;
        transform:translateX(-50%);
        z-index:10;
    }
    .card {
        padding:10px;
        display: inline-block;
        margin: 20px 20px 30px 20px;
        width: 200px;
        height: 400px;
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
    .detail{
        margin-top:10px;
        margin-bottom:10px;
        max-height:70px;
        min-height:70px;
        overflow:auto;
    }
    h2{
        text-align:center;
        padding:10px;
        color:white;
        background-color:#424242;
    }
</style>

</body>
</html>

