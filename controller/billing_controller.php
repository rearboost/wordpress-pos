    <?php
        // Database Connection
        require '../include/config.php';

           // Row Add Function 
        if(isset($_POST['addrow'])){

            $product_name = $_POST['product_name'];
            $quantity = $_POST['quantity'];

            $get_price = "SELECT B.max_price AS price , B.stock_quantity AS stock 
                            FROM wp_posts A 
                            INNER JOIN wp_wc_product_meta_lookup B
                            ON A.ID = B.product_id WHERE A.post_title = '$product_name'";

            $result_price = mysqli_query($conn,$get_price);
            $row = mysqli_fetch_assoc($result_price);
            $price  = $row['price'];
            $stock  = $row['stock']-1;

            $sql ="SELECT * FROM temp_pos WHERE product= '$product_name'";
            $result=mysqli_query($conn,$sql);
            $row_get = mysqli_fetch_assoc($result);
            $count =mysqli_num_rows($result);
            $stock_quantity = $row_get['stock_quantity'];

            $stockEmptyCode = 0;

            $amount = $quantity * $price;

            if($stock>0){

                if($count==0){
                
                    $sql_temp = "INSERT INTO  temp_pos (product,qty,price,amount,stock_quantity) VALUES ('$product_name','$quantity','$price','$amount','$stock')";
                    $result_temp = mysqli_query($conn,$sql_temp);
                
                }else{

                    if($stock_quantity>0){

                        $sql_temp = "UPDATE temp_pos
                        SET qty = qty + $quantity, amount = amount + $amount , stock_quantity = stock_quantity - $quantity
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
            $date = $_POST['date'];

            $sql_invoice = "INSERT INTO  invoice (total,discount,payment,date) VALUES ('$total','$discount','$payment','$date')";
            mysqli_query($conn,$sql_invoice);

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
                    $amount=$row['amount'];

                    $sql_invoice_items = "INSERT INTO invoice_items (invoice_id,product,qty,price,amount) VALUES ('$invoice_id','$product','$qty','$price','$amount')";
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