
    <?php
        // Database Connection
        require '../include/config.php';

        // Master Add Function 
        if(isset($_POST['addDepartment'])){

            $departmentName       = $_POST['departmentName'];

            $check= mysqli_query($conn, "SELECT * FROM user_department WHERE name='$departmentName'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $insert = "INSERT INTO user_department (name) VALUES ('$departmentName')";
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

        // Section Add Function 
        if(isset($_POST['addSection'])){

            $sectionName   = $_POST['sectionName'];

            $check= mysqli_query($conn, "SELECT * FROM section WHERE name='$sectionName'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $insert = "INSERT INTO section (name) VALUES ('$sectionName')";
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

        // Branch Add Function 
        if(isset($_POST['addBranch'])){

            $branchName   = $_POST['branchName'];

            $check= mysqli_query($conn, "SELECT * FROM branch WHERE name='$branchName'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $insert = "INSERT INTO branch (name) VALUES ('$branchName')";
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


         // Designation Add Function 
        if(isset($_POST['addDesignation'])){

            $designationName   = $_POST['designationName'];

            $check= mysqli_query($conn, "SELECT * FROM designation WHERE name='$designationName'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $insert = "INSERT INTO designation (name) VALUES ('$designationName')";
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