
    <?php
        // Database Connection
        require '../include/config.php';

        // User Add Function 
        if(isset($_POST['add'])){

            $buyerName       = $_POST['buyerName'];
            $sizeReference     = $_POST['sizeReference'];
         
            $insert = "INSERT INTO sizeReference (buyerName,sizeReference) VALUES ('$buyerName','$sizeReference')";
            $result = mysqli_query($conn,$insert);
            if($result){
                echo  1;
            }else{
                echo  mysqli_error($conn);		
            }
        }

    ?>