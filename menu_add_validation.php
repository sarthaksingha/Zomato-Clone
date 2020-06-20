<?php

	$conn=mysqli_connect("localhost","root","","zomato");

	$name=$_POST['name'];
	$price=$_POST['price'];
	$description=$_POST['description'];
	$img=$_POST['img'];
	$r_id=$_POST['r_id'];
	$status=$_POST['status'];
	$type=$_POST['type'];


	$query="INSERT INTO menu (id,name,price,description,img,r_id,status,type) VALUES(NULL,'$name',$price,'$description','$img',$r_id,$status,$type)";


	try
	{
		$result=mysqli_query($conn,$query);
		header('Location:admin.php?msg=1');
	}
	catch(Exception $e)
	{
		header('Location:admin.php?msg=0');
	}




?>