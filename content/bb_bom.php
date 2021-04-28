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
                    <h4 class="card-title">BOM Ratio</h4>
                    <!-- <p class="card-description"> Horizontal form layout </p> -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                <label class="col-sm-4 col-form-label">PO Number</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name = "po_number" id="po_number" required>
                                            <option value="">--Select PO Number--</option>
                                            <?php
                                                $custom = "SELECT * FROM po_entering";
                                                $result = mysqli_query($conn,$custom);
                                                $numRows = mysqli_num_rows($result); 
                                
                                                if($numRows > 0) {
                                                    while($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option value = ".$row['po_number'].">" . $row['po_number'] . "</option>";
                                                    
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>  
                                </div>
                            </div>
                        </div>
                  </div>
                </div>
            </div>
            <br>

            <?php if (isset($_GET['view_id'])): ?>
            
            <form class="forms-sample" id="bom_form">

                <input type="hidden" value ='<?php echo $_GET['view_id']; ?>' name="po_number">
                <input type="hidden" id="myitemjson" name="myitemjson"/>
                <input type="hidden" id="myitemjson1" name="myitemjson1"/>

                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                        <center><b><h5>PO Number - <?php echo $_GET['view_id']; ?></h5></b></center>
                        <br>
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
                                <label class="col-sm-5 col-form-label">Item Name</label>
                                    <div class="col-sm-7">
                                         <select class="form-control" name="itemName" id="itemName" required>
                                            <option value="">--Select Item Name--</option>
                                            <?php
                                                $custom = "SELECT * FROM  Item";
                                                $result = mysqli_query($conn,$custom);
                                                $numRows = mysqli_num_rows($result); 
                                
                                                if($numRows > 0) {
                                                    while($row = mysqli_fetch_assoc($result)) {
                                                    echo "<option value = ".$row['itemName'].">" . $row['itemName'] . "</option>";
                                                    
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Color</label>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="color" id="color">
                                            <option value="">--Select Color--</option>
                                            <?php
                                                $custom = "SELECT * FROM  color";
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
                                <label class="col-sm-5 col-form-label">Size</label>
                                <div class="col-sm-7">
                                    <select class="form-control" name="size" id="size">
                                        <option value="">--Select Size--</option>
                                        <?php
                                            $custom = "SELECT * FROM  size";
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

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Reference</label>
                                    <div class="col-sm-7">
                                         <select class="form-control" name="reference" id="reference">
                                            <option value="">--Select Reference--</option>
                                            <?php
                                                $custom = "SELECT * FROM  reference";
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
                                <label class="col-sm-5 col-form-label">Dimension</label>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="dimension" id="dimension">
                                            <option value="">--Select Dimension--</option>
                                            <?php
                                                $custom = "SELECT * FROM  dimension";
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
                                <label class="col-sm-5 col-form-label">Consumption</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name ="consumption"  id="consumption" value="0" placeholder="Enter Consumption"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Wastage%</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name ="wastage"  id="wastage" value="0"/>
                                </div>
                            </div>
                          </div>
                        </div>

                         <div class="row">
                            <div class="col-md-4">
                                    <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Excess%</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name ="excess"  id="excess" value="0"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Required Qty</label>
                                    <div class="col-sm-7">
                                       <input type="text" class="form-control" name ="req_qty" id="req_qty" value="0" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Unit Price</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name ="unit_price" id="unit_price" value="0"  placeholder="Enter Unit Price"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-success mr-2 fr"  id="addbtn" name="addbtn">Add</button>

                        <br><br>

                    
                        <div class="table-responsive">
                          <table class="table table-bordered"  id="example">
                            <thead>
                                <tr>
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
                                <th>DELETE</th> 
                                </tr>
                            </thead>
                            
                         </table>
                        </div>
                        <br>

                        <div class="row">
                    
                        <?php 

                          $poNo = $_GET['view_id'];
                          $sql_buyerName=mysqli_query($conn,"SELECT * FROM po_entering WHERE po_number='$poNo'");
                          $row_buyerName= mysqli_fetch_assoc($sql_buyerName);
                          $bpo_no = $row_buyerName['bpo_no'];
                          $ga_quantity = $row_buyerName['ga_quantity'];

                          $sql=mysqli_query($conn,"SELECT * FROM costing_bom WHERE costingNo='$bpo_no'"); 
                    
                        ?>

                       <!-- <h4 class="card-title">Materials</h4> -->
                        <div class="table-responsive">
                          <input type="hidden" value ='<?php echo $ga_quantity; ?>' name="ga_quantity" id="ga_quantity">
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
                                <!-- <th>DELETE</th>  -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                                $numRows = mysqli_num_rows($sql); 
                            
                                if($numRows > 0) {
                                    $i = 1;
                                    $L = "L"; 
                                    $C = "C"; 
                                    $W = "W"; 
                                    $R = "R"; 
                                    while($row = mysqli_fetch_assoc($sql)) {

                                    $value = 0;

                                    $masterName  = $row['masterName'];
                                    $main   = $row['main'];
                                    $subCategory = $row['subCategory'];
                                    $fabType = $row['fabType'];
                                    $coes = $row['coes'];
                                    $req_qty = $row['req_qty'];
                                    $waste = $row['waste'];
                                    $unit = $row['unit'];
                                    $unit_price = $row['unit_price'];
                                    $value =number_format(($unit_price* $req_qty), 2, '.', '');
                                    echo ' <tr>';
                                    echo ' <td>'.$i.' </td>';
                                    echo ' <td>'.$masterName.' </td>';
                                    echo ' <td>'.$main.' </td>';
                                    echo ' <td>'.$subCategory.' </td>';
                                    echo ' <td>'; 
                                     ?>
                                    <select class="form-control" style="width: 150px;" name="item"  >
                                        <option value="">Item</option>
                                        <?php
                                            $custom = "SELECT * FROM  Item";
                                            $result = mysqli_query($conn,$custom);
                                            $numRows = mysqli_num_rows($result); 
                            
                                            if($numRows > 0) {
                                                while($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value = ".$row['itemName'].">" . $row['itemName'] . "</option>";
                                                
                                                }
                                            }
                                        ?>
                                    </select>
                                    <?php
                                    echo '</td>';

                                    echo ' <td>'; 
                                     ?>
                                    <select class="form-control" style="width: 150px;" name="color" >
                                        <option value="">Color</option>
                                        <?php
                                            $custom = "SELECT * FROM  color";
                                            $result = mysqli_query($conn,$custom);
                                            $numRows = mysqli_num_rows($result); 
                            
                                            if($numRows > 0) {
                                                while($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value = ".$row['name'].">" . $row['name'] . "</option>";
                                                
                                                }
                                            }
                                        ?>
                                    </select>
                                    <?php
                                    echo '</td>';


                                    echo ' <td>'; 
                                     ?>
                                    <select class="form-control" style="width: 150px;" name="size" >
                                        <option value="">Size</option>
                                        <?php
                                            $custom = "SELECT * FROM  size";
                                            $result = mysqli_query($conn,$custom);
                                            $numRows = mysqli_num_rows($result); 
                            
                                            if($numRows > 0) {
                                                while($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value = ".$row['name'].">" . $row['name'] . "</option>";
                                                
                                                }
                                            }
                                        ?>
                                    </select>
                                    <?php
                                    echo '</td>';


                                    echo ' <td>'; 
                                     ?>
                                    <select class="form-control" style="width: 150px;" name="reference" >
                                        <option value="">Reference</option>
                                        <?php
                                            $custom = "SELECT * FROM  reference";
                                            $result = mysqli_query($conn,$custom);
                                            $numRows = mysqli_num_rows($result); 
                            
                                            if($numRows > 0) {
                                                while($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value = ".$row['name'].">" . $row['name'] . "</option>";
                                                
                                                }
                                            }
                                        ?>
                                    </select>
                                    <?php
                                    echo '</td>';


                                    echo ' <td>'; 
                                     ?>
                                    <select class="form-control" style="width: 150px;" name="dimension" >
                                        <option value="">Dimension</option>
                                        <?php
                                            $custom = "SELECT * FROM  dimension";
                                            $result = mysqli_query($conn,$custom);
                                            $numRows = mysqli_num_rows($result); 
                            
                                            if($numRows > 0) {
                                                while($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value = ".$row['name'].">" . $row['name'] . "</option>";
                                                
                                                }
                                            }
                                        ?>
                                    </select>
                                    <?php
                                    echo '</td>';
                                    echo ' <td>'.$unit.' </td>';
                                    echo ' <td>'.$fabType.' </td>';

                                    echo ' <td><input type="text"  class="form-control check1" value ='.$coes.' id='.$C.$i.'></td>';
                                    echo ' <td><input type="text"  class="form-control check2" style="width: 150px;" value ='.$waste.'  id='.$W.$i.' ></td>';
                                    echo ' <td><input type="text"  class="form-control check3" style="width: 150px;" value ="0" id='.$L.$i.'></td>';
                                    echo ' <td><input type="text"  class="form-control" value ='.$req_qty.' id='.$R.$i.'></></td>';
                                    echo ' <td><input type="text"  class="form-control" value ='.$unit_price.'></td>';
                                    echo ' <td>'.$value.' </td>';
                                    echo ' </tr>';
                                    $i++;
                                    }
                                }
                                ?>
                            </tbody>
                            </tbody>
                         </table>
                         <br>
                        <input type="hidden" class="form-control" id="add" name="add" />
                        <button type="button"  onclick="updateRow()"  class="btn btn-info btn-fw"  id="updateRowbtn" name="updateRowbtn" >SAVE</button>
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
  
    /////////////////////////////////////////////////// Form Submit Add  

    function FormAdd(){

        $.ajax({
            type: 'post',
            url: '../controller/bb_bom.php',
            data: $('#bom_form').serialize(),
            success: function (data) {

                if(data==0){

                    swal({
                        title: "Can't Duplication !",
                        text: "PO Number",
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
                    setTimeout(function(){ window.location.href = "bb_bom.php"; }, 2500);
                    }
            }
       });
    }
  
    ////////////// bpo_no get  ///////////////////////
    $("#po_number").on('change',function(){

      var bpo_no = $(this).val();
      if(bpo_no){     
        window.location.href = "bb_bom.php?view_id=" + bpo_no;
      }
    });

    ///////////// Main ///////////////////////
    $("#masterName").on('change',function(){

        var masterName = $(this).val();

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

    ///////////////  Add Row
    $(document).ready(function() {
        $('#example').dataTable();
        $('#addbtn').click(addrow);
    });

    function addrow() {

     var value = ($('#req_qty').val()*$('#unit_price').val()).toFixed(2); 

      $('#example').dataTable().fnAddData( [
          $('#masterName option:selected').text(),
          $('#main option:selected').text(),
          $('#subCategory option:selected').text(),
          $('#itemName option:selected').val(),
          $('#color option:selected').val(),
          $('#size option:selected').val(),
          $('#reference option:selected').val(),
          $('#dimension option:selected').val(),
          $('#unit option:selected').val(),
          $('#fabType option:selected').val(),
          $('#consumption').val(),
          $('#wastage').val(),
          $('#excess').val(),
          $('#req_qty').val(),
          $('#unit_price').val(),
          value,
          "<button class='btn-edit' id='DeleteButton'>Delete</button>" ] );

      $('#masterName').val("")
      $('#main').val("")
      $('#subCategory').val("")
      $('#itemName').val("")
      $('#color').val(0)
      $('#size').val(0)
      $('#reference').val("")
      $('#dimension').val("")
      $('#unit').val("")
      $('#fabType').val(0)
      $('#consumption').val(0)
      $('#wastage').val("")
      $('#excess').val("")
      $('#req_qty').val("")
      $('#unit_price').val("")
 
       reCalulate();
     
    }

    /////////// Calulate Row Count
    function reCalulate(){

      //need to add above af_sale, af_free, tot_pur, tot_sales text box values as hidden fields to the list view 
      //need to get sum of the tot_sales to bill_amt text box and sum of the tot_pur to pur_cost text box
      
      var array=[];
      var table = $("#example");

      table.find('tr:gt(0)').each(function (i) {

      var $tds = $(this).find('td'),
      masterName = $tds.eq(0).text();
      main = $tds.eq(1).text();
      subCategory = $tds.eq(2).text();
      itemName = $tds.eq(3).text();
      color = $tds.eq(4).text();
      size = $tds.eq(5).text();
      reference = $tds.eq(6).text();
      dimension = $tds.eq(7).text();
      unit = $tds.eq(8).text();
      fabType = $tds.eq(9).text();
      consumption = $tds.eq(10).text();
      wastage = $tds.eq(11).text();
      excess = $tds.eq(12).text();
      req_qty = $tds.eq(13).text();
      unit_price = $tds.eq(14).text();

      array.push({masterName:masterName,main:main,subCategory:subCategory,itemName:itemName,color:color,size:size,reference:reference,dimension:dimension,unit:unit,fabType:fabType,consumption:consumption,wastage:wastage,excess:excess,req_qty:req_qty,unit_price:unit_price});

      });

      console.log(JSON.stringify(array, null, 1));
      $('#myitemjson').val(JSON.stringify(array));

    }

    ////////////// wastage onchange ///////////////////////
    $("#wastage").on('keyup change', function (){
         if(wastage!=''){
          calculation();
        }     
    });

   ////////////// excess onchange ///////////////////////
    $("#excess").on('keyup change', function (){
         if(excess!=''){
          calculation();
        }     
    });

    ////////////// consumption onchange ///////////////////////
    $("#consumption").on('keyup change', function (){
         if(consumption!=''){
          calculation();
        }     
    });

    function calculation(){

       // Get Byer base Qty  -> req qty 
        var  ga_quantity  =  $('#ga_quantity').val();
        var excess  =  $('#excess').val();  
        var consumption  =  $('#consumption').val();  
        var wastage  =  $('#wastage').val(); 

        var cal =  ((ga_quantity*consumption)+(ga_quantity*wastage)+(ga_quantity*excess)).toFixed(2);
       
        $('#req_qty').val(cal); 
    }

    ////////////// check1 class change value get Total   ///////////////////////
    $('.check1').keyup(function(event){
        str = this.id.replace('C', "")
        total(str);
    });

    $('.check2').keyup(function(event){
        str = this.id.replace('W', "")
        total(str);
    });

    $('.check3').keyup(function(event){
        str = this.id.replace('L', "")
        total(str);
    });

    function total(id){

          // Get Byer base Qty  -> req qty 
        var  ga_quantity  =  $('#ga_quantity').val();
        var excess  =  $('#L'+id).val();  
        var consumption  =  $('#C'+id).val();  
        var wastage  =  $('#W'+id).val(); 
       
        var cal =  ((ga_quantity*consumption)+(ga_quantity*wastage)+(ga_quantity*excess)).toFixed(2);

        $('#R'+id).val(""); 
        $('#R'+id).val(cal); 
    }


    //inline edit- unit price and min level
   function updateRow() {

       var updateRowbtn =document.getElementById('updateRowbtn').name;
  
        var array=[];
       
        var table = $("#costing_bom_table");

        table.find('tr:gt(0)').each(function (i) {
    
        var $tds = $(this).find('td'),
        masterName = $tds.eq(1).text();
        main = $tds.eq(2).text();
        subCategory = $tds.eq(3).text();
        itemName = $tds.eq(4).find("select").val();
        color = $tds.eq(5).find("select").val();
        size = $tds.eq(6).find("select").val();
        reference = $tds.eq(7).find("select").val();
        dimension = $tds.eq(8).find("select").val();
        unit = $tds.eq(9).text();
        fabType = $tds.eq(10).text();
        consumption = $tds.eq(11).find("input").val();
        wastage = $tds.eq(12).find("input").val();
        excess = $tds.eq(13).find("input").val();
        req_qty = $tds.eq(14).find("input").val();
        unit_price = $tds.eq(15).find("input").val();

        array.push({masterName:masterName,main:main,subCategory:subCategory,itemName:itemName,color:color,size:size,reference:reference,dimension:dimension,unit:unit,fabType:fabType,consumption:consumption,wastage:wastage,excess:excess,req_qty:req_qty,unit_price:unit_price});


        });
       // console.log(JSON.stringify(array, null, 1));
        $('#myitemjson1').val(JSON.stringify(array));

        FormAdd();

    }

  </script>