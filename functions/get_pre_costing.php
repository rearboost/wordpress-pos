<?php	

	require '../include/config.php';

	if(isset($_GET['buyerName'])){	

		$buyerName = $_GET['buyerName'];

		$get_style = mysqli_query($conn, "SELECT style FROM style WHERE buyerName='$buyerName'");
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

		$get_sr = mysqli_query($conn, "SELECT sizeReference FROM sizeReference WHERE buyerName='$buyerName'");
		$count = mysqli_num_rows($get_sr);

		if($count>0){
            echo '<option value="">Select Reference</option>';
			while($row = mysqli_fetch_array($get_sr)){
				echo '<option value ="'.$row['sizeReference'].'" >'.$row['sizeReference'].'</option>';
			}
		}else{
			echo '<option value="">Not available</option>';
		}
		
	}

	if(isset($_GET['buyerName_SIZE'])){	

		$buyerName = $_GET['buyerName_SIZE'];

		$get_sr = mysqli_query($conn, "SELECT size FROM wise_sizes WHERE buyerName='$buyerName'");
		$count = mysqli_num_rows($get_sr);

		if($count>0){
            echo '<option value="">Select Size</option>';
			while($row = mysqli_fetch_array($get_sr)){
				echo '<option value ="'.$row['size'].'" >'.$row['size'].'</option>';
			}
		}else{
			echo '<option value="">Not available</option>';
		}
		
	}

    if(isset($_GET['style_img'])){	

		$style_img = $_GET['style_img'];

        $queryget ="SELECT * FROM style WHERE style='$style_img'";
        $resultget = mysqli_query($conn ,$queryget);
        $rowget = mysqli_fetch_array($resultget);
        $myObj->styleSpec = $rowget['styleSpec'];
        $myObj->stylePicture = $rowget['stylePicture'];

        $myJSON = json_encode($myObj);
        echo $myJSON;
		
	}


    if(isset($_GET['style_bpo'])){	

		$style = $_GET['style_bpo'];
        $buyerName = $_GET['buyerName_bpo'];

		$get_bpo = mysqli_query($conn, "SELECT * FROM pre_order_costing WHERE buyerName='$buyerName' AND style='$style'");
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

		$get_di = mysqli_query($conn, "SELECT * FROM  division WHERE buyerName='$buyerName'");
		$count = mysqli_num_rows($get_di);

		if($count>0){
            echo '<option value="">Select Division</option>';
			while($row = mysqli_fetch_array($get_di)){
				echo '<option value ="'.$row['buyerDivision'].'" >'.$row['buyerDivision'].'</option>';
			}
		}else{
			echo '<option value="">Not available</option>';
		}
		
	}





    


