    <?php
        // Database Connection
        require '../include/config.php';

        // Add Function 
        if(isset($_POST['add'])){

            $invoice_id = $_POST['invoice_id'];
            $invoice_items_id = $_POST['invoice_items_id'];
            $qty = $_POST['qty'];
            $claim_qty = $_POST['claim_qty'];
            $action = $_POST['optionsRadios'];
            $warranty_note = $_POST['warranty_note'];
            $date = date("Y-m-d");

            if($action=='Return Money'){
                $getProduct = mysqli_query($conn, "SELECT * FROM invoice_items WHERE id=$invoice_items_id ");
                $data = mysqli_fetch_assoc($getProduct);
                $product = $data['product'];

                $getQTY = mysqli_query($conn, "SELECT * FROM dashboard_items WHERE item='$product' ");
                $qtyCount = mysqli_num_rows($getQTY);

                if($qtyCount>0){
                    $qtyValues = mysqli_fetch_assoc($getQTY);
                    $U_stock = $qtyValues['stock_qty'];
                    $UP_stock = $U_stock+$claim_qty;

                    // if($UP_stock==0){
                    //     $UP_status = 'outofstock';
                    // }else{
                    //     $UP_status = 'instock';
                    // }

                    $updateStock = mysqli_query($conn, "UPDATE dashboard_items
                                                        SET stock_qty = $UP_stock
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
                    
                    $UP_stock = $U_stock+$claim_qty;

                    // if($UP_stock==0){
                    //     $UP_status = 'outofstock';
                    // }else{
                    //     $UP_status = 'instock';
                    // }

                    $updateStock = mysqli_query($conn, "UPDATE wpss_wc_product_meta_lookup
                                                        SET stock_quantity = $UP_stock
                                                        WHERE product_id ='$UP_ID' ");
                }

                  $sql2= mysqli_query($conn, "SELECT * FROM warranty WHERE invoice_id='$invoice_id' AND invoice_items_id=$invoice_items_id ORDER BY id DESC LIMIT 1");
                  $R_count = mysqli_num_rows($sql2);

                  if($R_count>0){
                      $row1 = mysqli_fetch_assoc($sql2);
                      $remain_return = $row1['remain_return']-$claim_qty;
                  }else{
                      $remain_return = $qty-$claim_qty;
                  }

            }else{
                  $sql2= mysqli_query($conn, "SELECT * FROM warranty WHERE invoice_id='$invoice_id' AND invoice_items_id=$invoice_items_id ORDER BY id DESC LIMIT 1");
                  $R_count = mysqli_num_rows($sql2);

                  if($R_count>0){
                      $row1 = mysqli_fetch_assoc($sql2);
                      $remain_return = $row1['remain_return'];
                  }else{
                      $remain_return = $qty;
                  }
            }

            //INSERT TO WARRANTY
            $sql_war = "INSERT INTO  warranty (invoice_id,invoice_items_id,action,warranty_note,date,remain_return) VALUES ('$invoice_id','$invoice_items_id','$action','$warranty_note','$date',$remain_return)";
            mysqli_query($conn,$sql_war);

            // $update = mysqli_query($conn, "UPDATE warranty
            //                                 SET remain_return = $remain_return
            //                                 WHERE invoice_id=$invoice_id AND invoice_items_id=$invoice_items_id");

            //UPDATE THE INVOICE_ITEMS TABLE
            $sql_temp = "UPDATE invoice_items
            SET warranty_claim_time = warranty_claim_time + 1
            WHERE id= '$invoice_items_id'";
            $result_temp = mysqli_query($conn,$sql_temp);

            echo 0;
        }
       
    ?>