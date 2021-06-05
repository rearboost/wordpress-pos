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
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
              <div class="col-12">
                <div class="page-header">
                  <h4 class="page-title">Dashboard</h4>
                  <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                    <ul class="quick-links">
                      <li><a href="#"> | WARRANTY CLAIM LIST</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- Page Title Header Ends-->
    
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Warranty Claim Data</h4>
                     
                    <div class="table-responsive">         
                    <table class="table table-bordered" id="myTable">
                      <thead>
                        <tr>
                          <th>Invoice No</th>
                          <th>Product </th>
                          <th>Serial No</th>
                          <th>Action</th>
                          <th>Warranty Note </th>
                          <th>Date </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                          $sql=mysqli_query($conn,"SELECT  A.* , B.action , B.warranty_note , B.date
                            FROM invoice_items A 
                            INNER JOIN  warranty B
                            ON A.id = B.invoice_items_id ");  
                          
                          $numRows = mysqli_num_rows($sql); 
                    
                          if($numRows > 0) {

                            while($row = mysqli_fetch_assoc($sql)) {

                                $invoice_id    = $row['invoice_id']; 
                                $product = $row['product'];
                                
                                $serial_no   = $row['serial_no'];
                                $qty   = $row['qty'];
                                $action   = $row['action'];
                                $warranty_note   = $row['warranty_note'];
                                $date   = $row['date'];
                         
                                echo ' <tr>';
                                echo ' <td>'.sprintf('%05d', $invoice_id).' </td>';
                                echo ' <td>'.$product.' </td>';
                                echo ' <td>'.$serial_no.' </td>';
                                echo ' <td>'.$action.' </td>';
                                echo ' <td>'.$warranty_note.' </td>';
                                echo ' <td>'.$date.' </td>';
                                echo ' </tr>';

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
 
  </script>


  