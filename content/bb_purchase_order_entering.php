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
            <div class="col-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Purchase Order Entering</h4>
                    <!-- <p class="card-description"> Horizontal form layout </p> -->
                    <form class="forms-sample" id="purchase_order_form">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Buyer</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name = "buyerName" id="buyerName" required>
                                            <option value="">--Select Buyer--</option>
                                            <?php
                                                $custom = "SELECT * FROM pre_order_costing WHERE confirmation_allocation=1";
                                                $result = mysqli_query($conn,$custom);
                                                $numRows = mysqli_num_rows($result); 
                                
                                                if($numRows > 0) {
                                                    while($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option value = ".$row['buyerName'].">" . $row['buyerName'] . "</option>";
                                                    
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Style</label>
                                    <div class="col-sm-8">
                                        <select name="style" id="style" class="form-control" >
                                            <option selected="" disabled="">--Select Style--</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-4 col-form-label">B PO No</label>
                                <div class="col-sm-8">
                                    <select name="bpo_no" id="bpo_no" class="form-control" >
                                            <option selected="" disabled="">--Select B PO No--</option>
                                    </select>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-4 col-form-label">PO Number</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name ="po_number" id="po_number" placeholder="Enter PO Number"/>
                                </div>
                            </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Division</label>
                                <div class="col-sm-8">
                                    <select name="division" id="division" class="form-control" >
                                        <option selected="" disabled="">--Select Division--</option>
                                    </select>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Billing Account</label>
                                <div class="col-sm-8">
                                <select class="form-control" name="billing_account" required>
                                        <option selected="" disabled="">--Select Billing Account--</option>
                                        <option value="TRENDYWEAR PVT LTD">TRENDYWEAR PVT LTD</option>
                                        <option value="TRENDYWEAR ADIKARIGAMA PVT LTD">TRENDYWEAR ADIKARIGAMA PVT LTD</option>
                                        <option value="ADITI INFINITY PVT LTD">ADITI INFINITY PVT LTD.</option>
                                    </select>
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Size Reference</label>
                                <div class="col-sm-8">
                                    <select name="size_ref" id="size_ref" class="form-control" >
                                    <option selected="" disabled="">--Select Reference--</option>
                                    </select>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Garment Quantity</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name ="ga_quantity" id="ga_quantity"  v placeholder="Enter Garment Quantity"/>
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Sample Locations</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name = "sample_location" required>
                                        <option value="">--Select Branch--</option>
                                        <?php
                                            $custom = "SELECT * FROM branch";
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

                        </div>
                        <input type="hidden" class="form-control" id="add" name="add" />
                        <button type="submit" class="btn btn-info btn-fw" name="btn_add" >SAVE</button>

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
  
    /////////////////////////////////////////////////// Form Submit Add  

     $(function () {

        $('#purchase_order_form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '../controller/bb_purchase_order_entering.php',
            data: $('#purchase_order_form').serialize(),
            success: function (data) {

                if(data==0){

                    swal({
                      title: "Can't Duplication !",
                      text: "Purchase Order Entering",
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

    ////////////// Buyer - style ///////////////////////
    $("#buyerName").on('change',function(){

      var buyerName = $(this).val();
      if(buyerName){
        $.get(
          "../functions/get_purchase.php",
          {buyerName:buyerName},
          function (data) { 
             $('#style').html(data);
          }
        );
          
      }else{
        $('#style').html('<option>Select Style</option>');
      }
    });


    ////////////// Buyer - bpo no ///////////////////////
    $("#style").on('change',function(){

      var style = $(this).val();
      var buyerName = $('#buyerName').val();

      if(style){
        $.get(
          "../functions/get_purchase.php",
          {style_bpo:style,buyerName_bpo:buyerName},
          function (data) { 
             $('#bpo_no').html(data);
          }
        );
          
      }else{
        $('#bpo_no').html('<option>Select Select Reference</option>');
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


    ////////////// Buyer - Select Reference ///////////////////////
    $("#buyerName").on('change',function(){

      var buyerName = $(this).val();
      if(buyerName){
        $.get(
          "../functions/get_pre_costing.php",
          {buyerName_SR:buyerName},
          function (data) { 
             $('#size_ref').html(data);
          }
        );
          
      }else{
        $('#size_ref').html('<option>Select Select Reference</option>');
      }
    });








  
  </script>