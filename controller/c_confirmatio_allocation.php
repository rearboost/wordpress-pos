
    <?php
        // Database Connection
        require '../include/config.php';

        // CONFIRM PO   Function 
          if(isset($_POST['add'])){

            $shipment_term       = $_POST['shipment_term'];
            $fabric_cost     = $_POST['fabric_cost'];
            $finance     = $_POST['finance'];
            $t_fabric_cost  = $_POST['t_fabric_cost'];
            $stc  = $_POST['stc'];
            $ptc  = $_POST['ptc'];
            $t_trims_cost  = $_POST['t_trims_cost'];
            $im_trims_c  = $_POST['im_trims_c'];
            $other_c  = $_POST['other_c'];
            $fob  = $_POST['fob'];
            $commission_percentage  = $_POST['commission_percentage'];
            $commission  = $_POST['commission'];
            $price  = $_POST['price'];
            $last_price  = $_POST['last_price'];
            $profit  = $_POST['profit'];
            $delivery_date  = $_POST['delivery_date'];

            $costingNo  = $_POST['costingNo'];

            $update_pre = "UPDATE pre_order_costing SET confirmation_allocation=1 WHERE  costingNo='$costingNo'";
            mysqli_query($conn,$update_pre);

            $insert = "INSERT INTO confirmation_allocation_price (costingNo,shipment_term,fabric_cost,finance,t_fabric_cost,stc,ptc,t_trims_cost,im_trims_c,other_c,fob,commission_percentage,commission,price,last_price,profit,delivery_date) VALUES ('$costingNo','$shipment_term','$fabric_cost','$finance','$t_fabric_cost','$stc','$ptc','$t_trims_cost','$im_trims_c','$other_c','$fob','$commission_percentage','$commission','$price','$last_price','$profit','$delivery_date')";
            $result = mysqli_query($conn,$insert);

            if($result){
                echo  1;
            }else{
                echo  mysqli_error($conn);		
            }
        }

    ?>