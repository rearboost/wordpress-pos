<?php
	error_reporting(0);
	include("../include/config.php");

	$customer_id = $_POST['customer_id'];

	$get_credit = mysqli_query($conn,"SELECT * FROM invoice WHERE customer='$customer_id' AND credit_period<>0");

	$data    = mysqli_fetch_array($get_credit);

	$total	 = $data['total'];
	$payment = $data['payment'];

	$myObj->total  = $total;
	$myObj->payment  = $payment;
	
	$myJSON = json_encode($myObj);

	echo $myJSON;

?>