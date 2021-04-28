
    <?php
        // Database Connection
        require '../include/config.php';

        // SAVE SMV Function 
         if($_POST['add']=="save"){

            $costingNo       = $_POST['costingNo'];

            $s_fabric  = $_POST['s_fabric'];
            $s_composition  = $_POST['s_composition'];
            $s_print  = $_POST['s_print'];
            $s_cuttable  = $_POST['s_cuttable'];
            $s_suppliner  = $_POST['s_suppliner'];

            $l_fabric  = $_POST['l_fabric'];
            $l_composition  = $_POST['l_composition'];
            $l_print  = $_POST['l_print'];
            $l_cuttable  = $_POST['l_cuttable'];
            $l_suppliner  = $_POST['l_suppliner'];

            $c_fabric  = $_POST['c_fabric'];
            $c_composition  = $_POST['c_composition'];
            $c_print  = $_POST['c_print'];
            $c_cuttable  = $_POST['c_cuttable'];
            $c_suppliner  = $_POST['c_suppliner'];

            $matching  = $_POST['matching'];
            $bias_grain  = $_POST['bias_grain'];
            $st_len_wise  = $_POST['st_len_wise'];
            $st_width_wise  = $_POST['st_width_wise'];
            $c_date  = $_POST['c_date'];
            $merchandise  = $_POST['merchandise'];
            $remark  = $_POST['remark'];

            $data = [
                "markerLength"  => $_POST['markerLength'],
                "con_width"  => $_POST['con_width'],
                "average"  => $_POST['average'],
                "remark"  => $_POST['remark'],
                "costing_bom_id"  => $_POST['costing_bom_id']
            ];

            $markerLength = array_values($data["markerLength"]);
            $con_width = array_values($data["con_width"]);
            $average = array_values($data["average"]);
            $remark = array_values($data["remark"]);
            $costing_bom_id = array_values($data["costing_bom_id"]);

            foreach($costing_bom_id as $index => $value) {

                 $update = "UPDATE costing_bom SET markerLength='$markerLength[$index]', con_width='$con_width[$index]' , average='$average[$index]' , remark='$remark[$index]' WHERE  id='$value'";
                 mysqli_query($conn,$update);
            }

            if($_FILES["meas_chat"]["name"] != '')
            {
                $test = explode('.', $_FILES["meas_chat"]["name"]);
                $ext = end($test);
                $name = rand(100, 999) . '.' . $ext;
            
                $location = '../upload/' . $name;
                move_uploaded_file($_FILES["meas_chat"]["tmp_name"], $location);
            }else{
                $name ="100.jpg";
            }

            if($_FILES["spec"]["name"] != '')
            {
                $test = explode('.', $_FILES["spec"]["name"]);
                $ext = end($test);
                $name1 = rand(100, 999) . '.' . $ext;
            
                $location = '../upload/' . $name1;
                move_uploaded_file($_FILES["spec"]["tmp_name"], $location);
            }else{
                $name1 ="100.jpg";
            }

            $update_pre = "UPDATE pre_order_costing SET status=2 WHERE  costingNo='$costingNo'";
            mysqli_query($conn,$update_pre);

            $insert = "INSERT INTO yy_confirmation (costingNo,meas_chat,spec,date,s_fabric,s_composition,s_print,s_cuttable,s_suppliner,l_fabric,l_composition,l_print,l_cuttable,l_suppliner,c_fabric,c_composition,c_print,c_cuttable,c_suppliner,matching,bias_grain,st_len_wise,st_width_wise,c_date,merchandise,remark) VALUES ('$costingNo','$name','$name1','$date','$s_fabric','$s_composition','$s_print','$s_cuttable','$s_suppliner','$l_fabric','$l_composition','$l_print','$l_cuttable','$l_suppliner','$c_fabric','$c_composition','$c_print','$c_cuttable','$c_suppliner','$matching','$bias_grain','$st_len_wise','$st_width_wise','$c_date','$merchandise','$remark')";
            $result = mysqli_query($conn,$insert);

            if($result){
                echo  1;
            }else{
                echo  mysqli_error($conn);		
            }
        }

        // CONFIRM SMV Function 
        if($_POST['add']=="confirm"){


            $costingNo       = $_POST['costingNo'];

            $s_fabric  = $_POST['s_fabric'];
            $s_composition  = $_POST['s_composition'];
            $s_print  = $_POST['s_print'];
            $s_cuttable  = $_POST['s_cuttable'];
            $s_suppliner  = $_POST['s_suppliner'];

            $l_fabric  = $_POST['l_fabric'];
            $l_composition  = $_POST['l_composition'];
            $l_print  = $_POST['l_print'];
            $l_cuttable  = $_POST['l_cuttable'];
            $l_suppliner  = $_POST['l_suppliner'];

            $c_fabric  = $_POST['c_fabric'];
            $c_composition  = $_POST['c_composition'];
            $c_print  = $_POST['c_print'];
            $c_cuttable  = $_POST['c_cuttable'];
            $c_suppliner  = $_POST['c_suppliner'];

            $matching  = $_POST['matching'];
            $bias_grain  = $_POST['bias_grain'];
            $st_len_wise  = $_POST['st_len_wise'];
            $st_width_wise  = $_POST['st_width_wise'];
            $c_date  = $_POST['c_date'];
            $merchandise  = $_POST['merchandise'];

            $data = [
                "markerLength"  => $_POST['markerLength'],
                "con_width"  => $_POST['con_width'],
                "average"  => $_POST['average'],
                "remark"  => $_POST['remark'],
                "costing_bom_id"  => $_POST['costing_bom_id']
            ];

            $markerLength = array_values($data["markerLength"]);
            $con_width = array_values($data["con_width"]);
            $average = array_values($data["average"]);
            $remark = array_values($data["remark"]);
            $costing_bom_id = array_values($data["costing_bom_id"]);

            foreach($costing_bom_id as $index => $value) {

                 $update = "UPDATE costing_bom SET markerLength='$markerLength[$index]', con_width='$con_width[$index]' , average='$average[$index]' , remark='$remark[$index]' WHERE  id='$value'";
                 mysqli_query($conn,$update);
            }

            if($_FILES["meas_chat"]["name"] != '')
            {
                $test = explode('.', $_FILES["meas_chat"]["name"]);
                $ext = end($test);
                $name = rand(100, 999) . '.' . $ext;
            
                $location = '../upload/' . $name;
                move_uploaded_file($_FILES["meas_chat"]["tmp_name"], $location);
            }else{
                $name ="100.jpg";
            }

            if($_FILES["spec"]["name"] != '')
            {
                $test = explode('.', $_FILES["spec"]["name"]);
                $ext = end($test);
                $name1 = rand(100, 999) . '.' . $ext;
            
                $location = '../upload/' . $name1;
                move_uploaded_file($_FILES["spec"]["tmp_name"], $location);
            }else{
                $name1 ="100.jpg";
            }

            $update_pre = "UPDATE pre_order_costing SET status=1 WHERE  costingNo='$costingNo'";
            mysqli_query($conn,$update_pre);

            $insert = "INSERT INTO yy_confirmation (costingNo,meas_chat,spec,date,s_fabric,s_composition,s_print,s_cuttable,s_suppliner,l_fabric,l_composition,l_print,l_cuttable,l_suppliner,c_fabric,c_composition,c_print,c_cuttable,c_suppliner,matching,bias_grain,st_len_wise,st_width_wise,c_date,merchandise,remark) VALUES ('$costingNo','$name','$name1','$date','$s_fabric','$s_composition','$s_print','$s_cuttable','$s_suppliner','$l_fabric','$l_composition','$l_print','$l_cuttable','$l_suppliner','$c_fabric','$c_composition','$c_print','$c_cuttable','$c_suppliner','$matching','$bias_grain','$st_len_wise','$st_width_wise','$c_date','$merchandise','$remark')";
            $result = mysqli_query($conn,$insert);

            if($result){
                echo  1;
            }else{
                echo  mysqli_error($conn);		
            }          
        }


        // REJECT SMV Function 
        if($_POST['add']=="reject"){


            $costingNo       = $_POST['costingNo'];

            $s_fabric  = $_POST['s_fabric'];
            $s_composition  = $_POST['s_composition'];
            $s_print  = $_POST['s_print'];
            $s_cuttable  = $_POST['s_cuttable'];
            $s_suppliner  = $_POST['s_suppliner'];

            $l_fabric  = $_POST['l_fabric'];
            $l_composition  = $_POST['l_composition'];
            $l_print  = $_POST['l_print'];
            $l_cuttable  = $_POST['l_cuttable'];
            $l_suppliner  = $_POST['l_suppliner'];

            $c_fabric  = $_POST['c_fabric'];
            $c_composition  = $_POST['c_composition'];
            $c_print  = $_POST['c_print'];
            $c_cuttable  = $_POST['c_cuttable'];
            $c_suppliner  = $_POST['c_suppliner'];

            $matching  = $_POST['matching'];
            $bias_grain  = $_POST['bias_grain'];
            $st_len_wise  = $_POST['st_len_wise'];
            $st_width_wise  = $_POST['st_width_wise'];
            $c_date  = $_POST['c_date'];
            $merchandise  = $_POST['merchandise'];

            $data = [
                "markerLength"  => $_POST['markerLength'],
                "con_width"  => $_POST['con_width'],
                "average"  => $_POST['average'],
                "remark"  => $_POST['remark'],
                "costing_bom_id"  => $_POST['costing_bom_id']
            ];

            $markerLength = array_values($data["markerLength"]);
            $con_width = array_values($data["con_width"]);
            $average = array_values($data["average"]);
            $remark = array_values($data["remark"]);
            $costing_bom_id = array_values($data["costing_bom_id"]);

            foreach($costing_bom_id as $index => $value) {

                 $update = "UPDATE costing_bom SET markerLength='$markerLength[$index]', con_width='$con_width[$index]' , average='$average[$index]' , remark='$remark[$index]' WHERE  id='$value'";
                 mysqli_query($conn,$update);
            }

            if($_FILES["meas_chat"]["name"] != '')
            {
                $test = explode('.', $_FILES["meas_chat"]["name"]);
                $ext = end($test);
                $name = rand(100, 999) . '.' . $ext;
            
                $location = '../upload/' . $name;
                move_uploaded_file($_FILES["meas_chat"]["tmp_name"], $location);
            }else{
                $name ="100.jpg";
            }

            if($_FILES["spec"]["name"] != '')
            {
                $test = explode('.', $_FILES["spec"]["name"]);
                $ext = end($test);
                $name1 = rand(100, 999) . '.' . $ext;
            
                $location = '../upload/' . $name1;
                move_uploaded_file($_FILES["spec"]["tmp_name"], $location);
            }else{
                $name1 ="100.jpg";
            }

            $update_pre = "UPDATE pre_order_costing SET status=-1 WHERE  costingNo='$costingNo'";
            mysqli_query($conn,$update_pre);

            $insert = "INSERT INTO yy_confirmation (costingNo,meas_chat,spec,date,s_fabric,s_composition,s_print,s_cuttable,s_suppliner,l_fabric,l_composition,l_print,l_cuttable,l_suppliner,c_fabric,c_composition,c_print,c_cuttable,c_suppliner,matching,bias_grain,st_len_wise,st_width_wise,c_date,merchandise,remark) VALUES ('$costingNo','$name','$name1','$date','$s_fabric','$s_composition','$s_print','$s_cuttable','$s_suppliner','$l_fabric','$l_composition','$l_print','$l_cuttable','$l_suppliner','$c_fabric','$c_composition','$c_print','$c_cuttable','$c_suppliner','$matching','$bias_grain','$st_len_wise','$st_width_wise','$c_date','$merchandise','$remark')";
            $result = mysqli_query($conn,$insert);

            if($result){
                echo  1;
            }else{
                echo  mysqli_error($conn);		
            }
        }


    ?>