
    <?php
        // Database Connection
        require '../include/config.php';

        //  Delete Function 
        if(isset($_POST['removeID'])){

            $id    = $_POST['removeID'];
            $query ="DELETE FROM jobs WHERE jobId='$id'";
            $result = mysqli_query($conn,$query);
            if($result){
                echo  1;
            }else{
                echo  mysqli_error($conn);		
            }
        }

    ?>