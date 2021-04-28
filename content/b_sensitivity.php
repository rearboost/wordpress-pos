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
                    <h4 class="card-title">Sensitivity Admin</h4>
                    <!-- <p class="card-description"> Horizontal form layout </p> -->
                    <form class="forms-sample" id="sensitivityForm">
                        <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Sensitivity</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"  name="sensitivity" placeholder="Enter Sensitivity">
                        </div>
                        </div>
                      
                        <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control"  name="description" rows="2"></textarea>
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
                    <h4 class="card-title">Sensitivity Admin table</h4>
                    <p class="card-description fl">Dashboard >> <code>Sensitivity Admin</code> </p>            
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th>Sensitivity</th>
                          <th>Description</th>
                          <!-- <th>Action</th> -->
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                            $sql=mysqli_query($conn,"SELECT * FROM  sensitivity");
                            
                            $numRows = mysqli_num_rows($sql); 
                      
                            if($numRows > 0) {
                              $i = 1;
                              while($row = mysqli_fetch_assoc($sql)) {

                                $sensitivity  = $row['sensitivity'];
                                $description  = $row['description'];

                                echo ' <tr>';
                                echo ' <td>'.$i.' </td>';
                                echo ' <td>'.$sensitivity.' </td>';
                                echo ' <td>'.$description.' </td>';
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

        $('#sensitivityForm').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '../controller/b_sensitivity.php',
            data: $('#sensitivityForm').serialize(),
            success: function (data) {

                swal({
                title: "Good job !",
                text: "Successfully Submited",
                icon: "success",
                button: "Ok !",
                });
                setTimeout(function(){ location.reload(); }, 2500);
            }
          });

        });

      });
  
  
  </script>