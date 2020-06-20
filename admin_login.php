
<?php

	session_start();
	
	if(!empty($_SESSION))
	{
		header('Location: profile.php');
	}


?>


<!DOCTYPE html>
<html>
	<head>
		<title>Admin Login</title>


		<!-- Use of metatags -->
    	<meta charset="UTF-8">
   		<meta name="description" content="Order foods online">
    	<meta name="keywords" content="HTML, CSS, JavaScript, Bootstrap">
    	<meta name="author" content="Zomato">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">


		<!-- Adding bootstrap to the code -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<!--Adding Font awesome cdn -->
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


		<link rel="stylesheet" type="text/css" href="css/style.css">

		<!-- Adding bootstrap JS (Javascript code) to the code -->
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		
	</head>


	<body style="background: #ED213A; background: -webkit-linear-gradient(to right, #93291E, #ED213A); background: linear-gradient(to right, #93291E, #ED213A);">

		<!-- To use navigation bar using bootstrap 'nav' tag is used. -->
		<nav class="navbar">
			<h3 class="navbar-brand text-light">Zomato Admin</h3>	<!-- 'text-light' is used to light the text color. -->
		</nav>


		<div class="container">


			<div class="row mt-50">

				<div class="col-md-8">

					<h1 class="display-2 text-light text-md-center">	<!-- 'display-2' is a class of bootstrap to change font size and 'text-md-center' use to change the text alignment to center -->
						Welcome to Zomato. Please login to proceed.
					</h1>
				</div>


				<div class="col-md-4">

					<div class="card">	<!-- 'card' is a bootstrap class used to make a card in the page -->

						<div class="card-body">

							<?php

								if(!empty($_GET))
								{
									$message=$_GET['message'];


									if($message==1)
									{
										echo '<p style="color: green;">Account created. Login to proceed</p>';
									}
									else
									{
										echo '<p style="color: red;">Some error occoured. Try again.</p>';
									}


								}


							?>

							<form action="admin_login_validation.php" method="POST">

								<label>Admin Id:</label><br>
								<input type="text" name="admin_id" class="form-control" placeholder="Please type your admin id provided by Zomato" required><br>

								<label>Email:</label><br>
								<input type="email" name="admin_email" class="form-control"><br>

								<label>Admin Password:</label><br>
								<input type="password" name="admin_password" class="form-control" required><br><br>

								<input type="submit" name="" value="Login as Admin" class="btn bg-success btn-block btn-lg text-light">
								<!-- 'btn-lg' is used to make the button big -->

							</form>

					</div>
				</div>
			</div>

		</div>


	</body>
</html>