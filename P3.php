<?php
define('DIR','');
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>

	<form action="#" method="post" enctype="multipart/form-data">
		<div class="row">
	  	<div class="leftcolumn">
		    <div class="card">
		    	<div class="formheading mb-2">Login Session </div>
		    	<table border="1">
		    		<tr>
		    			<th><label>Username</label></th>
		    			<td><input type="text" name="Username"></td>
		    		</tr><tr>
		    			<th><label>password</label></th>
		    			<td><input type="password" name="pass"></td>
		    		</tr>
		    		<tr>
		    			<td colspan="2"><input type="submit" name="save" Value="LOGIN"></td>
		    		</tr>
		    	</table>
		    </div>
		</div>
	</div>
	</form>
</body>
</html>

<?php
if (isset($_POST['save'])) {

	session_start();
		$_SESSION['name'] = $_POST['Username'];
	
	if (!isset($_SESSION['count'])) {
		$_SESSION['count'] = 1;
		echo "<b>".$_SESSION['name']."<b><br><br><br>";
		echo "This is your first visit";
	}else{
		$_SESSION['count']++;

		echo "<b>".$_SESSION['name']."<b><br><br><br>";
		echo "Your Visiting count is <b>".$_SESSION['count'];
	}
	
}
?>