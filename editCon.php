<?php
    session_start();
    $pid=$_GET['pid'];
    $name=$_POST['pname'];               
    $price=$_POST['pprice'];   
    $target="../shared/images/".$_FILES['pimg']['name'];   
    move_uploaded_file($_FILES['pimg']['tmp_name'],$target);            
    $detail=$_POST['detail'];  
    include "../shared/connection.php";
    $re=mysqli_query($conn,"update product set name='$name',
                            price='$price',
                            impath='$target',
                            detail='$detail'
                            where pid=$pid");
    header("location:view.php");    
      ?>