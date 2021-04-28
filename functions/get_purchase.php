<?php	

	require '../include/config.php';

	if(isset($_GET['buyerName'])){	

		$buyerName = $_GET['buyerName'];

		$get_style = mysqli_query($conn, "SELECT DISTINCT style FROM pre_order_costing WHERE buyerName='$buyerName' AND confirmation_allocation=1");
		$count = mysqli_num_rows($get_style);

		if($count>0){
            echo '<option value="">Select Style</option>';
			while($row = mysqli_fetch_array($get_style)){
				echo '<option value ="'.$row['style'].'" >'.$row['style'].'</option>';
			}
		}else{
			echo '<option value="">Not available</option>';
		}
		
	}

    if(isset($_GET['buyerName_SR'])){	

		$buyerName = $_GET['buyerName_SR'];

		$get_sr = mysqli_query($conn, "SELECT DISTINCT size_ref FROM pre_order_costing WHERE buyerName='$buyerName' AND confirmation_allocation=1");
		$count = mysqli_num_rows($get_sr);

		if($count>0){
            echo '<option value="">Select Reference</option>';
			while($row = mysqli_fetch_array($get_sr)){
				echo '<option value ="'.$row['size_ref'].'" >'.$row['size_ref'].'</option>';
			}
		}else{
			echo '<option value="">Not available</option>';
		}
		
	}

    if(isset($_GET['style_bpo'])){	

		$style = $_GET['style_bpo'];
        $buyerName = $_GET['buyerName_bpo'];

		$get_bpo = mysqli_query($conn, "SELECT * FROM pre_order_costing WHERE buyerName='$buyerName' AND style='$style' AND confirmation_allocation=1");
		$count = mysqli_num_rows($get_bpo);

		if($count>0){
            echo '<option value="">Select B PO No</option>';
			while($row = mysqli_fetch_array($get_bpo)){
				echo '<option value ="'.$row['costingNo'].'" >Order - '.$row['costingNo'].'</option>';
			}
		}else{
			echo '<option value="">Not available</option>';
		}
		
	}

     if(isset($_GET['buyerName_DI'])){	

		$buyerName = $_GET['buyerName_DI'];

		$get_di = mysqli_query($conn, "SELECT DISTINCT division FROM  pre_order_costing WHERE buyerName='$buyerName' AND confirmation_allocation=1");
		$count = mysqli_num_rows($get_di);

		if($count>0){
            echo '<option value="">Select Division</option>';
			while($row = mysqli_fetch_array($get_di)){
				echo '<option value ="'.$row['division'].'" >'.$row['division'].'</option>';
			}
		}else{
			echo '<option value="">Not available</option>';
		}
		
	}





    


