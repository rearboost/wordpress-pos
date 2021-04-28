<!DOCTYPE html>
<html lang="en">
  <?php
    // Database Connection
    require '../include/config.php';

     // Get Update Form Data
    if(isset($_GET['view_id'])){

        $view_id = $_GET['view_id'];

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
            //Style Images
            $sql_get=mysqli_query($conn,"SELECT * FROM style WHERE style='$style'");  
            $row_get = mysqli_fetch_assoc($sql_get);

            $styleSpec = $row_get['styleSpec'];
            $stylePicture = $row_get['stylePicture'];
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
            <form class="form-sample" id="pre_order_costingAdd">
              <div class="content-wrapper">
              <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Pre Order Costing</h4>
                        <input type="hidden" id="myitemjson" name="myitemjson"/>
                        <input type="hidden" id="myitemjson1" name="myitemjson1"/>
                        <p class="card-description">Info</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Buyer</label>
                                    <div class="col-sm-6">
                                        <select class="form-control"  id="buyerName" name = "buyerName" required>
                                            <?php
                                                $custom = "SELECT * FROM buyer";
                                                $result = mysqli_query($conn,$custom);
                                                $numRows = mysqli_num_rows($result); 

                                                if(isset($_GET['view_id'])){
                                                echo "<option value = ".$buyerName.">" . $buyerName . "</option>";
                                                }
                                                echo "<option value=''>--Select Buyer--</option>";
                                                if($numRows > 0) {
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    if(isset($_GET['view_id'])){

                                                    if($buyerName != $row['buyer']){
                                                        echo "<option value = ".$row['buyer'].">" . $row['buyer'] . "</option>";
                                                    }

                                                    }else{
                                                    echo "<option value = ".$row['buyer'].">" . $row['buyer'] . "</option>";
                                                    }
                                                }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 size">
                                        <i class="fa fa-plus-circle pointer" onclick="buyerForm()"></i>   
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Buyer Division</label>
                                    <div class="col-sm-6">
                                        <select name="division" id="division" class="form-control" >
                                            <?php
                                            if(isset($_GET['view_id'])){
                                                echo "<option value = ".$division.">" . $division . "</option>";
                                              }else{
                                                echo '<option selected="" disabled="">--Select Division--</option>';
                                              }
                                              
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 size">
                                        <i class="fa fa-plus-circle pointer"></i>   
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Costing No </label>
                            <div class="col-sm-6">
                                <?php 
                                    $check= mysqli_query($conn, "SELECT * FROM pre_order_costing ORDER BY costingNo DESC LIMIT 1");
                                    $count = mysqli_num_rows($check);
                                    $row = mysqli_fetch_array($check);

                                    if($count!=0){
                                        $nextId= $row['costingNo']+1;
                                    }else{
                                      $nextId= 1;
                                    }
                                ?>
                                <input type="text" class="form-control" name ="costingNo" value='<?php  if(isset($_GET['view_id'])){ echo $view_id; }else{ if(isset($nextId)){echo $nextId;} } ?>' readonly/>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Remarks to SMV</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name ="remarks_smv" value='<?php if(isset($_GET['view_id'])){ echo $remarks_smv; }  ?>'  placeholder="Enter Remarks to SMV"/>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Style</label>
                                <div class="col-sm-6">
                                    <select name="style" id="style" class="form-control" >
                                        <?php
                                            if(isset($_GET['view_id'])){
                                                echo "<option value = ".$style.">" . $style . "</option>";
                                            }else{
                                                echo '<option selected="" disabled="">--Select Style--</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-3 size">
                                    <i class="fa fa-plus-circle pointer"></i>   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Season</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name = "season" required>
                                            <?php
                                                $custom = "SELECT * FROM season";
                                                $result = mysqli_query($conn,$custom);
                                                $numRows = mysqli_num_rows($result); 

                                                if(isset($_GET['view_id'])){
                                                echo "<option value = ".$season.">" . $season . "</option>";
                                                }
                                                echo "<option value=''>--Select  Season--</option>";
                                                if($numRows > 0) {
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    if(isset($_GET['view_id'])){

                                                    if($season != $row['season']){
                                                        echo "<option value = ".$row['season'].">" . $row['season'] . "</option>";
                                                    }

                                                    }else{
                                                    echo "<option value = ".$row['season'].">" . $row['season'] . "</option>";
                                                    }
                                                }
                                                }
                                            ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- <p class="card-description"> Address </p> -->
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Base Qty</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name ="baseQty" id="baseQty" value='<?php if(isset($_GET['view_id'])){ echo $baseQty; }  ?>' placeholder="Enter Base Qty" />
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Currency</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="currency" value='<?php if(isset($_GET['view_id'])){ echo $currency; }  ?>' placeholder="Enter Currency"/>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Size Reference</label>
                            <div class="col-sm-9">
                                <select name="size_ref" id="size_ref" class="form-control" >
                                    <?php
                                        if(isset($_GET['view_id'])){
                                            echo "<option value = ".$size_ref.">" . $size_ref . "</option>";
                                        }else{
                                            echo '<option selected="" disabled="">--Select Reference--</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">B PO No</label>
                            <div class="col-sm-6">
                                <select name="bpo_no" id="bpo_no" class="form-control" >
                                        <option selected="" disabled="">--Select B PO No--</option>
                                </select>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Buyer PO Ref</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="buyer_po_ref" value='<?php if(isset($_GET['view_id'])){ echo $buyer_po_ref; }  ?>' placeholder="Enter Buyer PO Ref" />
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Shipment Term</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="shipment_term">
                                      <?php
                                      if(isset($_GET['view_id'])){
                                          echo "<option value = ".$shipment_term.">" . $shipment_term . "</option>";
                                        }
                                      echo ' <option value="">--Select Shipment Term--</option>';
                                      
                                        if(isset($_GET['view_id'])){

                                          if($shipment_term != "FOB"){
                                              echo ' <option value="FOB">FOB</option>';
                                          }
                                          if($shipment_term != "NFE"){
                                              echo ' <option value="NFE">NFE</option>';
                                          }
                                          if($shipment_term != "CIF"){
                                              echo ' <option value="CIF">CIF</option>';
                                          }
                                          if($shipment_term != "DDP"){
                                              echo ' <option value="DDP">DDP</option>';
                                          }

                                        }else{
                                            echo ' <option value="FOB">FOB</option>';
                                            echo ' <option value="NFE">NFE</option>';
                                            echo ' <option value="CIF">CIF</option>';
                                            echo ' <option value="DDP">DDP</option>';
                                        }
    
                                    ?>
                                    </select>
                                </div>
                                </div>
                            </div>
                        </div>
                      <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-6 col-form-label">SAMPLE PICTURE</label>
                                <div class="col-sm-6">
                                    <img id="styleSpec" src= '<?php if(isset($_GET['view_id'])){ echo '../upload/'.$styleSpec; }else{  echo '../assets/images/default-image.jpg';}  ?>' width="200" height="200">
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-6 col-form-label">SAMPLE SKETCH</label>
                                <div class="col-sm-6">
                                    <img id="stylePicture" src= '<?php if(isset($_GET['view_id'])){ echo '../upload/'.$stylePicture; }else{  echo '../assets/images/default-image.jpg';}  ?>' width="200" height="200">
                                </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" name="add" value="add" />
                        <button type="button" onclick="cancelForm()" class="btn btn-primary mr-2 fr">Cancel</button>  
                  
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Costing BOM</h4>
                
                        <p class="card-description">Info</p>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Master Category</label>
                                    <div class="col-sm-7">
                                        <select class="form-control" id="masterName" name = "masterName" >
                                          <option value="">--Select Master Category--</option>
                                          <?php
                                              $custom = "SELECT * FROM  master";
                                              $result = mysqli_query($conn,$custom);
                                              $numRows = mysqli_num_rows($result); 
                              
                                                if($numRows > 0) {
                                                  while($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option value = ".$row['name'].">" . $row['name'] . "</option>";
                                                    
                                                  }
                                                }
                                          ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Main Category</label>
                                    <div class="col-sm-7">
                                        <select name="main" id="main" class="form-control" >
                                            <option selected="" disabled="">--Select Main Category--</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Sub Category</label>
                                <div class="col-sm-7">
                                    <select name="subCategory" id="subCategory" class="form-control" >
                                      <option selected="" disabled="">--Select Sub Category--</option>
                                  </select>
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Fab Type</label>
                                      <div class="col-sm-7">
                                            <select class="form-control" name="fabType" id="fabType">
                                                <option value="">--Select Fab Type --</option>
                                                <option value="SHELL">SHELL</option>
                                                <option value="LINING">LINING</option>
                                                <option value="CONTRAST">CONTRAST</option>
                                            </select>
                                      </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">FM/Size</label>
                                      <div class="col-sm-7">
                                          <input type="text" class="form-control" name ="fm_size" id="fm_size"  value="0" placeholder="FM/Size"/>
                                      </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Consumption</label>
                                      <div class="col-sm-7">
                                          <input type="text" class="form-control" name ="coes"  id="coes" value="0" placeholder="Enter Consumption"/>
                                      </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Required Qty</label>
                                      <div class="col-sm-7">
                                          <input type="text" class="form-control" name ="req_qty" id="req_qty" readonly/>
                                      </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Wastage%</label>
                                      <div class="col-sm-7">
                                          <input type="text" class="form-control" name ="waste"  id="waste"/>
                                      </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Unit</label>
                                      <div class="col-sm-7">
                                          <select class="form-control" name = "unit" id="unit">
                                              <option value="">--Select Unit--</option>
                                              <?php
                                                  $custom = "SELECT * FROM  Item";
                                                  $result = mysqli_query($conn,$custom);
                                                  $numRows = mysqli_num_rows($result); 
                                  
                                                    if($numRows > 0) {
                                                      while($row = mysqli_fetch_assoc($result)) {
                                                        echo "<option value = ".$row['unit'].">" . $row['unit'] . "</option>";
                                                        
                                                      }
                                                    }
                                              ?>
                                        </select>
                                      </div>
                                </div>
                            </div>

                        </div>
                      
                        <div class="row">
                          <div class="col-md-4">
                              <div class="form-group row">
                                  <label class="col-sm-5 col-form-label">Unit Price</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name ="unit_price" id="unit_price" value="0"  placeholder="Enter Unit Price"/>
                                    </div>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group row">
                                  <label class="col-sm-5 col-form-label">Unit Price 02</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name ="unit_price_2 " id="unit_price_2" value="0" placeholder="Enter Unit Price 2"/>
                                    </div>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group row">
                                  <label class="col-sm-5 col-form-label">1PC</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name ="one_pc" id="one_pc" readonly/>
                                    </div>
                              </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                              <div class="form-group row">
                                  <label class="col-sm-5 col-form-label">MF</label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" class="form-control" name ="mf" id="mf"  value="on"/>
                                    </div>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group row">
                                  <label class="col-sm-5 col-form-label">F1</label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" class="form-control" name ="f1" id="f1" value="on"/>
                                    </div>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="form-group row">
                                  <label class="col-sm-5 col-form-label">Trim</label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" class="form-control" name ="trim" id="trim" value="on" />
                                    </div>
                              </div>
                          </div>
                        </div>
              
                        <button type="button" class="btn btn-success mr-2 fr"  id="addbtn" name="addbtn">Add</button>
                        
                        <br><br>

                        <div class="table-responsive">
                          <table id="example" class="table table-bordered table-striped" style="width:100%">
                              <thead>
                                <tr>
                                  <th>Master Cat</th>
                                  <th>Main Cat</th>
                                  <th>Sub Cat</th>
                                  <th>Fab Type</th>
                                  <th>FM/Size</th>
                                  <th>Cose</th>  
                                  <th>Req Qty</th>  
                                  <th>Wastage%</th>  
                                  <th>Unit</th>  
                                  <th>U Price</th>  
                                  <th>U Price2</th>  
                                  <th>1PC</th>  
                                  <th>MF</th> 
                                  <th>F1</th>  
                                  <th>Trim</th>  
                                  <th>DELETE</th>  
                                </tr>
                              </thead>
                          </table>
                        </div> 

                        <br>
                                
                        <div class="row">
                          <div class="col-md-3">
                              <div class="form-group row">
                                  <label class="col-sm-5 col-form-label">Material Cost</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name ="material_cost" id="material_cost" value="0" readonly/>
                                    </div>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group row">
                                  <label class="col-sm-5 col-form-label">Price</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name ="price" id="price" value="0" readonly/>
                                    </div>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group row">
                                  <label class="col-sm-5 col-form-label">Price 2</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name ="price2" id="price2" value="0"  readonly/>
                                    </div>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group row">
                                  <label class="col-sm-5 col-form-label">Profit</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name ="profit" id="profit" value="0"  readonly/>
                                    </div>
                              </div>
                          </div>
                        </div>
                        <p><hr></p>
                        <h4 class="card-title">Style Size</h4>
                        <div class="row">
                          <div class="col-md-4">
                              <div class="form-group row">
                              <label class="col-sm-4 col-form-label">Style Sizes</label>
                                <div class="col-sm-7">
                                  <select name="style_size_ref" id="style_size_ref" class="form-control" >
                                      <?php
                                          if(isset($_GET['view_id'])){
                                              echo "<option value = ".$size_ref.">" . $size_ref . "</option>";
                                          }else{
                                              echo '<option selected="" disabled="">--Select Size--</option>';
                                          }
                                      ?>
                                  </select>
                                      
                                </div>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Ratio</label>
                              <div class="col-sm-5">
                                    <input type="text" class="form-control" name ="ratio" id="ratio" value="0" />
                              </div>
                              </div>
                          </div>
                          <div class="col-md-2">
                              <div class="form-group row">
                                  <!-- <label class="col-sm-2 col-form-label">Ratio</label> -->
                                    <button type="button" class="btn btn-success mr-2 fr"  id="addbtn1" name="addbtn1">Add</button>
                              </div>
                          </div>
                        </div>
                      
                        <br>

                        <div class="table-responsive">
                          <table id="example1" class="table table-bordered table-striped" style="width:100%">
                              <thead>
                                <tr>
                                  <th>Style Sizes</th>
                                  <th>Ratio</th>
                                  <th>DELETE</th>  
                                </tr>
                              </thead>
                          </table>
                        </div>                     
                
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                    <h4 class="card-title"><b>CM CALCULATION</b></h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Payment Mode</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name ="cm_payment_mode" id="cm_payment_mode"  value="Standard" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-5 col-form-label">M/SMV</label>
                                    <div class="col-sm-7">
                                          <input type="text" class="form-control" name ="cm_m_smv" id="cm_m_smv"  value="0" placeholder="Enter M/SMV"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-5 col-form-label">H/SMV</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" name ="cm_h_smv" id="cm_h_smv" value="0" placeholder="Enter H/SMV"/>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Qty Fact</label>
                                      <div class="col-sm-7">
                                          <input type="text" class="form-control" name ="cm_qty_fact" id="cm_qty_fact"  value="0" placeholder="Enter Qty Fact"/>
                                      </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">CM</label>
                                      <div class="col-sm-7">
                                          <input type="text" class="form-control" name ="cm" id="cm"  value="0" placeholder="Enter CM"/>
                                      </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Final CM</label>
                                      <div class="col-sm-7">
                                          <input type="text" class="form-control" name ="cm_final_cm"  id="cm_final_cm" value="0" placeholder="Enter Final CM"/>
                                      </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Production Cost</label>
                                      <div class="col-sm-7">
                                          <input type="text" class="form-control" name ="cm_production_cost" value="0" id="cm_production_cost" placeholder="Enter Production Cost"/>
                                      </div>
                                </div>
                            </div>
                        </div>                               
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                    <h4 class="card-title"><b>SMV CALCULATION</b></h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Payment Mode</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name ="sm_payment_mode" id="sm_payment_mode"  value="Standard" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-5 col-form-label">M/SMV</label>
                                    <div class="col-sm-7">
                                          <input type="text" class="form-control" name ="sm_m_smv" id="sm_m_smv"  value="0" placeholder="Enter M/SMV"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-5 col-form-label">H/SMV</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" name ="sm_h_smv" id="sm_h_smv" value="0" placeholder="Enter H/SMV"/>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Qty Fact</label>
                                      <div class="col-sm-7">
                                          <input type="text" class="form-control" name ="sm_qty_fact" id="sm_qty_fact"  value="0" placeholder="Enter Qty Fact"/>
                                      </div>
                                </div>
                            </div>
                        </div>

                        <p><hr></p>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group row">
                                    <input type="checkbox" class="form-control col-sm-3 col-form-label" name ="smv" id="smv" value="on" />
                                    <div class="col-sm-5">
                                       <label for="smv" class="col-form-label">SMV</label>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-md-5">
                                  <div class="form-group row">
                                    <label for="smv_comments" class="col-sm-3 col-form-label">Comments</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="smv_comments" id="smv_comments" placeholder="Enter Comments">
                                    </div>
                                  </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                  <div class="col-sm-10">
                                        <?php
                                            if(!isset($_GET['view_id'])){
                                                echo '<button type="submit" class="btn btn-success mr-2 fr" >SEND TO WORKSTUDY</button>';
                                            }
                                        ?>
                                  </div>
                               </div>
                          </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group row">
                                    <input type="checkbox" class="form-control col-sm-3 col-form-label" name ="cad" id="cad" value="on" />
                                    <div class="col-sm-5">
                                       <label for="cad" class="col-form-label">CAD</label>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-md-5">
                                  <div class="form-group row">
                                    <label for="smv_comments" class="col-sm-3 col-form-label">Comments</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="cad_comments" id="cad_comments" placeholder="Enter Comments">
                                    </div>
                                  </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                  <div class="col-sm-10" style="padding-left: 30px;">
                                        <?php
                                            if(!isset($_GET['view_id'])){
                                                echo '<button type="submit" class="btn btn-info btn-fw" >SEND TO CAD</button>';
                                            }
                                        ?>
                                  </div>
                               </div>
                          </div>
                        </div>

                    </div>
                  </div>
                </div>
              </div>
                
            </form>
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
  
    /////////////////////////////////////////////////// Form Submit Add  

    $(function () {

        $('#pre_order_costingAdd').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '../controller/c_pre_order_costing.php',
            data: $('#pre_order_costingAdd').serialize(),
            success: function (data) {

              swal({
                title: "Good job !",
                text: "Successfully Submited",
                icon: "success",
                button: "Ok !",
                });
               // setTimeout(function(){ location.reload(); }, 2500);
               }
          });

        });
      });

    ////////////// Buyer - style ///////////////////////
    $("#buyerName").on('change',function(){

      var buyerName = $(this).val();
      if(buyerName){
        $.get(
          "../functions/get_pre_costing.php",
          {buyerName:buyerName},
          function (data) { 
             $('#style').html(data);
          }
        );
          
      }else{
        $('#style').html('<option>Select Style</option>');
      }
    });


     ////////////// Buyer - Select Reference ///////////////////////
    $("#buyerName").on('change',function(){

      var buyerName = $(this).val();
      if(buyerName){
        $.get(
          "../functions/get_pre_costing.php",
          {buyerName_SR:buyerName},
          function (data) { 
             $('#size_ref').html(data)
          }
        );
          
      }else{
        $('#size_ref').html('<option>Select Select Reference</option>');
      }
    });

    
     ////////////// Buyer - Select Reference ///////////////////////
     $("#buyerName").on('change',function(){

      var buyerName = $(this).val();
          if(buyerName){
            $.get(
              "../functions/get_pre_costing.php",
              {buyerName_SIZE:buyerName},
              function (data) { 
                $('#style_size_ref').html(data)
              }
            );
              
          }else{
            $('#style_size_ref').html('<option>Select Select Reference</option>');
          }
      });

     ////////////// Buyer - Division ///////////////////////
    $("#buyerName").on('change',function(){

      var buyerName = $(this).val();
      if(buyerName){
        $.get(
          "../functions/get_pre_costing.php",
          {buyerName_DI:buyerName},
          function (data) { 
             $('#division').html(data);
          }
        );
          
      }else{
        $('#division').html('<option>Select Division</option>');
      }
    });


    ////////////// Buyer - images ///////////////////////
    $("#style").on('change',function(){

      var style = $(this).val();
      if(style){
        $.get(
          "../functions/get_pre_costing.php",
          {style_img:style},
          function (data) {
               var obj = JSON.parse(data);
               $("#styleSpec").attr("src","../upload/"+obj.styleSpec);
               $("#stylePicture").attr("src","../upload/"+obj.stylePicture);
          }
        );
      }
    });

    ////////////// Buyer - bpo no ///////////////////////
    $("#style").on('change',function(){

      var style = $(this).val();
      var buyerName = $('#buyerName').val();

      if(style){
        $.get(
          "../functions/get_pre_costing.php",
          {style_bpo:style,buyerName_bpo:buyerName},
          function (data) { 
             $('#bpo_no').html(data);
          }
        );
          
      }else{
        $('#bpo_no').html('<option>Select Select Reference</option>');
      }
    });


    ////////////// bpo_no get  ///////////////////////
    $("#bpo_no").on('change',function(){

      var bpo_no = $(this).val();
      if(bpo_no){     
        window.location.href = "c_pre_order_costing.php?view_id=" + bpo_no;
      }
    });

    function cancelForm(){

        window.location.href = "c_pre_order_costing.php";
    }

    function buyerForm(){
        $('#myModal').modal('show');
    }


    ////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////

    /////////////////////////////////////////////////// Form Submit Add  

    $(function () {

        $('#buyerAdd').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '../controller/b_registre.php',
            data: $('#buyerAdd').serialize(),
            success: function (data) {

                  if(data==0){

                    swal({
                      title: "Can't Duplication !",
                      text: "Buyer",
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

     /////////////////////////////////////////////////////////////////


     ///////////// Main ///////////////////////
      $("#masterName").on('change',function(){

       // calculation();

        var masterName = $(this).val();

        //Master Is Fabric disabled in fabType
        if(masterName=='FABRIC'){
            $("#fabType").prop("disabled", true);
        }else{
          $("#fabType").prop("disabled", false);  
        }

        if(masterName){
          $.get(
            "../functions/get_main.php",
            {masterName:masterName},
            function (data) { 
              $('#main').html(data);
            }
          );
            
        }else{
          $('#main').html('<option>Select Master Name First</option>');
        }
      });
    
    ////////////// Sub category ///////////////////////
    $("#main").on('change',function(){

      var main = $(this).val();
      var master = $('#masterName').val();

      if(main){
        $.get(
          "../functions/get_sub.php",
          {main:main,master:master},
          function (data) { 
             $('#subCategory').html(data);
          }
        );
          
      }else{
        $('#main').html('<option>Select Main First</option>');
      }
    });

    ////////////// coes onchange ///////////////////////
    $("#coes").on('keyup change', function (){
        if(coes!=''){
          calculation();
        }     
    });

    ////////////// unit price onchange ///////////////////////
    $("#unit_price").on('keyup change', function (){
         if(unit_price!=''){
          calculation();
        }     
    });

   ////////////// wastage onchange ///////////////////////
    $("#waste").on('keyup change', function (){
         if(waste!=''){
          calculation();
        }     
    });

    function calculation(){

       // Get Byer base Qty  -> req qty 
        var  baseQty  =  $('#baseQty').val();
        var coes  =  $('#coes').val();  
        var waste  =  $('#waste').val(); 
        var cal =  ((baseQty*coes)+((baseQty*coes)*waste/100)).toFixed(2);
        $('#req_qty').val(cal);
        // waste = ((baseQty*coes)*3/100)*(baseQty*coes);
        // $('#waste').val(waste.toFixed(2));
        var unit_price =   $('#unit_price').val(); 
        // alert(unit_price);
        //  alert(coes);

        $('#one_pc').val((unit_price*coes).toFixed(2)); 
    }

    /////////////////////////////////////////////////////////

    ///////////////  Add Row
    $(document).ready(function() {
        $('#example').dataTable();
        $('#addbtn').click(addrow);

        $('#example1').dataTable();
        $('#addbtn1').click(addrow1);
    });



    function addrow1() {

      $('#example1').dataTable().fnAddData( [
          $('#style_size_ref option:selected').text(),
          $('#ratio').val(),
          "<button class='btn-edit' id='DeleteButton1'>Delete</button>" ] );

      $('#style_size_ref').val("")
      $('#ratio').val(0)
      reCalulate1();
     
    }

    function addrow() {

    // var amountAMT = 0;
      var mf,f1,trim;
      if($('#mf').prop("checked") == true){ mf ="on"}else{mf="off"}   
      if($('#f1').prop("checked") == true){ f1 ="on"}else{f1="off"}   
      if($('#trim').prop("checked") == true){ trim ="on"}else{trim="off"}  

      $('#example').dataTable().fnAddData( [
          $('#masterName option:selected').text(),
          $('#main option:selected').text(),
          $('#subCategory option:selected').text(),
          $('#fabType option:selected').val(),
          $('#fm_size').val(),
          $('#coes').val(),
          $('#req_qty').val(),
          $('#waste').val(),
          $('#unit option:selected').val(),
          $('#unit_price').val(),
          $('#unit_price_2').val(),
          $('#one_pc').val(),
          mf,
          f1,
          trim,
          "<button class='btn-edit' id='DeleteButton'>Delete</button>" ] );

      $('#masterName').val("")
      $('#main').val("")
      $('#subCategory').val("")
      $('#fabType').val("")
      $('#fm_size').val(0)
      $('#coes').val(0)
      $('#req_qty').val("")
      $('#waste').val("")
      $('#unit').val("")
      $('#unit_price').val(0)
      $('#unit_price_2').val(0)
      $('#one_pc').val("")
      $('#mf').prop('checked', false); 
      $('#f1').prop('checked', false); 
      $('#trim').prop('checked', false); 

      reCalulate();
     
    }


    /////////// Calulate Row Count
    function reCalulate1(){

      //need to add above af_sale, af_free, tot_pur, tot_sales text box values as hidden fields to the list view 
      //need to get sum of the tot_sales to bill_amt text box and sum of the tot_pur to pur_cost text box
      
      var array=[];
      var table = $("#example1");

      table.find('tr:gt(0)').each(function (i) {

      var $tds = $(this).find('td'),
      style_size_ref = $tds.eq(0).text();
      ratio = $tds.eq(1).text();
     

      var z={"style_size_ref":style_size_ref,"ratio":ratio};

      array.push({style_size_ref:style_size_ref,ratio:ratio});

      });

      console.log(JSON.stringify(array, null, 1));
      $('#myitemjson1').val(JSON.stringify(array));

    }

    /////////// Calulate Row Count
    function reCalulate(){

      //need to add above af_sale, af_free, tot_pur, tot_sales text box values as hidden fields to the list view 
      //need to get sum of the tot_sales to bill_amt text box and sum of the tot_pur to pur_cost text box
      
      var array=[];
      var one_pc_total = 0  , unit_price_total = 0 ,  unit_price2_total = 0 , profit=0;
      var table = $("#example");

      table.find('tr:gt(0)').each(function (i) {

      var $tds = $(this).find('td'),
      masterName = $tds.eq(0).text();
      main = $tds.eq(1).text();
      subCategory = $tds.eq(2).text();
      fabType = $tds.eq(3).text();
      fm_size = $tds.eq(4).text();
      coes = $tds.eq(5).text();
      req_qty = $tds.eq(6).text();
      waste = $tds.eq(7).text();
      unit = $tds.eq(8).text();
      unit_price = $tds.eq(9).text();
      unit_price_2 = $tds.eq(10).text();
      one_pc = $tds.eq(11).text();
      mf = $tds.eq(12).text();
      f1 = $tds.eq(13).text();
      trim = $tds.eq(14).text();

      one_pc_total = Number(one_pc_total) + Number(one_pc);
      unit_price_total = Number(unit_price_total) + Number(unit_price);
      unit_price2_total = Number(unit_price2_total) + Number(unit_price_2);
      profit =  Number((unit_price_total-unit_price2_total).toFixed(2));
      $('#material_cost').val(one_pc_total.toFixed(2));
      $('#price').val(unit_price_total.toFixed(2));
      $('#price2').val(unit_price2_total.toFixed(2))
      $('#profit').val(profit.toFixed(2))

      var z={"masterName":masterName,"main":main,"subCategory":subCategory,"fabType":fabType,"fm_size":fm_size,"coes":coes,"req_qty":req_qty,"waste":waste,"unit":unit,"unit_price":unit_price,"unit_price_2":unit_price_2,"one_pc":one_pc,"mf":mf,"f1":f1,"trim":trim};

      array.push({masterName:masterName,main:main,subCategory:subCategory,fabType:fabType,fm_size:fm_size,coes:coes,req_qty:req_qty,waste:waste,unit:unit,unit_price:unit_price,unit_price_2:unit_price_2,one_pc:one_pc,mf:mf,f1:f1,trim:trim});

      });

      console.log(JSON.stringify(array, null, 1));
      $('#myitemjson').val(JSON.stringify(array));

    }

     /////////// Remove the Row 
    $("#example").on("click", "#DeleteButton", function() {
      $(this).closest("tr").remove();
      reCalulate();
    });

     /////////// Remove the Row 1
    $("#example1").on("click", "#DeleteButton1", function() {
      $(this).closest("tr").remove();
       reCalulate1();
    });

  </script>


 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          <h4 class="modal-title">Buyer</h4>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-body">
            <h4 class="card-title">Buyer Register</h4>
            <!-- <p class="card-description"> Basic form elements </p> -->
            <form class="forms-sample" id="buyerAdd">
                <div class="form-group">
                <label for="exampleInputName1">Buyer</label>
                <input type="text" class="form-control" name="buyer" placeholder="Buyer" required>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail3">Buyer Email</label>
                <input type="email" class="form-control" name="buyerEmail"  placeholder="Buyer Email" required>
                </div>
                <div class="form-group">
                <label for="exampleTextarea1">Address</label>
                <textarea class="form-control" name="address" rows="2"></textarea>
                </div>
                <div class="form-group">
                <label for="exampleInputName1">Telephone</label>
                <input type="text" class="form-control" name="telephone"  placeholder="Telephone" required>
                </div>
                <div class="form-group">
                <label for="exampleInputName1">Buyer Excess</label>
                <input type="text" class="form-control" name="buyerExcess" placeholder="Percentage" required>
                </div>
                <div class="form-group">
                <label for="exampleInputName1">Buyer Budgeted</label>
                <input type="text" class="form-control" name="buyerBudgeted"  placeholder="Percentage" required>
                </div>
                <input type="hidden" class="form-control" name="add" value="add" />
                <button type="submit" class="btn btn-success mr-2">Submit</button>
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



