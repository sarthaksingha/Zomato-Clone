<?php

	session_start();

	$conn=mysqli_connect("localhost","root","","zomato");

	$home_address=$_POST['home_address'];

	$user_id=$_SESSION['user_id'];

	$query="UPDATE users SET home_address='$home_address' WHERE user_id='$user_id'";

	try
	{
		mysqli_query($conn,$query);
		header('Location:profile.php?msg=1');
	}
	catch(Exception $e)
	{
		header('Location:profile.php?msg=0');
	}


?>