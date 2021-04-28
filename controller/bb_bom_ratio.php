
    <?php
        // Database Connection
        require '../include/config.php';

        // BOM Ratio Add Function 
        if(isset($_POST['add'])){

            $po_number   = $_POST['po_number'];
            $color1   = $_POST['color1'];
            $hit1   = $_POST['hit1'];
            $item1   = $_POST['item1'];
            $ship_data1   = $_POST['ship_data1'];
            $pack_type1   = $_POST['pack_type1'];
            $total1   = $_POST['total1'];
            $color2   = $_POST['color2'];
            $hit2   = $_POST['hit2'];
            $item2   = $_POST['item2'];
            $ship_data2   = $_POST['ship_data2'];
            $pack_type2   = $_POST['pack_type2'];
            $total2   = $_POST['total2'];

            $sql_buyerName=mysqli_query($conn,"SELECT * FROM po_entering WHERE po_number='$po_number'");
            $row_buyerName= mysqli_fetch_assoc($sql_buyerName);
            $buyerName = $row_buyerName['buyerName'];

            $sql_sizes=mysqli_query($conn,"SELECT * FROM wise_sizes WHERE buyerName='$buyerName'" );
            
           
            $check= mysqli_query($conn, "SELECT * FROM bom_ratio WHERE po_number='$po_number'");
		    $count = mysqli_num_rows($check);

            if($count==0){
                $i = 0;
                while($row_sizes = mysqli_fetch_assoc($sql_sizes)) {

                    $size = $row_sizes['size'];
                    $value = $_POST['select1'][$i];
                    $insert = "INSERT INTO bom_ratio_size (po_number,size,value,no) VALUES ('$po_number','$size','$value','1')";
                    $result = mysqli_query($conn,$insert);

                    $value = $_POST['select2'][$i];
                    $insert = "INSERT INTO bom_ratio_size (po_number,size,value,no) VALUES ('$po_number','$size','$value','2')";
                    $result = mysqli_query($conn,$insert);
                    $i++;
                }
                
                $insert = "INSERT INTO  bom_ratio (po_number,color1,hit1,item1,ship_data1,pack_type1,total1,color2,hit2,item2,ship_data2,pack_type2,total2) VALUES ('$po_number','$color1','$hit1','$item1','$ship_data1','$pack_type1','$total1','$color2','$hit2','$item2','$ship_data2','$pack_type2','$total2')";
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