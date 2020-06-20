<?php

	session_start();

	$conn=mysqli_connect("localhost","root","","zomato");

	if(empty($_SESSION))
	{
		header('Location: login_form.php');
	}

	$user_id=$_SESSION['user_id'];

	$query="SELECT * FROM users WHERE user_id='$user_id'";

	$result=mysqli_query($conn,$query);

	$result=mysqli_fetch_array($result);

	$dp=$result['dp'];


?>




<!DOCTYPE html>
<html>
	<head>
		<title>Hi User</title>


		<!-- Use of metatags -->
    	<meta charset="UTF-8">
   		<meta name="description" content="Order foods online">
    	<meta name="keywords" content="HTML, CSS, JavaScript, Bootstrap">
    	<meta name="author" content="Zomato">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<!--Adding Font awesome cdn -->
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

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

			$('#edit_dp').hide();

			$('#profile').mouseenter(function()
			{
				$('#edit_dp').show();
			});
			$('#profile').mouseleave(function()
			{
				$('#edit_dp').hide();
			});


			$('.rate').click(function(){
				var order_id=$(this).data('id');
				//alert(order_id);

				/* Pass 'order_id' to form. */
				$('#order_id').val(order_id);
			});


			$('#rating-form').submit(function(){
				//alert("Form submitted");

				var order_id=$('#order_id').val();
				var rating_number=$('#rating_number').val();
				var review=$('#review').val();

				$('#feedbackModal').modal('hide');

				$.ajax({
					url:'insert_rating.php',
					type:'POST',
					data:{'order_id':order_id,'rating_number':rating_number,'review':review},
				
					success:function(data)
					{
						//console.log(data);
						//alert("Hello");

						data=JSON.parse(data);

						if(data.code==1)
						{
							alert("Rating added successfully");
						}
						else
						{
							alert("Some error occured. Try again!");
						}
					},
					error:function()
					{
						alert("Some error occured.");
					}
				})
			})

		})

	</script>

	<body>

		<nav class="navbar" style="background: #ED213A; background: -webkit-linear-gradient(to right, #93291E, #ED213A); background: linear-gradient(to right, #93291E, #ED213A);">
			<h3 class="navbar-brand text-light">Zomato</h3>
			<span class="float-right"><span class="navbar-brand"><a href="index.php" class="text-success"><b>Order Online</b></a></span>
			<a href="logout.php"><button class="btn btn-danger"><b>Logout</b></button></a></span>
		</nav>

		<h4 class="text-danger" style="text-align: center; font-family: Sofia;"><u><b>Hi <?php echo $_SESSION['name']; ?></b></u></h4>


		<!-- <h1>Welcome</h1>
		<?php
			//print_r($_SESSION);

		?>

		<a href="logout.php">Logout</a> -->



		<div class="container">
			<div class="row mt-3">
				
				<div class="col-md-3">
					
					<!-- Adding Profile card from getbootstrap.com website -->
					<div class="card" id="profile">

						<!-- <img class="card-img-top" src="https://previews.123rf.com/images/metelsky/metelsky1809/metelsky180900233/109815470-man-avatar-profile-male-face-icon-vector-illustration-.jpg" alt="Card image cap"> -->

						<img class="card-img-top" src="<?php echo $dp; ?>" alt="Card image cap">
							
						<div id="edit_dp" style="margin-top: -42px; padding-left: 5px;">	
							<a href="#" data-toggle="modal" data-target="#dpModal"><i class="fa fa-edit fa-3x text-dark"></i></a>
						</div>

						<div class="card-body">
					    	<h5 class="card-title"><?php echo $_SESSION['name']; ?></h5>
					  	</div>
					  	<ul class="list-group list-group-flush">
					    	<li class="list-group-item">Orders<span class="float-right">
					    		<?php

					    			$user_id=$_SESSION['user_id'];

					    			$query2="SELECT COUNT(order_id) FROM orders WHERE user_id=$user_id";
									$result2=mysqli_query($conn,$query2);
									$row2=mysqli_num_rows($result2);
					    	 		echo $row2; 
					    
					    		?>
					    		</span></li>
					    	<!--<li class="list-group-item">Reviews<span class="float-right">30</span></li>-->
					    	<li class="list-group-item text-danger"><a href="index.php"><b>Order food online</b></a></li>
					  	</ul>
					  	<div class="card-body">
					    	<a href="#" data-toggle="modal" data-target="#editModal" class="btn btn-block sin_city_red_theme text-light">Edit Profile</a>
					  	</div>
					</div>

				</div>


				<div class="col-md-6">
					<div class="row">

						<?php

							$conn=mysqli_connect("localhost","root","","zomato");

							$user_id=$_SESSION['user_id'];

							//$query="SELECT * FROM orders WHERE user_id='$user_id' AND status=1";
							$query="SELECT * FROM orders o JOIN restaurants r ON r.r_id=o.r_id WHERE o.user_id=$user_id AND o.status=1";

							$result=mysqli_query($conn,$query);

							while($row=mysqli_fetch_array($result))
							{
								//echo $row['r_name'];

								echo '<div class="col-md-12">
									<div class="card mt-2">
										<div class="card-body">
											<h5 class="card-title text-danger"><u><b>'.$row['r_name'].'</b></u></h5>
											<p>Order date: <b>'.$row['order_time'].'</b><span class="float-right">Total: <b>₹'.$row['amount'].'</b></span></p>

											<table class="table">';


											$current_order_id=$row['order_id'];

											$query2="SELECT * FROM order_details o JOIN menu m ON m.id=o.menu_id WHERE o.order_id LIKE '$current_order_id'";

											$result2=mysqli_query($conn,$query2);

											while($row2=mysqli_fetch_array($result2))
											{
												echo '<tr>
														<td>'.$row2['name'].'</td>
														<td>1 plate</td>
													</tr>';
											}

											echo '</table>

											<button class="btn float-right sin_city_red_theme text-light rate" data-toggle="modal" data-target="#feedbackModal" data-id="'.$row['order_id'].'">Give Feedback</button>

										</div>
									</div>
								</div>';


							}



						?>

					</div>
				</div>


				<div class="col-md-3">
					<div class="row">

						<div class="col-md-12">
							<div class="card" style="height: 300px; overflow-y: scroll;">
								<div class="card-body">

									<div>
										<h5><b>Ratings & Reviews</b></h5><hr>

										<?php

											$conn=mysqli_connect("localhost","root","","zomato");
											$user_id=$_SESSION['user_id'];

											$query="SELECT r_name, rating, review FROM orders o JOIN restaurants r ON r.r_id=o.r_id WHERE o.user_id=$user_id AND o.status=1";

											$result=mysqli_query($conn,$query);

											while($rows=mysqli_fetch_array($result))
											{
												//echo $rows['r_name'];

												echo '<div>
														<small class="text-muted">'.$rows['r_name'].'<span class="float-right">('.$rows['rating'].')</span></small>
														<p>'.$rows['review'].'</p>
													</div><hr>';
											}

										?>

										

									</div>
								</div>
							</div>
						</div>

						<div class="col-md-12">
							<div class="card mt-2" style="height: 200px; overflow-y: scroll;">
								<div class="card-body">

								<h5><b>Address</b></h5><hr>	

									<?php

										$conn=mysqli_connect("localhost","root","","zomato");
										$user_id=$_SESSION['user_id'];

										$query="SELECT work_address, home_address, other_address FROM users WHERE user_id=$user_id";

										$result=mysqli_query($conn,$query);

										while($row=mysqli_fetch_array($result))
										{
											//echo $row['work_address'];

											echo '<div>
													<div>
														<small class="badge badge-danger">Work</small>
														<p>'.$row['work_address'].'</p>
													</div>
													<button class="btn btn-danger btn-sm float-right" data-toggle="modal" data-target="#work_addressModal">Update</button><br><hr>';

											echo '<div>
														<small class="badge badge-danger">Home</small>
														<p>'.$row['home_address'].'</p>
												</div>
												<button class="btn btn-danger btn-sm float-right" data-toggle="modal" data-target="#home_addressModal">Update</button><br><hr>';

											echo '<div>
														<small class="badge badge-danger">Others</small>
														<p>'.$row['other_address'].'</p>
													</div>
												</div>
												<button class="btn btn-danger btn-sm float-right" data-toggle="modal" data-target="#other_addressModal">Update</button><br><hr>';
										}


									?>
									

								</div>
							</div>
						</div>

					</div>
				</div>

			</div>
		</div>


		<!-- Adding bootstrap modal -->
		<div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  			<div class="modal-dialog" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<h5 class="modal-title" id="exampleModalLabel">Please give us your feedback</h5>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          					<span aria-hidden="true">&times;</span>
        				</button>
      				</div>
      				<div class="modal-body">

      					<form id="rating-form" method="POST">
      						<label>Rating</label><br>
      						<input id="rating_number" type="number" name="rating" class="form-control" min="1" max="5"><br>

      						<label>Your Review</label><br>
      						<textarea id="review" name="review" class="form-control"></textarea><br>

      						<!-- <input type="text" name="" id="order_id"> -->
      						<input type="hidden" name="order_id" id="order_id">
      						<input type="submit" name="" value="Submit" class="btn btn-danger float-right">
      					</form>
        				
      				</div>

    			</div>
  			</div>
		</div>


		<div class="modal fade" id="dpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  			<div class="modal-dialog" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<h5 class="modal-title" id="exampleModalLabel">Choose Profile Picture</h5>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          					<span aria-hidden="true">&times;</span>
        				</button>
      				</div>
      				<div class="modal-body">

      					<form action="update_dp.php" method="POST" enctype="multipart/form-data">
      						<label>Choose Profile Picture</label><br>
      						<input type="file" name="img_file" class="form-control"><br>

      						<input type="submit" name="" value="Submit" class="btn btn-danger float-right">
      					</form>
        				
      				</div>

    			</div>
  			</div>
		</div>


		<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  			<div class="modal-dialog" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          					<span aria-hidden="true">&times;</span>
        				</button>
      				</div>
      				<div class="modal-body">

      					<form action="edit_profile.php" method="POST">
      						<label>Name</label><br>
      						<input type="text" name="name" class="form-control" value="<?php echo $_SESSION['name']; ?>"><br>

      						<label>Password</label><br>
      						<input type="password" name="password" class="form-control"><br><br>

      						<input type="submit" name="" value="Edit Profile" class="btn btn-danger">
      					</form>
        				
      				</div>

    			</div>
  			</div>
		</div>


		<div class="modal fade" id="work_addressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  			<div class="modal-dialog" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<h5 class="modal-title" id="exampleModalLabel">Add a new address</h5>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          					<span aria-hidden="true">&times;</span>
        				</button>
      				</div>
      				<div class="modal-body">

      					<form action="work_address.php" method="POST">
      						<label>Work Address</label><br>
      						<textarea name="work_address" class="form-control" placeholder="Try to provide contact numbers with address for better connectivity..."></textarea><br>
      						<input type="submit" name="" value="Submit" class="btn btn-danger float-right">
      					</form>
        				
      				</div>

    			</div>
  			</div>
		</div>

		<div class="modal fade" id="home_addressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  			<div class="modal-dialog" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<h5 class="modal-title" id="exampleModalLabel">Add a new address</h5>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          					<span aria-hidden="true">&times;</span>
        				</button>
      				</div>
      				<div class="modal-body">

      					<form action="home_address.php" method="POST">
      						<label>Home Address</label><br>
      						<textarea name="home_address" class="form-control" placeholder="Try to provide contact numbers with address for better connectivity..."></textarea><br>
      						<input type="submit" name="" value="Submit" class="btn btn-danger float-right">
      					</form>
        				
      				</div>

    			</div>
  			</div>
		</div>

		<div class="modal fade" id="other_addressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  			<div class="modal-dialog" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<h5 class="modal-title" id="exampleModalLabel">Add a new address</h5>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          					<span aria-hidden="true">&times;</span>
        				</button>
      				</div>
      				<div class="modal-body">

      					<form action="other_address.php" method="POST">
      						<label>Other Address</label><br>
      						<textarea name="other_address" class="form-control" placeholder="Try to provide contact numbers with address for better connectivity..."></textarea><br>
      						<input type="submit" name="" value="Submit" class="btn btn-danger float-right">
      					</form>
        				
      				</div>

    			</div>
  			</div>
		</div>


	</body>
</html>