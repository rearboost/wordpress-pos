
    <?php
        // Database Connection
        require '../include/config.php';

        // Style Add Function 
        if(isset($_POST['add'])){

            $buyerName       = $_POST['buyerName'];
            $style     = $_POST['style'];
            $department     = $_POST['department'];
            $fabricCode  = $_POST['fabricCode'];
            $styleGroup   = $_POST['styleGroup'];
            $remark   = $_POST['remark'];
            $departmentCode   = $_POST['departmentCode'];
            $description   = $_POST['description'];

            $check= mysqli_query($conn, "SELECT * FROM style WHERE buyerName='$buyerName' AND style='$style'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                if($_FILES["styleSpec"]["name"] != '')
                {
                    $test = explode('.', $_FILES["styleSpec"]["name"]);
                    $ext = end($test);
                    $name = rand(100, 999) . '.' . $ext;
                
                    $location = '../upload/' . $name;
                    move_uploaded_file($_FILES["styleSpec"]["tmp_name"], $location);
                }else{
                    $name ="100.jpg";
                }

                if($_FILES["stylePicture"]["name"] != '')
                {
                    $test = explode('.', $_FILES["stylePicture"]["name"]);
                    $ext = end($test);
                    $name1 = rand(100, 999) . '.' . $ext;
                
                    $location = '../upload/' . $name1;
                    move_uploaded_file($_FILES["stylePicture"]["tmp_name"], $location);
                }else{
                    $name1 ="100.jpg";
                }
            
                $insert = "INSERT INTO style (buyerName,style,department,fabricCode,styleGroup,styleSpec,stylePicture,remark,departmentCode,description) VALUES ('$buyerName','$style','$department','$fabricCode','$styleGroup','$name','$name1','$remark','$departmentCode','$description')";
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

        // Style Update Function 
        if(isset($_POST['update'])){

            $id  = $_POST['edit_id'];
            $buyerName  = $_POST['buyerName'];
            $department  = $_POST['department'];
            $fabricCode  = $_POST['fabricCode'];
            $style  = $_POST['style'];
            $styleGroup  = $_POST['styleGroup'];

            $sql=mysqli_query($conn,"SELECT * FROM  style WHERE id ='$id'"); 
            $row = mysqli_fetch_assoc($sql);
            $stylePicture  = $row['stylePicture'];
            $styleSpec  = $row['styleSpec'];
        

            if($_FILES["styleSpec"]["name"] != '')
            {
                $test = explode('.', $_FILES["styleSpec"]["name"]);
                $ext = end($test);
                $name = rand(100, 999) . '.' . $ext;
            
                $location = '../upload/' . $name;
                move_uploaded_file($_FILES["styleSpec"]["tmp_name"], $location);
            }else{
                $name = $styleSpec;
            }

            if($_FILES["stylePicture"]["name"] != '')
            {
                $test = explode('.', $_FILES["stylePicture"]["name"]);
                $ext = end($test);
                $name1 = rand(100, 999) . '.' . $ext;
            
                $location = '../upload/' . $name1;
                move_uploaded_file($_FILES["stylePicture"]["tmp_name"], $location);
            }else{
                $name1 = $stylePicture;
            }

            $remark  = $_POST['remark'];
            $departmentCode  = $_POST['departmentCode'];
            $description  = $_POST['description'];

            $edit = "UPDATE style 
                                SET buyerName   ='$buyerName',
                                    style  ='$style',
                                    department  ='$department',
                                    fabricCode   ='$fabricCode',
                                    styleGroup  ='$styleGroup',
                                    styleSpec  ='$name',

                                    stylePicture   ='$name1',
                                    remark  ='$remark',
                                    departmentCode  ='$departmentCode',
                                    description  ='$description'
                                WHERE id=$id";

            $result = mysqli_query($conn,$edit);
            if($result){
                echo  1;
            }else{
                echo  mysqli_error($conn);		
            }


        }

    ?>