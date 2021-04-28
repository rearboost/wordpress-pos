
    <?php
        // Database Connection
        require '../include/config.php';

        // User Add Function 
        if(isset($_POST['add'])){

            $buyer       = $_POST['buyer'];
            $buyerEmail     = $_POST['buyerEmail'];
            $address     = $_POST['address'];
            $telephone  = $_POST['telephone'];
            $buyerExcess   = $_POST['buyerExcess'];
            $buyerBudgeted   = $_POST['buyerBudgeted'];

            $check= mysqli_query($conn, "SELECT * FROM buyer WHERE buyer='$buyer'");
		    $count = mysqli_num_rows($check);

             if($count==0){

                $insert = "INSERT INTO buyer (buyer,buyerEmail,address,telephone,buyerExcess,buyerBudgeted) VALUES ('$buyer','$buyerEmail','$address','$telephone','$buyerExcess','$buyerBudgeted')";
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