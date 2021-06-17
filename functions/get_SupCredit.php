<?php
	error_reporting(0);
	include("../include/config.php");

	$supplier_id = $_POST['supplier_id'];

	$get_credit = mysqli_query($conn,"SELECT SUM(total) as total, SUM(payment) as payment FROM grn WHERE supplier='$supplier_id' AND credit_period<>0 GROUP BY supplier");

	$data    = mysqli_fetch_array($get_credit);

	$total	 = $data['total'];
	$payment = $data['payment'];

	$myObj->total  = $total;
	$myObj->payment  = $payment;
	
	$myJSON = json_encode($myObj);

	echo $myJSON;

?>