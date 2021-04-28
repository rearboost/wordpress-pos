<!DOCTYPE html>
<html lang="en">
  <?php
    // Database Connection
    require '../include/config.php';

     // Get Update Form Data
    if(isset($_GET['view_id'])){

        $view_name = $_GET['view_id'];

        $sql=mysqli_query($conn,"SELECT * FROM style WHERE style='$view_name'");  
        $numRows = mysqli_num_rows($sql); 
        if($numRows > 0) {
          while($row = mysqli_fetch_assoc($sql)) {

            $id  = $row['id'];
            $buyerName  = $row['buyerName'];
            $style   = $row['style'];
            $department = $row['department'];
            $fabricCode  = $row['fabricCode'];
            $styleGroup   = $row['styleGroup'];
            $styleSpec = $row['styleSpec'];
            $stylePicture  = $row['stylePicture'];
            $remark   = $row['remark'];
            $departmentCode = $row['departmentCode'];
            $description  = $row['description'];

          }
        }
    }

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
                   <h4 class="card-title">Style table</h4>
                   <form class="form-sample" id="styleForm" enctype="multipart/form-data">
                    <p class="card-description">Info</p>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Buyer</label>
                        <div class="col-sm-9">
                            <select class="form-control" name = "buyerName" required>
                                    <?php
                                        $custom = "SELECT * FROM buyer";
                                        $result = mysqli_query($conn,$custom);
                                        $numRows = mysqli_num_rows($result); 

                                         if(isset($_GET['view_id'])){
                                            echo "<option value = ".$buyerName.">" . $buyerName . "</option>";
                                         }

                                         echo "<option value=''>--Select Buyer--</option>";
                    
                                          if($numRows > 0) {
                                            while($row = mysqli_fetch_assoc($result)) {

                                              if(isset($_GET['view_id'])){

                                                  if($buyerName != $row['buyer']){
                                                      echo "<option value = ".$row['buyer'].">" . $row['buyer'] . "</option>";
                                                  }

                                              }else{
                                              echo "<option value = ".$row['buyer'].">" . $row['buyer'] . "</option>";
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
                        <label class="col-sm-3 col-form-label">Style</label>
                        <div class="col-sm-9">
                              <select class="form-control" name="select_style" id="select_style">
                                    <?php
                                        $custom = "SELECT * FROM style";
                                        $result = mysqli_query($conn,$custom);
                                        $numRows = mysqli_num_rows($result); 

                                        if(isset($_GET['view_id'])){
                                            echo "<option value = ".$style.">" . $style . "</option>";
                                        }
                                        echo "<option value=''>--Select Style--</option>";

                                        if($numRows > 0) {
                                            while($row = mysqli_fetch_assoc($result)) {

                                                if(isset($_GET['view_id'])){

                                                if($style != $row['style']){
                                                    echo "<option value = ".$row['style'].">" . $row['style'] . "</option>";
                                                }

                                                }else{
                                                echo "<option value = ".$row['style'].">" . $row['style'] . "</option>";
                                                }
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
                                    <?php
                                        $custom = "SELECT * FROM department";
                                        $result = mysqli_query($conn,$custom);
                                        $numRows = mysqli_num_rows($result); 

                                        if(isset($_GET['view_id'])){
                                            echo "<option value = ".$department.">" . $department . "</option>";
                                        }

                                        echo  '<option value="">--Select Department--</option>';
                        
                                        if($numRows > 0) {
                                            while($row = mysqli_fetch_assoc($result)) {
                                              
                                              if(isset($_GET['view_id'])){

                                                if($department != $row['department']){
                                                    echo "<option value = ".$row['department'].">" . $row['department'] . "</option>";
                                                }

                                              }else{
                                              echo "<option value = ".$row['department'].">" . $row['department'] . "</option>";
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
                        <label class="col-sm-3 col-form-label">Fabric Code</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value='<?php if(isset($_GET['view_id'])){ echo $fabricCode; }  ?>'  name ="fabricCode"/>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">New Style</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value='<?php if(isset($_GET['view_id'])){ echo $style; }  ?>' name="style"/>
                        </div>
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Style Group</label>
                        <div class="col-sm-9">
                              <input type="text" class="form-control" value='<?php if(isset($_GET['view_id'])){ echo $styleGroup; }  ?>' name="styleGroup" />
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
                        <label class="col-sm-3 col-form-label">Style Spec</label>
                        <div class="col-sm-9">
                            <input type="file" style="border: inherit;" name="styleSpec" accept="image/*" onchange="document.getElementById('output1').src = window.URL.createObjectURL(this.files[0])" class="form-control" />
                            <p></p>
                            <img id="output1" src='<?php if(isset($_GET['view_id'])){ echo '../upload/'.$styleSpec; }else{ echo '../assets/images/default-image.jpg';}  ?>'  width="100" height="100">
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Style Picture</label>
                        <div class="col-sm-9">
                            <input type="file" style="border: inherit;" name="stylePicture" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" class="form-control" />
                            <p></p>
                            <img id="output" src='<?php if(isset($_GET['view_id'])){ echo '../upload/'.$stylePicture; }else{ echo '../assets/images/default-image.jpg';}  ?>' width="100" height="100">
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                     <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Remarks</label>
                        <div class="col-sm-9">
                           <textarea class="form-control" name="remark"  rows="2"><?php if(isset($_GET['view_id'])){ echo $remark; }  ?></textarea>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Department Code</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" value='<?php if(isset($_GET['view_id'])){ echo $departmentCode; }  ?>' name="departmentCode" />
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Style Description</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" name="description" rows="2"><?php if(isset($_GET['view_id'])){ echo $description; }  ?></textarea>
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
                     <?php if (isset($_GET['view_id'])): ?>
                        <input type="hidden" class="form-control" name="edit_id" value="<?php if(isset($_GET['view_id'])){ echo $id;} ?>" />
                        <input type="hidden" class="form-control" name="update" value="update" />
                        <button type="submit" class="btn btn-info btn-fw">Update</button>
                        <button type="button" onclick="cancelForm()" class="btn btn-primary btn-fw">Cancel</button>
                    <?php else: ?>
                        <input type="hidden" class="form-control" name="add" value="add" />
                        <button type="submit" class="btn btn-success mr-2">Save</button>
                    <?php endif ?>
                </form>
                <br>
                  <p><hr></p>
                   
                    <!-- <p class="card-description fl">Dashboard >> <code>Creation</code> </p> -->
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th>Buyer </th>
                          <th> Style </th>
                          <th> Department </th>
                          <th> Fabric Code </th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                            $sql=mysqli_query($conn,"SELECT * FROM style");
                            
                            $numRows = mysqli_num_rows($sql); 
                      
                            if($numRows > 0) {
                              $i = 1;
                              while($row = mysqli_fetch_assoc($sql)) {

                                $buyerName  = $row['buyerName'];
                                $style  = $row['style'];
                                $department  = $row['department'];
                                $departmentCode  = $row['departmentCode'];
                        
                                echo ' <tr>';
                                echo ' <td>'.$i.' </td>';
                                echo ' <td>'.$buyerName.' </td>';
                                echo ' <td>'.$style.' </td>';
                                echo ' <td>'.$department.' </td>';
                                echo ' <td>'.$departmentCode.' </td>';
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

        $('#styleForm').on('submit', function (e) {

          e.preventDefault();

          var data = new FormData($("#styleForm")[0]);

          $.ajax({
            type: 'post',
            url: '../controller/s_creation.php',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            success: function (data) {

               if(data==0){

                swal({
                  title: "Can't Duplication !",
                  text: "Buyer and Style Can't Duplication",
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
                  setTimeout(function(){ cancelForm(); }, 2500);
                  
                }
              
               }
          });
        });
      });

    ////////////// Style get  ///////////////////////
    $("#select_style").on('change',function(){

      var style_name = $(this).val();
      if(style_name){     
        window.location.href = "s_creation.php?view_id=" + style_name;
      }
    });

    function cancelForm(){

        window.location.href = "s_creation.php";
    }

  </script>