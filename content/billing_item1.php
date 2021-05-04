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
                      <li><a href="#"> POS</a></li>
                      <li><a href="#"> Billing Items</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            
            
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h1><strong>POS</strong></h1>
                      <form class="form-sample" id="requestAdd">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Product</label>
                                    <div class="col-sm-6">
                                      <select class="form-control" name="product" id="product" required>
                                        <option selected>--Select product--</option>
                                        <?php
                                            $product = "SELECT A.ID as id, A.post_title as post_title FROM wp_posts A INNER JOIN wp_wc_product_meta_lookup B ON A.ID=B.product_id";
                                            $result = mysqli_query($conn,$product);
                                            $numRows = mysqli_num_rows($result); 
                            
                                            if($numRows > 0) {
                                                while($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value = ".$row['id'].">" . $row['post_title'] . "</option>";
                                                
                                                }
                                            }
                                        ?>
                                    </select>
                                    </div>
                                    <div class="col-sm-3 size">
                                        <i class="fa fa-plus-circle pointer" onclick="customerForm()"></i>   
                                    </div>
                                </div>
                            </div>
                        </div>  <!--end first row-->  

                        <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Customer</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" id="customer" name="customer" required>
                                            <?php
                                                $custom = "SELECT * FROM customer";
                                                $result = mysqli_query($conn,$custom);
                                                $numRows = mysqli_num_rows($result); 

                                                if(isset($_GET['view_id'])){
                                                echo "<option value = ".$id.">" . $customerName . "</option>";
                                                }
                                                echo "<option value=''>--Select Customer--</option>";
                                                if($numRows > 0) {
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    if(isset($_GET['view_id'])){

                                                    if($buyerName != $row['name']){
                                                        echo "<option value = ".$row['id'].">" . $row['name'] . "</option>";
                                                    }

                                                    }else{
                                                    echo "<option value = ".$row['id'].">" . $row['name'] . "</option>";
                                                    }
                                                }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 size">
                                        <i class="fa fa-plus-circle pointer" onclick="customerForm()"></i>   
                                    </div>
                                </div>
                            </div>
                        </form>
                      </div>
                    
                    <div class="table-responsive">          
                    <table id="example" class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th>Product</th>
                          <th>QTY</th>
                          <th>Price</th>
                          <th>Amount</th>
                          <!-- <th>Stock qty</th>
                          <th>Stock Status</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sql=mysqli_query($conn,"SELECT * FROM wp_posts A INNER JOIN wp_wc_product_meta_lookup B ON A.ID=B.product_id");
                          
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
  
</script>