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
                      <li><a href="#"> | REPORT</a></li>
                      <li><a href="#"> | JOB STATUS REPORT</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- Page Title Header Ends-->
            <div class="col-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Job Status report</h4>
                    <!-- <p class="card-description"> Horizontal form layout </p> -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <!-- <label class="col-sm-4 col-form-label">PO Number</label> -->
                                    <!-- <div class="col-sm-8">
                                        <select class="form-control" name="po_number" id="po_number" required>
                                            <option value="">--Select PO Number--</option> -->
                                            <?php
                                                // $custom = "SELECT * FROM po_entering";
                                                // $result = mysqli_query($conn,$custom);
                                                // $numRows = mysqli_num_rows($result); 
                                
                                                // if($numRows > 0) {
                                                //     while($row = mysqli_fetch_assoc($result)) {
                                                //     echo "<option value = ".$row['po_number'].">" . $row['po_number'] . "</option>";
                                                    
                                                //     }
                                                // }
                                            ?>
                                        <!-- </select>
                                    </div> -->
                                    <label class="col-sm-4 col-form-label">Select Date</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="pdate" id="date">
                                    </div>    
                                </div>
                                <button type="button" onclick="cancelForm()" class="btn btn-warning btn-fw">Cancel</button>                        
                            </div>
                        </div>
                  </div>
                </div>
            </div>
            <br>

            <?php if (isset($_GET['view_id'])): ?>
            
            <form class="forms-sample" id="profit_form">

                <input type="hidden" value ='<?php echo $_GET['view_id']; ?>' name="po_number">

                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                        <center><b><h5>PO Number - <?php echo $_GET['view_id']; ?></h5></b></center>
                        <br>
                    
                    
                        <div class="row">
                    
                        <?php 

                          $poNo = $_GET['view_id'];
                        //   $sql_buyerName=mysqli_query($conn,"SELECT * FROM po_entering WHERE po_number='$poNo'");
                        //   $row_buyerName= mysqli_fetch_assoc($sql_buyerName);
                        //   $bpo_no = $row_buyerName['bpo_no'];

                          $sql=mysqli_query($conn,"SELECT * FROM bom WHERE po_number='$poNo'"); 
                    
                        ?>

                       <!-- <h4 class="card-title">Materials</h4> -->
                        <div class="table-responsive">
                            <div id="printablediv">
                            <table class="table table-bordered" id="costing_bom_table">
                                <thead>
                                    <tr>
                                    <th> # </th>
                                    <th>Master Cat</th>
                                    <th>Main Cat </th>
                                    <th>Sub Cat</th>
                                    <th>Item </th>
                                    <th>Color </th>
                                    <th>Size </th>
                                    <th>Reference </th>
                                    <th>Dimension </th>
                                    <th>Unit</th>
                                    <th>Fab Type </th>
                                    <th>Booking Consumption </th>
                                    <th>Wastage%</th>
                                    <th>Excess%</th>
                                    <th>Required Qty</th>
                                    <th>Unit Price</th>
                                    <th>Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                    $numRows = mysqli_num_rows($sql); 
                                
                                    if($numRows > 0) {
                                        $i = 1;

                                        while($row = mysqli_fetch_assoc($sql)) {

                                        $value = 0;
                                        $masterName  = $row['masterName'];
                                        $main   = $row['main'];
                                        $subCategory = $row['subCategory'];
                                        $itemName = $row['itemName'];
                                        $color = $row['color'];
                                        $size = $row['size'];
                                        $reference = $row['reference'];
                                        $dimension = $row['dimension'];
                                        $unit = $row['unit'];
                                        $fabType = $row['fabType'];
                                        $consumption = $row['consumption'];
                                        $wastage = $row['wastage'];
                                        $excess = $row['excess'];
                                        $req_qty = $row['req_qty'];
                                        $unit_price = $row['unit_price'];
                                        $value =number_format(($unit_price* $req_qty), 2, '.', '');
                                        echo ' <tr>';
                                        echo ' <td>'.$i.' </td>';
                                        echo ' <td>'.$masterName.' </td>';
                                        echo ' <td>'.$main.' </td>';
                                        echo ' <td>'.$subCategory.' </td>';
                                        echo ' <td>'.$itemName.' </td>';
                                        echo ' <td>'.$color.' </td>';
                                        echo ' <td>'.$size.' </td>';
                                        echo ' <td>'.$reference.' </td>';
                                        echo ' <td>'.$dimension.' </td>';
                                        echo ' <td>'.$unit.' </td>';
                                        echo ' <td>'.$fabType.' </td>';
                                        echo ' <td>'.$consumption.' </td>';
                                        echo ' <td>'.$wastage.' </td>';
                                        echo ' <td>'.$excess.' </td>';
                                        echo ' <td>'.$req_qty.' </td>';
                                        echo ' <td>'.$unit_price.' </td>';
                                        echo ' <td>'.$value.' </td>';
                                        echo ' </tr>';
                                        $i++;
                                        }
                                    }
                                    ?>
                                </tbody>
                                </tbody>
                            </table>
                            </div>
                            <br>
                             
                            <button type="button"  onclick="javascript:printDiv('printablediv');" class="btn btn-info btn-fw" >PRINT</button>                          
                        </div> 
                   </div>
                 </div>
               </div>
            </form>
           <?php else: ?>

           <?php endif ?>
            
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
   
    ////////////// bpo_no get  ///////////////////////
    $("#po_number").on('change',function(){

      var bpo_no = $(this).val();
      if(bpo_no){     
        window.location.href = "report_jobs.php?view_id=" + bpo_no;
      }
    });

    function cancelForm(){

        window.location.href = "report_jobs.php";
    }

    function printDiv(divID)
    {
     
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;

        //Reset the page's HTML with div's HTML only
        document.body.innerHTML =
            "<html><head><title></title></head><body>" +
            divElements + "</body>";

        //Print Page
        window.print();

        //Restore orignal HTML
        document.body.innerHTML = oldPage;

    }


  </script>