<!DOCTYPE html>
<?php 

//processing form



if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$comments = $_POST['comments'];
$password = $_POST['password'];
	
	if(!empty($fname) && !empty ($lname) && !empty ($email) && !empty ($gender) && !empty ($age) && !empty ($comments) && !empty ($password)){
		
		include('connection.php');
		 
		 mysqli_query($dbc, "INSERT INTO  users(first_name,last_name,email,gender,age,comments,password, registration_date) VALUES('$fname','$lname','$email','$gender','$age','$comments','$password', NOW())");
		 
		 $registered = mysqli_affected_rows($dbc);

		echo $registered." row is affected, everything works!";
		
	}else{
		
		echo "<p style='color: red'>Error: Please complete all fields</p>";
		 
	}
	
}else{
	echo "<h2>Please complete the form</h2>";
}



?>

<html>
<head>
</head>

<body>

	<form action="newuser.php" method="post">
	
		<p>First Name: <input type="text" name="fname" size="20" maxlength="50" /></p>
		<p>Last Name: <input type="text" name="lname" size="20" maxlength="50" /></p>
		<p>Email: <input type="text" name="email" size="20" maxlength="50" /></p>
		<p>Gender: <input type="radio" name="gender" value="M"/> Male
						<input type="radio" name="gender" value="F"/> Female</p>
		<p>Age: <select name="age">
							<option value="0-29">Under 30</option>
							<option value-="30-60">Between 30 and 60</option>
							<option value="60+">Over 60</option>
		</select></p>
		<p>Comments: <br /><textarea name="comments" rows="3" cols="40" maxlength="200"></textarea></p>
		<p>Password: <input type="password" name="password" maxlength="20"> </p>
		<p><input type="submit" name="submit" value="Submit" /></p>
	
	</form>
	
	<a href="index.php">Go back to login form</a>

</body>

</html>