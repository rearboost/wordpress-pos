<!DOCTYPE html>
<html lang="en">
  <?php
    // Database Connection
    require '../include/config.php';

     // Get Update Form Data
    if(isset($_GET['view_id'])){

        $view_id = $_GET['view_id'];

        $sql=mysqli_query($conn,"SELECT * FROM customer C INNER JOIN jobs J ON C.id=J.customerId WHERE J.jobId='$view_id'");  
        $numRows = mysqli_num_rows($sql); 
        if($numRows > 0) {
          while($row = mysqli_fetch_assoc($sql)) {

            $id  = $row['id'];
            $customerName  = $row['name'];
            $accessory   = $row['accessory'];
            $request_date = $row['request_date'];
            $delivery_date  = $row['delivery_date'];
            $job_desc   = $row['job_desc'];
            $user_desc = $row['user_desc'];
            //Style Images
            // $sql_get=mysqli_query($conn,"SELECT * FROM style WHERE style='$style'");  
            // $row_get = mysqli_fetch_assoc($sql_get);

            // $styleSpec = $row_get['styleSpec'];
            // $stylePicture = $row_get['stylePicture'];
          }
        }
    }

  ?>
  <!-- include head code here -->
  <?php  include('../include/head.php');   ?>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <!-- include nav code here -->
      <?php  include('../include/nav.php');   ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <!-- include sidebar code here -->
        <?php  include('../include/sidebar.php');   ?>
        <!-- partial -->
          <div class="main-panel">
            <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
              <div class="col-12">
                <div class="page-header">
                  <h4 class="page-title">Dashboard</h4>
                  <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                    <ul class="quick-links">
                      <li><a href="#"> | JOBS</a></li>
                      <li><a href="#"> | INBOUND REQUESTS</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- Page Title Header Ends-->
            <form class="form-sample" id="requestAdd">
              <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Inbound Requests</h4>
                        <p class="card-description">Job Info</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Customer</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" id="customer" name="customer" required>
                                            <?php
                                                $custom = "SELECT * FROM customer";
                                                $result = mysqli_query($conn,$custom);
                                                $numRows = mysqli_num_rows($result); 

                                                if(isset($_GET['view_id'])){
                                                echo "<option value = ".$id.">" . $customerName . "</option>";
                                                }
                                                echo "<option value=''>--Select Customer--</option>";
                                                if($numRows > 0) {
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    if(isset($_GET['view_id'])){

                                                    if($buyerName != $row['name']){
                                                        echo "<option value = ".$row['id'].">" . $row['name'] . "</option>";
                                                    }

                                                    }else{
                                                    echo "<option value = ".$row['id'].">" . $row['name'] . "</option>";
                                                    }
                                                }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 size">
                                        <i class="fa fa-plus-circle pointer" onclick="customerForm()"></i>   
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Accessory</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name ="accessory" value="<?php if(isset($_GET['view_id'])){ echo $accessory;} ?>" placeholder="Accessorry name" required/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Request Date </label>
                            <div class="col-sm-9">
                                <input type="Date" class="form-control" name ="request_date" value="<?php if(isset($_GET['view_id'])){ echo $request_date;} ?>" required/>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Delivery Date </label>
                            <div class="col-sm-9">
                                <input type="Date" class="form-control" name ="delivery_date" value="<?php if(isset($_GET['view_id'])){ echo $delivery_date;} ?>" required/>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Job Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="job_desc" rows="4" placeholder="Short description about this job.." required><?php if(isset($_GET['view_id'])){ echo $job_desc;} ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">User Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="user_desc" rows="4"  placeholder="Technician purpose only.." readonly><?php if(isset($_GET['view_id'])){ echo $user_desc;} ?></textarea>
                                </div>
                            </div>
                        </div>
                        </div>
                        <?php if (isset($_GET['view_id'])): ?>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select  class="form-control" name="status" id="status" required>
                                       <option value="request" selected="">-- Select Status --</option>
                                       <option value="technician">Assign</option>
                                       <option value="reject">Reject</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        </div>
                        <?php else: ?>
                        <?php endif ?>


                       <?php if (isset($_GET['view_id'])): ?>
                          <input type="hidden" class="form-control" name="view_id" value="<?php if(isset($_GET['view_id'])){ echo $view_id;} ?>" />
                          <input type="hidden" class="form-control" name="req_update" value="req_update" />
                          <button type="submit" class="btn btn-info btn-fw">Update</button>
                          <button type="button" onclick="cancelForm()" class="btn btn-primary btn-fw">Cancel</button>
                      <?php else: ?>
                          <input type="hidden" class="form-control" name="req_add" value="req_add" />
                          <button type="submit" class="btn btn-success mr-2 fr">Request</button>
                      <?php endif ?>
                  
                    </div>
                  </div>
                </div>
              </div>                
            </form>

            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Inbound Request Data</h4>
                    
                    <div class="table-responsive">          
                    <table id="example" class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th>Customer</th>
                          <th>Order</th>
                          <th>Accessory </th>
                          <th>Request Date</th>
                          <th>Delivery Date</th>
                          <th>Job Desc</th>
                          <!-- <th>User Desc</th> -->
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sql=mysqli_query($conn,"SELECT * FROM customer C INNER JOIN jobs J ON C.id=J.customerId WHERE J.status='request'");
                          
                          $numRows = mysqli_num_rows($sql); 
                    
                          if($numRows > 0) {
                            $i = 1;
                            while($row = mysqli_fetch_assoc($sql)) {

                            $order    = $row['jobNo'];   
                            $name    = $row['name'];   
                            $accessory   = $row['accessory'];
                            $request_date = $row['request_date'];
                            $delivery_date  = $row['delivery_date'];
                            $job_desc   = $row['job_desc'];
                            // $user_desc = $row['user_desc'];

                              echo ' <tr>';
                              echo ' <td>'.$i.' </td>';
                              echo ' <td>'.$name.' </td>';
                              echo ' <td>'.$order.' </td>';
                              echo ' <td>'.$accessory.' </td>';
                              echo ' <td>'.$request_date.' </td>';
                              echo ' <td>'.$delivery_date.' </td>';
                              echo ' <td>'.$job_desc.' </td>';
                              // echo ' <td>'.$user_desc.' </td>';
                              echo '<td class="td-center"><button type="button" onclick="editForm('.$row["jobId"].')" class="btn btn-info btn-fw">Edit</button></td>';
                              echo '<td class="td-center"><button type="button" onclick="confirmation(event,'.$row["jobId"].')" class="btn btn-secondary btn-fw">Delete</button></td>';
                              echo ' </tr>';
                              $i++;
                            }
                          }
                        ?>
                      </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>
             
             
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
            <!-- include footer coe here -->
            <?php include('../include/footer.php');   ?>
            <!-- partial -->
          </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- include footer coe here -->
    <?php include('../include/footer-js.php');   ?>

  </body>
