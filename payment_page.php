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
		<title>Pay Now</title>


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

	<style type="text/css">
		input[type="radio"]
		{
			width: 30px;
			height: 30px;
		}
	</style>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#net_banking').hide();

			

			$('#pay').click(function(){
				$('#net_banking').show();
			});
			$('#pay').dblclick(function(){
				$('#net_banking').hide();
			});


			/*$('#submit_data').click(function(){
				window.location.href="http://localhost/zomato/banking_gateway.php?o_id="+$row['order_id'];
			})*/

		})
	</script>

	<body>
		<nav class="navbar" style="background: #ED213A; background: -webkit-linear-gradient(to right, #93291E, #ED213A); background: linear-gradient(to right, #93291E, #ED213A);">
			<h3 class="navbar-brand text-light">Zomato</h3>
		</nav>

		<div class="container">

			<div class="row mt-3">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<h3>Select Payment Method</h3>
						</div>
					</div>
				</div>
			</div>

			<div class="row mt-2">
				<div class="col-md-12">
					<div class="card">
						<div class="accordion" id="accordionExample">


							<div class="card">
							    <div class="card-header" id="headingOne">
							    	<h2 class="mb-0">
							        	<button class="btn btn-secondary btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Wallet</button>
							      	</h2>
							    </div>

							    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
							    	<div class="card-body">
							        	<div class="container">
							        		<div class="row">

							        			<div class="col-md-2">
							        				<div class="card">
							        					<input type="radio" name="wallet" style="margin-top: 10px; margin-left: 10px;" required checked>
							        					<img height="20%" width="100%" src="https://odishatv.in/wp-content/uploads/2017/11/Paytm1.jpg">
							        				</div>
							        			</div>

							        			<div class="col-md-2">
							        				<div class="card">
							        					<input type="radio" name="wallet" style="margin-top: 10px; margin-left: 10px;" required>
							        					<img height="100%" width="100%" src="https://www.dealnloot.com/wp-content/uploads/2019/04/mobikwik-dth.png"><br>
							        				</div>
							        			</div>
							        		</div>

							        		<div class="col-md-6">
							        			<form action="success.php" method="POST">
							        				<label>Email:</label>
							        				<input class="form-control" type="email" name="email" required><br>
							        				<label>Phone number:</label>
							        				<input class="form-control" type="tel" name="phone" pattern="+[0-9]{2} [0-9]{10}" value="+91 " required><br>
							        				<input class="btn btn-danger" type="submit" name="submit" value="Continue">
							        			</form>
							        		</div>
							        	</div>

							      	</div>
							    </div>
							</div>


							<div class="card">
							    <div class="card-header" id="headingTwo">
							      	<h2 class="mb-0">
							        	<button class="btn btn-secondary btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Credit Card/ Debit Card</button>
							      	</h2>
							    </div>

							    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
							      	<div class="card-body">
							        	<div class="container"><hr>
							        		<div class="row">

							        			<div class="col-md-1">
							        				<div class="card">
							        					<img height="100%" width="100%" src="https://arizent.brightspotcdn.com/6b/21/879744cc4e87baa461c869febaaf/visa.png">
							        				</div>
							        			</div>

							        			<div class="col-md-1">
							        				<div class="card">
							        					<img height="100%" width="100%" src="https://www.freeiconspng.com/uploads/master-card-icon-4.png">
							        				</div>
							        			</div>

							        			<div class="col-md-1">
							        				<div class="card">
							        					<img height="100%" width="100%" src="https://akm-img-a-in.tosshub.com/sites/btmt/images/stories/sodexo_logo1_505_052317044328.jpg?size=1200:675">
							        				</div>
							        			</div>

							        			<div class="col-md-1">
							        				<div class="card">
							        					<img height="100%" width="100%" src="https://trak.in/wp-content/uploads/2020/01/Rupay-Cards-Big-1.jpg">
							        				</div>
							        			</div>

							        			<div class="col-md-1">
							        				<div class="card">
							        					<img height="100%" width="100%" src="https://cdn0.iconfinder.com/data/icons/50-payment-system-icons-2/480/Maestro-2.png">
							        				</div>
							        			</div>

							        		</div><hr><br>

							        		<div class="col-md-6">
							        			<form action="success.php" method="POST">
							        				<label>Card Number</label>
							        				<input class="form-control" type="number" name="card_no" placeholder="XXXX XXXX XXXX XXXX" required><br>
							        				<label>Expiry Date</label>
							        				<input class="form-control" type="date" name="exp_date" required><br>
							        				<label>CVV Number</label>
							        				<input class="form-control" type="number" name="cvv_no" placeholder="e.g. 048" max="9999" required><br>
							        				<label>Name on Card</label>
							        				<input class="form-control" type="text" name="name"><br>
							        				<input type="submit" name="submit" value="Checkout" class="btn btn-danger">
							        			</form>
							        		</div>

							        	</div>
							      	</div>
							    </div>
							</div>


							<div class="card">
							    <div class="card-header" id="headingThree">
							      	<h2 class="mb-0">
							        	<button class="btn btn-secondary btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Meal Pass</button>
							      	</h2>
							    </div>

							    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
							      	<div class="card-body">
							        	<div class="container"><hr><hr><br>

							        		<div class="col-md-6">
							        			<form action="success.php" method="POST">
							        				<label>Card Number</label>
							        				<input class="form-control" type="number" name="card_no" required><br>
							        				<label>Expiry Date</label>
							        				<input class="form-control" type="date" name="exp_date" required><br>
							        				<label>CVV Number</label>
							        				<input class="form-control" type="number" name="cvv_no" required><br>
							        				<label>Name on Card</label>
							        				<input class="form-control" type="text" name="name"><br>
							        				<input type="submit" name="submit" value="Checkout" class="btn btn-danger">
							        			</form>
							        		</div>

							        	</div>
							      	</div>
							    </div>
							</div>


							<div class="card">
							    <div class="card-header" id="headingFour">
							      	<h2 class="mb-0">
							        	<button class="btn btn-secondary btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Net Banking</button>
							      	</h2>
							    </div>

							    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
							      	<div class="card-body">
							        	<div class="container">


							        		<div>
							        						
							        						<div class="row">
							        			
							        							<div class="col-md-2">
							        								<div class="card">
							        									<input type="radio" name="banking" style="margin-top: 10px; margin-left: 10px;" required checked  data-toggle="modal" data-target="#exampleModalCenter">
							        									<img height="100%" width="100%" src="https://kikkidu.com/wp-content/uploads/2011/07/sbi.jpg"><br>
							        								</div>
							        							</div>

								        						<div class="col-md-2">
											        				<div class="card">
											        					<input type="radio" name="banking" style="margin-top: 10px; margin-left: 10px;" required  data-toggle="modal" data-target="#exampleModalCenter">
											        					<img height="100%" width="100%" src="https://image3.mouthshut.com/images/imagesp/925004501s.png">
											        				</div>
								        						</div>

											        			<div class="col-md-2">
											        				<div class="card">
											        					<input type="radio" name="banking" style="margin-top: 10px; margin-left: 10px;" required  data-toggle="modal" data-target="#exampleModalCenter">
											        					<img height="100%" width="100%" src="https://image3.mouthshut.com/images/imagesp/925004492s.jpg">
											        				</div>
											        			</div>

											        			<div class="col-md-2">
											        				<div class="card">
											        					<input type="radio" name="banking" style="margin-top: 10px; margin-left: 10px;" required  data-toggle="modal" data-target="#exampleModalCenter">
											        					<img height="100%" width="100%" src="https://www.pngitem.com/pimgs/m/23-238417_axis-bank-logo-png-transparent-png.png"><br><br>
											        				</div>
											        			</div>

											        			<div class="col-md-2">
											        				<div class="card">
											        					<input type="radio" name="banking" style="margin-top: 10px; margin-left: 10px;" required  data-toggle="modal" data-target="#exampleModalCenter">
											        					<img height="100%" width="100%" src="https://i.pinimg.com/originals/a9/c6/50/a9c6501221ce0024a43e5af95d60837b.png">
											        				</div>
											        			</div>

							        						</div>

										        			<div class="row">
											        			<div class="col-md-6">
											        				<div>
									        							<form action="banking_gateway.php" method="POST">
									        								<label>Other Banks:</label>
									        								<select class="form-control" required>
												        						<option disabled>Choose a bank</option>
													        					<option>State Bank of India</option>
													        					<option>HDFC Bank</option>
													        					<option>ICICI Bank</option>
													        					<option>AXIS Bank</option>
													        					<option>Airtel Payments Bank</option>
													        					<option>Allahabad Bank</option>
													        					<option>Bank of Baroda</option>
													        					<option>Canara Bank</option>
													        					<option>Catholic Syrian Bank</option>
													        					<option>Central Bank of India</option>
													        					<option>Citibank</option>
													        					<option>City Union Bank</option>
													        					<option>Cosmos Bank</option>
													        					<option>Dena Bank</option>
													        					<option>Federal Bank</option>
													        					<option>IDBI Bank</option>
													        					<option>IDFC Bank</option>
													        					<option>Indian Bank</option>
													        					<option>Indian Overseas Bank</option>
													        					<option>Jammu and Kashmir Bank</option>
													        					<option>Karnataka Bank</option>
													        					<option>Kotak Mahindra Bank</option>
													        					<option>Paytm Payments Bank</option>
													        					<option>Punjab National Bank</option>
													        					<option>RBL Bank</option>
													        					<option>Saraswat Bank</option>
													        					<option>South Indian Bank</option>
													        					<option>State Bank of Hydrabad</option>
													        					<option>State Bank of Mysore</option>
													        					<option>Syndicate Bank</option>
													        					<option>The Nainital Bank</option>
													        					<option>UCO Bank</option>
													        					<option>Union Bank</option>
													        					<option>United Bank of India</option>
													        					<option>Vijaya Bank</option>
													        					<option>Yes Bank</option>
												        					</select><br>

									        								<button type="submit" class="btn btn-danger btn-block" data-toggle="modal" data-target="#exampleModalCenter">Pay using Net Banking</button>

									        								<div class="modal fade bg-secondary" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  																				<div class="modal-dialog modal-dialog-centered" role="document">
    																				<div class="modal-content bluelagoo_theme" style="background: #0052D4; background: -webkit-linear-gradient(to right, #6FB1FC, #4364F7, #0052D4); background: linear-gradient(to right, #6FB1FC, #4364F7, #0052D4);">
      																					<div class="modal-header">
        																					<h4 class="modal-title" id="exampleModalLongTitle"><b>Pay Using Net Banking</b></h4>
        																					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          																							<span aria-hidden="true">&times;</span>
        																					</button>
      																					</div>
      																					<div class="modal-body">
        																					<p>(User Name & Passwords arecase sensitive)</p><br>

																							<form>
																								<label>User Name:</label>
																								<input class="form-control" type="text" name="user_name" required><br>
																								<label>Password:</label>
																								<input class="form-control" type="password" name="password" required><br>
																								<button class="btn btn-primary btn-sm" id="submit_data">Submit</button>

																								<input type="reset" name="reset" value="Reset" class="btn btn-primary btn-sm">
																							</form>
      																					</div>
    																				</div>
 			 																	</div>
																			</div>

									        							</form>


								        							</div><br>

								        						</div>
									        				</div>

									        			</div>
							        

							        	</div>
							      	</div>
							    </div>
							</div>


							<div class="card">
							    <div class="card-header" id="headingFive">
							      	<h2 class="mb-0">
							        	<button class="btn btn-secondary btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">Pay via UPI</button>
							      	</h2>
							    </div>

							    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
							      	<div class="card-body">
							        	<div class="container"><hr>
							        		<div class="row">
							        			
							        			<div class="col-md-1">
							        				<div class="card">
							        					<img height="100%" width="100%" src="https://lh3.googleusercontent.com/i2Fre-Rkia4zDf9XEZTeXeLDkH_XDQPAKa5Y7FwVvs8N8MKYfZ_mM5YkxUy0A84shEca03-hJWGzfWMpa2bHJF2uintPTzT22KO1Wg">
							        				</div>
							        			</div>

							        			<div class="col-md-1">
							        				<div class="card">
							        					<img height="100%" width="100%" src="https://exchange4media.gumlet.com/news-photo/100494.phonepelogo.jpg?format=webp&w=400&dpr=2.6">
							        				</div>
							        			</div>

							        			<div class="col-md-1">
							        				<div class="card">
							        					<img height="100%" width="100%" src="https://secureservercdn.net/166.62.112.199/eg9.1b4.myftpupload.com/wp-content/uploads/2019/05/13-1484562860-2.png">
							        				</div>
							        			</div>

							        			<div class="col-md-1">
							        				<div class="card">
							        					<img height="100%" width="100%" src="https://www.kindpng.com/picc/m/12-123461_paytm-logo-in-png-transparent-png.png">
							        				</div>
							        			</div>

							        			<div class="col-md-1">
							        				<div class="card">
							        					<img height="100%" width="100%" src="https://images.financialexpress.com/2019/01/amazon_pay660.jpg">
							        				</div>
							        			</div>

							        		</div><hr><br>

							        		<div class="col-md-6">
							        			<form action="success.php" method="POST">
							        				<label>Enter UPI ID</label>
							        				<input class="form-control" type="email" name="upi" placeholder="example@upi" required><br>
							        				<input type="submit" name="submit" value="Checkout" class="btn btn-danger">
							        			</form>
							        		</div>

							        	</div>
							      	</div>
							    </div>
							</div>


							<div class="card">
							    <div class="card-header" id="headingSix">
							      	<h2 class="mb-0">
							        	<button class="btn btn-secondary btn-block" type="button" data-toggle="modal" data-target="#exampleModal">Cash on Delivery</button>
							      	</h2>
							    </div>
							        	
							    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  									<div class="modal-dialog" role="document">
    									<div class="modal-content">
     				 						<div class="modal-header">
        										<h5 class="modal-title" id="exampleModalLabel">Cash on Delivery</h5>
        										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          											<span aria-hidden="true">&times;</span>
        										</button>
      										</div>
      										<div class="modal-body">
        										<p><b>Are you sure?</b></p>
        										<p>(Please try to avoid this method because of COVID-19 pandemic issue.)</p>
      										</div>
      										<div class="modal-footer">
        										<a href="order_placed.php"><button type="button" class="btn btn-danger">Yes, Checkout</button></a>
        										<button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
      										</div>
    									</div>
  									</div>
								</div>

							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
	</body>
</html>
