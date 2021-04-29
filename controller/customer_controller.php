
    <?php
        // Database Connection
        require '../include/config.php';

        // wise_sizes Add Function 
        if(isset($_POST['add'])){

            $name      = $_POST['name'];
            $address   = $_POST['address'];
            $contact   = $_POST['contact'];
            $email     = $_POST['email'];

            $check= mysqli_query($conn, "SELECT * FROM customer WHERE name='$name' AND address='$address' AND contact='$contact' AND email='$email'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $insert = "INSERT INTO customer (name,address,contact,email) VALUES ('$name','$address','$contact','$email')";
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

            $id      = $_POST['edit_id'];
            $name    = $_POST['name'];
            $address = $_POST['address'];
            $contact = $_POST['contact'];
            $email   = $_POST['email'];

            $check= mysqli_query($conn, "SELECT * FROM customer WHERE name='$name' AND address='$address' AND contact='$contact' AND email='$email'");
		    $count = mysqli_num_rows($check);

            if($count==0){

                $edit = "UPDATE customer 
                                    SET name   ='$name',
                                        address  ='$address',
                                        contact  ='$contact',
                                        email  ='$email'
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
            $query ="DELETE FROM customer WHERE id='$id'";
            $result = mysqli_query($conn,$query);
            if($result){
                echo  1;
            }else{
                echo  mysqli_error($conn);		
            }
        }

    ?>