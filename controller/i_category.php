
    <?php
        // Database Connection
        require '../include/config.php';

        // Master Add Function 
        if(isset($_POST['addMaster'])){

            $masterName       = $_POST['masterName'];

            $check= mysqli_query($conn, "SELECT * FROM master WHERE name='$masterName'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $insert = "INSERT INTO master (name) VALUES ('$masterName')";
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

        // main Add Function 
        if(isset($_POST['addMain'])){

            $masterName       = $_POST['masterName'];
            $mainCategory       = $_POST['mainCategory'];

            $check= mysqli_query($conn, "SELECT * FROM main WHERE master='$masterName' AND name='$mainCategory'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $insert = "INSERT INTO main (name,master) VALUES ('$mainCategory','$masterName')";
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


        // Sub Category Add Function 
        if(isset($_POST['addSub'])){

            $masterName       = $_POST['masterName'];
            $mainCategory       = $_POST['mainCategory'];
            $subCategory       = $_POST['subCategory'];

            $check= mysqli_query($conn, "SELECT * FROM subCategory WHERE name='$subCategory' AND main='$mainCategory'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $insert = "INSERT INTO subCategory (name,main,master) VALUES ('$subCategory','$mainCategory','$masterName')";
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