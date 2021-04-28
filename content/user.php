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
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">User table</h4>
                    <p class="card-description fl">Dashboard >> <code>User</code> </p>
                    <button type="submit" class="btn btn-primary btn-fw fr"data-toggle="modal" data-target="#myModal" >Create New User</button>              
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th>Branch name </th>
                          <th> Designation </th>
                          <th> Employee Name </th>
                          <th> Email </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          $sql=mysqli_query($conn,"SELECT * FROM user");
                          
                          $numRows = mysqli_num_rows($sql); 
                    
                          if($numRows > 0) {
                            $i = 1;
                            while($row = mysqli_fetch_assoc($sql)) {

                              $branchName  = $row['branchName'];
                              $designation   = $row['designation'];
                              $employeeName = $row['employeeName'];
                              $email = $row['email'];
                              echo ' <tr>';
                              echo ' <td>'.$i.' </td>';
                              echo ' <td>'.$branchName.' </td>';
                              echo ' <td>'.$designation.' </td>';
                              echo ' <td>'.$employeeName.' </td>';
                              echo ' <td>'.$email.' </td>';
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

 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          <h4 class="modal-title">Modal User</h4>
        </div>
        <div class="modal-body">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Create New User</h4>
                <form class="form-sample" id="userAdd">
                    <p class="card-description">Personal info</p>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Company</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="companyName" required>
                                <option selected="" disabled="">--Select Company--</option>
                                <option value="TRENDYWEAR PVT LTD">TRENDYWEAR PVT LTD</option>
                                <option value="TRENDYWEAR ADIKARIGAMA PVT LTD">TRENDYWEAR ADIKARIGAMA PVT LTD</option>
                                <option value="ADITI INFINITY PVT LTD">ADITI INFINITY PVT LTD.</option>
                            </select>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Branch name</label>
                        <div class="col-sm-9">
                            <select class="form-control" name = "branchName" required>
                                  <option value="">--Select Branch--</option>
                                  <?php
                                      $custom = "SELECT * FROM branch";
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
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Department</label>
                        <div class="col-sm-9">
                             <select class="form-control" name = "department" required>
                                  <option value="">--Select Department--</option>
                                  <?php
                                      $custom = "SELECT * FROM user_department";
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
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Section</label>
                        <div class="col-sm-9">
                             <select class="form-control" name = "section" required>
                                  <option value="">--Select Section--</option>
                                  <?php
                                      $custom = "SELECT * FROM section";
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
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Designation</label>
                        <div class="col-sm-9">
                            <select class="form-control" name = "designation" required>
                                  <option value="">--Select Designation--</option>
                                  <?php
                                      $custom = "SELECT * FROM designation";
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
                    </div>
                     <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">User Role</label>
                        <div class="col-sm-9">
                            <select class="form-control" name = "user_role"  id="user_role" required>
                                  <option value="">--Select User Role--</option>
                                  <?php
                                      $custom = "SELECT * FROM user_role";
                                      $result = mysqli_query($conn,$custom);
                                      $numRows = mysqli_num_rows($result); 
                      
                                        if($numRows > 0) {
                                          while($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value = ".$row['id'].">" . $row['role'] . "</option>";
                                            
                                          }
                                        }
                                  ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Membership</label>
                        <div class="col-sm-4">
                            <div class="form-radio">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="" checked> Free </label>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-radio">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="option2"> Professional </label>
                            </div>
                        </div>
                        </div>
                    </div> -->
                    </div>
                    <!-- <p class="card-description"> Address </p> -->
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Employee Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name ="employeeName"  id= "employeeName" required/>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" id="username" readonly/>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" value="admin@123" readonly/>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="email" password/>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">City</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" />
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Country</label>
                            <div class="col-sm-9">
                                <select class="form-control">
                                <option>America</option>
                                <option>Italy</option>
                                <option>Russia</option>
                                <option>Britain</option>
                                </select>
                            </div>
                            </div>
                        </div>
                    </div> -->
                    <input type="hidden" class="form-control" name="add" value="add" />
                    <button type="submit" class="btn btn-success mr-2 fr" >Submit</button>      
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
  



  <script>
  
    /////////////////////////////////////////////////// Form Submit Add  

    $(function () {

        $('#userAdd').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '../controller/user.php',
            data: $('#userAdd').serialize(),
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
  
  ///////////////////////////////////////////////

   $("#employeeName").on('keyup change', function (){

         var employeeName  =  $('#employeeName').val();
         username(employeeName)
         
    });

    ////////////// Employee Name - images ///////////////////////
  
    function username(employeeName){

      if(employeeName!=""){

        var minNumber = 100;
        var maxNumber = 1000

        var random =  Math.floor(Math.random()*(maxNumber-minNumber+1)+minNumber);
        var variable = employeeName.substring(0, 5);
        var username = (variable+random).toLowerCase();

        $('#username').val(username); 
      }
    }

  </script>