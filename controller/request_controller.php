
    <?php
        // Database Connection
        require '../include/config.php';
        //  Add Function 
        if(isset($_POST['req_add'])){

            $customer       = $_POST['customer'];
            $accessory      = $_POST['accessory'];
            $brand          = $_POST['brand'];
            $model          = $_POST['model'];
            $request_date   = $_POST['request_date'];
            $delivery_date  = $_POST['delivery_date'];
            $job_desc       = $_POST['job_desc'];
            $user_desc      = $_POST['user_desc'];
            $status         = 'request';

            //$year = cur_date('Y');
            $today = new DateTime(null, new DateTimeZone('Asia/Colombo'));
            $year = $today->format('Y');

            $max_jobno = mysqli_query($conn,"SELECT jobId FROM jobs ORDER BY jobId DESC LIMIT 1");
            $data = mysqli_fetch_assoc($max_jobno);
            $numRows = mysqli_num_rows($max_jobno);
            if($numRows>0){
                $no = $data['jobId']+1;
            }else{
                $no = 1;
            }
            $job_no = $year . $no;

            $check= mysqli_query($conn, "SELECT * FROM jobs WHERE jobNo='$job_no' AND accessory='$accessory' AND brand='$brand' AND model='$model' AND request_date='$request_date' AND delivery_date='$delivery_date' AND job_desc='$job_desc' AND user_desc='$user_desc' AND customerId='$customer'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $insert = "INSERT INTO jobs (jobNo,accessory,brand,model,request_date,delivery_date,job_desc,user_desc,status,customerId) VALUES ('$job_no','$accessory','$brand','$model','$request_date','$delivery_date','$job_desc','$user_desc','$status','$customer')";
                $result = mysqli_query($conn,$insert);
                if($result){
                    echo  1;
                }else{
                    echo  mysqli_error($conn);		
                }
            }else{
                echo 0;
            }


            /////// send msg ////////

            $get_contact = mysqli_query($conn, "SELECT * FROM customer WHERE id='$customer'");
            $cus_data = mysqli_fetch_assoc($get_contact);

            $to = $cus_data['contact'];
            $msg = 'Dear customer, Your order has been placed under ' . $job_no .'. Thank You.';
        }

        //  Update Function 
        if(isset($_POST['req_update'])){

            $id             = $_POST['view_id'];
            $customer       = $_POST['customer'];
            $accessory      = $_POST['accessory'];
            $brand          = $_POST['brand'];
            $model          = $_POST['model'];
            $request_date   = $_POST['request_date'];
            $delivery_date  = $_POST['delivery_date'];
            $job_desc       = $_POST['job_desc'];
            $status         = $_POST['status'];

            $check= mysqli_query($conn, "SELECT * FROM jobs WHERE accessory='$accessory' AND brand='$brand' AND model='$model' AND request_date='$request_date' AND delivery_date='$delivery_date' AND job_desc='$job_desc' AND customerId='$customer' AND status='$status' ");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $edit = "UPDATE jobs 
                                    SET accessory   ='$accessory',
                                        brand  ='$brand',
                                        model  ='$model',
                                        request_date  ='$request_date',
                                        delivery_date  ='$delivery_date',
                                        job_desc  ='$job_desc',
                                        status  ='$status',
                                        customerId  ='$customer'
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

        //  Delete Function 
        if(isset($_POST['removeID'])){

            $id    = $_POST['removeID'];
            $query ="DELETE FROM jobs WHERE jobId='$id'";
            $result = mysqli_query($conn,$query);
            if($result){
                echo  1;
            }else{
                echo  mysqli_error($conn);		
            }
        }

    ?>