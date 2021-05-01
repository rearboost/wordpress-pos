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
            $progress = $row['progress'];
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
                      <li><a href="#"> | JOBS IN PROGRESS</a></li>
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
                    <h4 class="card-title">Inprogress Jobs</h4>
                        <p class="card-description">Job Info</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Customer</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="customer" name="customer" readonly>
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

                                                    if($customerName != $row['name']){
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
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Accessory</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name ="accessory" value="<?php if(isset($_GET['view_id'])){ echo $accessory;} ?>" placeholder="Accessorry name" readonly/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Request Date </label>
                            <div class="col-sm-9">
                                <input type="Date" class="form-control" name ="request_date" value="<?php if(isset($_GET['view_id'])){ echo $request_date;} ?>" readonly/>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Delivery Date </label>
                            <div class="col-sm-9">
                                <input type="Date" class="form-control" name ="delivery_date" value="<?php if(isset($_GET['view_id'])){ echo $delivery_date;} ?>" readonly/>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Job Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="job_desc" rows="4" placeholder="Short description about this job.." readonly><?php if(isset($_GET['view_id'])){ echo $job_desc;} ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">User Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="user_desc" rows="4" placeholder="Technician purpose only.." required><?php if(isset($_GET['view_id'])){ echo $user_desc;} ?></textarea>
                                </div>
                            </div>
                        </div>
                        </div>

                        <?php if (isset($_GET['view_id'])): ?>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label class="col-sm-6 col-form-label">Update Job Progress (%)</label>
                                <div class="col-sm-9">
                                    <select  class="form-control" name="progress" id="progress" required>
                                      <?php
                                      if(isset($_GET['view_id'])){
                                        echo "<option value = ".$progress.">" . $progress . "</option>";
                                      }
                                      ?>
                                      <option value="0">-- Update Progress --</option>
                                      <option value="10">10%</option>
                                      <option value="20">20%</option>
                                      <option value="30">30%</option>
                                      <option value="40">40%</option>
                                      <option value="50">50%</option>
                                      <option value="60">60%</option>
                                      <option value="70">70%</option>
                                      <option value="80">80%</option>
                                      <option value="90">90%</option>
                                      <option value="100">100%</option>
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
                    <h4 class="card-title">Inprogress Job Data</h4>
                    
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
                          <th>Edit</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sql=mysqli_query($conn,"SELECT * FROM customer C INNER JOIN jobs J ON C.id=J.customerId WHERE J.status='technician'");
                          
                          $numRows = mysqli_num_rows($sql); 
                    
                          if($numRows > 0) {
                            $i = 1;
                            while($row = mysqli_fetch_assoc($sql)) {

                            $name    = $row['name']; 
                            $order    = $row['jobNo'];  
                            $accessory   = $row['accessory'];
                            $request_date = $row['request_date'];
                            $delivery_date  = $row['delivery_date'];
                            $job_desc   = $row['job_desc'];
                            $user_desc = $row['user_desc'];
                            $progress = $row['progress'];

                              echo ' <tr>';
                              echo ' <td>'.$i.' </td>';
                              echo ' <td>'.$name.' </td>';
                              echo ' <td>'.$order.' </td>';
                              echo ' <td>'.$accessory.' </td>';
                              echo ' <td>'.$request_date.' </td>';
                              echo ' <td>'.$delivery_date.' </td>';
                              echo ' <td>'.$job_desc.' </td>';
                              echo '<td class="td-center"><button type="button" onclick="editForm('.$row["jobId"].')" class="btn btn-info btn-fw">Edit</button></td>';
                              if($progress==100){
                                echo '<td class="td-center"><button type="button" onclick="pushForm('.$row["jobId"].')" class="btn btn-success btn-fw">Completed</button></td>';
                              }else{
                                echo '<td class="td-center"><button type="button" onclick="pushForm('.$row["jobId"].')" class="btn btn-success btn-fw" disabled>Completed</button></td>';
                              }
                              
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
            url: '../controller/progress_controller.php',
            data: $('#requestAdd').serialize(),
            success: function (data) {

                if(data==0){

                    swal({
                      title: "Can't Duplication !",
                      text: "Jobs",
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
        window.location.href = "progress.php?view_id=" + id;
    }

    function cancelForm(){
        window.location.href = "progress.php";
    }

    function pushForm(id) {

      $.ajax({
        url:"../controller/progress_controller.php",
        method:"POST",
        data:{addcomplete_job_edit:id},
        success:function(data){

          if(data==0){

              swal({
                title: "Can't Push to next level!",
                text: "Incompleted",
                icon: "error",
                button: "Ok !",
              });

          }else{

              swal({
                title: "Good job !",
                text: "Successfully pushed",
                icon: "success",
                button: "Ok !",
                });
                setTimeout(function(){ location.reload(); }, 2500);
          }
        }
     });
   }
   


    ///////////// delete jobs ///////////////////////////
    // function confirmation(e,id) {
    //     var answer = confirm("Are you sure, you want to permanently delete this record?")
    //   if (!answer){
    //     e.preventDefault();
    //     return false;
    //   }else{
    //     myFunDelete(id)
    //   }
    // }

    // function myFunDelete(id){

    //   $.ajax({
    //         url:"../controller/request_controller.php",
    //         method:"POST",
    //         data:{removeID:id},
    //         success:function(data){
    //             swal({
    //             title: "Good job !",
    //             text: "Successfully Removerd",
    //             icon: "success",
    //             button: "Ok !",
    //             });
    //             setTimeout(function(){ location.reload(); }, 2500);
    //             window.location.href = "request.php";
    //         }
    //   });
    // }

     /////////////////////////////////////////////////////////////////


  </script>




