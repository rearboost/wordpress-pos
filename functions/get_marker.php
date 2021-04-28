<?php	

	require '../include/config.php';

	if(isset($_GET['buyerName'])){	

		$buyerName = $_GET['buyerName'];

		$get_style = mysqli_query($conn, "SELECT style FROM pre_order_costing WHERE buyerName='$buyerName' AND cad ='on' AND status=0");
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

    if(isset($_GET['style_bpo'])){	

		$style = $_GET['style_bpo'];
        $buyerName = $_GET['buyerName_bpo'];

		$get_bpo = mysqli_query($conn, "SELECT * FROM pre_order_costing WHERE buyerName='$buyerName' AND style='$style' AND status=0");
		$count = mysqli_num_rows($get_bpo);

		if($count>0){
            echo '<option value="">Select Order No</option>';
			while($row = mysqli_fetch_array($get_bpo)){
				echo '<option value ="'.$row['costingNo'].'" >Order - '.$row['costingNo'].'</option>';
			}
		}else{
			echo '<option value="">Not available</option>';
		}
		
	}




    


