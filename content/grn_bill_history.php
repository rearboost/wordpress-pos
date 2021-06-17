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
                      <li><a href="#"> | GRN INVOICES</a></li>
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
                    <h4 class="card-title">Invoice Data</h4>
                     
                    <div class="table-responsive">         
                    <table class="table table-bordered" id="myTable">
                      <thead>
                        <tr>
                          <th style="display:none;"> # </th>
                          <th> # </th>
                          <th style="text-align: center;">Bill No </th>
                          <th style="text-align: center;">Date</th>
                          <th style="text-align: center;">Bill Total</th>
                          <th style="text-align: center;">Payment </th>
                          <th style="text-align: center;">Credit Period </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          date_default_timezone_set("Asia/Colombo");

                          $sql=mysqli_query($conn,"SELECT * FROM grn ORDER BY id DESC");
                          
                          $numRows = mysqli_num_rows($sql); 
                    
                          if($numRows > 0) {
                            $i = 1;
                            while($row = mysqli_fetch_assoc($sql)) {

                              $id        = $row['id'];
                              $inv_id    = $row['inv_id'];
                              $date      = $row['date'];    
                              $total     = $row['total'];
                              $payment   = $row['payment'];

                              $today           = time();
                              $creditEnddate   = strtotime($row['creditEnddate']);

                              echo ' <tr>';
                              echo ' <td style="display:none;">'.$i.' </td>';
                              echo ' <td>'.$id.' </td>';
                              echo ' <td>'.$inv_id.' </td>';
                              echo ' <td>'.$date.' </td>';
                              echo ' <td style="text-align:right;">'.number_format($total,2,'.',',').' </td>';
                              echo ' <td style="text-align:right;">'.number_format($payment,2,'.',',').' </td>';

                              if(empty($creditEnddate)){
                                  echo ' <td style="text-align:center;"><label class="badge badge-dark" style="font-size:12px;">'."No Credit".'</label> </td>';
                              }else{
                                if($today<$creditEnddate){
                                  $Days = round(($creditEnddate-$today) / (60 * 60 * 24));
                                  echo ' <td style="text-align:center;"><label class="badge badge-success" style="font-size:12px;">Remaining '.$Days.' days</label> </td>';

                                }else if($today>$creditEnddate){
                                  $Days = round(($today-$creditEnddate) / (60 * 60 * 24));
                                  echo ' <td style="text-align:center;"><label class="badge badge-danger" style="font-size:12px;">'.$Days.' days late</label> </td>';
                                }
                              }
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
