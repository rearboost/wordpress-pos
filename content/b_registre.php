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
                    <h4 class="card-title">Buyer table</h4>
                    <p class="card-description fl">Dashboard >> <code>Buyer</code> </p>
                    <button type="submit" class="btn btn-primary btn-fw fr"data-toggle="modal" data-target="#myModal" >Create New Buyer</button>              
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th>Buyer</th>
                          <th>Buyer Email </th>
                          <th>Telephone</th>
                          <th>Address</th>
                          <th>Buyer Excess </th>
                          <th>Buyer Budgeted </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sql=mysqli_query($conn,"SELECT * FROM buyer");
                          
                          $numRows = mysqli_num_rows($sql); 
                    
                          if($numRows > 0) {
                            $i = 1;
                            while($row = mysqli_fetch_assoc($sql)) {

                              $buyer  = $row['buyer'];
                              $buyerEmail   = $row['buyerEmail'];
                              $telephone = $row['telephone'];
                              $address = $row['address'];
                              $buyerExcess = $row['buyerExcess'];
                              $buyerBudgeted = $row['buyerBudgeted'];
                              echo ' <tr>';
                              echo ' <td>'.$i.' </td>';
                              echo ' <td>'.$buyer.' </td>';
                              echo ' <td>'.$buyerEmail.' </td>';
                              echo ' <td>'.$telephone.' </td>';
                              echo ' <td>'.$address.' </td>';
                              echo ' <td>'.$buyerExcess.' </td>';
                              echo ' <td>'.$buyerBudgeted.' </td>';
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
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          <h4 class="modal-title">Buyer</h4>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-body">
            <h4 class="card-title">Buyer Register</h4>
            <!-- <p class="card-description"> Basic form elements </p> -->
            <form class="forms-sample" id="buyerAdd">
                <div class="form-group">
                <label for="exampleInputName1">Buyer</label>
                <input type="text" class="form-control" name="buyer" placeholder="Buyer" required>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail3">Buyer Email</label>
                <input type="email" class="form-control" name="buyerEmail"  placeholder="Buyer Email" required>
                </div>
                <div class="form-group">
                <label for="exampleTextarea1">Address</label>
                <textarea class="form-control" name="address" rows="2"></textarea>
                </div>
                <div class="form-group">
                <label for="exampleInputName1">Telephone</label>
                <input type="text" class="form-control" name="telephone"  placeholder="Telephone" required>
                </div>
                <div class="form-group">
                <label for="exampleInputName1">Buyer Excess</label>
                <input type="text" class="form-control" name="buyerExcess" placeholder="Percentage" required>
                </div>
                <div class="form-group">
                <label for="exampleInputName1">Buyer Budgeted</label>
                <input type="text" class="form-control" name="buyerBudgeted"  placeholder="Percentage" required>
                </div>
                <input type="hidden" class="form-control" name="add" value="add" />
                <button type="submit" class="btn btn-success mr-2">Submit</button>
                <!-- <button class="btn btn-light">Cancel</button> -->
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

        $('#buyerAdd').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '../controller/b_registre.php',
            data: $('#buyerAdd').serialize(),
            success: function (data) {

                  if(data==0){

                    swal({
                      title: "Can't Duplication !",
                      text: "Buyer",
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