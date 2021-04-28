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
            $department =  $row_get['department'];
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
            <form class="form-sample" id="marker_yy_form" enctype="multipart/form-data">
              <input type="hidden" name="costingNo" value='<?php echo $view_id; ?>'/>
              <div class="content-wrapper">
              <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Marker YY Confirmation</h4>
                        <p class="card-description">Info</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Buyer</label>
                                    <div class="col-sm-6">
                                        <select class="form-control"  id="buyerName" name = "buyerName" required>
                                            <?php
                                                $custom = "SELECT DISTINCT buyerName FROM pre_order_costing WHERE cad ='on' AND status=0";
                                                $result = mysqli_query($conn,$custom);
                                                $numRows = mysqli_num_rows($result); 

                                                if(isset($_GET['view_id'])){
                                                echo "<option value = ".$buyerName.">" . $buyerName . "</option>";
                                                }
                                                echo "<option value=''>--Select Buyer--</option>";
                                                if($numRows > 0) {
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    if(isset($_GET['view_id'])){

                                                    if($buyerName != $row['buyerName']){
                                                        echo "<option value = ".$row['buyerName'].">" . $row['buyerName'] . "</option>";
                                                    }

                                                    }else{
                                                    echo "<option value = ".$row['buyerName'].">" . $row['buyerName'] . "</option>";
                                                    }
                                                }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
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
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Costing No </label>
                            <div class="col-sm-6">
                                <select class="form-control"  id="costingNo" name = "costingNo">
                                        <?php
                                            $custom = "SELECT costingNo FROM pre_order_costing WHERE cad ='on' AND status=0";
                                            $result = mysqli_query($conn,$custom);
                                            $numRows = mysqli_num_rows($result); 

                                            if(isset($_GET['view_id'])){
                                            echo "<option value = ".$view_id.">" . $view_id . "</option>";
                                            }
                                            echo "<option value=''>--Select Costing No--</option>";
                                            if($numRows > 0) {
                                            while($row = mysqli_fetch_assoc($result)) {
                                                if(isset($_GET['view_id'])){

                                                if($view_id != $row['costingNo']){
                                                    echo "<option value = ".$row['costingNo'].">" . $row['costingNo'] . "</option>";
                                                }

                                                }else{
                                                echo "<option value = ".$row['costingNo'].">" . $row['costingNo'] . "</option>";
                                                }
                                            }
                                            }
                                        ?>
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Order No</label>
                                <div class="col-sm-6">
                                    <select name="bpo_no" id="bpo_no" class="form-control" >
                                        <?php
                                            if(isset($_GET['view_id'])){
                                                echo "<option value = ".$view_id.">" . $view_id . "</option>";
                                            }else{
                                                echo '<option selected="" disabled="">--Select Order No--</option>';
                                            }
                                        ?>
                                    </select>         
                                    
                                </div>        
                            </div>
                        </div>
                        </div>
                        <p><hr></p>

                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Buyer </label>
                                    <div class="col-sm-9">
                                         <?php if(isset($_GET['view_id'])){ echo $buyerName; };?>       
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Style No</label>
                                    <div class="col-sm-9">
                                         <?php if(isset($_GET['view_id'])){ echo $style; };?>       
                                    </div>
                                </div>
                            </div>
                        </div>


                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Order Qty </label>
                                    <div class="col-sm-9">
                                         <?php if(isset($_GET['view_id'])){ echo $baseQty; };?>       
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Base Size</label>
                                    <div class="col-sm-9">
                                         <?php if(isset($_GET['view_id'])){ echo $size_ref; };?>       
                                    </div>
                                </div>
                            </div>
                        </div>


                         <div class="row">
                           <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label" >Meas. Chat</label>
                                    <div class="col-sm-9">
                                        <input type="file" style="border: inherit;" class="form-control" name="meas_chat" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label" >Spec.</label>
                                    <div class="col-sm-9">
                                        <input type="file" style="border: inherit;" class="form-control" name="spec" />
                                    </div>
                                </div>
                           </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Sample </label>
                                    <div class="col-sm-9">
                                        <img id="stylePicture" src= '<?php if(isset($_GET['view_id'])){ echo '../upload/'.$stylePicture; }else{  echo '../assets/images/default-image.jpg';}  ?>' width="200" height="200">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Item Description</label>
                                    <div class="col-sm-9">
                                         <?php if(isset($_GET['view_id'])){ echo $department; };?>       
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        <!-- <p class="card-description"> Address </p> -->
                        <button type="button" onclick="cancelForm()" class="btn btn-primary mr-2 fr">Cancel</button>  
                  
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="float_ledt">
                                <h4 class="card-title">Fabric Details</h4>
                                <div class="table-responsive ">
                                    <table id="example1" class="table table-bordered table-striped" style="width:100%">
                                        <!-- <thead>
                                            <tr>
                                            <th>Style Sizes</th>
                                            <th>Ratio</th>
                                            </tr>
                                        </thead> -->
                                        <tbody>
                                        <tr>
                                            <td>DATE</td>
                                            <td><input type="date" name="date" class="form-control"></td>
                                        </tr>
                                        <hr>
                                            <tr>
                                            <td>
                                                <p class="p_margin">SELF FABRIC</p>
                                                <p class="p_margin">COMPOSITION</p>
                                                <p class="p_margin">SOLID/PRINT</p>
                                                <p class="p_margin">CUTTABLE WIDTH</p>
                                                <p class="p_margin">SUPPLINER</p>
                                            </td>
                                            <td>
                                            <p ><input type="text" name="s_fabric" class="form-control"></p>
                                            <p ><input type="text" name="s_composition" class="form-control"></p>
                                            <p><input type="text" name="s_print" class="form-control"></p>
                                            <p><input type="text" name="s_cuttable" class="form-control"></p>
                                            <p><input type="text" name="s_suppliner" class="form-control"></p>
                                            </td>
                                        </tr>
                                            <tr>
                                            <td>
                                                <p class="p_margin">LINING FABRIC</p>
                                                <p class="p_margin">COMPOSITION</p>
                                                <p class="p_margin">SOLID/PRINT</p>
                                                <p class="p_margin">CUTTABLE WIDTH</p>
                                                <p class="p_margin">SUPPLINER</p>
                                            </td>
                                            <td>
                                            <p ><input type="text" name="l_fabric"  class="form-control"></p>
                                            <p ><input type="text" name="l_composition" class="form-control"></p>
                                            <p><input type="text" name="l_print" class="form-control"></p>
                                            <p><input type="text" name="l_cuttable" class="form-control"></p>
                                            <p><input type="text" name="l_suppliner" class="form-control"></p>
                                            </td>
                                        </tr>
                                            <tr>
                                                <td>
                                                    <p class="p_margin">CONTRAST FAB</p>
                                                    <p class="p_margin">COMPOSITION</p>
                                                    <p class="p_margin">SOLID/PRINT</p>
                                                    <p class="p_margin">CUTTABLE WIDTH</p>
                                                    <p class="p_margin">SUPPLINER</p>
                                                </td>
                                            <td>
                                            <p ><input type="text" name="c_fabric" class="form-control"></p>
                                            <p ><input type="text" name="c_composition" class="form-control"></p>
                                            <p><input type="text" name="c_print" class="form-control"></p>
                                            <p><input type="text" name="c_cuttable" class="form-control"></p>
                                            <p><input type="text" name="c_suppliner" class="form-control"></p>
                                            
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div> 
                            </div>
                            <div class="float_rigth">
                                <h4 class="card-title">Cutting Instruction</h4>
                                 <div class="y_form">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                            <label class="col-sm-5 col-form-label">Matching</label>
                                                <div class="col-sm-7">
                                                    <input type="checkbox" class="form-control" name ="matching" value="on"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                            <label class="col-sm-5 col-form-label">Bias Grain</label>
                                                <div class="col-sm-7">
                                                    <input type="checkbox" class="form-control" name ="bias_grain" id="bias_grain"  value="on" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                            <label class="col-sm-5 col-form-label">Straight Grain Length wise</label>
                                                <div class="col-sm-7">
                                                    <input type="checkbox" class="form-control" name ="st_len_wise" id="st_len_wise"  value="on"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                            <label class="col-sm-5 col-form-label">Straight Grain Width wise</label>
                                                <div class="col-sm-7">
                                                    <input type="checkbox" class="form-control" name ="st_width_wise" id="st_width_wise"  value="on"/>
                                                </div>
                                            </div>
                                        </div>
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
                    <!-- <h4 class="card-title"><b>CM CALCULATION</b></h4> -->
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
                          <p></p>
                         <center><span><?php if($numRows==0){ echo "No Records";} ?></span></center>
                         <br>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Date</label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" name ="c_date" id="c_date" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Merchandise</label>
                                    <div class="col-sm-7">
                                          <input type="text" class="form-control" name ="merchandise" id="merchandise"  value='<?php echo $_SESSION['username']  ?>' readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Model Name</label>
                                    <div class="col-sm-7">
                                          <input type="text" class="form-control" name ="modelName" id="modelName" />
                                    </div>
                                </div>
                            </div>
                          </div>

                          <p></p>

                          <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th> # </th>
                                <th>Fabric</th>
                                <th>Size </th>
                                <th>Marker Length </th>
                                <th>Con. Width 3% </th>
                                <th>Average </th>
                                <th>Remark </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $sql=mysqli_query($conn,"SELECT * FROM costing_bom WHERE costingNo='$view_id' AND masterName='Fabric'");
                                
                                $numRows = mysqli_num_rows($sql); 
                            
                                if($numRows > 0) {
                                    $i = 1;
                                    while($row = mysqli_fetch_assoc($sql)) {

                                    $id  = $row['id'];
                                    $subCategory  = $row['subCategory'];
                                    $fabType   = $row['fabType'];
                                    $fm_size   = $row['fm_size'];
                                    echo ' <tr>';
                                    echo ' <td>'.$i.' </td>';
                                    echo ' <td>[ '.$fabType.' ] '.$subCategory.' </td>';
                                    echo ' <td>'.$fm_size.' </td>';
                                    echo ' <td style="display: none;"><input type="text" class="form-control" name ="costing_bom_id[]" value='.$id.' /></td>';
                                    echo ' <td><input type="text" class="form-control" name ="markerLength[]"  /></td>';
                                    echo ' <td><input type="text" class="form-control" name ="con_width[]"  /></td>';
                                    echo ' <td><input type="text" class="form-control" name ="average[]"  /></td>';
                                    echo ' <td><input type="text" class="form-control" name ="remark[]"  /></td>';
                                    echo ' </tr>';
                                    $i++;
                                    }
                                }
                                ?>
                            </tbody>
                            </tbody>
                         </table>
                          <p></p>
                         <center><span><?php if($numRows==0){ echo "No Records";} ?></span></center>
                         <br>

                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Remarks</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name ="remarks"/>
                                    </div>
                                </div>
                            </div>
                          
                          </div>


                          <input type="hidden" class="form-control" id="add" name="add" />
                          <?php if (isset($_GET['view_id'])): ?>
                             <button type="submit" onclick="saveForm()"  class="btn btn-info btn-fw" name="btn_save" value="btn_save" >SAVE</button>
                             <button type="submit" onclick="confirmForm()"  class="btn btn-success btn-fw" name="btn_confirm" value="btn_confirm" >CONFIRM</button>
                             <button type="submit" onclick="rejectForm()"  class="btn btn-danger btn-fw" name="btn_reject" value="btn_reject" >REJECT</button>

                          <?php else: ?>

                          <?php endif ?>
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

    function saveForm(){
        $('#add').val("save");
    }

    function confirmForm(){
        $('#add').val("confirm");
    }

    function rejectForm(){
        $('#add').val("reject");
    }
  
    /////////////////////////////////////////////////// Form Submit Add  

    $(function () {

        $('#marker_yy_form').on('submit', function (e) {

          e.preventDefault();

          var data = new FormData($("#marker_yy_form")[0]);

          $.ajax({
            type: 'post',
            url: '../controller/c_marker_y_confirmation.php',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            success: function (data) {
              swal({
                title: "Good job !",
                text: "Successfully Submited",
                icon: "success",
                button: "Ok !",
                });
                setTimeout(function(){ window.location.href = "c_marker_y_confirmation.php"; }, 2500);
               }
          });

        });

    });

    ////////////// Buyer - style ///////////////////////
    $("#buyerName").on('change',function(){

      var buyerName = $(this).val();
      if(buyerName){
        $.get(
          "../functions/get_marker.php",
          {buyerName:buyerName},
          function (data) { 
             $('#style').html(data);
          }
        );
          
      }else{
        $('#style').html('<option>Select Style</option>');
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
          "../functions/get_marker.php",
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
        window.location.href = "c_marker_y_confirmation.php?view_id=" + bpo_no;
      }
    });

    ////////////// costingNo get  ///////////////////////
    $("#costingNo").on('change',function(){

      var costingNo = $(this).val();
      if(costingNo){     
        window.location.href = "c_marker_y_confirmation.php?view_id=" + costingNo;
      }
    });

    function cancelForm(){

        window.location.href = "c_marker_y_confirmation.php";
    }

  </script>


