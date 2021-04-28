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
              <div class="row">
                    <!--+++++++++++++++++++++++++++++ Department +++++++++++++++++++++++++++++-->
                    <div class="col-4 stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Department</h4>
                            <!-- <p class="card-description"> Horizontal form layout </p> -->
                            <form class="forms-sample" id="departmentForm">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label" >Department Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="departmentName" placeholder="Enter Department Name">
                                </div>
                                </div>
                                <input type="hidden" class="form-control" name="addDepartment" value="addDepartment" />
                                <button type="submit" class="btn btn-success mr-2">Save</button>
                            </form>
                            </div>
                        </div>
                    </div>
                    <!--+++++++++++++++++++++++++++++ Section +++++++++++++++++++++++++++++-->
                     <div class="col-4 stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Section</h4>
                            <!-- <p class="card-description"> Horizontal form layout </p> -->
                            <form class="forms-sample" id="sectionForm">
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Section Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="sectionName"  placeholder="Enter Section Name">
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="addSection" value="addSection" />
                                <button type="submit" class="btn btn-success mr-2">Save</button>
                            </form>
                            </div>
                        </div>
                    </div>
                    <!--+++++++++++++++++++++++++++++ Branch  +++++++++++++++++++++++++++++-->
                    <div class="col-4 stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Branch</h4>
                            <!-- <p class="card-description"> Horizontal form layout </p> -->
                            <form class="forms-sample" id="branchForm">
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Branch Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="branchName"  placeholder="Branch Name">
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="addBranch" value="addBranch" />
                                <button type="submit" class="btn btn-success mr-2">Save</button>
                            </form>
                            </div>
                        </div>
                    </div>
              </div>
              <br>

              <div class="row">
                    <!--+++++++++++++++++++++++++++++ Designation  +++++++++++++++++++++++++++++-->
                    <div class="col-4 stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Designation</h4>
                            <!-- <p class="card-description"> Horizontal form layout </p> -->
                            <form class="forms-sample" id="designationForm">
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Designation Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="designationName"  placeholder="Designation Name">
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="addDesignation" value="addDesignation" />
                                <button type="submit" class="btn btn-success mr-2">Save</button>
                            </form>
                            </div>
                        </div>
                    </div>
              </div>
            <br>
            <br>
            <div class="row">

              <!--+++++++++++++++++++++++++++++ Department +++++++++++++++++++++++++++++-->
              <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Department table</h4>
                    <!-- <p class="card-description fl">Dashboard >> <code>Department Admin</code> </p>             -->
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th>Department </th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                          $sql=mysqli_query($conn,"SELECT * FROM user_department");
                          
                          $numRows = mysqli_num_rows($sql); 
                    
                          if($numRows > 0) {
                            $i = 1;
                            while($row = mysqli_fetch_assoc($sql)) {

                              $name  = $row['name'];
                      
                              echo ' <tr>';
                              echo ' <td>'.$i.' </td>';
                              echo ' <td>'.$name.' </td>';
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
              <!--+++++++++++++++++++++++++++++ Section +++++++++++++++++++++++++++++-->
              <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Section table</h4>
                    <!-- <p class="card-description fl">Dashboard >> <code>Department Admin</code> </p>             -->
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th>Section</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                          $sql=mysqli_query($conn,"SELECT * FROM section");
                          
                          $numRows = mysqli_num_rows($sql); 
                    
                          if($numRows > 0) {
                            $i = 1;
                            while($row = mysqli_fetch_assoc($sql)) {

                              $name  = $row['name'];

                              echo ' <tr>';
                              echo ' <td>'.$i.' </td>';
                              echo ' <td>'.$name.' </td>';
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
              <!--+++++++++++++++++++++++++++++ Branch +++++++++++++++++++++++++++++-->
              <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Branch table</h4>
                    <!-- <p class="card-description fl">Dashboard >> <code>Department Admin</code> </p>             -->
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th>Branch</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                          $sql=mysqli_query($conn,"SELECT * FROM branch");
                          
                          $numRows = mysqli_num_rows($sql); 
                    
                          if($numRows > 0) {
                            $i = 1;
                            while($row = mysqli_fetch_assoc($sql)) {

                              $name  = $row['name'];

                              echo ' <tr>';
                              echo ' <td>'.$i.' </td>';
                              echo ' <td>'.$name.' </td>';
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
            <br>

            <div class="row">
             <!--+++++++++++++++++++++++++++++ Branch +++++++++++++++++++++++++++++-->
              <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Designation table</h4>
                    <!-- <p class="card-description fl">Dashboard >> <code>Department Admin</code> </p>             -->
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th>Designation</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                          $sql=mysqli_query($conn,"SELECT * FROM designation");
                          
                          $numRows = mysqli_num_rows($sql); 
                    
                          if($numRows > 0) {
                            $i = 1;
                            while($row = mysqli_fetch_assoc($sql)) {

                              $name  = $row['name'];

                              echo ' <tr>';
                              echo ' <td>'.$i.' </td>';
                              echo ' <td>'.$name.' </td>';
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

// ------------ Department Form
 $(function () {

        $('#departmentForm').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '../controller/settings.php',
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

    // ------------ Section Form
    $(function () {

          $('#sectionForm').on('submit', function (e) {

            e.preventDefault();

            $.ajax({
              type: 'post',
              url: '../controller/settings.php',
              data: $('#sectionForm').serialize(),
              success: function (data) {

                  if(data==0){

                    swal({
                      title: "Can't Duplication !",
                      text: "Section",
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


    // ------------ Branch Form
    $(function () {

          $('#branchForm').on('submit', function (e) {

            e.preventDefault();

            $.ajax({
              type: 'post',
              url: '../controller/settings.php',
              data: $('#branchForm').serialize(),
              success: function (data) {

                  if(data==0){

                    swal({
                      title: "Can't Duplication !",
                      text: "Branch",
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

    // ------------ Designation Form
    $(function () {

          $('#designationForm').on('submit', function (e) {

            e.preventDefault();

            $.ajax({
              type: 'post',
              url: '../controller/settings.php',
              data: $('#designationForm').serialize(),
              success: function (data) {

                  if(data==0){

                    swal({
                      title: "Can't Duplication !",
                      text: "Designation",
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




