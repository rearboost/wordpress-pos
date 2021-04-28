
    <?php
        // Database Connection
        require '../include/config.php';

        // User Add Function 
        if(isset($_POST['add'])){

            $buyerName       = $_POST['buyerName'];
            $division     = $_POST['division'];
            $remarks_smv     = $_POST['remarks_smv'];
            $style  = $_POST['style'];
            $season   = $_POST['season'];
            $baseQty   = $_POST['baseQty'];
            $currency  = $_POST['currency'];
            $size_ref   = $_POST['size_ref'];
            $buyer_po_ref   = $_POST['buyer_po_ref'];
            $shipment_term   = $_POST['shipment_term'];
            $smv  = $_POST['smv'];
            $smv_comments   = $_POST['smv_comments'];
            $cad   = $_POST['cad'];
            $cad_comments   = $_POST['cad_comments'];

            $createDate = date("Y-m-d");

            $insert = "INSERT INTO pre_order_costing (buyerName,division,style,remarks_smv,season,baseQty,currency,size_ref,buyer_po_ref,shipment_term,smv,smv_comments,cad,cad_comments,create_date) VALUES ('$buyerName','$division','$style','$remarks_smv','$season','$baseQty','$currency','$size_ref','$buyer_po_ref','$shipment_term','$smv','$smv_comments','$cad','$cad_comments','$createDate')";
            $result = mysqli_query($conn,$insert);

            $sql ="SELECT * FROM pre_order_costing ORDER BY costingNo DESC limit 1";
            $result_get=mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result_get);
            $costingNo = $row['costingNo'];

            $myitemjson =$_POST['myitemjson'];

            $x = json_decode($myitemjson, true);

            for($i=0;$i<sizeof($x);$i++)
            {
                $masterName=$x[$i]['masterName'];
                $main=$x[$i]['main'];
                $subCategory=$x[$i]['subCategory'];
                $fabType=$x[$i]['fabType'];
                $fm_size=$x[$i]['fm_size'];
                $coes=$x[$i]['coes'];
                $req_qty=$x[$i]['req_qty'];
                $waste=$x[$i]['waste'];
                $unit=$x[$i]['unit'];
                $unit_price=$x[$i]['unit_price'];
                $unit_price_2=$x[$i]['unit_price_2'];
                $one_pc=$x[$i]['one_pc'];
                $mf=$x[$i]['mf'];
                $f1=$x[$i]['f1'];
                $trim=$x[$i]['trim'];

                $insert_costing_bom = "INSERT INTO costing_bom (costingNo,masterName,main,subCategory,fabType,fm_size,coes,req_qty,waste,unit,unit_price,unit_price_2,one_pc,mf,f1,trim) VALUES ('$costingNo','$masterName','$main','$subCategory','$fabType','$fm_size','$coes','$req_qty','$waste','$unit','$unit_price','$unit_price_2','$one_pc','$mf','$f1','$trim')";
                mysqli_query($conn,$insert_costing_bom);
    
            }

            $myitemjson1 =$_POST['myitemjson1'];

            $y = json_decode($myitemjson1, true);

            for($i=0;$i<sizeof($y);$i++)
            {
                $style_size_ref=$y[$i]['style_size_ref'];
                $ratio=$y[$i]['ratio'];

                $insert_style_size = "INSERT INTO style_size (costingNo,style_size_ref,ratio) VALUES ('$costingNo','$style_size_ref','$ratio')";
                mysqli_query($conn,$insert_style_size);

            }

            $cm_payment_mode  = $_POST['cm_payment_mode'];
            $cm_m_smv   = $_POST['cm_m_smv'];
            $cm_h_smv   = $_POST['cm_h_smv'];
            $cm_qty_fact  = $_POST['cm_qty_fact'];
            $cm   = $_POST['cm'];
            $cm_final_cm   = $_POST['cm_final_cm'];
            $cm_production_cost   = $_POST['cm_production_cost'];

            $insert_cm_calculation = "INSERT INTO cm_calculation (costingNo,cm_payment_mode,cm_m_smv,cm_h_smv,cm_qty_fact,cm,cm_final_cm,cm_production_cost) VALUES ('$costingNo','$cm_payment_mode','$cm_m_smv','$cm_h_smv','$cm_qty_fact','$cm','$cm_final_cm','$cm_production_cost')";
            mysqli_query($conn,$insert_cm_calculation);


            $sm_payment_mode  = $_POST['sm_payment_mode'];
            $sm_m_smv   = $_POST['sm_m_smv'];
            $sm_h_smv   = $_POST['sm_h_smv'];
            $sm_qty_fact  = $_POST['sm_qty_fact'];
         
            $insert_smv_calculation = "INSERT INTO smv_calculation (costingNo,sm_payment_mode,sm_m_smv,sm_h_smv,sm_qty_fact) VALUES ('$costingNo','$sm_payment_mode','$sm_m_smv','$sm_h_smv','$sm_qty_fact')";
            mysqli_query($conn,$insert_smv_calculation);


            if($result){
                echo  1;
            }else{
                echo  mysqli_error($conn);		
            }
        }

    ?>