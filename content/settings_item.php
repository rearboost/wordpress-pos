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
                    <!--+++++++++++++++++++++++++++++ Color +++++++++++++++++++++++++++++-->
                    <div class="col-6 stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Color</h4>
                            <!-- <p class="card-description"> Horizontal form layout </p> -->
                            <form class="forms-sample" id="colorForm">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label" >Color Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="colorName" placeholder="Enter Color Name">
                                </div>
                                </div>
                                <input type="hidden" class="form-control" name="addColor" value="addColor" />
                                <button type="submit" class="btn btn-success mr-2">Save</button>
                            </form>
                            </div>
                        </div>
                    </div>
                    <!--+++++++++++++++++++++++++++++ Size +++++++++++++++++++++++++++++-->
                     <div class="col-6 stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Size</h4>
                            <!-- <p class="card-description"> Horizontal form layout </p> -->
                            <form class="forms-sample" id="sizeForm">
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Size Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="sizeName"  placeholder="Enter Size Name">
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="addSize" value="addSize" />
                                <button type="submit" class="btn btn-success mr-2">Save</button>
                            </form>
                            </div>
                        </div>
                    </div>
                    <!--+++++++++++++++++++++++++++++ Reference  +++++++++++++++++++++++++++++-->
                    
              </div>
              <br>

              <div class="row">
                    <!--+++++++++++++++++++++++++++++ Dimension  +++++++++++++++++++++++++++++-->
                    <div class="col-6 stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Dimension</h4>
                            <!-- <p class="card-description"> Horizontal form layout </p> -->
                            <form class="forms-sample" id="dimensionForm">
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-4 col-form-label">Dimension Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="dimensionName"  placeholder="Enter Dimension Name">
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="addDimension" value="addDimension" />
                                <button type="submit" class="btn btn-success mr-2">Save</button>
                            </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Reference</h4>
                            <!-- <p class="card-description"> Horizontal form layout </p> -->
                            <form class="forms-sample" id="referenceForm">
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-4 col-form-label">Reference Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="referenceName"  placeholder="Enter Reference Name">
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="addReference" value="addReference" />
                                <button type="submit" class="btn btn-success mr-2">Save</button>
                            </form>
                            </div>
                        </div>
                    </div>
              </div>
            <br>
            <br>
            <div class="row">

              <!--+++++++++++++++++++++++++++++ Color +++++++++++++++++++++++++++++-->
              <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Color table</h4>
                    <!-- <p class="card-description fl">Dashboard >> <code>Department Admin</code> </p>             -->
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th>Color </th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                          $sql=mysqli_query($conn,"SELECT * FROM color");
                          
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
              <!--+++++++++++++++++++++++++++++ Size +++++++++++++++++++++++++++++-->
              <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Size table</h4>
                    <!-- <p class="card-description fl">Dashboard >> <code>Department Admin</code> </p>             -->
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th>Size</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                          $sql=mysqli_query($conn,"SELECT * FROM size");
                          
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
              <!--+++++++++++++++++++++++++++++ Dimension +++++++++++++++++++++++++++++-->
              <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Dimension table</h4>
                    <!-- <p class="card-description fl">Dashboard >> <code>Department Admin</code> </p>             -->
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th>Dimension</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                          $sql=mysqli_query($conn,"SELECT * FROM dimension");
                          
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
             <!--+++++++++++++++++++++++++++++ Reference +++++++++++++++++++++++++++++-->
              <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Reference table</h4>
                    <!-- <p class="card-description fl">Dashboard >> <code>Department Admin</code> </p>             -->
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th>Reference</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                          $sql=mysqli_query($conn,"SELECT * FROM reference");
                          
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

// ------------ Color Form
 $(function () {

        $('#colorForm').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '../controller/settings_item.php',
            data: $('#colorForm').serialize(),
            success: function (data) {

                if(data==0){

                  swal({
                    title: "Can't Duplication !",
                    text: "Color",
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

    // ------------ Size Form
    $(function () {

          $('#sizeForm').on('submit', function (e) {

            e.preventDefault();

            $.ajax({
              type: 'post',
              url: '../controller/settings_item.php',
              data: $('#sizeForm').serialize(),
              success: function (data) {

                  if(data==0){

                    swal({
                      title: "Can't Duplication !",
                      text: "Size",
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


    // ------------ Dimension Form
    $(function () {

          $('#dimensionForm').on('submit', function (e) {

            e.preventDefault();

            $.ajax({
              type: 'post',
              url: '../controller/settings_item.php',
              data: $('#dimensionForm').serialize(),
              success: function (data) {

                  if(data==0){

                    swal({
                      title: "Can't Duplication !",
                      text: "Dimension",
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

    // ------------ Reference Form
    $(function () {

          $('#referenceForm').on('submit', function (e) {

            e.preventDefault();

            $.ajax({
              type: 'post',
              url: '../controller/settings_item.php',
              data: $('#referenceForm').serialize(),
              success: function (data) {

                  if(data==0){

                    swal({
                      title: "Can't Duplication !",
                      text: "Reference",
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




