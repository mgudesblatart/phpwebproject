<?php

	include("connection.php");
	
	$r = mysqli_query($dbc,"SELECT * FROM users ORDER BY first_name ASC");
	
	echo "<p><a href='output.php'>Order By ID</a></p>";
	
	echo "<table align='center' border='1' cellspacing='3' cellpading='3' width='75%'>
	<tr>
		<td align='left'><b>Name</b></td>
		<td align='left'><b>Email</b></td>
		<td align='left'><b>Password</b></td>
	</tr>
	
	";
	
	while($row = mysqli_fetch_array($r)){
		
		echo "<tr><td align='left'>".$row['first_name']." ".$row['last_name']."</td><td align='left'>".$row['email']."</td><td align='left'>".$row['password']."</td></tr>";
		

	}
	
	mysqli_close($dbc);

?>