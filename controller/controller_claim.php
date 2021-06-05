    <?php
        // Database Connection
        require '../include/config.php';

        // Add Function 
        if(isset($_POST['add'])){

            $invoice_id = $_POST['invoice_id'];
            $invoice_items_id = $_POST['invoice_items_id'];
            $action = $_POST['optionsRadios'];
            $warranty_note = $_POST['warranty_note'];
            $date = date("Y-m-d");

            //INSERT TO WARRANTY
            $sql_war = "INSERT INTO  warranty (invoice_id,invoice_items_id,action,warranty_note,date) VALUES ('$invoice_id','$invoice_items_id','$action','$warranty_note','$date')";
            mysqli_query($conn,$sql_war);

            //UPDATE THE INVOICE_ITEMS TABLE
            $sql_temp = "UPDATE invoice_items
            SET warranty_claim_time = warranty_claim_time + 1
            WHERE id= '$invoice_items_id'";
            $result_temp = mysqli_query($conn,$sql_temp);

            echo 0;
        }
       
    ?>