<?php

session_start();

$_SESSION['login_status']=false;

$uname=$_POST['username'];
$upass=$_POST['password'];

$hostname="localhost";
$user="root";
$password="";
$dbname="projectdatabase";
$port=3306;

$conn=new mysqli($hostname,$user,$password,$dbname,$port);

$cipher_pwd=md5($upass);
$query="select * from user where username='$uname' and password='$cipher_pwd' ";

$sql_result=mysqli_query($conn,$query);



if(mysqli_num_rows($sql_result)>0)
{
    echo "<h1>Login success</h1>";
    $dbrow=mysqli_fetch_assoc($sql_result);
    

    $_SESSION['login_status']=true;
    $_SESSION['usertype']=$dbrow['usertype'];
    $_SESSION['userid']=$_dbrow['userid'];
    

    if($dbrow['usertype']=="Vendor")
    {
        header("location:../vendor/home.php");
    }
    elseif($dbrow['usertype']=="Customer")
    {
       echo $_SESSION['userid'];

        header("location:../customer/home.php");
    }
}
else
{
    echo "<br>";
    echo "<h1>Login failed</h1>";
}

?>