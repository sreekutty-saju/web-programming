<?php
$con= mysqli_connect("localhost","root","","railway") or die("Coudn't connect ot server". mysqli_connect_error());
$t="create table tick(s_no int not null auto_increment,
         name varchar(25) not null,
         tno int, 
         date DATE  not null,
         primary key(s_no))";
$q=mysqli_query($con,$t);
if($q>0)
{
    echo "Success";
}
 else
{
echo "fail";    
}
mysqli_close($con)
?>