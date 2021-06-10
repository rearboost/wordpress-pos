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
                    <ul class="quick-links">
                      <li><a href="#"> | MANAGE STOCK</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">All Stock Details</h4>
                    
                    <div class="table-responsive">          
                    <table id="myTable" class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th>Product ID</th>
                          <th>Product</th>
                          <th>Min Price </th>
                          <th>Max Price</th>
                          <th>Stock qty</th>
                          <th>Stock Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sql=mysqli_query($conn,"SELECT * FROM wpss_posts A INNER JOIN wpss_wc_product_meta_lookup B ON A.ID=B.product_id");
                          
                          $numRows = mysqli_num_rows($sql); 
                    
                          if($numRows > 0) {
                            $i = 1;
                            while($row = mysqli_fetch_assoc($sql)) {
   
                            $product_id    = $row['product_id'];   
                            $post_title   = $row['post_title'];
                            $min_price = $row['min_price'];
                            $max_price  = $row['max_price'];
                            $stock_quantity   = $row['stock_quantity'];
                            $stock_status = $row['stock_status'];

                              echo ' <tr>';
                              echo ' <td>'.$i.' </td>';
                              echo ' <td>'.$product_id.' </td>';
                              echo ' <td>'.$post_title.' </td>';
                              echo ' <td>'.$min_price.' </td>';
                              echo ' <td>'.$max_price.' </td>';
                              echo ' <td>'.$stock_quantity.' </td>';
                              if($stock_status=="instock"){
                                echo ' <td><label class="badge badge-success">'."In stock".'</label> </td>';
                              }else if($stock_status=="onbackorder"){
                                echo ' <td><label class="badge badge-warning">'."On back order".'</label> </td>';
                              }else if($stock_status=="outofstock"){
                                echo ' <td><label class="badge badge-danger">'."Out of stock".'</label> </td>';
                              }else{
                                echo ' <td><label class="badge badge-primary">'.$stock_quantity.'</label> </td>';
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

<script>
    $(document).ready( function () {
      $('#myTable').DataTable();
    });
  
</script>