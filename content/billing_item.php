
<?php
include('../include/config.php');
?>
<!DOCTYPE html>
<html lang="en">

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
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
              <div class="col-12">
                <div class="page-header">
                  <h4 class="page-title">Dashboard</h4>
                  <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                    <ul class="quick-links">
                      <li><a href="#"> POS</a></li>
                      <li><a href="#"> BILLING ITEMS</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- Page Title Header Ends-->
              <div class="row">
                <div class="col-lg-9 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                     <h1><strong>POS</strong></h1>
                      <form class="form-sample" id="productAdd">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                   <label class="col-sm-2 col-form-label">Choose Product</label>
                                    <div class="col-sm-4">
                                      <input list="brow" class="form-control" id="product_name" required>
                                      <datalist id="brow">
                                        <?php
                                            $product = "SELECT A.ID as id, A.post_title as post_title FROM wp_posts A INNER JOIN wp_wc_product_meta_lookup B ON A.ID=B.product_id";
                                            $result = mysqli_query($conn,$product);
                                            $numRows = mysqli_num_rows($result); 
                            
                                            if($numRows > 0) {
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    echo '<option value ="'.$row["post_title"].'">';
                                                }
                                            }
                                        ?>
                                      </datalist>  
                                    </div>
                                    <label class="col-sm-1 col-form-label">QTY</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Enter Quantity" required>
                                    </div>
                                    <div class="col-sm-3 size">
                                        <i class="fa fa-plus-circle pointer" onclick="AddPro()"></i>   
                                    </div>
                                </div>
                            </div>
                        </div>  <!--end first row-->             
                        </form>

                        <div class="row">
	                        <div class="col-md-12" style="height: 240px; overflow-y: auto;">
                           <div id="here">
                              <div class="table-responsive">          
                                <table id="example" class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>Product</th>
                                    <th>QTY</th>
                                    <th>Price</th>
                                    <th>Amount</th>
                                    <th>DELETE</th>  
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql=mysqli_query($conn,"SELECT * FROM temp_pos");
                                    
                                      $numRows = mysqli_num_rows($sql); 
                                
                                      if($numRows > 0) {

                                        $total_amt = 0;
                                        
                                        while($row = mysqli_fetch_assoc($sql)) {

                                          $product = $row['product'];
                                          $qty  = $row['qty'];
                                          $price   = $row['price'];
                                          $amount   = $row['amount'];
                                          $id   = $row['id'];
                                          echo ' <tr>';
                                          echo ' <td>'.$product.' </td>';
                                          echo ' <td>'.$qty.' </td>';
                                          echo ' <td>'.$price.' </td>';
                                          echo ' <td>'.$amount.' </td>';
                                          echo '<td class="td-center"><button class="btn-edit" id="DeleteButton" onclick="removeForm('.$id.')">Delete</button></td>';
                                          echo ' </tr>';
                                           $total_amt = $total_amt + $amount;

                                        }
                                      }
                                    ?>
                                </tbody>
                                </table>
                              </div>
                           </div>
	                        </div>
                        </div><!-- end 2nd row-->

                        <br><br>

                        <div class="row">
                            <div class="col-md-4" >
                                <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Gross</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" name="gross" id="gross" placeholder="0.00" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Payment</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" name ="payment" id="payment" onkeyup="paymentFun()"  placeholder="0.00" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                <?php

                                  $sql ="SELECT id FROM invoice ORDER BY id DESC LIMIT 1";
                                  $result=mysqli_query($conn,$sql);
                                  $row_get = mysqli_fetch_assoc($result);
                                  $count =mysqli_num_rows($result);

                                  if($count==0){
                                    $nextID = 1;
                                  }else{
                                    $nextID =$row_get['id']+1;
                                  }

                                ?>
                                <input type="hidden" id="inv_id" value="<?php echo $nextID ?>">
                                <b><label class="col-sm-12 col-form-label">Invoice No - <?php echo sprintf('%05d', $nextID); ?></label></b>
                                    <!-- <div class="col-sm-8">
                                      <input type="text" class="form-control" name ="invoice_no"  value=""/>
                                    </div> -->
                                </div>
                            </div>
                        </div><!-- end 3rd row-->

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Discount</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" name ="discount" id="discount" onkeyup="myFunction()"  placeholder="0.00" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Due</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" name ="due" id="due"  placeholder="0.00" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
	                          	<button type="submit" onclick="saveForm()" class="btn btn-primary" style="width:59%">SAVE</button>
	                          	<button type="button" onclick="cancelForm()" class="btn btn-primary" style="width:39%">NEW</button>
                            </div>
                        </div><!-- end 4th row-->

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Total</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" style="font-weight: 600;" name="total" id="total"  placeholder="0.00" readonly/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Date</label>
                                    <div class="col-sm-8">
                                      <input type="date" class="form-control" name="date" id="date" value="<?php echo date("Y-m-d"); ?>"  required/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
	                          	<button type="button"  onclick="printForm()" class="btn btn-primary" style="width:59%">PRINT</button>
	                          	<button type="button" onclick="cancelForm()" class="btn btn-primary" style="width:39%">CLOSE</button>
                            </div>
                        </div><!-- end 5th row-->
                  
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 grid-margin stretch-card">
                  <div class="card" style="padding:0px;width: 100%;height: 600px;overflow-x: hidden;overflow-y: auto; text-align: center;">
                    <div class="card-body">
                    	<div class="card-scroll" style="">
                    		<?php
                    		$items= mysqli_query($conn,"SELECT * FROM wp_posts A INNER JOIN wp_wc_product_meta_lookup B ON A.ID=B.product_id");
                    		$numRows = mysqli_num_rows($items); 
                    
                          	if($numRows > 0) {
                          		while($row = mysqli_fetch_assoc($items)) {

                          	?>
                            <div class="row pointer prod_name" style="margin-bottom: 5px;" id="<?php echo $row['post_title']?>">
                              <div class="card" style="padding: 15px 5px 5px 5px;border-radius: 15px; width: 600px;">
                                <h5><strong><?php echo $row['post_title']; ?></strong></h5>
                                <p>Price: <strong><?php echo number_format($row['min_price'],2,'.',','); ?> - <?php echo number_format($row['max_price'],2,'.',','); ?></strong><br>
                                Status: 
                                <?php
                                $stock_status = $row['stock_status'];
                                  if($stock_status=="instock"){
                                      echo '<label class="badge badge-success">'."In stock".'</label>';
                                    }else if($stock_status=="onbackorder"){
                                      echo '<label class="badge badge-warning">'."On back order".'</label>';
                                    }else if($stock_status=="outofstock"){
                                      echo '<label class="badge badge-danger">'."Out of stock".'</label>';
                                    }else{
                                      echo '<label class="badge badge-primary">'.$stock_quantity.'</label>';
                                    }
                                ?></p>
                              </div>
                            </div>

		                    <?php
                          		}
                          	}
                    		?>
                    		
                    	</div>
                    </div>
                  </div>
                </div>
              </div> <!-- END MAIN ROW-->

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

    var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;

    $(document).ready(function() {

        tmpEmpty();
    });

    //Discount On Change
    function myFunction(){

        var gross= $('#gross').val();
        var discount= $('#discount').val();

        if(numberRegex.test(discount)){

          var total = (Number(gross) - Number(discount)).toFixed(2)
          $('#total').val(total);

        }else{

          if(discount!=''){
              swal({
              title: "Discount must be Number !",
              text: "Validation",
              icon: "error",
              button: "Ok !",
              });
              $('#discount').val('');
          }
        }
    }

    function paymentFun(){

        var total= $('#total').val();
        var payment= $('#payment').val();
        
        if(numberRegex.test(payment)){

          var due = (Number(payment) - Number(total)).toFixed(2)
          $('#due').val(due);

        }else{

          if(payment!=''){
              swal({
              title: "Payment must be Number !",
              text: "Validation",
              icon: "error",
              button: "Ok !",
              });
              $('#payment').val('');
          }
        }

    }

    // Data add to the Temp POS table                      
    function AddPro(){

      var addrow  ="addrow";

      var product_name= $('#product_name').val();
      var quantity= $('#quantity').val();

      if(product_name!='' && quantity !='' && numberRegex.test(quantity)){

       $.ajax({
            type: 'post',
            url: '../controller/billing_controller.php',
            data: {addrow:addrow,product_name:product_name,quantity:quantity},
            success: function (data) {

                if(data==2){

                   swal({
                      title: "Stock is Empty !",
                      text: "Empty",
                      icon: "error",
                      button: "Ok !",
                    });

                }else{

                    $('#product_name').val("")
                    $('#quantity').val("")

                    $( "#here" ).load(window.location.href + " #here" );
                    $("#gross").val(data);
                    $("#total").val(data);
                }            
              } 
        });     
      }
    }

    $(".prod_name").click(function() {

      var addrow  ="addrow";

       $.ajax({
            type: 'post',
            url: '../controller/billing_controller.php',
            data: {addrow:addrow,product_name:this.id,quantity:1},
            success: function (data) {

                if(data==2){

                   swal({
                      title: "Stock is Empty !",
                      text: "Empty",
                      icon: "error",
                      button: "Ok !",
                    });

                }else{
                    $( "#here" ).load(window.location.href + " #here" );
                    $("#gross").val(data);
                    $("#total").val(data);
                    
                }
              } 
        });     
    });

    ///////////////////////////////////

    function tmpEmpty() {

      var tmpEmpty  ="tmpEmpty";

        $.ajax({
            type: 'post',
            url: '../controller/billing_controller.php',
            data: {tmpEmpty:tmpEmpty},
            success: function (data) {

                 $( "#here" ).load(window.location.href + " #here" );
              } 
        });
    }

     /////////// Remove the Row 
    function removeForm(id){

        var removeRow  ="removeRow";

         $.ajax({
            type: 'post',
            url: '../controller/billing_controller.php',
            data: {removeRow:removeRow,id:id},
            success: function (data) {
                $( "#here" ).load(window.location.href + " #here" );
                $("#gross").val(data);
                $("#total").val(data)
              } 
        });
    }

    /////////////////////////////////////////////////// Form Submit Add  

    function saveForm(){

        var save  ="save";
    
        var total= $('#total').val();
        var discount= $('#discount').val();
        var payment= $('#payment').val();
        var date= $('#date').val();

        if(payment!='' && numberRegex.test(payment)){

            $.ajax({
                type: 'post',
                url: '../controller/billing_controller.php',
                data: {save:save,total:total,discount:discount,payment:payment,date:date},
                success: function (data) {

                    swal({
                    title: "Good job !",
                    text: "Successfully Submited",
                    icon: "success",
                    button: "Ok !",
                    });
                    setTimeout(function(){ location.reload(); }, 2500);
                } 
            });  
        }
    }

     function printForm(){

        var save  ="save";
    
        var total= $('#total').val();
        var discount= $('#discount').val();
        var payment= $('#payment').val();
        var date= $('#date').val();
        var inv_id= $('#inv_id').val();

        if(payment!='' && numberRegex.test(payment)){

            $.ajax({
                type: 'post',
                url: '../controller/billing_controller.php',
                data: {save:save,total:total,discount:discount,payment:payment,date:date},
                success: function (data) {

                    setTimeout(function(){window.open('print?id='+inv_id, '_blank'); }, 100);

                    setTimeout(function(){ location.reload(); }, 2500);

                } 
            });  
        }
    }

    function cancelForm(){

        window.location.href = "billing_item.php";
    }
     /////////////////////////////////////////////////////////////////

  </script>



