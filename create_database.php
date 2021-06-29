<?php
$con = new mysqli("localhost", "root","") or die("Coudn't connect to server".mysqli.error());
$cr="create database railway";
$x=mysqli_query($con,$cr);
if($x>0)
    echo"success";
else {
    echo "fail";
    
}
mysqli_close($con);
?>