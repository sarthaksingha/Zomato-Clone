<?php

	session_start();

	$conn=mysqli_connect("localhost","root","","zomato");

	$work_address=$_POST['work_address'];

	$user_id=$_SESSION['user_id'];

	$query="UPDATE users SET work_address='$work_address' WHERE user_id='$user_id'";

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