<?php
	
	include '../database/connect.php';
	if(isset($_POST)){
		$senderEmail = $_POST['gmailFrom'];
		$receiverEmail = $_POST['gmailTo'];
		$transferedAmount = $_POST['transferedAmount'];

		mysqli_query($con, "UPDATE customers SET current_balance = current_balance - '$transferedAmount' WHERE email = '$senderEmail'");

		mysqli_query($con, "UPDATE customers SET current_balance = current_balance + '$transferedAmount' WHERE email = '$receiverEmail'");

		mysqli_query($con, "INSERT INTO transfered_history (transfered_from, transfered_to, transfered_amount) VALUES ('$senderEmail', '$receiverEmail', '$transferedAmount')");
	}

?>