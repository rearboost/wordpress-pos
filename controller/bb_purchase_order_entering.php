
    <?php
        // Database Connection
        require '../include/config.php';

        // Purchase Order Entering Add Function 
        if(isset($_POST['add'])){

            $buyerName   = $_POST['buyerName'];
            $style   = $_POST['style'];
            $bpo_no   = $_POST['bpo_no'];
            $po_number   = $_POST['po_number'];
            $division   = $_POST['division'];
            $billing_account   = $_POST['billing_account'];
            $size_ref   = $_POST['size_ref'];
            $ga_quantity   = $_POST['ga_quantity'];
            $sample_location   = $_POST['sample_location'];

            $check= mysqli_query($conn, "SELECT * FROM  po_entering WHERE buyerName='$buyerName' AND style='$style' AND bpo_no='$bpo_no' AND division='$division' AND size_ref='$size_ref'AND sample_location='$sample_location' AND billing_account='$billing_account' ");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $insert = "INSERT INTO po_entering (buyerName,style,bpo_no,po_number,division,billing_account,size_ref,ga_quantity,sample_location) VALUES ('$buyerName','$style','$bpo_no','$po_number','$division','$billing_account','$size_ref','$ga_quantity','$sample_location')";
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


    ?>