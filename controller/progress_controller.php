
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
            $progress       = $_POST['progress'];

            //$check= mysqli_query($conn, "SELECT * FROM jobs WHERE accessory='$accessory' AND brand='$brand' AND model='$model' AND request_date='$request_date' AND delivery_date='$delivery_date' AND job_desc='$job_desc' AND user_desc='$user_desc' AND progress='$progress' AND customerId='$customer'");
		    //$count = mysqli_num_rows($check);

            //if($count==0){

                $edit = "UPDATE jobs 
                            SET user_desc='$user_desc',
                                progress='$progress'
                            WHERE jobId=$id";

                $result = mysqli_query($conn,$edit);
                if($result){
                    echo  1;
                }else{
                    echo  mysqli_error($conn);		
                }

            //}else{
                echo 0;
            //}

        }

        // Push to complete
        if (isset($_POST['addcomplete_job_edit']))
        {
            $addC_id = $_POST['addcomplete_job_edit'];
            $newstatus ="complete";


            $msg_data = mysqli_query($conn, "SELECT * FROM customer C INNER JOIN jobs J ON C.id=J.customerId WHERE jobId='$addC_id'");
            $mdata = mysqli_fetch_assoc($msg_data);

            $to = $mdata['contact'];
            $no = $mdata['jobNo'];
            $job = $mdata['accessory'];
            $msg = 'Dear customer, Your' .$job. '(order - ' .$job_no. ' ) is ready. Please visit our place at your convenience.';

            $query ="UPDATE  jobs  SET status=?  WHERE jobId=?;";

            $stmt =mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$query))
            {
               echo "SQL Error";
            }
            else
            {
                mysqli_stmt_bind_param($stmt,"ss",$newstatus,$addC_id);
                $result =  mysqli_stmt_execute($stmt);
                if($result){
                  echo 1;
                }else{
                  echo 0;
                }
             }

            ////////////// parts values /////////////////

            $sql_temp=mysqli_query($conn,"SELECT * FROM temp WHERE jobID='addC_id'");

            $numRows = mysqli_num_rows($sql_temp); 

            if($numRows > 0) {

                while($row = mysqli_fetch_assoc($sql_temp)) {

                    $jobID= $row['jobID'];
                    $parts=$row['parts'];
                    $imei=$row['imei'];
                    $qty=$row['qty'];
                    $price=$row['price'];

                    $insert_item = mysqli_query($conn,"INSERT INTO parts (jobID,qty,parts,price,imei) VALUES ('$jobID','$qty','$parts','$price','$imei')");

                }
                //$insert_temp = "TRUNCATE TABLE temp;";
                $insert_temp = "DELETE FROM temp WHERE jobID='jobID';";
                mysqli_query($conn,$insert_temp);

            }

        }

        // Row Add Function 
        if(isset($_POST['addrow'])){

            $job_id = $_POST['job_id'];
            $parts = $_POST['parts'];
            $imei = $_POST['imei'];
            $qty=$_POST['qty'];
            $price=$_POST['price'];

            $insert_temp = "INSERT INTO temp (jobID,qty,parts,price,imei) VALUES ('$job_id','$qty','$parts','$price','$imei')";
            $result_temp = mysqli_query($conn,$insert_temp);
            
            if($result_temp){
                echo  1;
            }else{
                echo  mysqli_error($conn);       
            }
         }

         // Remove  Function 
         if(isset($_POST['removeRow'])){
            
            $id = $_POST['id'];
            $insert_temp = "DELETE FROM temp WHERE id='$id'";
            mysqli_query($conn,$insert_temp);
            
         }

        // Table Empty Function 
        if(isset($_POST['tmpEmpty'])){
            
            $insert_temp = "TRUNCATE TABLE temp;";
            mysqli_query($conn,$insert_temp);
            
        }   

    ?>