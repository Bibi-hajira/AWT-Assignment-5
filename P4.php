<!DOCTYPE html>
<html>
<head>
	<title>Program 3</title>
<style>
	.a{
		background-color:grey;
		color:white;
		font-size:15px;
		font-family:bold;
		border-radius:10px;
		height:25px;
		
	}
	
</style>
</head>
<body>
<form method="post" enctype="multipart/form-data" action="P4.php">
<table border="2">
<tr>
	<th colspan="2" bgcolor="grey" style="color:red;">Passport Form</th>
</tr>
<tr>
	<th>Enter Passport Number</th>
	<td><input type="number" name="num" required></td>
</tr>
<tr>
	<th>Enter First Name</th>
	<td><input type="text" name="fname" required></td>
</tr>
<tr>
	<th>Enter Middle Name</th>
	<td><input type="text" name="mname" required></td>
</tr>
<tr>
	<th>Enter Last Name</th>
	<td><input type="text" name="lname" required></td>
</tr>
<tr>
	<th>Enter DOB</th>
	<td><input type="date" name="fdob" required></td>
</tr>
<tr>
	<th>Enter Nationality</th>
	<td><input type="text" name="nation" required></td>
</tr>
<tr>
	<th>Enter Address</th>
	<td><input type="text" name="address" maxsize="50" required></td>
</tr>
<tr>
	<th>Select Gender</th>
	<td><input type="radio" name="gender" value="male">Male
	<input type="radio" name="gender" value="female">Female
	<input type="radio" name="gender" value="other">Other</td>
</tr>
<tr>
	<th>Upload Photo</th>
	<td><input type="file" name="photo"  required></td>
</tr>
<tr>
	
	<td colspan="2"><center><input class="a" type="submit" name="submit" value="Submit"> <input class="a" type="submit" name="update" value="Update"> </center></td>
</tr>
</table>

</form>
<form method="post">
	<br>
Do you want to delete a record? 
	<input class="a" type="submit" name="yes" value="Yes"> <input class="a" type="submit" name="no" value="No">
				
</form>

<?php
$pno=0;
$fname=" ";
$mname=" ";
$lname=" ";
$dob=" ";
$nationality=" ";
$address=" ";
$gender=" ";

if(isset($_POST['submit']))
{
$mysql=new mysqli("localhost","root","","shreya");
if(!$mysql) 
{
	die("ERROR!!!");
}



$pno=$_POST['num'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$dob=$_POST['fdob'];
$nationality=$_POST['nation'];
$address=$_POST['address'];
$gender=$_POST['gender'];
$ffname=" ";
if(!empty($_FILES["photo"]["name"]))
{
	
	 $filepath="image2/" .$_FILES["photo"]["name"];
	move_uploaded_file($_FILES["photo"]["tmp_name"],$filepath);
	$sql="INSERT INTO p4(pno,fname,mname,lname,dob,nationality,address,gender,img)values($pno,'$fname','$mname','$lname','$dob','$nationality','$address','$gender','$filepath')";
	
	if(mysqli_query($mysql,$sql))
	{
		
		echo"Record inserted Successfully";
	
	}
	else
	{
		echo" Insertion failed!!!";
	}

	
}
}

?>

<?php
$pno=0;
$fname=" ";
$mname=" ";
$lname=" ";
$dob=" ";
$nationality=" ";
$address=" ";
$gender=" ";

if(isset($_POST['update']))
{
$mysql=new mysqli("localhost","root","","shreya");
if(!$mysql) 
{
	die("ERROR!!!");
}



$pno=$_POST['num'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$dob=$_POST['fdob'];
$nationality=$_POST['nation'];
$address=$_POST['address'];
$gender=$_POST['gender'];
$ffname=" ";
if(!empty($_FILES["photo"]["name"]))
{
	
	 $filepath="image2/" .$_FILES["photo"]["name"];
	move_uploaded_file($_FILES["photo"]["tmp_name"],$filepath);
	
	
	$sql="update p4 set pno=$pno,fname='$fname',mname='$mname',lname='$lname',dob='$dob',nationality='$nationality',address='$address',gender='$gender',img='$filepath' where pno=$pno";
	
	if(mysqli_query($mysql,$sql))
	{
		
		echo"Updation completed";
	}
	
	else
	{
		echo" No record exist in this passpost number!!!";
	}

	
}
}

?>

<?php
	if(isset($_POST['no']))
	{
		echo"Thank you!!!";
	}
?>

<?php
	if(isset($_POST['yes']))
	{
		echo"Enter Passport number that you want to delete";
		echo"<form method='post'> <br><input type='number' name='num1' required>
			<br><br><input type='submit' name='del' value='Delete'></form>";

	}	
?>

<?php 
$mysql=new mysqli("localhost","root","","shreya");
if(!$mysql) 
{
	die("ERROR!!!");
}

if(isset($_POST['del']))
{
	
	$pno=$_POST['num1'];
	
	$sql="delete FROM p4 where pno=$pno";

	if(mysqli_query($mysql,$sql)&& $mysql->affected_rows>0)
	
	{
		
		echo"Recored deleted";
		
				
				
						
	}
	else
	{
		echo" No record exist in this passpost number!!!";
	}

}
?>
</body>
</html>