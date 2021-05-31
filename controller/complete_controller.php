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

            $check= mysqli_query($conn, "SELECT * FROM jobs WHERE accessory='$accessory' AND brand='$brand' AND model='$model' AND request_date='$request_date' AND delivery_date='$delivery_date' AND job_desc='$job_desc' AND advance='$advance' AND user_desc='$user_desc' AND service_cost='$service_cost' AND customerId='$customer'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $edit = "UPDATE jobs 
                                    SET service_cost='$service_cost'
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

            /// SMS Send
              $sql_query = mysqli_query($conn,"SELECT J.jobId as jobId,J.customerId as customerId,J.billing_address as billing_address,C.name as name,C.contact as contact,J.jobNo as jobNo,J.advance as advance,J.service_cost as service_cost FROM customer C INNER JOIN jobs J ON C.id = J.customerId WHERE jobId='$addD_id' ");

              $data = mysqli_fetch_assoc($sql_query);

              $jobId = $data['jobId'];

              $cost_query=mysqli_query($conn,"SELECT SUM(qty*price) as tot_cost FROM parts WHERE jobID='$jobId'");
              $cost_data = mysqli_fetch_assoc($cost_query);

              $other_cost=$cost_data['tot_cost'];

              $customerId = $data['customerId'];
              $jobNo = $data['jobNo'];
              $service_cost = $data['service_cost'];
              $advance = $data['advance'];

              $amount = $service_cost+$other_cost;
              $rest = $amount-$advance;

              if($customerId=='1'){
                $billing_address = $data['billing_address'];
                $split_values = explode(',', $billing_address);
                $customer_name1 = $split_values[0];
                $to = $split_values[1];

                $split_name = explode(' ', $customer_name1);
                $customer_name = $split_name[0];
              }else{
                $customer_name1 = $data['name'];
                $to = $data['contact'];
                
                $split_name = explode(' ', $customer_name1);
                $customer_name = $split_name[0];
              }

              $User_name ="Shadcomputers"; //Your Username 
              $Api_key = "5bbb49d5c63f487727f0"; //Your API Key 
              $Gateway_type = "2"; //Define Premium Gateway 
              $Sender_id = "Shadcom"; //Your Sender ID 
              $Message_type = "2"; //1 for Short SMS, 2 for Long SMS 
              $Country_code = "94"; //Country Code 
              $Number = $to; //Mobile Number Without 0 
              $message = "Hi ".$customer_name.",Your Repair[Job Note #-".$job_no."] is ready.Total service amount is Rs.".$amount.".You have to pay Rs.".$rest.".Thank You, SHAD COMPUTERS"; //Your Message 

              $data = array( "user_name" => $User_name, "api_key" => $Api_key, "gateway_type" => $Gateway_type, "sender_id" => $Sender_id , "message_type" => $Message_type , "country_code" => $Country_code, "number" => $Number, "message" => $message ); 

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

              //SMS section end

        }

    ?>