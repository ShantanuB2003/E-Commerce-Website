<?php

$uname=$_POST['username'];
$upass=$_POST['password'];
$utype=$_POST['usertype'];

echo "Received username = $uname";
echo "<br>Received password = $upass";
echo "<br>Received usertype=$utype";

$conn=new mysqli("localhost","root","","ProjectDatabase",3306);
$cipher_password=md5($upass);

$query="insert into user(username,password,usertype) values ('$uname','$cipher_password','$utype')";
echo "<br>Running query=$query";
mysqli_query($conn,$query);
?>