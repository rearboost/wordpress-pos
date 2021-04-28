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
                    <h4 class="card-title">Division table</h4>
                    <p class="card-description fl">Dashboard >> <code>Division</code> </p>
                    <button type="submit" class="btn btn-primary btn-fw fr"data-toggle="modal" data-target="#myModal" >Create New Division</button>              
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th>Buyer</th>
                          <th>Buyer Division </th>
                          <th>Billing Account</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sql=mysqli_query($conn,"SELECT * FROM division");
                          
                          $numRows = mysqli_num_rows($sql); 
                    
                          if($numRows > 0) {
                            $i = 1;
                            while($row = mysqli_fetch_assoc($sql)) {

                              $buyerName  = $row['buyerName'];
                              $buyerDivision   = $row['buyerDivision'];
                              $account = $row['account'];
                              echo ' <tr>';
                              echo ' <td>'.$i.' </td>';
                              echo ' <td>'.$buyerName.' </td>';
                              echo ' <td>'.$buyerDivision.' </td>';
                              echo ' <td>'.$account.' </td>';
                              echo ' </tr>';
                              $i++;
                            }
                          }
                        ?>
                      </tbody>
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
          <h4 class="modal-title">Division</h4>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-body">
            <h4 class="card-title">Division Register</h4>
            <!-- <p class="card-description"> Basic form elements </p> -->
            <form class="forms-sample" id="divisionAdd">
                <div class="form-group">
                <label for="exampleInputName1">Buyer</label>
                    <select class="form-control" name = "buyerName" required>
                            <option value="">--Select Buyer--</option>
                            <?php
                                $custom = "SELECT * FROM buyer";
                                $result = mysqli_query($conn,$custom);
                                $numRows = mysqli_num_rows($result); 
                 
                                  if($numRows > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                      echo "<option value = ".$row['buyer'].">" . $row['buyer'] . "</option>";
                                      
                                    }
                                  }
                            ?>
                    </select>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail3">Buyer Division</label>
                <input type="text" class="form-control" name="buyerDivision" placeholder="Buyer Division" required>
                </div>
                <div class="form-group">
                <label for="exampleTextarea1">Billing Account</label>
                      <select class="form-control" name="account">
                          <option selected="" disabled="">--Select Billing Account--</option>
                          <option value="TRENDYWEAR PVT LTD">TRENDYWEAR PVT LTD</option>
                          <option value="TRENDYWEAR ADIKARIGAMA PVT LTD">TRENDYWEAR ADIKARIGAMA PVT LTD</option>
                          <option value="ADITI INFINITY PVT LTD">ADITI INFINITY PVT LTD.</option>
                      </select>
                </div>
                <div class="form-group">
                <label for="exampleInputName1">Consignee</label>
                <input type="text" class="form-control" name="consignee1"  placeholder="No , Billing or Lane" required>
                </div>
                <div class="form-group">
                <input type="text" class="form-control" name="consignee2" placeholder="No , Billing or Lane">
                </div>
                <div class="form-group">
                <input type="text" class="form-control" name="consignee3" placeholder="No , Billing or Lane">
                </div>
                <input type="hidden" class="form-control" name="add" value="add" />
                <button type="submit" class="btn btn-success mr-2">Save Buyer Division</button>
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

        $('#divisionAdd').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '../controller/b_division.php',
            data: $('#divisionAdd').serialize(),
            success: function (data) {

                if(data==0){
                    swal({
                      title: "Can't Duplication !",
                      text: "Same Division under same Buyer",
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