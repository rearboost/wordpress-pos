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
            $create_date  = $row['create_date'];
            $status  = $row['status'];
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
              <div class="content-wrapper">
              <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">SMV Confirmation</h4>
                        <p class="card-description">SMV Pending Info</p>
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

                                $sql=mysqli_query($conn,"SELECT * FROM pre_order_costing WHERE smv='on'  AND  status=0 ");
                                
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
                                    echo '<td class="td-center"><button type="button" onclick="viewForm('.$costingNo.')" class="btn btn-info btn-fw">View</button></td>';
                                    echo ' </tr>';
                                    $i++;
                                    }
                                }
                                ?>
                            </tbody>
                         
                      </table>
                      <p></p>
                      <center><b><span><?php if($numRows==0){ echo "No Pending SMV Confirmation";} ?></span></b></center>
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
                                      <?php if(isset($_GET['view_id'])){   if($status==0){ echo "Pending";} };?> 
                                </div>
                                </div>
                            </div>
                        </div>
                        <br>
                         <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th> # </th>
                                <th>Master Cat</th>
                                <th>Main Cat </th>
                                <th>Sub Cat</th>
                                <th>Fab Type </th>
                                <th>Consumption</th>
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
                                    $coes = $row['coes'];
                                    echo ' <tr>';
                                    echo ' <td>'.$i.' </td>';
                                    echo ' <td>'.$masterName.' </td>';
                                    echo ' <td>'.$main.' </td>';
                                    echo ' <td>'.$subCategory.' </td>';
                                    echo ' <td>'.$fabType.' </td>';
                                    echo ' <td>'.$coes.' </td>';
                                    echo ' </tr>';
                                    $i++;
                                    }
                                }
                                ?>
                            </tbody>
                            </tbody>
                         </table>
                      <br>

                        
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Costing Remarks</label>
                                <div class="col-sm-9">
                                <?php if(isset($_GET['view_id'])){ echo $smv_comments; };?> 
                                </div>
                            </div>
                        <div class="form-group row">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Payment Mode</label>
                            <div class="col-sm-9">
                                <?php echo  "Standard";?>
                            </div>
                        </div>

                        <div class="row">
                        
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-6 col-form-label">SAMPLE SKETCH</label>
                                <div class="col-sm-6">
                                    <img id="stylePicture" src= '<?php if(isset($_GET['view_id'])){ echo '../upload/'.$stylePicture; }else{  echo '../assets/images/default-image.jpg';}  ?>' width="200" height="200">
                                </div>
                                </div>
                            </div>
                        </div>                  
                    </div>
                  </div>
                </div>
              </div>
              <form class="form-sample" id="smv_form">
              <input type="hidden" name="costingNo" value ='<?php echo  $view_id;  ?>'/>
              <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                    <h4 class="card-title"><b>CM CALCULATION</b></h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-5 col-form-label">M/SMV</label>
                                    <div class="col-sm-7">
                                          <input type="text" class="form-control" name ="sm_m_smv"  value='<?php if(isset($_GET['view_id'])){ echo $sm_m_smv;} ?>' placeholder="Enter M/SMV"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-5 col-form-label">H/SMV</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" name ="sm_h_smv" value='<?php if(isset($_GET['view_id'])){ echo $sm_h_smv;} ?>' placeholder="Enter H/SMV"/>
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Remarks</label>
                                      <div class="col-sm-7">
                                         <textarea id="w3review" name="remarks" rows="4" cols="34"></textarea>
                                      </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Sp. Remarks</label>
                                      <div class="col-sm-7">
                                        <textarea id="w3review" name="sp_remarks" rows="4" cols="34"></textarea>
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
                        </div>  
                        <input type="hidden" class="form-control" id="add" name="add" />
                        <button type="button" onclick="cancelForm()" class="btn btn-primary mr-2 fr">Cancel</button>

                         <?php if (isset($_GET['view_id'])): ?>
                            <button type="submit" onclick="confirmForm()"  class="btn btn-info btn-fw" name="btn_confirm" value="btn_confirm" >CONFIRM SMV</button>
                            <button type="submit" onclick="rejectForm()"  class="btn btn-warning btn-fw" name="btn_reject" value="btn_reject" >REJECT SMV</button>

                        <?php else: ?>

                        <?php endif ?>
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
  
    /////////////////////////////////////////////////// 

    function cancelForm(){

        window.location.href = "c_smv_confirmation.php";
    }

    function viewForm(id){

        window.location.href = "c_smv_confirmation.php?view_id=" + id;
    }

    function confirmForm(){
        $('#add').val("confirm");
    }

    function rejectForm(){
        $('#add').val("reject");
    }

    /////////////////////////////////////////////////// Form Submit Add  

    $(function () {

        $('#smv_form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '../controller/c_smv_confirmation.php',
            data: $('#smv_form').serialize(),
            success: function (data) {
                   
                    swal({
                    title: "Good job !",
                    text: "Successfully Updated",
                    icon: "success",
                    button: "Ok !",
                    });
                    $('#add').val("add");
                    setTimeout(function(){ window.location.href = "c_smv_confirmation.php"; }, 2500);
               }
          });
        });
      });

     /////////////////////////////////////////////////////////////////



  </script>



  