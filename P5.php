<!DOCTYPE html> 
<html>
<head>
	<title>Program 5</title>
</head>
<body>
<form method="post">
	<div class="container " style="box-shadow:5px 5px #beccc5;">
		<center><h1 style="text-decoration:underline;">ABC Bank</h1>
		<input type="submit" name="create" value="Create">&nbsp &nbsp
			<input type="submit" name="deposit" value="Deposit"><br><br>
			<input type="submit" name="withdraw" value="Withdraw">&nbsp&nbsp
			<input type="submit" name="enquiry" value="Balance Enquiry"><br><br></center>
	</div>
</form>

<?php 
  if(isset($_POST['create']))
  {
	echo"Welcome to ABC Bank";
	echo"Create your account";
	echo"<form method='post'>";
	echo"<table border='1'>
		<tr>
			<th>Enter account number</th>
			<td><input type='number' name='acc_num' required></td>
		</tr>
		<tr>
			<th>Enter your name</th>
			<td><input type='text' name='name' required></td>
		</tr>
		<tr>
			<th>Enter Address</th>
			<td><input type='text' name='address' required></td>
		</tr>
		<tr>
			<th>Enter type of account that you want </th>
			<td><select name='type'>
				<option>Basic Saving Account</option>
				<option>Salary Savings Account</option>
				<option>Senior Citizen Saving Accounts</option>
			</td>
		</tr>
		<tr>
			<th>Add minimum of Rs.500 to create account </th>
			<td><input type='number' name='bal' required></td>
		</tr>
		<tr>
			<td colspan='2'><input type='submit'>&nbsp<input type='reset' name='clear' value='Clear'></td>
		</tr>

	</table>
	</form>";
  }

?>
<?php 
  if(isset($_POST['create1']))
  {
	$accno=0;
	$name=" ";
	$address=" ";
	$type="";
	$bal=0;
	
	$mysql=new mysqli("localhost","root","","shreya");
	if(!$mysql) 
	{
		die("ERROR!!!");
	}

	$accno=$_POST['acc_num'];
	$name=$_POST['name'];
	$address=$_POST['address'];
	$type=$_POST['type'];
	$bal=$_POST['bal'];
	
		if($_POST['bal']<500)
			echo '<script>alert("To create account deposit minimun of Rs.500 ")</script>';
		else
		{
		$sql="INSERT INTO customer(accno,name,address,acc_type,balance)values($accno,'$name','$address','$type',$bal)";
		
		if(mysqli_query($mysql,$sql))
		{
		
			echo '<script>alert("Account created. ")</script>';
	
		}
		else
		{
		echo '<script>alert("Failed to create account!!! ")</script>';
		}	
		}
	
	
	}
?>

<?php
  if(isset($_POST['deposit']))
  {	
	echo"<form method='post'>";
	echo"Enter the account number";
	echo"<input type='number' name='acno' required><br><br>";
	echo"Enter amount to be deposited";
	echo"<input type='number' name='amt' required>";
	
	echo"<input type='submit' name='submit' value='OK'></form>";
  }
?>

<?php
  if(isset($_POST['submit']))
  {
	$mysql=new mysqli("localhost","root","","shreya");
	if(!$mysql) 
	{
		die("ERROR!!!");
	}
	
	$amt=$_POST['amt'];
	$acno=$_POST['acno'];

	$no=" select balance from customer where accno=$acno";
	$res=$mysql->query($no);
	$i=mysqli_num_rows($res);
	
	if($i>0)
	{
	
	while($row=$res->fetch_array())
	{
		$amt1=$row[0];
	}
	if($amt<0)
	{
		echo '<script>alert("Please enter correct amount")</script>';
	}
	else
	{
	$amt=$amt+$amt1;
	$newbal="update customer set balance=$amt where accno=$acno";
	if(mysqli_query($mysql,$newbal))
		{
		
			echo '<script>alert("Amount deposited.")</script>';
	
		}
		else
		{
		echo '<script>alert("Something went wrong!!! ")</script>';
		}	
		
	
	}
	}
	else
	{
		echo '<script>alert("No such account exists!!")</script>';
	}
	
}			
?>

<?php

  if(isset($_POST['withdraw']))
  {
	echo"<form method='post'>";
	echo"<br>Enter the account number";
	echo"<input type='number' name='acno' required><br><br>";
	echo"Enter amount to withdraw";
	echo"<input type='number' name='amt' required>&nbsp";
	
	echo"<input type='submit' name='submit1' value='OK'></form>";
  }
?>

<?php

if(isset($_POST['submit1']))
  {
	$mysql=new mysqli("localhost","root","","shreya");
	if(!$mysql) 
	{
		die("ERROR!!!");
	}
	
	$amt=$_POST['amt'];
	$acno=$_POST['acno'];

	$no=" select balance from customer where accno=$acno";
	$res=$mysql->query($no);
	$i=mysqli_num_rows($res);
	
	if($i>0)
	{
	
	while($row=$res->fetch_array())
	{
		$amt1=$row[0];
	}
	if($amt<0)
	{
		echo '<script>alert("Please enter correct amount")</script>';
	}
	else if($amt>$amt1)
	{
		echo '<script>alert("Insufficient amount")</script>';
	}
	else if($amt1-$amt<500)
	{
		echo '<script>alert("Maintain minimum of Rs.500")</script>';
	}
	else
	{
		$amt1=$amt1-$amt;
		$newbal="update customer set balance=$amt1 where accno=$acno";
	if(mysqli_query($mysql,$newbal))
		{
		
			echo '<script>alert("Amount withdrawal successfull.")</script>';
	
		}
		else
		{
		echo '<script>alert("Something went wrong!!! ")</script>';
		}	
		
	
	}
	}
	else
	{
		echo '<script>alert("No such account exists!!")</script>';
	}
	
}
?>	

<?php

  if(isset($_POST['enquiry']))
  {
	echo"<form method='post'>";
	echo"<br>Enter the account number";
	echo"<input type='number' name='acno' required><br><br>";
	echo"<input type='submit' name='submit2' value='OK'></form>";
  }
?>

<?php
  if(isset($_POST['submit2']))
  {
	$mysql=new mysqli("localhost","root","","shreya");
	if(!$mysql) 
	{
		die("ERROR!!!");
	}
	
	
	$acno=$_POST['acno'];

	$no=" select name,balance from customer where accno=$acno";
	$res=$mysql->query($no);
	$i=mysqli_num_rows($res);
	
	if($i>0)
	{
	while($row=$res->fetch_array())
	{
		$name1=$row[0];
		$balance=$row[1];
	}
	echo"<br><center><table>
		<tr>
		<th colspan='2'>Account Detail</th></tr>
		<tr>
		<td>Name</td>
		<td>$name1</td>
		</tr>
		<tr><td>Balance</td>
		<td>$balance</td>
		</table></center>";
	}
	else
	{
		echo '<script>alert("No such account exists!!")</script>';
	}
}
?>		
</body>
</html>