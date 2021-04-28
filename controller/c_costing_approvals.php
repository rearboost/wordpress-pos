
    <?php
        // Database Connection
        require '../include/config.php';

        // APPROVE COSTING  Function 
         if($_POST['add']=="approve"){

            $qty       = $_POST['qty'];
            $cm_m_smv     = $_POST['cm_m_smv'];
            $cm_h_smv     = $_POST['cm_h_smv'];
            $cm_qty_fact  = $_POST['cm_qty_fact'];
            $cm_production_cost  = $_POST['cm_production_cost'];
            $cm  = $_POST['cm'];
            $cm_final_cm  = $_POST['cm_final_cm'];
            $costingNo  = $_POST['costingNo'];

            $update_pre = "UPDATE pre_order_costing SET costing_approvals=1 WHERE  costingNo='$costingNo'";
            mysqli_query($conn,$update_pre);

            $update_cm = "UPDATE cm_calculation SET cm_m_smv='$cm_m_smv', cm_h_smv='$cm_h_smv',cm_qty_fact='$cm_qty_fact', cm='$cm',cm_final_cm='$cm_final_cm' , cm_production_cost='$cm_production_cost' WHERE  costingNo='$costingNo'";
            $result =mysqli_query($conn,$update_cm);

            if($result){
                echo  1;
            }else{
                echo  mysqli_error($conn);		
            }
        }

        // REJECT COSTING  Function 
        if($_POST['add']=="reject"){

            $qty       = $_POST['qty'];
            $cm_m_smv     = $_POST['cm_m_smv'];
            $cm_h_smv     = $_POST['cm_h_smv'];
            $cm_qty_fact  = $_POST['cm_qty_fact'];
            $cm_production_cost  = $_POST['cm_production_cost'];
            $cm  = $_POST['cm'];
            $cm_final_cm  = $_POST['cm_final_cm'];
            $costingNo  = $_POST['costingNo'];
            $costing_approval_reject_reson  = $_POST['costing_approval_reject_reson'];

            $update_pre = "UPDATE pre_order_costing SET costing_approvals=-1, costing_approval_reject_reson='$costing_approval_reject_reson' WHERE costingNo='$costingNo'";
            mysqli_query($conn,$update_pre);

            $update_cm = "UPDATE cm_calculation SET cm_m_smv='$cm_m_smv', cm_h_smv='$cm_h_smv',cm_qty_fact='$cm_qty_fact', cm='$cm',cm_final_cm='$cm_final_cm' , cm_production_cost='$cm_production_cost' WHERE  costingNo='$costingNo'";
            $result =mysqli_query($conn,$update_cm);

            if($result){
                echo  1;
            }else{
                echo  mysqli_error($conn);		
            }
        }

    ?>