
    <?php
        // Database Connection
        require '../include/config.php';

        // wise_sizes Add Function 
        if(isset($_POST['add'])){

            $buyerName       = $_POST['buyerName'];
            $buyerDivision     = $_POST['buyerDivision'];
            $subCategory     = $_POST['subCategory'];

            $check= mysqli_query($conn, "SELECT * FROM subCategories WHERE buyerName='$buyerName' AND buyerDivision='$buyerDivision' AND subCategory='$subCategory'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $insert = "INSERT INTO subCategories (buyerName,buyerDivision,subCategory) VALUES ('$buyerName','$buyerDivision','$subCategory')";
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
            $buyerDivision  = $_POST['buyerDivision'];
            $subCategory  = $_POST['subCategory'];

            $check= mysqli_query($conn, "SELECT * FROM subCategories WHERE buyerName='$buyerName' AND buyerDivision='$buyerDivision' AND subCategory='$subCategory'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $edit = "UPDATE subCategories 
                                        SET buyerName   ='$buyerName',
                                            buyerDivision  ='$buyerDivision',
                                            subCategory  ='$subCategory'
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
            $query ="DELETE FROM subCategories WHERE id='$id'";
            $result = mysqli_query($conn,$query);
            if($result){
                echo  1;
            }else{
                echo  mysqli_error($conn);		
            }
        }

    ?>