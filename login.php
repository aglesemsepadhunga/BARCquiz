<?php 
session_start();


if (isset($_POST['submit'])) {
		if (empty($_POST['roll'])) {
			echo "A roll no is required".'<br>';
		}else{
			
			include('config/connect.php');
			$_SESSION['roll']=mysqli_real_escape_string($conn,$_POST['roll']);
			echo $_SESSION['roll'];
			$roll = mysqli_real_escape_string($conn,$_POST['roll']);
			$response=0;
			$sql = "INSERT INTO response(a,b,c,d,e,roll) VALUES('$response','$response','$response','$response','$response','$roll')";
			if (mysqli_query($conn,$sql)) {
					# code...sucess
					//header('Location:firstpage.html');
					$_SESSION['startTime']=new DateTime('+2 min +10 sec');
					header('Location:quiz.php?id=1');
				}
				else{
					//error
					echo 'query error'.mysqli_error($conn);
				}

		}
}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Login</title>
 </head>
 <body>
 <form action="login.php" method="post">
 	<label for="roll">Enter your Roll no.</label>
 	<input type="text" name="roll">
 	<input type="submit" name="submit" value="Start">
 </form>
 </body>
 </html>