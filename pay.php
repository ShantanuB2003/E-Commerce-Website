<?php
session_start();
$_SESSION['payment'] = 1;

if ($_SESSION["login_status"] == false) {
    echo "unauthorized access";
    die;
}
if ($_SESSION['usertype'] != 'Customer') {
    echo "forbidden access";
    die;
}


include "../shared/connection.php";

// Fetch all cart items associated with the user
$userid = $_SESSION['userid'];
$query = mysqli_query($conn, "SELECT * FROM cart WHERE userid = '$userid' ");

while ($cartItem = mysqli_fetch_assoc($query)) {
    $cartid = $cartItem['cartid'];
    $pid = $cartItem['pid'];
    
    // Insert each cart item into orders table
    mysqli_query($conn, "INSERT INTO orders (userid, pid) VALUES ('$userid', '$pid')");
    
    // Delete cart item after inserting into orders
    mysqli_query($conn, "DELETE FROM cart WHERE pid = $pid");
}

echo "
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'></script>

<div class='car'>
    <h2>Payment successful!</h2>
    <h4>Track order for more details...</h4>
    <a href='track.php'>
        <button class='btn btn-success'>Track order</button>
    </a>
</div>

<style>
    h4 {
        display: inline-block;
        margin-top: 100px;
    }

    h2 {
        display: inline-block;
        color: green;
    }

    body {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
    }

    .car {
        display: flex;
        flex-direction: column;
        align-items: center;
        z-index: 100;
        height: 100vh;
        width: 500px;
        background-color: red;
    }
</style>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script>alert("Your order will get confirmed my owner and deliver to you shortly");</script>

</body>
</html>