<!DOCTYPE html>
<html lang="en">
 <?php
    // Database Connection
    require '../include/config.php';
  ?>
  <!-- include head code here -->
  <?php  include('../include/head.php');   ?>
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
            <div class="col-6 stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Department Admin</h4>
                    <!-- <p class="card-description"> Horizontal form layout </p> -->
                    <form class="forms-sample" id="departmentForm">
                        <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Department</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"  name="department" placeholder="Enter Department">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Department Code</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"  name="code" placeholder="Enter Department Code">
                        </div>
                        </div>
                         <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Remark</label>
                        <div class="col-sm-9">
                            <textarea class="form-control"  name="remark" rows="2"></textarea>
                        </div>
                        </div>
                        <input type="hidden" class="form-control" name="add" value="add" />
                        <button type="submit" class="btn btn-success mr-2">Save</button>
                    </form>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Department Admin table</h4>
                    <p class="card-description fl">Dashboard >> <code>Department Admin</code> </p>            
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th>Department</th>
                          <th>Department Code</th>
                          <th>Remark </th>
                          <!-- <th>Action</th> -->
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                            $sql=mysqli_query($conn,"SELECT * FROM  department");
                            
                            $numRows = mysqli_num_rows($sql); 
                      
                            if($numRows > 0) {
                              $i = 1;
                              while($row = mysqli_fetch_assoc($sql)) {

                                $department  = $row['department'];
                                $code  = $row['code'];
                                $remark   = $row['remark'];
                                echo ' <tr>';
                                echo ' <td>'.$i.' </td>';
                                echo ' <td>'.$department.' </td>';
                                echo ' <td>'.$code.' </td>';
                                echo ' <td>'.$remark.' </td>';
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

        $('#departmentForm').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '../controller/s_department_admin.php',
            data: $('#departmentForm').serialize(),
            success: function (data) {

            

              if(data==0){

                swal({
                  title: "Can't Duplication !",
                  text: "Department",
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
  
  
  </script>