</html>


  <script>
  
    /////////////////////////////////////////////////// Form Submit Add  

    $(function () {

        $('#requestAdd').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '../controller/request_controller.php',
            data: $('#requestAdd').serialize(),
            success: function (data) {

              alert(data)

                if(data==0){

                    swal({
                      title: "Can't Duplication !",
                      text: "Request",
                      icon: "error",
                      button: "Ok !",
                    });

                }else{

                    swal({
                      title: "Good job !",
                      text: "Successfully Submited",
                      icon: "success",
                      button: "Ok !",
                      });
                      setTimeout(function(){ location.reload(); }, 2500);
                }
            }
          });

        });
      });

    function editForm(id){
        window.location.href = "request.php?view_id=" + id;
        //window.location.href = "request.php";
    }

    function cancelForm(){

        window.location.href = "request.php";
    }

    function customerForm(){
        $('#myModal').modal('show');
    }

    /////////////////////////////////////////////////// Form Submit Add  

    $(function () {

        $('#customerAdd').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '../controller/customer_controller.php',
            data: $('#customerAdd').serialize(),
            success: function (data) {
                  if(data==0){

                    swal({
                      title: "Can't Duplication !",
                      text: "Customer",
                      icon: "error",
                      button: "Ok !",
                    });

                  }else{



                    swal({
                    title: "Good job !",
                    text: "Successfully Submited",
                    icon: "success",
                    button: "Ok !",
                    });
                    setTimeout(function(){ location.reload(); }, 2500);
                    
                  }
               }
          });
        });
      });


    ///////////// delete jobs ///////////////////////////
    function confirmation(e,id) {
        var answer = confirm("Are you sure, you want to permanently delete this record?")
      if (!answer){
        e.preventDefault();
        return false;
      }else{
        myFunDelete(id)
      }
    }

    function myFunDelete(id){

      $.ajax({
            url:"../controller/request_controller.php",
            method:"POST",
            data:{removeID:id},
            success:function(data){
                swal({
                title: "Good job !",
                text: "Successfully Removerd",
                icon: "success",
                button: "Ok !",
                });
                setTimeout(function(){ location.reload(); }, 2500);
                window.location.href = "request.php";
            }
      });
    }

     /////////////////////////////////////////////////////////////////


  </script>


 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          <h4 class="modal-title">Customer</h4>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-body">
            <h4 class="card-title">Customer Register</h4>
            <!-- <p class="card-description"> Basic form elements </p> -->
            <form class="forms-sample" id="customerAdd">
                <div class="form-group">
                <label for="exampleInputName1">Name</label>
                <input type="text" class="form-control" name="name" placeholder="customer name here.." required>
                </div>
                <div class="form-group">
                <label for="exampleTextarea1">Address</label>
                <textarea class="form-control" name="address" rows="2" placeholder="customer address here.."></textarea>
                </div>
                <div class="form-group">
                <label for="exampleInputName1">Contact</label>
                <input type="text" class="form-control" name="contact" placeholder="+94 00-0000-000" required>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail3">Email</label>
                <input type="email" class="form-control" name="email" placeholder="sample@gmail.com" required>
                </div>
                <input type="hidden" class="form-control" name="add" value="add" />
                <button type="submit" class="btn btn-success mr-2">Submit</button>
                <!-- <button class="btn btn-light">Cancel</button> -->
            </form>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



