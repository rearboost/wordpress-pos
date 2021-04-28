
    <?php
        // Database Connection
        require '../include/config.php';

        // User Add Function 
        if(isset($_POST['add'])){

            $season       = $_POST['season'];
            $remark     = $_POST['remark'];

            $check= mysqli_query($conn, "SELECT * FROM season WHERE season='$season'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $insert = "INSERT INTO  season (season,remark) VALUES ('$season','$remark')";
                $result = mysqli_query($conn,$insert);
                if($result){
                    echo  1;
                }else{
                    echo  mysqli_error($conn);		
                }
                
            }else{
                echo 0;
            }

        }

    ?>