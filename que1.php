
<html>
<head>
    <style>
        .bg
        {
            background-color: white;
        }
        .dd
        {
            margin:auto;
            width:40%;
            border:1px;
            padding:30px;
            background-color:rgb(162, 216, 12);
            
            
            
        }
    </style>
	<script type="text/javascript">
		function validation()
		{
			            name=document.getElementById("name").value;
                        age=document.getElementById("age").value;
                        address=document.getElementById("addr").value;
                        age=document.getElementById("tno").value;
                        tn=document.getElementById("tnam").value;
                        date=document.getElementById("dat").value;
                         email=document.getElementById("txtemail").value; 
                         password=document.getElementById("txtpassword").value;
                         conpassword=document.getElementById("txtconpassword").value;

			if(name=="")
			{
				window.alert("Please enter name");
				document.getElementById("name").focus();
				return false;
			}
            if(ag=="")
			{
				window.alert("Please enter age");
				document.getElementById("age").focus();
				return false;
			}
                         if(address=="")
			{
				window.alert("Please enter address");
				document.getElementById("addr").focus();
				return false;
			}
                         if(trainno=="")
			{
				window.alert("Please enter train no");
				document.getElementById("tno").focus();
				return false;
			}
                        if(isNaN(age))
                        {
                            window.alert("Please enter numeric value for age");
                            document.getElementById("age").focus();
                            return false;
                        }
                          if(isNaN(trainno))
                        {
                            window.alert("Please enter numeric value fro train number");
                            document.getElementById("tno").focus();
                            return false;
                        }
                        if(date="")
                        {
                            window.alert("enter date")
                            document.getElementById("dat").focus();
                            return false;

                        }
                        if(email=="") 
                        { 
                            window.alert("Enter email"); 
                            document.getElementById("txtemail").focus(); 
                            return false; 
                        } 
                        if(email!="")
                        {
                            atpos=email.indexOf("@");
                            dotpos=email.lastIndexOf("."); 
                            if((atpos<1) || (dotpos-atpos)<2 || (dotpos+2>=email.length)) 
                            { 
                                window.alert("Please enter correct email id"); 
                                document.getElementById("txtemail").focus(); 
                                return false; 
                            }
                        }
                        if(password=="")
                        {
                            window.alert("Enter password");
                            document.getElementById("txtpassword").focus();
                            return false; 
                        } 
                        if(password!="") 
                        { 
                            if(password.length<5 || password.length>10) 
                            { 
                                window.alert("Password length should between5 and 10"); 
                                document.getElementById("txtpassword").focus(); 
                                return false; 
                            }
                        }
                        if(password!=conpassword) 
                        { 
                            window.alert("Password & Confirm Password Doesn't Match"); 
                            document.getElementById("txtpassword").focus(); 
                            return false;
                        }
                     
                        
			return true;
		}
	</script>
</head>
<body class="bg"><center>
        <center><h1>RAILWAY TICKET RESERVATION</h1></center>
        <DIV CLASS="dd">
	<form onSubmit="return validation()" action="" method="POST">
            Name :<input type="text" name="name" id="name"><br><br> 
            Age:<input type="text" name="age" id="age"><br><br>
            Gender:Male<input type="radio" name="gender" value="Male" required="">&nbsp&nbsp Female<input type="radio" name="gender" value="Female"><br>
            Train No:<input type="text" name="tno" id="tno"><br><br>
            Address:<textarea rows="5" cols="10" name="addr" id="addr"></textarea><br><br>
            Train Name :<input type="text" id="tnam"><br><br>
            Date:<input type="date" name="dat" id="dat"><br><br>
		    Email:<input type="text" name="eemail" id="txtemail"> <br><br>
            Password<input type="password" name="epassword" id="txtpassword"> <br><br>
            Confirm Password:<input type="password"  id="txtconpassword"> <br><br>
		<input type="submit" value="Submit" name="sub">&nbsp&nbsp <input type="reset" value="Reset">
        </form></div></center>
</body>
</html>

<?php
$con= mysqli_connect("localhost","root","","railway") or die("Couldn't connect ot server". mysqli_connect_error());
if(isset($_POST['sub']))
{
    $name=$_POST['name'];
    $tno=$_POST['tno'];
    $date=$_POST['dat'];
    
    $q="insert into tick(name,tno,date) values('$name',$tno,'$date')";
    $x=mysqli_query($con,$q);
    print($x);
    if($x>0)
        echo "<script>alert('success');</script>";
    else
        echo "fail";

        $q="select *from tick";
        $x=mysqli_query($con,$q);
        if(mysqli_num_rows($x)>0)
        {
           echo "<table border='1'><tr><th>";
           echo "Name</th><th>train no</th><th>date</th></tr>";
           while($row=mysqli_fetch_array($x))
           {
               echo "<tr>";
               echo "<td>",$row['name'],"</td><td>",$row['tno'],
               "</td><td>",$row['date'],"</td></tr>";
               }
        }
        
    mysqli_close($con);    

}     
?>