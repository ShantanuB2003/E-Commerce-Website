<?php
    $pid=$_GET['pid'];
    echo "
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'></script>
    <div class='d-flex  vh-100 align-items-center justify-content-center'>
        <form action='editCon.php?pid=$pid' method='post' class='border border-primary p-4 rounded bg-warning' enctype='multipart/form-data'>
            <h2 class='text-center'>Edit</h2>
            <input class='form-control mt-3' type='text' placeholder='Product name' name='pname' required>
            <input class='form-control mt-3' type='number' placeholder='Product price' name='pprice' required>
            <input class='form-control mt-3' type='file' accept='.jpg,.png,.pdf' placeholder='Image' name='pimg' required>
            <input class='form-control mt-3' type='text' placeholder='Product detail' name='detail' required>
            <div class='d-flex justify-content-center mt-3'>
                <button class='btn btn-success'>Save</button>
                <a href='view.php' class='btn border-dark'>Cancel</a>
            </div>
        </form>
    </div>";
?>
   