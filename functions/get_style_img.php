<?php	

	require '../include/config.php';

	if(isset($_GET['masterName'])){	

		$masterName = $_GET['masterName'];

		$get_name = mysqli_query($conn, "SELECT name FROM main WHERE master='$masterName'");
		$count = mysqli_num_rows($get_name);

		if($count>0){
            echo '<option value="">Select Main Category</option>';
			while($row = mysqli_fetch_array($get_name)){
				echo '<option value ="'.$row['name'].'" >'.$row['name'].'</option>';
			}
		}else{
			echo '<option>Not available</option>';
		}
		
	}else{
		echo '<h1> Error</h1>';
	}



?>