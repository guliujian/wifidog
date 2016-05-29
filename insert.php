<?php 
$host="127.0.0.1";
$db_user="root";
$db_pass="glj1234@!";
$db_name="radius";
$con=mysqli_connect($host,$db_user,$db_pass,$db_name);
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}

header("Content-Type: text/html; charset=utf-8");
$phone=$_GET['phone'];
$password=base64_decode($_GET['pas']);
$sql="INSERT INTO `radcheck` (`username`, `attribute`, `op`, `value`) VALUES ('$phone', 'Cleartext-Password', ':=', '$password')";
$result = mysqli_query($con, $sql);
if(!result){
    echo false;
}else {
    echo  true;
}
