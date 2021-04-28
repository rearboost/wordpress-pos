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
                    <!--+++++++++++++++++++++++++++++ Master Category +++++++++++++++++++++++++++++-->
                    <div class="col-4 stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Master Category</h4>
                            <!-- <p class="card-description"> Horizontal form layout </p> -->
                            <form class="forms-sample" id="masterForm">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label" >Master Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="masterName" placeholder="Enter Master Name">
                                </div>
                                </div>
                                <input type="hidden" class="form-control" name="addMaster" value="addMaster" />
                                <button type="submit" class="btn btn-success mr-2">Save</button>
                            </form>
                            </div>
                        </div>
                    </div>
                    <!--+++++++++++++++++++++++++++++ Main Category +++++++++++++++++++++++++++++-->
                     <div class="col-4 stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Main Category</h4>
                            <!-- <p class="card-description"> Horizontal form layout </p> -->
                            <form class="forms-sample" id="mainForm">
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Master Category</label>
                                    <div class="col-sm-9">
                                      <select class="form-control" name = "masterName"  required>
                                              <option value="default">--Select Master Category--</option>
                                              <?php
                                                  $custom = "SELECT * FROM  master";
                                                  $result = mysqli_query($conn,$custom);
                                                  $numRows = mysqli_num_rows($result); 
                                  
                                                    if($numRows > 0) {
                                                      while($row = mysqli_fetch_assoc($result)) {
                                                        echo "<option value = ".$row['name'].">" . $row['name'] . "</option>";
                                                        
                                                      }
                                                    }
                                              ?>
                                      </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Main Category</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="mainCategory"  placeholder="Enter Main Category">
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="addMain" value="addMain" />
                                <button type="submit" class="btn btn-success mr-2">Save</button>
                            </form>
                            </div>
                        </div>
                    </div>
                    <!--+++++++++++++++++++++++++++++ Sub Category  +++++++++++++++++++++++++++++-->
                    <div class="col-4 stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Sub Category</h4>
                            <!-- <p class="card-description"> Horizontal form layout </p> -->
                            <form class="forms-sample" id="subForm">
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Master Category</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name = "masterName" id="masterName" required>
                                              <option value="default">--Select Master Category--</option>
                                              <?php
                                                  $custom = "SELECT * FROM  master";
                                                  $result = mysqli_query($conn,$custom);
                                                  $numRows = mysqli_num_rows($result); 
                                  
                                                    if($numRows > 0) {
                                                      while($row = mysqli_fetch_assoc($result)) {
                                                        echo "<option value = ".$row['name'].">" . $row['name'] . "</option>";
                                                        
                                                      }
                                                    }
                                              ?>
                                      </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Main Category</label>
                                    <div class="col-sm-9">
                                      <select name="mainCategory" id="mainCategory" class="form-control" >
                                            <option selected="" disabled="">--Select Main Category--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Sub Category</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="subCategory"  placeholder="Enter Sub Category">
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="addSub" value="addSub" />
                                <button type="submit" class="btn btn-success mr-2">Save</button>
                            </form>
                            </div>
                        </div>
                    </div>
              </div>
            <br>
            <br>
            <div class="row">

              <!--+++++++++++++++++++++++++++++ Master Category +++++++++++++++++++++++++++++-->
              <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Master Category table</h4>
                    <!-- <p class="card-description fl">Dashboard >> <code>Department Admin</code> </p>             -->
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th>Master </th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                          $sql=mysqli_query($conn,"SELECT * FROM master");
                          
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
              <!--+++++++++++++++++++++++++++++ Main Category +++++++++++++++++++++++++++++-->
              <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Main Category table</h4>
                    <!-- <p class="card-description fl">Dashboard >> <code>Department Admin</code> </p>             -->
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th>Main Category</th>
                          <th>Master</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                          $sql=mysqli_query($conn,"SELECT * FROM main");
                          
                          $numRows = mysqli_num_rows($sql); 
                    
                          if($numRows > 0) {
                            $i = 1;
                            while($row = mysqli_fetch_assoc($sql)) {

                              $name  = $row['name'];
                              $master  = $row['master'];
                      
                              echo ' <tr>';
                              echo ' <td>'.$i.' </td>';
                              echo ' <td>'.$name.' </td>';
                              echo ' <td>'.$master.' </td>';
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
              <!--+++++++++++++++++++++++++++++ Sub Category +++++++++++++++++++++++++++++-->
              <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Sub Category table</h4>
                    <!-- <p class="card-description fl">Dashboard >> <code>Department Admin</code> </p>             -->
                    <table class="table table-bordered table-responsive">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th>Sub Category</th>
                          <th>Main Category</th>
                          <th>Master </th>
                          <!-- <th>Action</th> -->
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                          $sql=mysqli_query($conn,"SELECT * FROM subCategory");
                          
                          $numRows = mysqli_num_rows($sql); 
                    
                          if($numRows > 0) {
                            $i = 1;
                            while($row = mysqli_fetch_assoc($sql)) {

                              $name  = $row['name'];
                              $master  = $row['master'];
                              $main  = $row['main'];
                      
                              echo ' <tr>';
                              echo ' <td>'.$i.' </td>';
                              echo ' <td>'.$name.' </td>';
                              echo ' <td>'.$main.' </td>';
                              echo ' <td>'.$master.' </td>';
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

// ------------ Master Form
 $(function () {

        $('#masterForm').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '../controller/i_category.php',
            data: $('#masterForm').serialize(),
            success: function (data) {

                if(data==0){

                  swal({
                    title: "Can't Duplication !",
                    text: "Master",
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

    // ------------ Main Form
    $(function () {

          $('#mainForm').on('submit', function (e) {

            e.preventDefault();

            $.ajax({
              type: 'post',
              url: '../controller/i_category.php',
              data: $('#mainForm').serialize(),
              success: function (data) {

                  if(data==0){

                    swal({
                      title: "Can't Duplication !",
                      text: "Main Category can't be able to Duplicate under same Master Category.",
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


    // ------------ Main Form
    $(function () {

          $('#subForm').on('submit', function (e) {

            e.preventDefault();

            $.ajax({
              type: 'post',
              url: '../controller/i_category.php',
              data: $('#subForm').serialize(),
              success: function (data) {

                  if(data==0){

                    swal({
                      title: "Can't Duplication !",
                      text: "Sub Category can't be able to duplicate under same Main category.",
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


       ///////////// Main ///////////////////////
      $("#masterName").on('change',function(){

        var masterName = $(this).val();

        if(masterName){
          $.get(
            "../functions/get_main.php",
            {masterName:masterName},
            function (data) { 
              $('#mainCategory').html(data);
            }
          );
            
        }else{
          $('#mainCategory').html('<option>Select Master Name First</option>');
        }
      });
    

  </script>



