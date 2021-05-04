    <?php
        // Database Connection
        require '../include/config.php';
        
        // Update Function 
        if(isset($_POST['req_update'])){

            $id             = $_POST['view_id'];
            $customer       = $_POST['customer'];
            $accessory      = $_POST['accessory'];
            $brand          = $_POST['brand'];
            $model          = $_POST['model'];
            $request_date   = $_POST['request_date'];
            $delivery_date  = $_POST['delivery_date'];
            $job_desc       = $_POST['job_desc'];
            $user_desc      = $_POST['user_desc'];
            $service_cost   = $_POST['service_cost'];
            $acessories_cost= $_POST['acessories_cost'];

            $check= mysqli_query($conn, "SELECT * FROM jobs WHERE accessory='$accessory' AND brand='$brand' AND model='$model' AND request_date='$request_date' AND delivery_date='$delivery_date' AND job_desc='$job_desc' AND user_desc='$user_desc' AND service_cost='$service_cost' AND acessories_cost='$acessories_cost' AND customerId='$customer'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $edit = "UPDATE jobs 
                                    SET service_cost='$service_cost',
                                    acessories_cost='$acessories_cost'
                                    WHERE jobId=$id";

                $result = mysqli_query($conn,$edit);
                if($result){
                    echo  1;
                }else{
                    echo  mysqli_error($conn);		
                }

            }else{
                echo 0;
            }
        }

        // Push to complete
        if (isset($_POST['adddispatch_job_edit']))
        {
            $addD_id = $_POST['adddispatch_job_edit'];
            $newstatus ="dispatch";

            $query ="UPDATE  jobs  SET status=?  WHERE jobId=?;";

            $stmt =mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$query))
            {
               echo "SQL Error";
            }
            else
            {
                mysqli_stmt_bind_param($stmt,"ss",$newstatus,$addD_id);
                $result =  mysqli_stmt_execute($stmt);
                if($result){
                  echo 1;
                }else{
                  echo 0;
                }
             }

        }

    ?>