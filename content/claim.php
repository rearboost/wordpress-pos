<!DOCTYPE html>
<html lang="en">
  <?php
    // Database Connection
    require '../include/config.php';
    
    // Get Update Form Data
    if(isset($_GET['view_id'])){

        $view_id = $_GET['view_id'];
        $sql=mysqli_query($conn,"SELECT  B.* , A.date
                            FROM invoice A 
                            INNER JOIN invoice_items B
                            ON A.id = B.invoice_id WHERE B.id='$view_id'");  
        $numRows = mysqli_num_rows($sql); 
        if($numRows > 0) {
          while($row = mysqli_fetch_assoc($sql)) {
            $invoice_id  = $row['invoice_id'];
            $product   = $row['product'];
            $warranty = $row['warranty'];
            $serial_no = $row['serial_no'];
            $qty = $row['qty'];
            $date = $row['date'];
            $warranty_claim_time =  $row['warranty_claim_time'];
            
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
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
              <div class="col-12">
                <div class="page-header">
                  <h4 class="page-title">Dashboard</h4>
                  <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                    <ul class="quick-links">
                      <li><a href="#"> | CLAIM</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- Page Title Header Ends-->
          <?php if (isset($_GET['view_id'])): ?>
           <div class="col-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Item Info</h4>
                        <form class="forms-sample" id="warrantyForm">

                           <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Invoice No </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name ="invoice_id" value="<?php if(isset($_GET['view_id'])){ echo sprintf('%05d', $invoice_id);} ?>" readonly/>
                                    <input type="hidden" name ="invoice_items_id" value="<?php if(isset($_GET['view_id'])){ echo $view_id;} ?>" />
                                </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Product Name </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  value="<?php if(isset($_GET['view_id'])){ echo $product;} ?>"  readonly/>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Serial No </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  value="<?php if(isset($_GET['view_id'])){ echo $serial_no;} ?>" readonly/>
                                </div>
                                </div>
                            </div>
                           </div>
                           <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Quantity </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?php if(isset($_GET['view_id'])){ echo $qty;} ?>" readonly/>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Warranty Period</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?php if(isset($_GET['view_id'])){ echo $date." - ".date('Y-m-d', strtotime($date. ' + '.$warranty.' days')).' ( '.$warranty.' ) Days'; ;} ?>" readonly/>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Warranty Claim Time</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?php if(isset($_GET['view_id'])){ echo $warranty_claim_time;} ?>" readonly/>
                                </div>
                                </div>
                            </div>
                           </div>
                           <hr>
                           <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Action</label>
                                <div class="col-sm-9">
                                     <div class="form-group">
                                        <div class="form-radio">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="One To One Replace" checked>One To One Replace </label>
                                        </div>
                                        <div class="form-radio">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="Fixed and Return">Fixed and Return </label>
                                        </div>
                                        <div class="form-radio">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="Return Money">Return Money</label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Warranty Reason Note</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="warranty_note" rows="4" placeholder="Warranty Reason Note .." required></textarea>
                                    </div>
                                </div>
                            </div>
                           </div>
                           <input type="hidden" class="form-control" name="add" value="add" />
                           <button type="submit" class="btn btn-success btn-fw">Save</button>
                           <button type="button" onclick="cancelForm()" class="btn btn-primary btn-fw">Cancel</button>

                      </form>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <?php else: ?>

            <?php endif ?>

            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Invoice Data</h4>
                     
                    <div class="table-responsive">         
                    <table class="table table-bordered" id="myTable">
                      <thead>
                        <tr>
                          <th>Invoice No</th>
                          <th>Product </th>
                          <th>Serial No</th>
                          <th>Warranty</th>
                          <th>QTY </th>
                          <th>Price </th>
                          <th>Discount </th>
                          <th>Amount</th>
                          <th>SELECT</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                          $sql=mysqli_query($conn,"SELECT  B.* , A.date
                            FROM invoice A 
                            INNER JOIN invoice_items B
                            ON A.id = B.invoice_id ");  
                          
                          $numRows = mysqli_num_rows($sql); 
                    
                          if($numRows > 0) {

                            while($row = mysqli_fetch_assoc($sql)) {

                              $id    = $row['id']; 
                              $invoice_id    = $row['invoice_id']; 
                              $product = $row['product'];
                              $warranty = $row['warranty'];
                              $serial_no   = $row['serial_no'];
                              $qty   = $row['qty'];
                              $price   = $row['price'];
                              $discount   = $row['discount'];
                              $amount   = $row['amount'];
                              $date = $row['date'];
                              $new_date = date('Y-m-d', strtotime($date. ' + '.$warranty.' days'));
                              $current_date = date("Y-m-d");

                              $diff = (strtotime($new_date) - strtotime($current_date))/86400;                          

                              if($current_date <= $new_date){

                                echo ' <tr>';
                                echo ' <td>'.sprintf('%05d', $invoice_id).' </td>';
                                echo ' <td>'.$product.' </td>';
                                echo ' <td>'.$serial_no.' </td>';
                                echo ' <td>'.$date." - ".date('Y-m-d', strtotime($date. ' + '.$warranty.' days')).' ( '.$warranty.' ) Days and Remaining '.$diff.' Days </td>';
                                echo ' <td>'.$qty.' </td>';
                                echo ' <td>'.$price.' </td>';
                                echo ' <td>'.$discount.' </td>';
                                echo ' <td>'.$amount.' </td>';
                                echo '<td class="td-center"><button type="button" onclick="viewForm('.$id.')" class="btn btn-info btn-fw">SELECT</button></td>';
                                echo ' </tr>';
                              }
                            
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
    $(document).ready( function () {
      $('#myTable').DataTable();
    });
  
    /////////////////////////////////////////////////// Form Submit Add  

    $(function () {

        $('#warrantyForm').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '../controller/controller_claim.php',
            data: $('#warrantyForm').serialize(),
            success: function (data) {

                    swal({
                    title: "Good job !",
                    text: "Successfully Submited",
                    icon: "success",
                    button: "Ok !",
                    });
                    setTimeout(function(){ cancelForm(); }, 2500);
               }
          });

        });

      });

    function viewForm(id){
        window.location.href = "claim.php?view_id=" + id;
    }

    function cancelForm(){
        window.location.href = "claim.php";
    }
 
  </script>


  