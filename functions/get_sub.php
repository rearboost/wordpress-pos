<?php	

	require '../include/config.php';

	if(isset($_GET['main'])){	

		$main = $_GET['main'];
        $master = $_GET['master'];

		$get_name = mysqli_query($conn, "SELECT name FROM subCategory WHERE master='$master' AND main ='$main'");
		$count = mysqli_num_rows($get_name);

		if($count>0){
			echo '<option value="">Select Sub Category</option>';
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