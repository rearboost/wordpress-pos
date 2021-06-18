    <?php
        // Database Connection
        require '../include/config.php';

           // Row Add Function 
        if(isset($_POST['addrow'])){

            $product_name = $_POST['product_name'];
            $quantity = $_POST['quantity'];
            $warranty = $_POST['warranty'];
            $serial_no = $_POST['serial_no'];

            $get_price = "SELECT B.max_price AS price , B.stock_quantity AS stock , A.ID AS post_id 
                            FROM wpss_posts A 
                            INNER JOIN wpss_wc_product_meta_lookup B
                            ON A.ID = B.product_id WHERE A.post_title = '$product_name'";

            $result_price = mysqli_query($conn,$get_price);
            $check = mysqli_num_rows($result_price);

            if(!empty($check)){

                $row = mysqli_fetch_assoc($result_price);
                $price  = $row['price'];
                $stock  = $row['stock']-$quantity;
                $post_id  = $row['post_id'];

                $meta_key = "_regular_price";
                $get_discount = "SELECT * FROM wpss_postmeta WHERE post_id='$post_id' AND meta_key ='$meta_key'";
                $result_discount = mysqli_query($conn,$get_discount);
                $check_count = mysqli_num_rows($result_discount);
                if($check_count>0){
                    $discount  = $result_discount['meta_value']-$price;
                }else{
                    $discount  = "0.00";
                }
                
            }else{

                $get_price2 = "SELECT max_price AS price , stock_qty AS stock , discount
                            FROM dashboard_items  
                            WHERE item = '$product_name'";

                $result_price2 = mysqli_query($conn,$get_price2);
                $row2 = mysqli_fetch_assoc($result_price2);
                $price  = $row2['price'];
                $stock  = $row2['stock']-$quantity;
                $discount  = $row2['discount'];
            }

            $sql ="SELECT * FROM temp_pos WHERE product= '$product_name'";
            $result=mysqli_query($conn,$sql);
            $row_get = mysqli_fetch_assoc($result);
            $count =mysqli_num_rows($result);
            $stock_quantity = $row_get['stock_quantity'];

            $stockEmptyCode = 0;

            $amount = $quantity * $price;
            $discount = $discount * $quantity;
            $amount = $amount-$discount;

            if($stock>0){

                if($count==0){
                
                    $sql_temp = "INSERT INTO  temp_pos (product,warranty,serial_no,qty,price,discount,amount,stock_quantity) VALUES ('$product_name','$warranty','$serial_no','$quantity','$price','$discount','$amount','$stock')";
                    $result_temp = mysqli_query($conn,$sql_temp);
                
                }else{

                    if($stock_quantity>0){

                        $sql_temp = "UPDATE temp_pos
                        SET qty = qty + $quantity, amount = amount + $amount , discount= discount + $discount ,stock_quantity = stock_quantity - $quantity
                        WHERE product= '$product_name'";
                        $result_temp = mysqli_query($conn,$sql_temp);
                    }else{

                        $stockEmptyCode = 2 ;
                    } 
                }

                if($stockEmptyCode==0){

                    $sql ="SELECT SUM(amount) AS amount FROM temp_pos";
                    $result=mysqli_query($conn,$sql);
                    $row_get = mysqli_fetch_assoc($result);
                    $amount = $row_get['amount'];
                   
                    echo $amount;

                }else{
                    //echo  mysqli_error($con);		
                    $stockEmptyCode = 2;
                    echo $stockEmptyCode;
                }

            }else{
                $stockEmptyCode = 2;
                echo $stockEmptyCode;
            }
        }

        /////////Add function from dashboard items

        // Table Empty Function 
        if(isset($_POST['tmpEmpty'])){
            
            $empty_temp = "TRUNCATE temp_pos;";
            mysqli_query($conn,$empty_temp);   
        }

        // Remove  Function 
        if(isset($_POST['removeRow'])){
            
            $id = $_POST['id'];
            $remove_temp = "DELETE FROM temp_pos WHERE id='$id'";
            mysqli_query($conn,$remove_temp);

            $sql ="SELECT SUM(amount) AS amount FROM temp_pos";
            $result=mysqli_query($conn,$sql);
            $row_get = mysqli_fetch_assoc($result);
            $amount = $row_get['amount'];
            
            echo $amount;
    
        }

        //////////////////////////////////////////////////////////////

        // Save Function 
        if(isset($_POST['save'])){

            $total = $_POST['total'];
            $discount = $_POST['discount'];
            $payment = $_POST['payment'];
            $credit_period = $_POST['credit_period'];
            $customer = $_POST['customer'];
            $billing_address = $_POST['billing_address'];
            $date = $_POST['date'];

            $payment_type = $_POST['payment_type'];
            $bank = $_POST['bank'];
            $cheque_no = $_POST['cheque_no'];
            $due_date = $_POST['due_date'];
            $card_type = $_POST['card_type'];
            $card_no = $_POST['card_no'];

            if($payment_type=='cash' || $payment_type=='credit' || $payment_type=='cheque'){
                $card_type = '';
            }else{
                $card_type = $_POST['card_type'];
            }

            $sql_invoice = "INSERT INTO  invoice (total,discount,payment,credit_period,customer,billing_address,date,payment_type,bank,cheque_no,cheque_dueDate,card_type,card_no) VALUES ('$total','$discount','$payment','$credit_period','$customer','$billing_address','$date','$payment_type','$bank','$cheque_no','$due_date','$card_type','$card_no')";
            mysqli_query($conn,$sql_invoice);


            // summary update

            $year =  date("Y");
            $month = date("m");
            $createDate = date("Y-m-d");

            ///////////////summarry query starts///////////

            $querySummary = "SELECT id ,income FROM summary WHERE year='$year' AND month='$month' ";
            $resultSummary = mysqli_query($conn ,$querySummary);

            $countSummary =mysqli_num_rows($resultSummary);

            if($countSummary>0){

                while($rowSummary = mysqli_fetch_array($resultSummary)){

                    $oldincome = $rowSummary['income'];
                    $id = $rowSummary['id'];
                }

                $newincome = ($oldincome +$total);

                $queryRow ="UPDATE summary SET income='$newincome' WHERE id='$id' ";
                $rowRow =mysqli_query($conn,$queryRow);

            }else{

                $query ="INSERT INTO  summary (year,month,income,createDate)  VALUES (?,?,?,?)";

                $stmt =mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$query))
                {
                    echo "SQL Error";
                }
                else
                {
                    mysqli_stmt_bind_param($stmt,"ssss",$year,$month,$total,$createDate);
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

            $sql ="SELECT id FROM invoice ORDER BY id DESC LIMIT 1";
            $result=mysqli_query($conn,$sql);
            $row_get = mysqli_fetch_assoc($result);
            $invoice_id = $row_get['id'];

            $sql_temp=mysqli_query($conn,"SELECT * FROM temp_pos");

            $numRows = mysqli_num_rows($sql_temp); 

            if($numRows > 0) {

                while($row = mysqli_fetch_assoc($sql_temp)) {

                    $product=$row['product'];
                    $qty=$row['qty'];
                    $price=$row['price'];
                    $discount=$row['discount'];
                    $amount=$row['amount'];
                    $warranty=$row['warranty'];
                    $serial_no=$row['serial_no'];

                    $getQTY = mysqli_query($conn, "SELECT * FROM dashboard_items WHERE item='$product' ");
                    $qtyCount = mysqli_num_rows($getQTY);

                    if($qtyCount>0){
                        $qtyValues = mysqli_fetch_assoc($getQTY);
                        $U_stock = $qtyValues['stock_qty'];
                        $UP_stock = $U_stock-$qty;

                        if($UP_stock==0){
                            $UP_status = 'outofstock';
                        }else{
                            $UP_status = 'instock';
                        }

                        $updateStock = mysqli_query($conn, "UPDATE dashboard_items
                                                            SET stock_qty = $UP_stock,
                                                                stock_status='$UP_status'
                                                            WHERE item ='$product' ");

                    }else{
                        $otherQty = mysqli_query($conn,"SELECT B.stock_quantity AS stock,
                            A.ID AS post_id
                            FROM wpss_posts A 
                            INNER JOIN wpss_wc_product_meta_lookup B
                            ON A.ID = B.product_id WHERE A.post_title = '$product'");
                        $getVAL = mysqli_fetch_assoc($otherQty);

                        $UP_ID = $getVAL['post_id'];
                        $U_stock = $getVAL['stock'];
                        
                        $UP_stock = $U_stock-$qty;

                        if($UP_stock==0){
                            $UP_status = 'outofstock';
                        }else{
                            $UP_status = 'instock';
                        }

                        $updateStock = mysqli_query($conn, "UPDATE wpss_wc_product_meta_lookup
                                                            SET stock_quantity = $UP_stock,
                                                                stock_status='$UP_status'
                                                            WHERE product_id ='$UP_ID' ");
                    }

                    $sql_invoice_items = "INSERT INTO invoice_items (invoice_id,product,warranty,serial_no,qty,price,discount,amount) VALUES ('$invoice_id','$product','$warranty','$serial_no','$qty','$price','$discount','$amount')";
                    mysqli_query($conn,$sql_invoice_items);
                }
            }

            if($result){
                
                echo $invoice_id;

            }else{
                echo  mysqli_error($conn);		
            }
        }
       
    ?>