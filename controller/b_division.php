
    <?php
        // Database Connection
        require '../include/config.php';

        // User Add Function 
        if(isset($_POST['add'])){

            $buyerName       = $_POST['buyerName'];
            $buyerDivision     = $_POST['buyerDivision'];
            $account     = $_POST['account'];
            $consignee1  = $_POST['consignee1'];
            $consignee2   = $_POST['consignee2'];
            $consignee3   = $_POST['consignee3'];

            $check= mysqli_query($conn, "SELECT * FROM division WHERE buyerName='$buyerName' AND buyerDivision='$buyerDivision'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $insert = "INSERT INTO division (buyerName,buyerDivision,account,consignee1,consignee2,consignee3) VALUES ('$buyerName','$buyerDivision','$account','$consignee1','$consignee2','$consignee3')";
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