
<?php

	session_start();
	if(empty($_SESSION))
	{
		header('Location: login_form.php');
	}

	$conn=mysqli_connect("localhost","root","","zomato");

	$query="SELECT * FROM orders WHERE order_time=(SELECT MAX(order_time) FROM orders)";

	$result=mysqli_query($conn, $query);


	/*if ($rows=mysqli_fetch_array($result)) {
		print_r($rows);
	}*/
	


?>



<!DOCTYPE html>
<html>
	<head>
		<title>Net Banking Gateway</title>


		<!-- Use of metatags -->
    	<meta charset="UTF-8">
   		<meta name="description" content="Order foods online">
    	<meta name="keywords" content="HTML, CSS, JavaScript, Bootstrap">
    	<meta name="author" content="Zomato">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    	

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


		<link rel="stylesheet" type="text/css" href="css/style.css">

		<script src="https://kit.fontawesome.com/f06a3450e9.js" crossorigin="anonymous"></script>

	</head>

	<body>

		<div class="container">
			<div class="row mt-5">
				<div class=" offset-md-2 col-md-8">
					<div class="card">
						<div class="card-body">
							<h4 style="color: blue;"><b>Payment Details</b></h4>
							<div style="margin-top: -40px;"><a href="logout.php"><button class=" float-right btn btn-info btn-sm"><i class="fa fa-power-off fa-2x"></i></button></a></div>
							<div class="row">
								<div class="offset-md-2 col-md-6">
									<br><br><br><div class="card">
										<div class="card-body">
											<?php

												if($rows=mysqli_fetch_array($result))
												{
													echo '<div>
															<p>Reference no: <span style="float: right;">'.$rows['order_id'].'</span></p>
															<p>Amount: <span style="float: right;">₹'.$rows['amount'].'</span></span></p>
														</div>';
												}



											?>
							   
										</div>
									</div><br>
									<a href="success.php"><button class="btn btn-info btn-sm">Submit</button></a>
									<a href="payment_page.php"><button class="btn btn-info btn-sm">Cancel</button></a>
								</div>	
							</div>

						</div>
					</div>
				</div>
			</div>			
		</div>
	</body>
</html>