
    <?php
        // Database Connection
        require '../include/config.php';

        // User Add Function 
        if(isset($_POST['add'])){

            $department       = $_POST['department'];
            $code       = $_POST['code'];
            $remark     = $_POST['remark'];

            $check= mysqli_query($conn, "SELECT * FROM department WHERE department='$department'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $insert = "INSERT INTO  department (department,code,remark) VALUES ('$department','$code','$remark')";
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