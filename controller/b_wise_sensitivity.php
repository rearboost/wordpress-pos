
    <?php
        // Database Connection
        require '../include/config.php';

        // User Add Function 
        if(isset($_POST['add'])){

            $buyerName       = $_POST['buyerName'];
         
            foreach($_POST['select'] as $index => $val){

               $insert = "INSERT INTO buy_sensitivity (buyerName,sensitivity_id) VALUES ('$buyerName','$val')";
               $result = mysqli_query($conn,$insert);
            }
            echo  1;
    
            // if($result){
               
            // }else{
            //     echo  mysqli_error($conn);		
            // }
        }

    ?>