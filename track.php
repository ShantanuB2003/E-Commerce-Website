<?php
session_start();

if ($_SESSION["login_status"] == false) {
    echo "Unauthorized access";
    die;
}
if ($_SESSION['usertype'] != 'Customer') {
    echo "Forbidden access";
    die;
}

include "menu.html";


include '../shared/connection.php';
$query = mysqli_query($conn, "SELECT * FROM product JOIN orders ON orders.pid = product.pid WHERE orders.userid = '$_SESSION[userid]' ");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Orders</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'></script>
    <style>
        body {}
        h3 {
            display: inline-block;
        }
        .payment {
            background-color: yellow;
            padding: 20px;
            display: inline-block;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            position: fixed;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
        }
        .card {
            padding: 10px;
            display: inline-block;
            margin: 20px 20px 20px 20px;
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
        .detail {
            margin-top: 10px;
            margin-bottom: 10px;
            max-height: 70px;
            min-height: 70px;
            overflow: auto;
        }
        h2 {
            text-align: center;
            padding: 10px;
            color: white;
            background-color: #424242;
        }
    </style>
</head>
<body>
    <h2>Orders</h2>
    <?php
    while ($dbrow = mysqli_fetch_assoc($query)) {
        $query2 = mysqli_query($conn, "SELECT confirmed FROM orders WHERE orderid = $dbrow[orderid]");
        $dbrow2 = mysqli_fetch_assoc($query2);
        $confirmationText = $dbrow2['confirmed'] == 1 ? 'Confirmed' : 'Not confirmed yet';
        $disabled = $dbrow2['confirmed'] == 1 ? 'disabled' : '';
        ?>
        <div class='p-2 border-bottom d-inline-block'>
            <div class='card'>
                <div class='name'><?php echo $dbrow['name']; ?></div>
                <div class='price'>Rs. <?php echo $dbrow['price']; ?>/-</div>
                <div><img src='<?php echo $dbrow['impath']; ?>' class='imgSrc'></div>
                <div class='detail'><?php echo $dbrow['detail']; ?></div>
                <button <?php echo $disabled; ?> class='btn btn-warning' id='cbtn'><?php echo $confirmationText; ?></button>
            </div>
        </div>
    <?php
    }
    ?>
</body>
</html>