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
                    <h4 class="card-title">Item table</h4>
                    <p class="card-description fl">Dashboard >> <code>Item</code> </p>
                    <button type="submit" class="btn btn-primary btn-fw fr"data-toggle="modal" data-target="#myModal" >Create Item</button>              
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th> Master Category </th>
                          <th> Main Category </th>
                          <th> Sub Category </th>
                          <th> Item Name </th>
                          <th> Color </th>
                          <th> Size </th>
                          <th> Reference </th>
                          <th> Dimension </th>
                          <th> Unit </th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                          $sql=mysqli_query($conn,"SELECT * FROM Item");
                          
                          $numRows = mysqli_num_rows($sql); 
                    
                          if($numRows > 0) {
                            $i = 1;
                            while($row = mysqli_fetch_assoc($sql)) {

                              $masterName  = $row['masterName'];
                              $main	   = $row['main'];
                              $subCategory = $row['subCategory'];
                              $itemName = $row['itemName'];
                              $color = $row['color'];
                              $size = $row['size'];
                              $reference = $row['reference'];
                              $dimension = $row['dimension'];
                              $unit = $row['unit'];
                              echo ' <tr>';
                              echo ' <td>'.$i.' </td>';
                              echo ' <td>'.$masterName.' </td>';
                              echo ' <td>'.$main.' </td>';
                              echo ' <td>'.$subCategory.' </td>';
                              echo ' <td>'.$itemName.' </td>';
                              echo ' <td>'.$color.' </td>';
                              echo ' <td>'.$size.' </td>';
                              echo ' <td>'.$reference.' </td>';
                              echo ' <td>'.$dimension.' </td>';
                              echo ' <td>'.$unit.' </td>';
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
          <h4 class="modal-title">Modal Item</h4>
        </div>
        <div class="modal-body">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title">Create Item</h4>
                <form class="form-sample" id="itemForm">
                    <p class="card-description">Item info</p>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Master Category</label>
                        <div class="col-sm-9">
                             <select class="form-control" id="masterName" name = "masterName" required>
                                    <option value="">--Select Master Category--</option>
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
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Main Category</label>
                          <div class="col-sm-9">
                              <select name="main" id="main" class="form-control" >
                                  <option selected="" disabled="">--Select Main Category--</option>
                              </select>
                          </div>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Sub category</label>
                        <div class="col-sm-9">
                             <select name="subCategory" id="subCategory" class="form-control" >
                                  <option selected="" disabled="">--Select Sub Category--</option>
                              </select>
                        </div>
                        </div>
                        
                    </div>
                     <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label" >Item Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="itemName" placeholder ="Enter Item Name"/>
                            </div>
                            </div>
                     </div>
                    <!-- <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Section</label>
                        <div class="col-sm-9">
                            <input class="form-control" placeholder="dd/mm/yyyy" />
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Designation</label>
                        <div class="col-sm-9">
                            <select class="form-control">
                            <option>Category1</option>
                            <option>Category2</option>
                            <option>Category3</option>
                            <option>Category4</option>
                            </select>
                        </div>
                        </div>
                    </div> -->
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
                        <label class="col-sm-3 col-form-label">Color</label>
                        <div class="col-sm-9">
                             <select class="form-control" name="color" required>
                                <option value="">--Select Color--</option>
                                 <?php
                                    $custom = "SELECT * FROM  color";
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
                        <label class="col-sm-3 col-form-label">Size</label>
                        <div class="col-sm-9">
                              <select class="form-control" name="size" required>
                                <option value="">--Select Size--</option>
                                 <?php
                                    $custom = "SELECT * FROM  size";
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
                        <label class="col-sm-3 col-form-label">Reference</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="reference">
                                <option value="">--Select Reference--</option>
                                 <?php
                                    $custom = "SELECT * FROM  reference";
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
                        <label class="col-sm-3 col-form-label">Dimension</label>
                        <div class="col-sm-9">
                              <select class="form-control" name="dimension">
                                <option value="">--Select Dimension--</option>
                                <?php
                                    $custom = "SELECT * FROM  dimension";
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
                            <label class="col-sm-3 col-form-label" >Unit</label>
                            <div class="col-sm-9">

                            </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
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
                        </div> -->
                    </div>
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
  
    ////////////// Main ///////////////////////
    $("#masterName").on('change',function(){

      var masterName = $(this).val();
      if(masterName){
        $.get(
          "../functions/get_main.php",
          {masterName:masterName},
          function (data) { 
             $('#main').html(data);
          }
        );
          
      }else{
        $('#main').html('<option>Select Master Name First</option>');
      }
    });


    ////////////// Sub category ///////////////////////
    $("#main").on('change',function(){

      var main = $(this).val();
      var master = $('#masterName').val();

      if(main){
        $.get(
          "../functions/get_sub.php",
          {main:main,master:master},
          function (data) { 
             $('#subCategory').html(data);
          }
        );
          
      }else{
        $('#main').html('<option>Select Main First</option>');
      }
    });


    /////////////////////////////////////////////////// Form Submit Add  

    $(function () {

        $('#itemForm').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '../controller/i_create_item.php',
            data: $('#itemForm').serialize(),
            success: function (data) {

              if(data==0){

                swal({
                  title: "Can't Duplication !",
                  text: "Sub category, Color ,Size, Reference ,Dimension",
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
  