<?php
	session_start();
	if(empty($_SESSION))
	{
		header('Location: login_form.php');
	}


?>




<!DOCTYPE html>
<html>
	<head>
		<title>Order Successful</title>


		<!-- Use of metatags -->
    	<meta charset="UTF-8">
   		<meta name="description" content="Order foods online">
    	<meta name="keywords" content="HTML, CSS, JavaScript, Bootstrap">
    	<meta name="author" content="Zomato">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    	

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


		<link rel="stylesheet" type="text/css" href="css/style.css">

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

		<!-- Adding bootstrap JS (Javascript code) to the code -->
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"
 			 integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  			crossorigin="anonymous"></script>

		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

		<script src="https://kit.fontawesome.com/f06a3450e9.js" crossorigin="anonymous"></script>
	</head>

	<body>
		<div class="container" style="text-align: center;">
			<div class="row">
				<div class="col-md-12">
					<div class="card mt-5">
						<div><a href="logout.php"><button class="float-right btn btn-lg sin_city_red_theme text-light mt-2 mr-2"><i class="fa fa-power-off fa-2x"></i></button></a></div>
						<div class="card-body">
							<i class="far fa-check-circle fa-7x text-success"></i><br>
							<h1>Your payment was successful</h1><br>
							<a href="index.php"><button class="btn btn-lg sin_city_red_theme text-light">Continue with Zomato</button></a><br><br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>