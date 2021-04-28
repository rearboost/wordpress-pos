
    <?php
        // Database Connection
        require '../include/config.php';

        // Item Add Function 
        if(isset($_POST['add'])){

            $masterName       = $_POST['masterName'];
            $main     = $_POST['main'];
            $subCategory     = $_POST['subCategory'];
            $itemName     = $_POST['itemName'];
            $color  = $_POST['color'];
            $size   = $_POST['size'];
            $reference   = $_POST['reference'];
            $dimension   = $_POST['dimension'];
            $unit   = $_POST['unit'];

            $check= mysqli_query($conn, "SELECT * FROM Item WHERE color='$color' AND size='$size' AND subCategory='$subCategory' AND reference='$reference' AND dimension='$dimension'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $insert = "INSERT INTO Item (masterName,main,subCategory,itemName,color,size,reference,dimension,unit) VALUES ('$masterName','$main','$subCategory','$itemName','$color','$size','$reference','$dimension','$unit')";
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