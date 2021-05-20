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

        //update status to finish & Send SMS
        if (isset($_POST['addfinish_job_edit']))
        {
            $addF_id = $_POST['addfinish_job_edit'];
            $newstatus ="finish";

            $query ="UPDATE  jobs  SET status=?  WHERE jobId=?;";

            $stmt =mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$query))
            {
               echo "SQL Error";
            }
            else
            {
                mysqli_stmt_bind_param($stmt,"ss",$newstatus,$addF_id);
                $result =  mysqli_stmt_execute($stmt);
                if($result){
                  echo 1;
                }else{
                  echo 0;
                }
             }

              $sql_query = mysqli_query($conn,"SELECT C.name as name,C.contact as contact,J.jobNo as jobNo,J.payable_amt as payable_amt FROM customer C INNER JOIN jobs J ON C.id = J.customerId WHERE jobId='$addF_id' ");

              $data = mysqli_fetch_assoc($sql_query);

              $customer_name = $data['name'];
              $amount = $data['payable_amt'];
              $jobNo = $data['jobNo'];

              $User_name ="Shadcomputers"; //Your Username 
              $Api_key = "5bbb49d5c63f487727f0"; //Your API Key 
              $Gateway_type = "1"; //Define Economy Gateway 
              $Country_code = "94"; //Country Code 
              $Number = $data['contact']; //Mobile Number Without 0 

              $message = "Hi ".$customer_name.", Thank You For Your Purchase, We Received Your Payment Rs.".$amount." For Invoice-".$jobNo." .Thank You, SHAD COMPUTERS"; //Message 

              $data = array( "user_name" => $User_name, "api_key" => $Api_key, "gateway_type" => $Gateway_type, "country_code" => $Country_code, "number" => $Number, "message" => $message ); 
              $data_string = json_encode($data); 

              $ch = curl_init('https://my.ipromo.lk/api/postsendsms/'); 
              curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); 
              curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string); 
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
              curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json', 'Content-Length: ' . strlen($data_string)) ); 
              curl_setopt($ch, CURLOPT_TIMEOUT, 5); 
              curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); 

              //Execute Post 
              $result = curl_exec($ch);
              //Close Connection 
              curl_close($ch); 
              echo $result; 

        }

    ?>