<!DOCTYPE html>
<html lang="en">
  <?php
    // Database Connection
    require '../include/config.php';

     // Get Update Form Data
    if(isset($_GET['view_id'])){

        $view_id = $_GET['view_id'];

        $material_cost = 0;

        $sql=mysqli_query($conn,"SELECT * FROM pre_order_costing WHERE costingNo='$view_id'");  
        $numRows = mysqli_num_rows($sql); 
        if($numRows > 0) {
          while($row = mysqli_fetch_assoc($sql)) {

            $buyerName  = $row['buyerName'];
            $division   = $row['division'];
            $style = $row['style'];
            $remarks_smv  = $row['remarks_smv'];
            $season   = $row['season'];
            $baseQty = $row['baseQty'];
            $currency  = $row['currency'];
            $size_ref   = $row['size_ref'];
            $buyer_po_ref = $row['buyer_po_ref'];
            $shipment_term  = $row['shipment_term'];
            $create_date  = $row['create_date'];
            $costing_approvals  = $row['costing_approvals'];
            $costing_approval_reject_reson  = $row['costing_approval_reject_reson'];
            $smv_comments  = $row['smv_comments'];
            

            //B PO No
            $get_bpo = mysqli_query($conn, "SELECT * FROM pre_order_costing WHERE buyerName='$buyerName' AND style='$style'");
            $row_get_bpo = mysqli_fetch_assoc($get_bpo);
            $bpo = $row_get_bpo['costingNo'];

            // SMV Calculation
            $get_sm = mysqli_query($conn, "SELECT * FROM smv_calculation WHERE costingNo='$view_id'");
            $row_sm = mysqli_fetch_assoc($get_sm);
            $sm_m_smv = $row_sm['sm_m_smv'];
            $sm_h_smv = $row_sm['sm_h_smv'];

            $sql_get=mysqli_query($conn,"SELECT * FROM style WHERE style='$style'");  
            $row_get = mysqli_fetch_assoc($sql_get);
            $styleSpec = $row_get['styleSpec'];
            // $stylePicture = $row_get['stylePicture'];

            ///material_cost
            $sql_m=mysqli_query($conn,"SELECT * FROM costing_bom WHERE costingNo='$view_id'");
                            
            while($row = mysqli_fetch_assoc($sql_m)) {

                $one_pc = $row['one_pc'];
                $material_cost = $material_cost + $one_pc;
            }
          }
        }
    }

  ?>
  <!-- include head code here -->
  <?php  include('../include/head.php');   ?>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <h4 class="card-title">Costing Approve</h4>
                        <p class="card-description">SMV Confirmation  Info</p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th> # </th>
                                <th>Costing No</th>
                                <th>Buyer Name </th>
                                <th>Style</th>
                                <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $sql=mysqli_query($conn,"SELECT * FROM pre_order_costing WHERE smv='on'  AND  status=1 ");
                                
                                $numRows = mysqli_num_rows($sql); 
                            
                                if($numRows > 0) {
                                    $i = 1;
                                    while($row = mysqli_fetch_assoc($sql)) {

                                    $costingNo  = $row['costingNo'];
                                    $buyerName   = $row['buyerName'];
                                    $style = $row['style'];
                                    $costing_approvals = $row['costing_approvals'];
                                    echo ' <tr>';
                                    echo ' <td>'.$i.' </td>';
                                    echo ' <td>'.$costingNo.' </td>';
                                    echo ' <td>'.$buyerName.' </td>';
                                    echo ' <td>'.$style.' </td>';
                                    if($costing_approvals==0){
                                        echo '<td class="td-center"><button type="button" onclick="viewForm('.$costingNo.')" class="btn btn-info btn-fw">Select</button></td>';
                                    }else{
                                        echo '<td class="td-center"><button type="button" onclick="viewForm('.$costingNo.')" class="btn btn-warning btn-fw">View</button></td>';
                                    }
                                    
                                    echo ' </tr>';
                                    $i++;
                                    }
                                }
                                ?>
                            </tbody>
                         
                      </table>
                      <p></p>
                      <center><b><span><?php if($numRows==0){ echo "No Pending Costing Approve";} ?></span></b></center>
                      <p><hr></p>

                      <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Style</label>
                                    <div class="col-sm-9">
                                        <?php if(isset($_GET['view_id'])){ echo $style; };?>  
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Buyer </label>
                                    <div class="col-sm-9">
                                        <?php if(isset($_GET['view_id'])){ echo $buyerName; };?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Buyer PO No</label>
                                <div class="col-sm-9">
                                     <?php if(isset($_GET['view_id'])){ echo  'Order - '.$buyerNbpoame; };?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Buyer Divisions</label>
                              <div class="col-sm-9">
                                  <?php if(isset($_GET['view_id'])){ echo $division; };?>
                              </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Season</label>
                                <div class="col-sm-9">
                                    <?php if(isset($_GET['view_id'])){ echo $season; };?>       
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Buyer PO Ref</label>
                                <div class="col-sm-9">
                                    <?php if(isset($_GET['view_id'])){ echo $buyer_po_ref; };?> 
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- <p class="card-description"> Address </p> -->
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Costing No</label>
                            <div class="col-sm-9">
                                  <?php if(isset($_GET['view_id'])){ echo $view_id; };?> 
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Base Qty</label>
                            <div class="col-sm-9">
                                 <?php if(isset($_GET['view_id'])){ echo $baseQty; };?> 
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Remarks</label>
                            <div class="col-sm-9">
                                <?php if(isset($_GET['view_id'])){ echo $remarks_smv; };?> 
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Order Date</label>
                            <div class="col-sm-6">
                                 <?php if(isset($_GET['view_id'])){ echo $create_date; };?> 
                            </div>
                            </div>
                        </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Processed by</label>
                                <div class="col-sm-9">
                                     <?php if(isset($_GET['view_id'])){ echo $buyer_po_ref; };?> 
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Costing Status</label>
                                <div class="col-sm-9">
                                      <?php if(isset($_GET['view_id'])){   if($costing_approvals==0){ echo "Pending";} };?> 
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Materials Cost</label>
                                <div class="col-sm-9">
                                     <?php if(isset($_GET['view_id'])){ echo number_format($material_cost, 2, '.', '');};?> 
                                </div>
                                </div>
                            </div>
                           
                        </div>



                        <button type="button" onclick="cancelForm()" class="btn btn-primary mr-2 fr">Cancel</button>
                        <br>
                        <h4 class="card-title">Materials</h4>
                        <div class="table-responsive">
                          <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th> # </th>
                                <th>Master Cat</th>
                                <th>Main Cat </th>
                                <th>Sub Cat</th>
                                <th>Fab Type </th>
                                <th>FM/ Size </th>
                                <th>Consumption</th>
                                <th>Required Qty</th>
                                <th>Wastage%</th>
                                <th>Unit</th>
                                <th>Unit Price</th> 
                                <th>Cost pre PC</th>  
                                <th>Main Fab</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $sql=mysqli_query($conn,"SELECT * FROM costing_bom WHERE costingNo='$view_id'");
                                
                                $numRows = mysqli_num_rows($sql); 
                            
                                if($numRows > 0) {
                                    $i = 1;
                                    while($row = mysqli_fetch_assoc($sql)) {

                                    $masterName  = $row['masterName'];
                                    $main   = $row['main'];
                                    $subCategory = $row['subCategory'];
                                    $fabType = $row['fabType'];
                                    $fm_size = $row['fm_size'];
                                    $coes = $row['coes'];
                                    $req_qty = $row['req_qty'];
                                    $waste = $row['waste'];
                                    $unit = $row['unit'];
                                    $unit_price = $row['unit_price'];
                                    $one_pc = $row['one_pc'];
                                    $mf = $row['mf'];
                                    echo ' <tr>';
                                    echo ' <td>'.$i.' </td>';
                                    echo ' <td>'.$masterName.' </td>';
                                    echo ' <td>'.$main.' </td>';
                                    echo ' <td>'.$subCategory.' </td>';
                                    echo ' <td>'.$fabType.' </td>';
                                    echo ' <td>'.$fm_size.' </td>';
                                    echo ' <td>'.$coes.' </td>';
                                    echo ' <td>'.$req_qty.' </td>';
                                    echo ' <td>'.$waste.' </td>';
                                    echo ' <td>'.$unit.' </td>';
                                    echo ' <td>'.$unit_price.' </td>';
                                    echo ' <td>'.$one_pc.' </td>';
                                    echo ' <td>'.$mf.' </td>';
                                    echo ' </tr>';
                                    $i++;
                                    }
                                }
                                ?>
                            </tbody>
                            </tbody>
                         </table>
                        </div>
                      <p><hr></p>
                      <h4 class="card-title">Garment Size</h4>
                      <div class="table-responsive">
                          <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th> # </th>
                                <th>Size</th>
                                <th>Ratio </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $sql=mysqli_query($conn,"SELECT * FROM style_size WHERE costingNo='$view_id'");
                                
                                $numRows = mysqli_num_rows($sql); 
                            
                                if($numRows > 0) {
                                    $i = 1;
                                    while($row = mysqli_fetch_assoc($sql)) {

                                    $style_size_ref  = $row['style_size_ref'];
                                    $ratio   = $row['ratio'];
                                    echo ' <tr>';
                                    echo ' <td>'.$i.' </td>';
                                    echo ' <td>'.$style_size_ref.' </td>';
                                    echo ' <td>'.$ratio.' </td>';
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-6 col-form-label">SAMPLE SKETCH</label>
                                <div class="col-sm-6">
                                    <img id="stylePicture" src= '<?php if(isset($_GET['view_id'])){ echo '../upload/'.$styleSpec; }else{  echo '../assets/images/default-image.jpg';}  ?>' width="200" height="200">
                                </div>
                                </div>
                            </div>
                        </div>   
                      <br>
                      <form class="form-sample" id="costing_approvals_form">

                      <?php if (isset($_GET['view_id'])): ?>
                        
                            <input type="hidden" name="costingNo" value ='<?php echo  $view_id;  ?>'/>
                                <h4 class="card-title">CM Calculation for Qty Options</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                <th>QTY</th>
                                                <th>M/SMV</th>
                                                <th>H/SMV</th>
                                                <th>Qty Fact </th>
                                                <th>Production Cost </th>
                                                <th>CM </th>
                                                <th>Final CM </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <?php 

                                            /////////////////////////////////

                                                $sql=mysqli_query($conn,"SELECT * FROM cm_calculation WHERE costingNo='$view_id'");
                                    
                                                $numRows = mysqli_num_rows($sql); 

                                                $row = mysqli_fetch_assoc($sql);

                                                $cm_m_smv  = $row['cm_m_smv'];
                                                $cm_h_smv   = $row['cm_h_smv'];
                                                $cm_qty_fact = $row['cm_qty_fact'];
                                                $cm = $row['cm'];
                                                $cm_final_cm = $row['cm_final_cm'];
                                                $cm_production_cost = $row['cm_production_cost'];

                                                /////////////////////////////////
                                            
                                            ?>


                                            <?php if ($costing_approvals!=0): ?>

                                                   
                                            <tr>
                                                <td>
                                                    <?php  echo $baseQty;?>
                                                </td>
                                                <td>
                                                   <?php  echo $cm_m_smv ?>
                                                </td>
                                                <td>
                                                  <?php  echo $cm_h_smv;?>
                                                </td>
                                                <td>
                                                  <?php  echo $cm_qty_fact;?>
                                                </td>
                                                <td>
                                                 <?php  echo $cm_production_cost;?>
                                                </td>
                                                <td>
                                                 <?php  echo $cm;?>
                                                </td>
                                                <td>
                                                  <?php  echo $cm_final_cm;?>
                                                </td>
                                            </tr>

                                            <?php else: ?>
                                                   
                                            <tr>
                                                <td>
                                                <input type="text" class="form-control" name ="qty"  id="qty" value='<?php  echo $baseQty;?> ' placeholder="Enter QTY"/>
                                                </td>
                                                <td>
                                                <input type="text" class="form-control" name ="cm_m_smv"  id="cm_m_smv" value=<?php  echo $cm_m_smv ?> placeholder="Enter M/SMV"/>
                                                </td>
                                                <td>
                                                <input type="text" class="form-control" name ="cm_h_smv"  id="cm_h_smv" value=<?php  echo $cm_h_smv;?> placeholder="Enter H/SMV"/>
                                                </td>
                                                <td>
                                                <input type="text" class="form-control" name ="cm_qty_fact"  id="cm_qty_fact" value='<?php  echo $cm_qty_fact;?> ' placeholder="Enter Qty Fact"/>
                                                </td>
                                                <td>
                                                <input type="text" class="form-control" name ="cm_production_cost"  id="cm_production_cost" value='<?php  echo $cm_production_cost;?> ' placeholder="Enter Production Cost"/>
                                                </td>
                                                <td>
                                                <input type="text" class="form-control" name ="cm"  id="cm" value='<?php  echo $cm;?> ' placeholder="Enter CM"/>
                                                </td>
                                                <td>
                                                <input type="text" class="form-control" name ="cm_final_cm"  id="cm_final_cm" value='<?php  echo $cm_final_cm;?> ' placeholder="Enter Final CM"/>
                                                </td>
                                            </tr>

                                            <?php endif ?>

                                            </tbody>
                                            </tbody>
                                        </table>
                                </div>
                         <br>

                        <div class="row">
                                <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-6 col-form-label">Reject Reson</label>
                                <div class="col-sm-6">
                                       <?php if ($costing_approvals!=0): ?>
                                            <?php  echo $costing_approval_reject_reson;?>
                                       <?php else: ?>
                                            <textarea id="w3review" name="costing_approval_reject_reson" rows="4" cols="34"></textarea>
                                       <?php endif ?>
                                      
                                </div>
                                </div>
                            </div>
                        </div>  

                        <?php if ($costing_approvals ==0): ?>

                            <input type="hidden" class="form-control" id="add" name="add" />
                        
                            <button type="submit" onclick="approveForm()"  class="btn btn-info btn-fw" name="btn_confirm" value="btn_approve" >APPROVE COSTING</button>
                            <button type="submit" onclick="rejectForm()"  class="btn btn-warning btn-fw" name="btn_reject" value="btn_reject" >REJECT COSTING</button>

                        <?php else: ?>

                        <?php endif ?>
                    </div>
                    <?php else: ?>

                    <?php endif ?>

                    </form> 
            
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
  
    /////////////////////////////////////////////////// 

    function cancelForm(){

        window.location.href = "c_costing_approvals.php";
    }

    function viewForm(id){

        window.location.href = "c_costing_approvals.php?view_id=" + id;
    }

    function approveForm(){
        $('#add').val("approve");
    }

    function rejectForm(){
        $('#add').val("reject");
    }

    /////////////////////////////////////////////////// Form Submit Add  

    $(function () {

        $('#costing_approvals_form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '../controller/c_costing_approvals.php',
            data: $('#costing_approvals_form').serialize(),
            success: function (data) {
                   
                    swal({
                    title: "Good job !",
                    text: "Successfully Updated",
                    icon: "success",
                    button: "Ok !",
                    });
                    $('#add').val("add");
                    setTimeout(function(){ window.location.href = "c_costing_approvals.php"; }, 2500);
               }
          });
        });
      });

     /////////////////////////////////////////////////////////////////



  </script>



  