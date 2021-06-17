<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  	<link rel="stylesheet" type="text/css" href="../css/allcustomers.css">
	<title>Our Customers | Basic Banking Management System</title>
</head>
<body>
	<section id="main" class="">
		<div id="heading_bar" class="jumbotron-fluid">
			<div id="child"></div>
			<h1 id="heading">Our Customers</h1>
		</div>
		<div id="data_container">
			<?php include '../database/connect.php';
				$sql = "SELECT * FROM customers";
				$query = mysqli_query($con, $sql);

				while($result = mysqli_fetch_array($query)){
					if(strlen($result['email'])>19){
						$email = substr($result['email'],0,19)."...";
					}else{
						$email = $result['email'];
					}
					?>
					<div class="box pb-3">
						<h5 style="background-color: #FFCE5D; width: 100%" class="text-center py-2"><?php echo $result['name'];?></h5>
						<div>	
							<div class="d-flex justify-content-center px-2">
								<p class="my-0"><i class="fas fa-envelope mr-2"></i></p>
								<p class="gmail my-0" title="<?php echo $result['email'];?>" style="word-break: break-all;"><?php echo $email;?></p>
							</div>
							<div class="d-flex justify-content-center">
								<p id="rupee_icon" class="d-flex justify-content-center align-items-center my-1"><i class="fas fa-rupee-sign mr-2"></i></p>
								<p id="rupee" class="my-1"><?php echo $result['current_balance'];?></p>	
							</div>
							<div class="d-flex justify-content-center">
								<button class="btn btn-sm transfer_btn">
									Money Transfer
								</button>
							</div>
						</div>
					</div>
			<?php	
				}
			?>
		</div>
	</section>
	<div id="popup">
		<h5 class="text-center py-2" style="background-color:#FFCE5D;">Transfer Your Money</h5>
		<div id="fromGmail" class="d-flex justify-content-center align-items-center px-2 mx-2">
			<p id="from" class="d-flex my-auto mr-2">From</p>
			<input type="text" name="txt_from" value="arghapaul100@gmail.com" id="fromGmailText" readonly="" class="form-control form-control-sm">
		</div>
		<div id="toGmail" class="d-flex justify-content-center align-items-center px-2 mx-2 my-2">
			<p id="to" class="d-flex my-auto mr-2">To</p>
			<select name="txt_to" id="toGmailText" class="form-control form-control-sm">
			</select>
		</div>
		<div class="px-3 d-flex justify-content-end">
			<p id="toGmailErr" class="text-danger d-none m-0">This field is require</p>
		</div>
		
		<hr class="mx-auto" style="width : 90%"/>

		<div id="totalAmountConatiner" class="d-flex justify-content-center align-items-center">
			<p id="totalAmount" class="text-center">Current Amount : 50000</p>
		</div>

		<div id="transferAmount" class="d-flex justify-content-center align-items-center px-2 mx-2">
			<p id="amount" class="d-flex my-auto mr-2">Transfer Amount</p>
			<input type="number" name="txt_amount" placeholder="Type your amount..." id="transferAmountText"class="form-control form-control-sm">
		</div>
		<div class="px-3 d-flex justify-content-end">
			<p id="amountFieldErr" class="text-danger d-none m-0">This field is require</p>
		</div>

		<div id="finalTransferButtonContainer" class="d-flex justify-content-center align-items-center pt-3">
			<button class="btn" id="finalTransferButton">
				Transfer
			</button>
		</div>
		<p id="cancelTransect" class="text-center m-3">
			<span id="cancelTransectChild">
				Cancel Transection
			</span>
		</p>

	</div>

	<div id="successPopUp" class="d-none">
		<div id="gifContainer" class="">
			<video src="../bg/success.mp4" width="300" height="200" autoplay muted>
			</video>
		</div>
		<p id="successText" class="text-center m-0">Successfuly! Amount transfered.</p>
		<button class="btn btn-sm" id="successPopupCloseButton">
			<span>
				Close
			</span>
		</button>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
	<script src="../js/allcustomers.js"></script>

</body>
</html>