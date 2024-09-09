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
    include "menu.html";

    include "../shared/connection.php";
    $query = mysqli_query($conn, "select * from product where owner='$_SESSION[userid]' ");

    echo "<h2>My products</h2>";

    while ($dbrow = mysqli_fetch_assoc($query)) {
        echo "<div class='card'>
                <div class='name'>$dbrow[name]</div>
                    <div class='price'>Rs. $dbrow[price]/-</div>
                        <div>
                        <img src='$dbrow[impath]' class='imgSrc'>
                        </div>
                        <div class='detail'>$dbrow[detail]</div>
                        <div>
                            <a href='edit.php?pid=$dbrow[pid]'>
                                <button class='btn btn-warning'>Edit</button>
                            </a>
                            <a href='delete.php?pid=$dbrow[pid]'>
                                <button class='btn btn-warning'>Delete</button>
                            </a>
                        </div>
                    </div>";
    }
?>

<style>
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
        color:white;
        text-align:center;
        background-color:gray;
        padding:10px;
    }
</style>

</body>
</html>
