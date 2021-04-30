
    <?php
        // Database Connection
        require '../include/config.php';

        //  Add Function 
        if(isset($_POST['req_add'])){

            $customer       = $_POST['customer'];
            $accessory      = $_POST['accessory'];
            $request_date   = $_POST['request_date'];
            $delivery_date  = $_POST['delivery_date'];
            $job_desc       = $_POST['job_desc'];
            $user_desc      = $_POST['user_desc'];
            $status         = 'requests';

            $check= mysqli_query($conn, "SELECT * FROM jobs WHERE accessory='$accessory' AND request_date='$request_date' AND delivery_date='$delivery_date' AND job_desc='$job_desc' AND user_desc='$user_desc' AND customerId='$customer'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $insert = "INSERT INTO jobs (accessory,request_date,delivery_date,job_desc,user_desc,status,customerId) VALUES ('$accessory','$request_date','$delivery_date','$job_desc','$user_desc','$status','$customer')";
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

        //  Update Function 
        if(isset($_POST['req_update'])){

            $id             = $_POST['view_id'];
            $customer       = $_POST['customer'];
            $accessory      = $_POST['accessory'];
            $request_date   = $_POST['request_date'];
            $delivery_date  = $_POST['delivery_date'];
            $job_desc       = $_POST['job_desc'];
            $status         = $_POST['status'];

            $check= mysqli_query($conn, "SELECT * FROM jobs WHERE accessory='$accessory' AND request_date='$request_date' AND delivery_date='$delivery_date' AND job_desc='$job_desc' AND customerId='$customer' AND status='$status' ");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $edit = "UPDATE jobs 
                                    SET accessory   ='$accessory',
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