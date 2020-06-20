
<!-- When we are into php, so we have to create each file as '.php' file always. -->

<!-- This is a html code -->

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
		<title>Login Form</title>


		<!-- Use of metatags -->
    	<meta charset="UTF-8">
   		<meta name="description" content="Order foods online">
    	<meta name="keywords" content="HTML, CSS, JavaScript, Bootstrap">
    	<meta name="author" content="Zomato">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">


		<!-- Adding bootstrap to the code -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<!--Adding Font awesome cdn -->
		<script src="https://kit.fontawesome.com/f06a3450e9.js" crossorigin="anonymous"></script>


		<link rel="stylesheet" type="text/css" href="css/style.css">

		<!-- Adding bootstrap JS (Javascript code) to the code -->
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"
 			 integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  			crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		
	</head>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#login_as_admin').hide();

			$('#admin_secured').mouseenter(function(){
				$('#login_as_admin').show();
			});
			$('#admin_secured').mouseleave(function(){
				$('#login_as_admin').hide();
			});

		})
	</script>


	<body style="background: #ED213A; background: -webkit-linear-gradient(to right, #93291E, #ED213A); background: linear-gradient(to right, #93291E, #ED213A);">

		<!-- To use navigation bar using bootstrap 'nav' tag is used. -->
		<nav class="navbar">
			<h3 class="navbar-brand text-light">Zomato</h3>	<!-- 'text-light' is used to light the text color. -->
		</nav>


		<div class="container">


			<div class="row mt-50">

				<div class="col-md-8">

					<h1 class="display-2 text-light text-md-center">	<!-- 'display-2' is a class of bootstrap to change font size and 'text-md-center' use to change the text alignment to center -->
						Craving for food? Look nowhere else. Explore Now!
					</h1>
				</div>


				<div class="col-md-4">

					<div class="card">	<!-- 'card' is a bootstrap class used to make a card in the page -->

						<div class="card-body" id="admin_secured">

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

							<form action="login_validation.php" method="POST">

								<label>Email:</label><br>
								<input type="email" name="email" class="form-control" required><br><br>

								<label>Password:</label><br>
								<input type="password" name="password" class="form-control" required><br><br>

								<input type="submit" name="" value="Login" class="btn bg-danger btn-block btn-lg text-light">
								<!-- 'btn-lg' is used to make the button big -->

							</form>

							<p>Not a member? <a href="#" data-toggle="modal" data-target="#exampleModal"> Sign up here</a></p><br><hr>


							<div class="d-flex justify-content-center" style="margin-top: -30px;">
  								<button class="btn btn-light rounded-circle" id="login_as_admin" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-chevron-down"></i></button>
  							</div>
							<div class="collapse" id="collapseExample">
	  							<br><p>Login as admin <a href="admin_login.php"><i class="fa fa-user-shield fa-2x"></i></i></a></p>
							</div>
							
					</div>
				</div>
			</div>

		</div>


		<!-- Adding bootstrap modal for pop up after clicking on 'sign up here' in our website -->
		<div class="modal" id="exampleModal" tabindex="-1" role="dialog">
  			<div class="modal-dialog" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<h5 class="modal-title">Register Here</h5>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          					<span aria-hidden="true">&times;</span>
        				</button>
      				</div>
      				<div class="modal-body">
       		 			
       		 			<form action="reg_validation.php" method="POST">

       		 				<label>Name:</label><br>
       		 				<input type="text" name="name" class="form-control" required><br><br>

       		 				<label>Email:</label><br>
       		 				<input type="email" name="email" class="form-control" required><br><br>

       		 				<label>Password:</label><br>
       		 				<input type="password" name="password" class="form-control" required><br><br>

       		 				<label>Address: </label><br>
       		 				<textarea name="home_address" class="form-control" placeholder="Try to provide contact numbers with address for better connectivity..." required></textarea><br>

       		 				<input type="submit" name="" value="Sign Up" class="btn btn-danger">

       		 			</form>

      				</div>

      				<!-- <div class="modal-footer">
        				<button type="button" class="btn btn-danger text-light">Sign Up</button>
        				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      				</div> -->

    			</div>
  			</div>
		</div>


	</body>

</html>