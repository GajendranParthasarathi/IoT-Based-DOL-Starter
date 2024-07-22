<?php
$server 	= "localhost";
$username 	= "pgcresearch_gaja";
$password 	= "Gaja@123";
$DB 		= "pgcresearch_newiot";
$conn = new mysqli($server, $username, $password,$DB);
	if ($conn->connect_error) 
	{
	} 
	$query ="SELECT * from DOLIoT";
	$result = $conn->query($query);
		while($row = $result->fetch_assoc()) 
		{
			echo $row["ON"];	
			echo $row["OFF"];	
			
		}

?>


