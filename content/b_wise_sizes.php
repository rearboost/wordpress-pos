<!DOCTYPE html>
<html lang="en">
  <?php
    // Database Connection
    require '../include/config.php';
    
    // Get Update Form Data
    if(isset($_GET['edit_id'])){

        $edit_id = $_GET['edit_id'];
        $sql=mysqli_query($conn,"SELECT * FROM wise_sizes WHERE id='$edit_id'");  
        $numRows = mysqli_num_rows($sql); 
        if($numRows > 0) {
          while($row = mysqli_fetch_assoc($sql)) {
            $buyerName  = $row['buyerName'];
            $sizeReference   = $row['sizeReference'];
            $size = $row['size'];
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
           <div class="col-6 stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Wise Sizes</h4>
                    <!-- <p class="card-description"> Horizontal form layout </p> -->
                        <form class="forms-sample" id="wiseSizes">
                          <div class="form-group">
                          <label for="exampleInputName1">Buyer</label>
                              <select class="form-control" name = "buyerName" id="buyerName" required>
                                <?php
                                    $custom = "SELECT * FROM buyer";
                                    $result = mysqli_query($conn,$custom);
                                    $numRows = mysqli_num_rows($result); 

                                    if(isset($_GET['edit_id'])){
                                      echo "<option value = ".$buyerName.">" . $buyerName . "</option>";
                                    }
                                    echo "<option value=''>--Select Buyer--</option>";
                                    if($numRows > 0) {
                                      while($row = mysqli_fetch_assoc($result)) {
                                         if(isset($_GET['edit_id'])){

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
                          <div class="form-group">
                          <label for="exampleInputEmail3">Size Reference</label>
                            <select name="sizeReference" id="sizeReference" class="form-control" >
                                    <?php
                                        if(isset($_GET['edit_id'])){
                                            echo "<option value = ".$sizeReference.">" . $sizeReference . "</option>";
                                        }else{
                                            echo '<option selected="" disabled="">--Select Reference--</option>';
                                        }
                                    ?>
                            </select>
                          </div>
                          <div class="form-group">
                          <label for="exampleTextarea1">Size</label>
                          <input type="text" class="form-control" value="<?php if(isset($_GET['edit_id'])){ echo $size;} ?>" name="size" placeholder="Name">
                          </div>
                           <?php if (isset($_GET['edit_id'])): ?>
                              <input type="hidden" class="form-control" name="edit_id" value="<?php if(isset($_GET['edit_id'])){ echo $edit_id;} ?>" />
                              <input type="hidden" class="form-control" name="update" value="update" />
                              <button type="submit" class="btn btn-info btn-fw">Update</button>
                              <button type="button" onclick="cancelForm()" class="btn btn-primary btn-fw">Cancel</button>
                          <?php else: ?>
                              <input type="hidden" class="form-control" name="add" value="add" />
                              <button type="submit" class="btn btn-success mr-2">Save</button>
                          <?php endif ?>
                          <!-- <button class="btn btn-light">Cancel</button> -->
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
                    <h4 class="card-title">Wise Sizes table</h4>
                    <p class="card-description fl">Dashboard >> <code>Wise Sizes</code> </p>         
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th>Buyer</th>
                          <th>Size Reference </th>
                          <th>Size</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sql=mysqli_query($conn,"SELECT * FROM wise_sizes");
                          
                          $numRows = mysqli_num_rows($sql); 
                    
                          if($numRows > 0) {
                            $i = 1;
                            while($row = mysqli_fetch_assoc($sql)) {

                              $buyerName  = $row['buyerName'];
                              $sizeReference   = $row['sizeReference'];
                              $size = $row['size'];
                              echo ' <tr>';
                              echo ' <td>'.$i.' </td>';
                              echo ' <td>'.$buyerName.' </td>';
                              echo ' <td>'.$sizeReference.' </td>';
                              echo ' <td>'.$size.' </td>';
                              echo '<td class="td-center"><button type="button" onclick="editForm('.$row["id"].')" class="btn btn-info btn-fw">Edit</button></td>';
                              echo '<td class="td-center"><button type="button" onclick="confirmation(event,'.$row["id"].')" class="btn btn-secondary btn-fw">Delete</button></td>';
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

        $('#wiseSizes').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '../controller/b_wise_sizes.php',
            data: $('#wiseSizes').serialize(),
            success: function (data) {

                  if(data==0){

                    swal({
                      title: "Can't Duplication !",
                      text: "Size , Size reference and  Buyer.",
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

   /////////////////////////////////////////////////// Form Submit Add  

    function confirmation(e,id) {
        var answer = confirm("Are you sure you want to permanently delete this record?")
      if (!answer){
        e.preventDefault();
        return false;
      }else{
        myFunDelete(id)
      }
    }

    function myFunDelete(id){

      $.ajax({
            url:"../controller/b_wise_sizes.php",
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
            }
      });
    }

    function editForm(id){

        window.location.href = "b_wise_sizes.php?edit_id=" + id;
    }

    function cancelForm(){

        window.location.href = "b_wise_sizes.php";
    }


    ////////////// Buyer - Select Reference ///////////////////////
      $("#buyerName").on('change',function(){

        var buyerName = $(this).val();
        if(buyerName){
          $.get(
            "../functions/get_pre_costing.php",
            {buyerName_SR:buyerName},
            function (data) { 
              $('#sizeReference').html(data);
          
            }
          );
            
        }else{
          $('#sizeReference').html('<option>Select Select Reference</option>');

        }
    });


  
  </script>