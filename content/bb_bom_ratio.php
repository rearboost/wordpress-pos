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
            
            <form class="forms-sample" id="bom_ratio_form">
                 <input type="hidden" value ='<?php echo $_GET['view_id']; ?>' name="po_number">
                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                        <center><b><h5>PO Number - <?php echo $_GET['view_id']; ?></h5></b></center>
                        <br>
                        <div class="row">

                        <?php 

                          $poNo = $_GET['view_id'];
                          $sql_buyerName=mysqli_query($conn,"SELECT * FROM po_entering WHERE po_number='$poNo'");
                          $row_buyerName= mysqli_fetch_assoc($sql_buyerName);
                          $buyerName = $row_buyerName['buyerName'];

                          $sql_sizes=mysqli_query($conn,"SELECT * FROM wise_sizes WHERE buyerName='$buyerName'" );
                          $numRows = mysqli_num_rows($sql_sizes); 
                    
                        ?>


                    <div style="overflow-x:auto;">
                      <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Garment Color</th>
                           <?php
                             while($row_sizes = mysqli_fetch_assoc($sql_sizes)) {
                                 echo '<th>'.$row_sizes['size'].'</th>';
                             }
                           ?>
                          <th>HIT</th>
                          <th>ITEM</th>
                          <th>Ship Data</th>
                          <th style="width: 150px;">Pack Type</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        
                          if($numRows > 0) {
                           
                              echo ' <tr>';
                              echo 
                            ' <td>';
                              ?>
                                <select class="form-control" name="color1" required>
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
                                $T = "T";
                                for($i=1;$i<=$numRows; $i++) {
                                    echo ' <td><input type="text" class="form-control check1" id='.$T.$i.' name="select1[]" value="0" /></td>';
                                }
                              echo ' <td><input type="text" class="form-control" name="hit1" id="hit1" placeholder ="Enter HIT"/></td>';
                              echo ' <td><input type="text" class="form-control" name="item1" id="item1" placeholder ="Enter ITEM"/></td>';
                              echo ' <td><input type="text" class="form-control" name="ship_data1" placeholder ="Enter Ship Data"/></td>';
                              echo 
                              '<td style="width: 150px;">
                                  <select class="form-control" name="pack_type1" id="pack_type1">
                                        <option selected="" disabled="">Pack Type</option>
                                        <option value="GOH">GOH</option>
                                        <option value="CARTON">CARTON</option>
                                        <option value="GOHF">GOHF</option>
                                    </select>
                              </td>';
                    
                              echo ' <td><input type="text" class="form-control" name="total1" id="total1" value="0" readonly/></td>';
                             
                              echo ' </tr>';


                              echo ' <tr>';
                              echo 
                            ' <td>';
                              ?>

                                <select class="form-control" name="color2" >
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
                              $L = "L"; 
                                for($i=1;$i<=$numRows; $i++) {
                                    echo ' <td><input type="text" class="form-control check2" id='.$L.$i.'  name="select2[]" value="0" /></td>';
                                }
                              echo ' <td><input type="text" class="form-control" name="hit2" id="hit2" placeholder ="Enter HIT"/></td>';
                              echo ' <td><input type="text" class="form-control" name="item2" id="item2" placeholder ="Enter ITEM"/></td>';
                              echo ' <td><input type="text" class="form-control" name="ship_data2" placeholder ="Enter Ship Data"/></td>';
                              echo 
                              '<td style="width: 150px;">
                                  <select class="form-control" name="pack_type2" id="pack_type2">
                                        <option selected="" disabled="">Pack Type</option>
                                        <option value="GOH">GOH</option>
                                        <option value="CARTON">CARTON</option>
                                        <option value="GOHF">GOHF</option>
                                    </select>
                              </td>';
                    
                              echo ' <td><input type="text" class="form-control" name="total2" id="total2" value="0" readonly/></td>';
                             
                              echo ' </tr>';
                          }
                        ?>
                      </tbody>
                     </table>
                     <br>
                     <input type="hidden" class="form-control" id="add" name="add" />
                     <button type="submit" class="btn btn-info btn-fw" name="btn_add" >SAVE</button>
                     </div>    
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

     $(function () {

        $('#bom_ratio_form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '../controller/bb_bom_ratio.php',
            data: $('#bom_ratio_form').serialize(),
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
                    setTimeout(function(){ window.location.href = "bb_bom_ratio.php"; }, 2500);
                  }
            }
          });
        });
    });

 

    ////////////// check1 class change value get Total   ///////////////////////
    $('.check1').keyup(function(event){
        total1()
    });

    $('.check2').keyup(function(event){
        total2()
    });

    function total1(){
        var count = '<?php echo $numRows ; ?>';
        var total1 =0 ;
        for(var i =1;i<=count;i++){
            total1 = total1 + Number($('#T'+i).val())
        }
        $('#total1').val(total1)
    }

    function total2(){
        var count = '<?php echo $numRows ; ?>';
        var total2 =0 ;
        for(var i =1;i<=count;i++){
            total2 = total2 + Number($('#L'+i).val())
        }
        $('#total2').val(total2)
    }

    ////////////// bpo_no get  ///////////////////////
    $("#po_number").on('change',function(){

      var bpo_no = $(this).val();
      if(bpo_no){     
        window.location.href = "bb_bom_ratio.php?view_id=" + bpo_no;
      }
    });

   ////////////// hit2 onchange ///////////////////////
    $("#hit2").on('keyup change', function (){
         var hit2 = $(this).val();
         if(hit2!=''){
          $("#item2").prop( "disabled", true )
        }else{
          $("#item2").prop( "disabled", false )
        }     
    });

   ////////////// item2 onchange ///////////////////////
    $("#item2").on('keyup change', function (){
         var item2 = $(this).val();
         if(item2!=''){
          $("#hit2").prop( "disabled", true )
        }else{
          $("#hit2").prop( "disabled", false )
        }      
    });


   ////////////// hit1 onchange ///////////////////////
    $("#hit1").on('keyup change', function (){
          var hit1 = $(this).val();
         if(hit1!=''){
          $("#item1").prop( "disabled", true )
        }else{
          $("#item1").prop( "disabled", false )
        }       
    });


   ////////////// item1 onchange ///////////////////////
    $("#item1").on('keyup change', function (){
         var item1 = $(this).val();
         if(item1!=''){
          $("#hit1").prop( "disabled", true )
        }else{
          $("#hit1").prop( "disabled", false )
        }     
    });

    ////////////// hit2 onchange ///////////////////////
    $("#hit2").on('keyup change', function (){
         var hit2 = $(this).val();
         if(hit2!=''){
          $("#item2").prop( "disabled", true )
        }else{
          $("#item2").prop( "disabled", false )
        }     
    });

  </script>