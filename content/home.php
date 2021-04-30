<?php
include('../include/config.php');
?>
<!DOCTYPE html>
<html>
    <?php include('../include/head.php'); ?>
<body>
<div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <!-- include nav code here -->
      <?php  include('../include/nav.php');   ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
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
                    <!-- <ul class="quick-links">
                      <li><a href="#">ICE Market data</a></li>
                      <li><a href="#">Own analysis</a></li>
                      <li><a href="#">Historic market data</a></li>
                    </ul>
                    <ul class="quick-links ml-auto">
                      <li><a href="#">Settings</a></li>
                      <li><a href="#">Analytics</a></li>
                      <li><a href="#">Watchlist</a></li>
                    </ul> -->
                  </div>
                </div>
              </div>
              <!-- <div class="col-md-12">
                <div class="page-header-toolbar">
                  <div class="btn-group toolbar-item" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-secondary"><i class="mdi mdi-chevron-left"></i></button>
                    <button type="button" class="btn btn-secondary">03/02/2019 - 20/08/2019</button>
                    <button type="button" class="btn btn-secondary"><i class="mdi mdi-chevron-right"></i></button>
                  </div>
                  <div class="filter-wrapper">
                    <div class="dropdown toolbar-item">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownsorting" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Day</button>
                      <div class="dropdown-menu" aria-labelledby="dropdownsorting">
                        <a class="dropdown-item" href="#">Last Day</a>
                        <a class="dropdown-item" href="#">Last Month</a>
                        <a class="dropdown-item" href="#">Last Year</a>
                      </div>
                    </div>
                    <a href="#" class="advanced-link toolbar-item">Advanced Options</a>
                  </div>
                  <div class="sort-wrapper">
                    <button type="button" class="btn btn-primary toolbar-item">New</button>
                    <div class="dropdown ml-lg-auto ml-3 toolbar-item">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownexport" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export</button>
                      <div class="dropdown-menu" aria-labelledby="dropdownexport">
                        <a class="dropdown-item" href="#">Export as PDF</a>
                        <a class="dropdown-item" href="#">Export as DOCX</a>
                        <a class="dropdown-item" href="#">Export as CDR</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
            </div>
            <!-- Page Title Header Ends-->
            <!-- <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-3 col-md-6">
                        <div class="d-flex">
                          <div class="wrapper"> -->
                            <?php 
                           

                                // $query_buyer= "SELECT * FROM  buyer";
                                // $result_buyer = mysqli_query($conn ,$query_buyer);
                                // $count_buyer =mysqli_num_rows($result_buyer);

                            ?>
                            <!-- <h3 class="mb-0 font-weight-semibold"> -->
                              <?php 
                            //if(isset($count_buyer)){ echo $count_buyer;} 
                            ?>
                          <!-- </h3>
                            <h5 class="mb-0 font-weight-medium text-primary"></h5>
                            
                            <p class="mb-0 text-muted">Buyer</p>
                          </div>
                          <div class="wrapper my-auto ml-auto ml-lg-4">
                            <canvas height="50" width="100" id="stats-line-graph-1"></canvas>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper"> -->
                           <?php 

                                // $query_item= "SELECT * FROM  item";
                                // $result_item = mysqli_query($conn ,$query_item);
                                // $count_item =mysqli_num_rows($result_item);

                            ?>
                            <!-- <h3 class="mb-0 font-weight-semibold"> -->
                            <?php 
                            //if(isset($count_item)){ echo $count_item;} 
                            ?>
                              
                            <!-- </h3>
                            <h5 class="mb-0 font-weight-medium text-primary">Items</h5> -->
                            <!-- <p class="mb-0 text-muted">+138.97(+0.54%)</p> -->
                          <!-- </div>
                          <div class="wrapper my-auto ml-auto ml-lg-4">
                            <canvas height="50" width="100" id="stats-line-graph-2"></canvas>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper"> -->
                           <?php 

                                // $query_costing_approvals= "SELECT * FROM  pre_order_costing WHERE costing_approvals=1";
                                // $result_costing_approvals = mysqli_query($conn ,$query_costing_approvals);
                                // $count_costing_approvals =mysqli_num_rows($result_costing_approvals);

                            ?>
                            <!-- <h3 class="mb-0 font-weight-semibold"> -->
                              <?php 
                            //if(isset($count_costing_approvals)){ echo $count_costing_approvals;} ?>
                          <!-- </h3>
                            <h5 class="mb-0 font-weight-medium text-primary">Costing Approve</h5> -->
                            <!-- <p class="mb-0 text-muted">+57.62(+0.76%)</p> -->
                          <!-- /div>
                          <div class="wrapper my-auto ml-auto ml-lg-4">
                            <canvas height="50" width="100" id="stats-line-graph-3"></canvas>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                        <div class="d-flex">
                          <div class="wrapper"> -->
                           <?php 

                                // $query_confirmation_allocation= "SELECT * FROM  pre_order_costing WHERE confirmation_allocation=1";
                                // $result_confirmation_allocation = mysqli_query($conn ,$query_confirmation_allocation);
                                // $count_confirmation_allocation =mysqli_num_rows($result_confirmation_allocation);

                            ?>
                           <!--  <h3 class="mb-0 font-weight-semibold"> -->
                              <?php 
                            // if(isset($count_confirmation_allocation)){ echo $count_confirmation_allocation;} 
                            ?>
                          <!-- </h3>
                            <h5 class="mb-0 font-weight-medium text-primary">Costing Confirmation And Allocation</h5> -->
                            <!-- <p class="mb-0 text-muted">+138.97(+0.54%)</p> -->
                          <!-- </div>
                          <div class="wrapper my-auto ml-auto ml-lg-4">
                            <canvas height="50" width="100" id="stats-line-graph-4"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Ongoing Jobs</h4>
                             
                    <table id="example" class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th>Customer</th>
                          <th>Accessory </th>
                          <th>Request Date</th>
                          <th>Delivery Date</th>
                          <th>Job Desc</th>
                          <!-- <th>User Desc</th> -->
                          <th>SMS</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sql=mysqli_query($conn,"SELECT * FROM customer C INNER JOIN jobs J ON C.id=J.customerId");
                          
                          $numRows = mysqli_num_rows($sql); 
                    
                          if($numRows > 0) {
                            $i = 1;
                            while($row = mysqli_fetch_assoc($sql)) {

                            $name    = $row['name'];   
                            $accessory   = $row['accessory'];
                            $request_date = $row['request_date'];
                            $delivery_date  = $row['delivery_date'];
                            $job_desc   = $row['job_desc'];
                            // $user_desc = $row['user_desc'];

                              echo ' <tr>';
                              echo ' <td>'.$i.' </td>';
                              echo ' <td>'.$name.' </td>';
                              echo ' <td>'.$job_desc.' </td>';
                              echo ' <td>'.$accessory.' </td>';
                              echo ' <td>'.$request_date.' </td>';
                              echo ' <td>'.$delivery_date.' </td>';
                              // echo ' <td>'.$user_desc.' </td>';
                              echo '<td class="td-center"><button type="button" onclick="SendMsg('.$row["jobId"].')" class="btn btn-primary btn-fw">Send SMS</button></td>';
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
          <!-- partial:partials/_footer.html -->

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