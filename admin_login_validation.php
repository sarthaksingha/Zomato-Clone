<?php

	session_start();

	$conn=mysqli_connect("localhost","root","","zomato");

	//print_r($_POST);

	$admin_id=$_POST['admin_id'];
	$admin_email=$_POST['admin_email'];
	$admin_password=$_POST['admin_password'];


	$query="SELECT * FROM admins WHERE admin_id LIKE '$admin_id' AND admin_password LIKE '$admin_password'";

	$result=mysqli_query($conn,$query);
	//$new_result=mysqli_fetch_array($result);

	//print_r($new_result);


	$rows=mysqli_num_rows($result);
	//echo $rows;


	if($rows==1)
	{
		$_SESSION['is_admin_loggedin']=1;
		//echo "Welcome Admin";
		header("Location: admin.php");
	}
	else
	{
		header('Location: login_form.php');
	}


?>