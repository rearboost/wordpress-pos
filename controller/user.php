
    <?php
        // Database Connection
        require '../include/config.php';

        // User Add Function 
        if(isset($_POST['add'])){

            $companyName       = $_POST['companyName'];
            $branchName     = $_POST['branchName'];
            $department     = $_POST['department'];
            $section  = $_POST['section'];
            $designation   = $_POST['designation'];
            $employeeName   = $_POST['employeeName'];
            $user_role   = $_POST['user_role'];
            $username       = $_POST['username'];
            $password     = md5($_POST['password']);
            $email     = $_POST['email'];
         
            $insert = "INSERT INTO user (companyName,branchName,department,section,designation,employeeName,user_role,username,password,email) VALUES ('$companyName','$branchName','$department','$section','$designation','$employeeName','$user_role','$username','$password','$email')";
            $result = mysqli_query($conn,$insert);
            if($result){
                echo  1;
            }else{
                echo  mysqli_error($conn);		
            }
        }

    ?>