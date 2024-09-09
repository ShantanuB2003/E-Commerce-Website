<?php
    session_start();
    $target="../shared/images/".$_FILES['pdtimg']['name'];
    move_uploaded_file($_FILES['pdtimg']['tmp_name'],$target);
    $conn=new mysqli("localhost","root","","projectdatabase",3306);
    $r=mysqli_query($conn,"insert into product(name,price,detail,impath,owner) values('$_POST[product_name]','$_POST[product_price]','$_POST[product_details]','$target','$_SESSION[userid]')");
    header("location: home.php");
?>