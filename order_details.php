<!DOCTYPE html>

<?php

	session_start();
	if(empty($_SESSION))
	{
		header('Location: login_form.php');
	}

	$order_id=$_GET['order_id'];
	
	$conn=mysqli_connect("localhost","root","","zomato");

	$query="SELECT * FROM orders WHERE order_id LIKE '$order_id'";


	$result=mysqli_query($conn,$query);
	$result=mysqli_fetch_array($result);

	//echo $result['r_id'];



	$r_id=$result['r_id'];

	$query1="SELECT * FROM restaurants WHERE r_id LIKE '$r_id'";


	$result1=mysqli_query($conn,$query1);
	$result1=mysqli_fetch_array($result1);


	$r_name=$result1['r_name'];


?>

<?php
	
	$query3="SELECT name,price from menu m JOIN order_details o ON o.menu_id=m.id WHERE o.order_id LIKE '$order_id'";

	$result3=mysqli_query($conn,$query3);

	$total=0;

	while($row=mysqli_fetch_array($result3))
	{
		$total=$total+$row['price'];
	}


?>


<html>
	<head>
		<title>Order Details</title>



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
	</head>

	<script type="text/javascript">
		$(document).ready(function(){

			var initial_total='<?php echo $total; ?>';

			$('#total').text(initial_total);
			$('#amount').text(initial_total);

			$('#apply_coupon').click(function(){
				//alert("Hello");
				var coupon_input=$('#coupon_input').val();
				//alert(coupon_input);


				/* ajax call into the db */
				$.ajax({
					url:'check_discount.php',
					type:'POST',
					data:{'user_input':coupon_input},


					success:function(data)
					{
						console.log(data);

						data=JSON.parse(data);
						var percent=data.percent;

						var total=$('#total').text();

						if(data.response==200)
						{
							var discount=(percent/100)*total;
							var amount=total-discount;

							$('#discount').text(discount);
							$('#amount').text(amount);
						}

						else
						{
							$('#discount').text(0);
							$('#amount').text(total);
						}

					},

					error:function()
					{
						alert("Some error occured");
					}

				})
			})

			$('#pay').click(function()
			{
				var order_id='<?php echo $order_id; ?>';
				var final_amount=$('#amount').text();

				window.location.href='confirm_order.php?order_id='+order_id +'&amount='+final_amount;  
			});

		})

	</script>

	<nav class="navbar" style="background: #ED213A; background: -webkit-linear-gradient(to right, #93291E, #ED213A); background: linear-gradient(to right, #93291E, #ED213A);">
			<h3 class="navbar-brand text-light">Zomato</h3>
			<a href="logout.php"><button class=" float-right btn btn-danger"><b>Logout</b></button></a>
		</nav>

		<h5 class="text-danger" style="text-align: center; font-family: Sofia;"><u><b>Hi <?php echo $_SESSION['name']; ?></b></u></h5>

		<div class="container">
			<div class="row mt-3">

				<div class="col-md-6">
					<div class="card">
						<div class="card-body">
							<!--<h4>Domino's Pizza</h4>-->
							<h4><?php echo $r_name; ?></h4>
							<table class="table">

								<?php

									//$query2="SELECT * FROM order_details WHERE order_id LIKE '$order_id'";

									$query2="SELECT name,price from menu m JOIN order_details o ON o.menu_id=m.id WHERE o.order_id LIKE '$order_id'";

									$result2=mysqli_query($conn,$query2);

									$counter=1;

									//$total=0;

									while($row=mysqli_fetch_array($result2))
									{
										echo '<tr>
												<td>'.$counter.'</td>
												<td>'.$row['name'].'</td>
												<td>1</td>
												<td>₹'.$row['price'].'</td>
											</tr>'; 

										//$total=$total+$row['price'];

										$counter++;
									}

								?>

							</table>

							<p>Have a coupon code? Apply Now!</p>
							<input type="text" name="" class="form-control" id="coupon_input">
							<button class="btn btn-danger mt-1" id="apply_coupon">Apply</button><br>

						</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="card">
						<div class="card-body">
							<h4>Delivery Address</h4><hr>
								<div class="accordion" id="accordionExample">
						  			<div>
						    			<div id="headingOne">
						      				<h2 class="mb-0">
						        				<button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><input type="radio" name="delivery_address" data-toggle="collapse"> Work Address</button>
						      				</h2>
						    			</div>
						    			<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
						      				<div class="card">

						      					<?php

						      						$conn=mysqli_connect("localhost","root","","zomato");

						      						$user_id=$_SESSION['user_id'];

						      						$query4="SELECT work_address FROM users WHERE user_id=$user_id";

						      						$result4=mysqli_query($conn,$query4);

						      						if($rows=mysqli_fetch_array($result4))
						      						{
						      							echo '<p>'.$rows['work_address'].'</p>';
						      						}


						      					?>
						        				
						      				</div>
						    			</div>
						  			</div>

						  			<div>
						    			<div id="headingTwo">
						      				<h2 class="mb-0">
						        				<button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"><input type="radio" name="delivery_address" checked> Home Address</button>
						      				</h2>
						    			</div>
						    			<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
						      				<div class="card">
						        				<?php

						      						$conn=mysqli_connect("localhost","root","","zomato");

						      						$user_id=$_SESSION['user_id'];

						      						$query4="SELECT home_address FROM users WHERE user_id=$user_id";

						      						$result4=mysqli_query($conn,$query4);

						      						if($rows=mysqli_fetch_array($result4))
						      						{
						      							echo '<p>'.$rows['home_address'].'</p>';
						      						}


						      					?>
						      				</div>
						    			</div>
						  			</div>

						  			<div>
						    			<div id="headingThree">
						      				<h2 class="mb-0">
						        				<button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree"><input type="radio" name="delivery_address"> Other saved Address<br></button>
						      				</h2>
						    			</div>
						    			<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
						      				<div class="card">
						        				<?php

						      						$conn=mysqli_connect("localhost","root","","zomato");

						      						$user_id=$_SESSION['user_id'];

						      						$query4="SELECT other_address FROM users WHERE user_id=$user_id";

						      						$result4=mysqli_query($conn,$query4);

						      						if($rows=mysqli_fetch_array($result4))
						      						{
						      							echo '<input class="form-control" type="text" name="other_address" value="'.$rows['other_address'].'">';
						      						}


						      					?>
						      				</div>
						    			</div>
						  			</div>

						  			<div>
						    			<div id="headingFour">
						      				<h2 class="mb-0">
						        				<button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour"><input type="radio" name="delivery_address"> None of these<br></button>
						      				</h2>
						    			</div>
						    			<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
						      				<div>
						        				<form>
						        					<label>Type the address here:</label>
						        					<textarea name="new_address" class="form-control" placeholder="Try to provide contact numbers with address for better connectivity..."></textarea><br>
						        				</form>
						      				</div>
						    			</div>
						  			</div>


								</div>

						</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="card">
						<div class="card-body">

							<table class="table">

								<tr>
									<td>Total</td>
									<td>₹<span id="total">0000</span></td>
								</tr>

								<tr>
									<td>Discount</td>
									<td>₹<span id="discount">0000</span></td>
								</tr>

								<tr>
									<td>To be paid</td>
									<td>₹<span id="amount">0000</span></td>
								</tr>

							</table>

							<button class="btn btn-danger btn-block" id="pay">Pay Now</button>

						</div>
					</div>
				</div>

			</div>
		</div>

	</body>
</html>