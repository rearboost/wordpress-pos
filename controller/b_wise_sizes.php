
    <?php
        // Database Connection
        require '../include/config.php';

        // wise_sizes Add Function 
        if(isset($_POST['add'])){

            $buyerName       = $_POST['buyerName'];
            $sizeReference     = $_POST['sizeReference'];
            $size     = $_POST['size'];

            $check= mysqli_query($conn, "SELECT * FROM wise_sizes WHERE buyerName='$buyerName' AND sizeReference='$sizeReference' AND size='$size'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $insert = "INSERT INTO wise_sizes (buyerName,sizeReference,size) VALUES ('$buyerName','$sizeReference','$size')";
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

        // wise_sizes Update Function 
        if(isset($_POST['update'])){

            $id  = $_POST['edit_id'];
            $buyerName  = $_POST['buyerName'];
            $sizeReference  = $_POST['sizeReference'];
            $size  = $_POST['size'];

            $check= mysqli_query($conn, "SELECT * FROM wise_sizes WHERE buyerName='$buyerName' AND sizeReference='$sizeReference' AND size='$size'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $edit = "UPDATE wise_sizes 
                                    SET buyerName   ='$buyerName',
                                        sizeReference  ='$sizeReference',
                                        size  ='$size'
                                    WHERE id=$id";

                $result = mysqli_query($conn,$edit);
                if($result){
                    echo  1;
                }else{
                    echo  mysqli_error($conn);		
                }

            }else{
                echo 0;
            }
        }

        // wise_sizes Delete Function 
        if(isset($_POST['removeID'])){

            $id       = $_POST['removeID'];
            $query ="DELETE FROM  wise_sizes WHERE id='$id'";
            $result = mysqli_query($conn,$query);
            if($result){
                echo  1;
            }else{
                echo  mysqli_error($conn);		
            }
        }

    ?>