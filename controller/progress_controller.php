
    <?php
        // Database Connection
        require '../include/config.php';

        
        // Update Function 
        if(isset($_POST['req_update'])){

            $id             = $_POST['view_id'];
            $customer       = $_POST['customer'];
            $accessory      = $_POST['accessory'];
            $request_date   = $_POST['request_date'];
            $delivery_date  = $_POST['delivery_date'];
            $job_desc       = $_POST['job_desc'];
            $user_desc      = $_POST['user_desc'];
            $progress       = $_POST['progress'];

            $check= mysqli_query($conn, "SELECT * FROM jobs WHERE accessory='$accessory' AND request_date='$request_date' AND delivery_date='$delivery_date' AND job_desc='$job_desc' AND user_desc='$user_desc' AND progress='$progress' AND customerId='$customer'");
		    $count = mysqli_num_rows($check);

            if($count==0){

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

            }else{
                echo 0;
            }
        }

        // //  Delete Function 
        // if(isset($_POST['removeID'])){

        //     $id    = $_POST['removeID'];
        //     $query ="DELETE FROM jobs WHERE jobId='$id'";
        //     $result = mysqli_query($conn,$query);
        //     if($result){
        //         echo  1;
        //     }else{
        //         echo  mysqli_error($conn);		
        //     }
        // }

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

        }

    ?>