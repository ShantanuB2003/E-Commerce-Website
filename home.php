<?php
    session_start();
    if($_SESSION['login_status']==false){
        echo "unauthorized access";
        die;
    }
    if($_SESSION['usertype']!='Vendor'){
        echo "firbitten access";
        die;
    }
    include "menu.html";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class=" vh-100 d-flex justify-content-center align-items-center">
        <form class="border bg-success form-control w-50 p-4" action="uploaded.php" method="post" enctype="multipart/form-data">
            <h2 required class="text-center font-weight-bold">Add product</h2>
            <input required class="form-control mt-2" type="text" name="product_name" placeholder="Product name">
            <input required class="form-control mt-2" type="number" name="product_price" placeholder="Product price">
            <textarea required class="form-control mt-2" name="product_details" rows="5" placeholder="Product details"></textarea>
            <input required class="form-control mt-2" type="file" name="pdtimg" accept=".jpg,.png,.pdf">
            <button class="form-control mt-2 btn btn-warning">Add product</button>
        </form>
    </div>
</body>
</html>