<?php

	//avoid error notices, display only warnings:
error_reporting(0);

	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		include('connection.php');
		
		$id_user = mysqli_real_escape_string($dbc, trim($_POST['user_id']));

		mysqli_query($dbc, "DELETE FROM users WHERE id='$id_user'");
		
		echo "The user has been successfully deleted!";
		
	}

?>


<h3>Are you sure want to delete this user?</h3>
<form method="post" action="delete.php">
	<p>User ID: <input type="text" name='user_id' value="<?php echo $_GET['user_id']; ?>"/>
	<p>First Name: <input type="text" name='first_name' value="<?php echo $_GET['fname']; ?>"/></p>
	<p>Last Name: <input type='text' name='last_name' value="<?php echo $_GET['lname']; ?>"/><br /></p>
	<p><input type='submit' name='submit' value='Yes' /></p>
	<p><a href="output.php">Go Back</a></p>
	
</form>