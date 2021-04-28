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
            $stylePicture = $row_get['stylePicture'];

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
                    <h4 class="card-title">Costing Confirmation and Allocation </h4>
                        <p class="card-description">Costing Approve  Info</p>
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

                                $sql=mysqli_query($conn,"SELECT * FROM pre_order_costing WHERE smv='on'  AND  status=1 AND costing_approvals=1  AND confirmation_allocation=0 ");
                                
                                $numRows = mysqli_num_rows($sql); 
                            
                                if($numRows > 0) {
                                    $i = 1;
                                    while($row = mysqli_fetch_assoc($sql)) {

                                    $costingNo  = $row['costingNo'];
                                    $buyerName   = $row['buyerName'];
                                    $style = $row['style'];
                                    echo ' <tr>';
                                    echo ' <td>'.$i.' </td>';
                                    echo ' <td>'.$costingNo.' </td>';
                                    echo ' <td>'.$buyerName.' </td>';
                                    echo ' <td>'.$style.' </td>';
                                    echo '<td class="td-center"><button type="button" id="view" onclick="viewForm('.$costingNo.')" class="btn btn-info btn-fw">View</button></td>';
                                    echo ' </tr>';
                                    $i++;
                                    }
                                }
                                ?>
                            </tbody>
                         
                       </table>
                      <p></p>
                      <center><b><span><?php if($numRows==0){ echo "No Pending Costing Confirmation and Allocation";} ?></span></b></center>
                      <p><hr></p>
                      <br>
                    </div>
                  </div>
                </div>
              </div>
            <?php if (isset($_GET['view_id'])): ?>
              <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                         
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
                                      <?php if(isset($_GET['view_id'])){   if($costing_approvals==1){ echo "Approved";} };?> 
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
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <img id="stylePicture" src= '<?php if(isset($_GET['view_id'])){ echo '../upload/'.$stylePicture; }else{  echo '../assets/images/default-image.jpg';}  ?>' width="200" height="200">
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

                                $totalPrice = 0;
                                $totalPrice2 = 0;
                            
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
                                    $unit_price_2 = $row['unit_price_2'];
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
                                    $totalPrice =$totalPrice+$unit_price;
                                    $totalPrice2 = $totalPrice2 + $unit_price_2;
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
                      <p><hr></p>
                      <br>
                            <!-- CM CALCULATION -->
                            <h4 class="card-title">CM CALCULATION</h4>

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


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">M/SMV</label>
                                        <div class="col-sm-7">
                                            <?php if(isset($_GET['view_id'])){ echo $cm_m_smv; };?> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">H/SMV</label>
                                    <div class="col-sm-7">
                                         <?php if(isset($_GET['view_id'])){ echo $cm_h_smv; };?>    
                                    </div>
                                </div>
                               </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-5 col-form-label">Qty Fact</label>
                                        <div class="col-sm-7">
                                             <?php if(isset($_GET['view_id'])){ echo $cm_qty_fact; };?>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                             
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-5 col-form-label">CM</label>
                                        <div class="col-sm-7">
                                            <?php if(isset($_GET['view_id'])){ echo $cm; };?>    
                                        </div>
                                    </div>
                                </div>
                               
                             
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-5 col-form-label">Final CM</label>
                                        <div class="col-sm-7">
                                            <?php if(isset($_GET['view_id'])){ echo $cm_final_cm; };?>    
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-5 col-form-label">Production Cost</label>
                                        <div class="col-sm-7">
                                            <?php if(isset($_GET['view_id'])){ echo $cm_production_cost; };?>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                
                            </div>     -->

                             <p><hr></p>
                            <!-- Price -->
                             <h4 class="card-title">Price</h4>
                             <form class="form-sample" id="c_confirmatio_allocation_form">

                                <input type="hidden" name="costingNo" value ='<?php echo  $view_id;  ?>'/>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-5 col-form-label">Shipment Term</label>
                                            <div class="col-sm-7">
                                                <?php if(isset($_GET['view_id'])){ echo $shipment_term; };?>  
                                                <input type="hidden" name ="shipment_term" id="shipment_term" value='<?php  echo $shipment_term; ?>' />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-5 col-form-label">Fabric Cost</label>
                                            <div class="col-sm-7">
                                                <?php 
                                                    $sql_fc=mysqli_query($conn,"SELECT SUM(unit_price) AS fabric_cost FROM costing_bom WHERE costingNo='$view_id' AND masterName='Fabric' GROUP BY masterName");
                                                    $numRows = mysqli_num_rows($sql_fc); 
                                                    if($numRows>0){
                                                        $fabric_cost = mysqli_fetch_assoc($sql_fc);   
                                                        $fabric_cost = $fabric_cost['fabric_cost']; 
                                                    }else{
                                                        $fabric_cost ='0'; 
                                                    }
                                                    echo $fabric_cost; 
                                                ?>
                                                <input type="hidden" id="fabric_cost" name="fabric_cost" value='<?php  echo $fabric_cost; ?>'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-5 col-form-label">Finance 4%</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name ="finance" id="finance" value="0"  />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-5 col-form-label">Total Fabric Cost</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name ="t_fabric_cost" id="t_fabric_cost" value="0"  readonly/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-5 col-form-label">Sealing Trims Cost</label>
                                            <div class="col-sm-7">
                                                <?php 
                                                    $sql_stc=mysqli_query($conn,"SELECT SUM(unit_price) AS stc FROM costing_bom WHERE costingNo='$view_id' AND masterName='Sewing Trims' GROUP BY masterName");
                                                    $numRows = mysqli_num_rows($sql_stc); 
                                                    if($numRows>0){
                                                        $row_stc = mysqli_fetch_assoc($sql_stc);   
                                                        $stc = $row_stc['stc'];   
                                                    }else{
                                                        $stc ='0'; 
                                                    }
                                                    echo $stc; 
                                                ?>
                                                <input type="hidden" id="stc" name="stc" value='<?php  echo $stc; ?>'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-5 col-form-label">Packing Trims Cost</label>
                                            <div class="col-sm-7">
                                                <?php 
                                                    $sql_ptc=mysqli_query($conn,"SELECT SUM(unit_price) AS ptc FROM costing_bom WHERE costingNo='$view_id' AND masterName='Packing Trims' GROUP BY masterName");
                                                    $numRows = mysqli_num_rows($sql_ptc); 
                                                    if($numRows>0){
                                                        $row_ptc = mysqli_fetch_assoc($sql_ptc);   
                                                        $ptc = $row_ptc['ptc'];  
                                                    }else{
                                                        $ptc ='0'; 
                                                    }
                                                    echo  $ptc;
                                                ?>
                                                <input type="hidden" id="ptc" name="ptc" value='<?php  echo $ptc; ?>'>
                                                
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-5 col-form-label">Total Trims Cost</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name ="t_trims_cost" id="t_trims_cost" value="0"  readonly/>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-5 col-form-label">Import Trims Cost 15%</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name ="im_trims_c" id="im_trims_c" placeholder="Enter Import Trims Cost 15%"/>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-5 col-form-label">Other Cost</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name ="other_c" id="other_c" placeholder="Enter Other Cost"/>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-5 col-form-label">FOB</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name ="fob" id="fob"  placeholder="Enter FOB"/>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-5 col-form-label">Commission Percentage</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name ="commission_percentage" id="commission_percentage" placeholder="Enter Commission Percentage"/>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-5 col-form-label">Commission</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name ="commission" id="commission" placeholder="Enter Commission Commission"/>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <p><hr></p>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-5 col-form-label"><b><span style="color: red;">Price</span></b></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name ="price" id="price" value='<?php  echo number_format($totalPrice, 2, '.', ''); ?>' readonly/>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-5 col-form-label"><b><span style="color: red;">Last Price</span></b></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name ="last_price" id="last_price" placeholder="Enter Last Price"/>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label class="col-sm-5 col-form-label"><b><span style="color: red;">Profit</span></b></label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" name ="profit" id="profit" value='<?php  echo number_format(($totalPrice-$totalPrice2), 2, '.', ''); ?>' readonly />
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <p><hr></p>

                                <h4 class="card-title">Delivery Schedule</h4>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Merchandiser</label>
                                        <div class="col-sm-9">
                                            <?php if(isset($_GET['view_id'])){ echo $buyer_po_ref; };?> 
                                            
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Delivery start date</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control" name ="delivery_date" id="delivery_date"/>
                                        </div>
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control" id="add" name="add" />
                                    <button type="submit" class="btn btn-info btn-fw" name="btn_add" >CONFIRM PO</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
             </div>

            
            <?php else: ?>

            <?php endif ?>
            
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

        window.location.href = "c_confirmatio_allocation.php";
    }

    function viewForm(id){

        window.location.href = "c_confirmatio_allocation.php?view_id=" + id;
    }

    /////////////////////////////////////////////////// Form Submit Add  

    $(function () {

        $('#c_confirmatio_allocation_form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '../controller/c_confirmatio_allocation.php',
            data: $('#c_confirmatio_allocation_form').serialize(),
            success: function (data) {
                   
                    swal({
                    title: "Good job !",
                    text: "Successfully Updated",
                    icon: "success",
                    button: "Ok !",
                    });
                    setTimeout(function(){ window.location.href = "c_confirmatio_allocation.php"; }, 2500);
               }
          });
        });
      });

     /////////////////////////////////////////////////////////////////


    $("#finance").on('keyup change', function (){

         var finance  =  $('#finance').val();
         var fabric_cost  =  $('#fabric_cost').val();
        
         if(finance!=''){
             $('#t_fabric_cost').val((Number(finance)+Number(fabric_cost)).toFixed(2)); 
        }     
    });

    ////////////////////////////////////////////////////////////
    
    $(document).ready(function(){
        var stc  =  $('#stc').val();
        var ptc  =  $('#ptc').val();

        $('#t_trims_cost').val((Number(stc)+Number(ptc)).toFixed(2)); 
    })

  </script>



  