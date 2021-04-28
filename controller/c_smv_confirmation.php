
    <?php
        // Database Connection
        require '../include/config.php';

        // CONFIRM SMV Function 
         if($_POST['add']=="confirm"){

            $sm_m_smv       = $_POST['sm_m_smv'];
            $sm_h_smv     = $_POST['sm_h_smv'];
            $remarks     = $_POST['remarks'];
            $sp_remarks  = $_POST['sp_remarks'];
            $costingNo  = $_POST['costingNo'];

            $update_pre = "UPDATE pre_order_costing SET remarks='$remarks', sp_remarks='$sp_remarks' , status=1 WHERE  costingNo='$costingNo'";
            mysqli_query($conn,$update_pre);

            $update_smv = "UPDATE smv_calculation SET sm_m_smv='$sm_m_smv', sm_h_smv='$sm_h_smv' WHERE  costingNo='$costingNo'";
            $result =mysqli_query($conn,$update_smv);

            if($result){
                echo  1;
            }else{
                echo  mysqli_error($conn);		
            }
        }

        // REJECT SMV Function 
        if($_POST['add']=="reject"){

            $sm_m_smv       = $_POST['sm_m_smv'];
            $sm_h_smv     = $_POST['sm_h_smv'];
            $remarks     = $_POST['remarks'];
            $sp_remarks  = $_POST['sp_remarks'];
            $costingNo  = $_POST['costingNo'];

            $update_pre = "UPDATE pre_order_costing SET remarks='$remarks', sp_remarks='$sp_remarks' , status=-1 WHERE  costingNo='$costingNo'";
            mysqli_query($conn,$update_pre);

            $update_smv = "UPDATE smv_calculation SET sm_m_smv='$sm_m_smv', sm_h_smv='$sm_h_smv' WHERE  costingNo='$costingNo'";
            $result =mysqli_query($conn,$update_smv);

            if($result){
                echo  1;
            }else{
                echo  mysqli_error($conn);		
            }
        }


    ?>