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
            $advance        = $_POST['advance'];
            $user_desc      = $_POST['user_desc'];
            $service_cost   = $_POST['service_cost'];
            $discount       = $_POST['discount'];
            $amount         = $_POST['amount_hidden'];
            $total_amount   = $_POST['total_amount'];
            $cash_payment   = $_POST['cash_payment'];
            $credit_payment = $_POST['credit_payment'];

            $check= mysqli_query($conn, "SELECT * FROM jobs WHERE accessory='$accessory' AND brand='$brand' AND model='$model' AND request_date='$request_date' AND delivery_date='$delivery_date' AND job_desc='$job_desc' AND advance='$advance' AND user_desc='$user_desc' AND service_cost='$service_cost' AND discount='$discount' AND gross_amount='$amount' AND payable_amt='$total_amount' AND cash_payment='$cash_payment' AND credit_payment='$credit_payment' AND customerId='$customer'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                if($credit_payment<0){
                    $credit_payment=0.00;
                }

                $edit = "UPDATE jobs 
                                    SET service_cost='$service_cost',
                                    discount='$discount',
                                    gross_amount='$amount',
                                    payable_amt='$total_amount',
                                    cash_payment='$cash_payment',
                                    credit_payment='$credit_payment'
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

        // if (isset($_POST['adddispatch_job_edit']))
        // {
        //     $addD_id = $_POST['adddispatch_job_edit'];
        //     $newstatus ="finish";

        //     $query ="UPDATE  jobs  SET status=?  WHERE jobId=?;";

        //     $stmt =mysqli_stmt_init($conn);
        //     if(!mysqli_stmt_prepare($stmt,$query))
        //     {
        //        echo "SQL Error";
        //     }
        //     else
        //     {
        //         mysqli_stmt_bind_param($stmt,"ss",$newstatus,$addD_id);
        //         $result =  mysqli_stmt_execute($stmt);
        //         if($result){
        //           echo 1;
        //         }else{
        //           echo 0;
        //         }
        //      }

        // }

    ?>