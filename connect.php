<?php 
	//connect to database
	$conn = mysqli_connect('localhost','andy','1234','barcquiz');

	//check connection
	if(!$conn)
		echo 'Connection error: '. mysqli_connect_error();
 ?>