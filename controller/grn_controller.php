    <?php
        // Database Connection
        require '../include/config.php';

           // Row Add Function 
        if(isset($_POST['addrow'])){

            $product_name = $_POST['product_name'];
            $quantity = $_POST['quantity'];
            $unit_price = $_POST['unit_price'];
            $unit_disc = $_POST['unit_disc'];
            $warranty = $_POST['warranty'];

            // $get_price = "SELECT B.max_price AS price , B.stock_quantity AS stock , A.ID AS post_id 
            //                 FROM wpss_posts A 
            //                 INNER JOIN wpss_wc_product_meta_lookup B
            //                 ON A.ID = B.product_id WHERE A.post_title = '$product_name'";

            // $result_price = mysqli_query($conn,$get_price);
            // $check = mysqli_num_rows($result_price);

            // if(!empty($check)){

            //     $row = mysqli_fetch_assoc($result_price);
            //     $price  = $row['price'];
            //     $stock  = $row['stock']-$quantity;
            //     $post_id  = $row['post_id'];

            //     $meta_key = "_regular_price";
            //     $get_discount = "SELECT * FROM wpss_postmeta WHERE post_id='$post_id' AND meta_key ='$meta_key'";
            //     $result_discount = mysqli_query($conn,$get_discount);
            //     $check_count = mysqli_num_rows($result_discount);
            //     if($check_count>0){
            //         $discount  = $result_discount['meta_value']-$price;
            //     }else{
            //         $discount  = "0.00";
            //     }
                
            // }else{

            //     $get_price2 = "SELECT max_price AS price , stock_qty AS stock , discount
            //                 FROM dashboard_items  
            //                 WHERE item = '$product_name'";

            //     $result_price2 = mysqli_query($conn,$get_price2);
            //     $row2 = mysqli_fetch_assoc($result_price2);
            //     $price  = $row2['price'];
            //     $stock  = $row2['stock']-$quantity;
            //     $discount  = $row2['discount'];
            // }

            $sql ="SELECT * FROM temp_grn WHERE product= '$product_name' AND price='$unit_price' AND warranty='$warranty'  ";
            $result=mysqli_query($conn,$sql);
            $row_get = mysqli_fetch_assoc($result);
            $count =mysqli_num_rows($result);

            $amount = $quantity * $unit_price;
            $discount = $unit_disc * $quantity;
            $amount = $amount-$discount;

            if($count==0){
            
                $sql_temp = "INSERT INTO  temp_grn (product,warranty,qty,price,discount,amount) VALUES ('$product_name','$warranty','$quantity','$unit_price','$discount','$amount')";
                $result_temp = mysqli_query($conn,$sql_temp);
            
            }else{

                $sql_temp = "UPDATE temp_grn
                SET qty = qty + $quantity, amount = amount + $amount , discount= discount + $discount
                WHERE product= '$product_name'AND price='$unit_price' AND warranty='$warranty'";
                $result_temp = mysqli_query($conn,$sql_temp);
                
            }

            $sql ="SELECT SUM(amount) AS amount FROM temp_grn";
            $result=mysqli_query($conn,$sql);
            $row_get = mysqli_fetch_assoc($result);
            $amount = $row_get['amount'];
           
            echo $amount;

        }

        /////////Add function from dashboard items

        // Table Empty Function 
        if(isset($_POST['tmpEmpty'])){
            
            $empty_temp = "TRUNCATE temp_grn;";
            mysqli_query($conn,$empty_temp);   
        }

        // Remove  Function 
        if(isset($_POST['removeRow'])){
            
            $id = $_POST['id'];
            $remove_temp = "DELETE FROM temp_grn WHERE id='$id'";
            mysqli_query($conn,$remove_temp);

            $sql ="SELECT SUM(amount) AS amount FROM temp_grn";
            $result=mysqli_query($conn,$sql);
            $row_get = mysqli_fetch_assoc($result);
            $amount = $row_get['amount'];
            
            echo $amount;
    
        }

        //////////////////////////////////////////////////////////////

        // Save Function 
        if(isset($_POST['save'])){

            $total          = $_POST['total'];
            $discount       = $_POST['discount'];
            $payment        = $_POST['payment'];
            $credit_period  = $_POST['credit_period'];
            $supplier       = $_POST['supplier'];
            $date           = $_POST['date'];
            $inv_id         = $_POST['inv_id'];
            $payment_type   = $_POST['payment_type'];

            if($payment<$total && $credit_period>0){
                $creditEnddate= date('Y-m-d', strtotime($date. ' + '.$credit_period.' days'));
            }else{
                $creditEnddate = "";
            }
            // $bank = $_POST['bank'];
            // $cheque_no = $_POST['cheque_no'];
            // $due_date = $_POST['due_date'];
            // $card_type = $_POST['card_type'];
            // $card_no = $_POST['card_no'];

            // if($payment_type=='cash' || $payment_type=='credit' || $payment_type=='cheque'){
            //     $card_type = '';
            // }else{
            //     $card_type = $_POST['card_type'];
            // }

            $sql_grn = "INSERT INTO grn(inv_id,total,discount,payment,credit_period,supplier,date,creditEnddate,payment_type) VALUES ('$inv_id','$total','$discount','$payment','$credit_period','$supplier','$date','$creditEnddate','$payment_type')";
            mysqli_query($conn,$sql_grn);

            //// update Summary ////

            $year =  date("Y");
            $month = date("m");
            $createDate = date("Y-m-d");

            $querySummary = "SELECT id ,outgoing FROM summary WHERE year='$year' AND month='$month' ";
            $resultSummary = mysqli_query($conn ,$querySummary);

            $countSummary =mysqli_num_rows($resultSummary);

            if($countSummary>0){

                while($rowSummary = mysqli_fetch_array($resultSummary)){

                    $oldOutgoing = $rowSummary['outgoing'];
                    $id = $rowSummary['id'];
                }

                $newOutgoing = ($oldOutgoing +$payment);

                $queryRow ="UPDATE summary SET outgoing='$newOutgoing' WHERE id='$id' ";
                $rowRow =mysqli_query($conn,$queryRow);

            }else{

                $query ="INSERT INTO  summary (year,month,outgoing,createDate)  VALUES (?,?,?,?)";

                $stmt =mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$query))
                {
                    echo "SQL Error";
                }
                else
                {
                    mysqli_stmt_bind_param($stmt,"ssss",$year,$month,$payment,$createDate);
                    $result =  mysqli_stmt_execute($stmt);
                }

                for ($x = 1; $x < 13; $x++) {
              
                    if($month !=str_pad($x, 2, "0", STR_PAD_LEFT)){

                      $queryDefult ="INSERT INTO  summary (year,month,createDate)  VALUES (?,?,?)";

                      $stmt =mysqli_stmt_init($conn);
                      if(!mysqli_stmt_prepare($stmt,$queryDefult))
                      {
                          echo "SQL Error";
                      }
                      else
                      {
                          mysqli_stmt_bind_param($stmt,"sss",$year,str_pad($x, 2, "0", STR_PAD_LEFT),$createDate);
                          $result =  mysqli_stmt_execute($stmt);
                      }

                    }
                }
            }

            $sql ="SELECT id FROM grn ORDER BY id DESC LIMIT 1";
            $result=mysqli_query($conn,$sql);
            $row_get = mysqli_fetch_assoc($result);
            $grn_id = $row_get['id'];

            $sql_temp=mysqli_query($conn,"SELECT * FROM temp_grn");

            $numRows = mysqli_num_rows($sql_temp); 

            if($numRows > 0) {

                while($row = mysqli_fetch_assoc($sql_temp)) {

                    $product=$row['product'];
                    $qty=$row['qty'];
                    $price=$row['price'];
                    $discount=$row['discount'];
                    $amount=$row['amount'];
                    $warranty=$row['warranty'];

                    $getQTY = mysqli_query($conn, "SELECT * FROM dashboard_items WHERE item='$product' ");
                    $qtyCount = mysqli_num_rows($getQTY);

                    if($qtyCount>0){

                        $updateStock = mysqli_query($conn, "UPDATE dashboard_items
                                                            SET stock_qty=stock_qty+$qty,
                                                                stock_status='instock'
                                                            WHERE item ='$product' ");

                    }else{
                        $otherQty = mysqli_query($conn,"SELECT B.stock_quantity AS stock,
                            A.ID AS post_id
                            FROM wpss_posts A 
                            INNER JOIN wpss_wc_product_meta_lookup B
                            ON A.ID = B.product_id WHERE A.post_title = '$product'");
                        $getVAL = mysqli_fetch_assoc($otherQty);

                        $UP_ID = $getVAL['post_id'];

                        $updateStock = mysqli_query($conn, "UPDATE wpss_wc_product_meta_lookup
                                                            SET stock_quantity=stock_quantity+$qty,
                                                                stock_status='instock'
                                                            WHERE product_id ='$UP_ID' ");
                    }

                    $sql_grn_items = "INSERT INTO grn_items (grn_id,product,warranty,qty,price,discount,amount) VALUES ('$grn_id','$product','$warranty','$qty','$price','$discount','$amount')";
                    mysqli_query($conn,$sql_grn_items);
                }
            }

            if($result){
                
                echo 1;

            }else{
                echo  mysqli_error($conn);		
            }
        }
       
    ?>