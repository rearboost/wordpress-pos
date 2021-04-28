
    <?php
        // Database Connection
        require '../include/config.php';

        // User Add Function 
        if(isset($_POST['add'])){

            $sensitivity       = $_POST['sensitivity'];
            $description     = $_POST['description'];
         
            $insert = "INSERT INTO sensitivity (sensitivity,description) VALUES ('$sensitivity','$description')";
            $result = mysqli_query($conn,$insert);
            if($result){
                echo  1;
            }else{
                echo  mysqli_error($conn);		
            }
        }

    ?>