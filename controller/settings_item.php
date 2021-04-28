
    <?php
        // Database Connection
        require '../include/config.php';

        // Color Add Function 
        if(isset($_POST['addColor'])){

            $colorName  = $_POST['colorName'];

            $check= mysqli_query($conn, "SELECT * FROM  color WHERE name='$colorName'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $insert = "INSERT INTO  color (name) VALUES ('$colorName')";
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

        // Size Add Function 
        if(isset($_POST['addSize'])){

            $sizeName   = $_POST['sizeName'];

            $check= mysqli_query($conn, "SELECT * FROM  size WHERE name='$sizeName'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $insert = "INSERT INTO  size (name) VALUES ('$sizeName')";
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

        // Dimension Add Function 
        if(isset($_POST['addDimension'])){

            $dimensionName   = $_POST['dimensionName'];

            $check= mysqli_query($conn, "SELECT * FROM dimension WHERE name='$dimensionName'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $insert = "INSERT INTO dimension (name) VALUES ('$dimensionName')";
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


         // Reference Add Function 
        if(isset($_POST['addReference'])){

            $referenceName   = $_POST['referenceName'];

            $check= mysqli_query($conn, "SELECT * FROM reference WHERE name='$referenceName'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $insert = "INSERT INTO reference (name) VALUES ('$referenceName')";
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