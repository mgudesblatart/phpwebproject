<?php

error_reporting(0);

include("connection.php");

//grab values email and password from login form

$login_email = mysqli_real_escape_string($dbc, trim($_POST['login_email']));
$login_password = mysqli_real_escape_string($dbc, trim($_POST['login_password']));


//create the query and number of rows returned from the query

$query = mysqli_query($dbc, "SELECT * FROM users WHERE email='".$login_email."'");
$numrows = mysqli_num_rows($query);




if($_SERVER['REQUEST_METHOD'] == 'POST'){

//create condition to check if there is 1 row with that email

if($numrows != 0){

//grab the email and password from that row returned before

	while($row = mysqli_fetch_array($query)){
	
		$dbemail = $row['email'];
		$dbpass = $row['password'];
		$dbfirstname = $row['first_name'];
		
		}
	
//create condition to check if email and password are equal to the returned row	
	
	if($login_email==$dbemail){
		if($login_password==$dbpass){
		
			echo "<p>Welcome ".$dbfirstname.", you are in! You will be redirected to the control panel in 3 seconds...</p>";
			
			header('Refresh: 3, URL=output.php');
		
		}else{
		
			echo "your password is incorrect! <a href='index.php'>Go back to login form </a>";
		
		}
	}else{
	
		echo "your email is incorrect!";
	
	}
	
}else{

echo "Invalid credentials! If you are not registered please register <a href='newuser.php'>here</a>";

}

}else{

	echo "<h2>Please Login <a href='index.php'>Here</a></h2>";

}

?>
