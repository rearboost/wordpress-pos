
    <?php
        // Database Connection
        require '../include/config.php';

        // Purchase Order Entering Add Function 
        if(isset($_POST['add'])){

            $po_number   = $_POST['po_number'];

            $check= mysqli_query($conn, "SELECT * FROM  bom WHERE po_number='$po_number' ");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $myitemjson1 =$_POST['myitemjson1'];

                $x = json_decode($myitemjson1, true);

                for($i=0;$i<sizeof($x);$i++)
                {
                    $masterName=$x[$i]['masterName'];
                    $main=$x[$i]['main'];
                    $subCategory=$x[$i]['subCategory'];
                    $itemName=$x[$i]['itemName'];
                    $color=$x[$i]['color'];
                    $size=$x[$i]['size'];
                    $reference=$x[$i]['reference'];
                    $dimension=$x[$i]['dimension'];
                    $unit=$x[$i]['unit'];
                    $fabType=$x[$i]['fabType'];
                    $consumption=$x[$i]['consumption'];
                    $wastage=$x[$i]['wastage'];
                    $excess=$x[$i]['excess'];
                    $req_qty=$x[$i]['req_qty'];
                    $unit_price=$x[$i]['unit_price'];

                    $insert_bom = "INSERT INTO bom (po_number,masterName,main,subCategory,itemName,color,size,reference,dimension,unit,fabType,consumption,wastage,excess,req_qty,unit_price) VALUES ('$po_number','$masterName','$main','$subCategory','$itemName','$color','$size','$reference','$dimension','$unit','$fabType','$consumption','$wastage','$excess','$req_qty','$unit_price')";
                    mysqli_query($conn,$insert_bom);
                }

                $myitemjson =$_POST['myitemjson'];

                $l = json_decode($myitemjson, true);

                for($y=0;$y<sizeof($l);$y++)
                {
                    $masterName=$l[$y]['masterName'];
                    $main=$l[$y]['main'];
                    $subCategory=$l[$y]['subCategory'];
                    $itemName=$l[$y]['itemName'];
                    $color=$l[$y]['color'];
                    $size=$l[$y]['size'];
                    $reference=$l[$y]['reference'];
                    $dimension=$l[$y]['dimension'];
                    $unit=$l[$y]['unit'];
                    $fabType=$l[$y]['fabType'];
                    $consumption=$l[$y]['consumption'];
                    $wastage=$l[$y]['wastage'];
                    $excess=$l[$y]['excess'];
                    $req_qty=$l[$y]['req_qty'];
                    $unit_price=$l[$y]['unit_price'];

                    $insert_bom = "INSERT INTO bom (po_number,masterName,main,subCategory,itemName,color,size,reference,dimension,unit,fabType,consumption,wastage,excess,req_qty,unit_price) VALUES ('$po_number','$masterName','$main','$subCategory','$itemName','$color','$size','$reference','$dimension','$unit','$fabType','$consumption','$wastage','$excess','$req_qty','$unit_price')";
                    $result =mysqli_query($conn,$insert_bom);
                }

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