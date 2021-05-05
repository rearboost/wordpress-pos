
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
                                <label class="col-sm-3 col-form-label">Choose Product</label>
                                    <div class="col-sm-6">
                                      <input list="brow" class="form-control" required>
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
                                    <div class="col-sm-3 size">
                                        <i class="fa fa-plus-circle pointer" onclick="AddPro()"></i>   
                                    </div>
                                </div>
                            </div>
                        </div>  <!--end first row-->             
                        </form>

                        <div class="row">
	                        <div class="col-md-12">
		                        <div class="table-responsive">          
	                          	<table id="example" class="table table-bordered">
	                            <thead>
	                              <tr>
	                                <th> # </th>
	                                <th>Product</th>
	                                <th>QTY</th>
	                                <th>Price</th>
	                                <th>Amount</th>
	                                <th></th>
	                              </tr>
	                            </thead>
	                            <tbody>
	                              <?php
	                                
	                              ?>
	                            </tbody>
	                          	</table>
		                        </div>
	                        </div>
                        </div><!-- end 2nd row-->

                        <br><br>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Gross</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" name ="gross"  placeholder="0.00" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Payment</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" name ="payment"  placeholder="0.00" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-4 col-form-label">#</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" name ="invoice_no"  placeholder="xx" required/>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end 3rd row-->

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Discount</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" name ="discount"  placeholder="0.00" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Due</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" name ="due"  placeholder="0.00" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
	                            <input type="hidden" class="form-control" name="save" value="save" />
	                          	<button type="submit" class="btn btn-primary" style="width:59%">SAVE</button>
	                            <input type="hidden" class="form-control" name="new" value="new" />
	                          	<button type="submit" class="btn btn-primary" style="width:39%">NEW</button>
                            </div>
                        </div><!-- end 4th row-->

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Total</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" name="total"  placeholder="0.00" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Date</label>
                                    <div class="col-sm-8">
                                      <input type="date" class="form-control" name="date" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
	                            <input type="hidden" class="form-control" name="print" value="print" />
	                          	<button type="submit" class="btn btn-primary" style="width:59%">PRINT</button>
	                            <input type="hidden" class="form-control" name="close" value="close" />
	                          	<button type="submit" class="btn btn-primary" style="width:39%">CLOSE</button>
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
                      			<div class="row" style="margin-bottom: 5px;">
	                    			<div class="card" style="padding: 15px 5px 5px 5px;border-radius: 15px;">
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
  
    /////////////////////////////////////////////////// Form Submit Add  

    $(function () {

        $('#requestAdd').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '../controller/request_controller.php',
            data: $('#requestAdd').serialize(),
            success: function (data) {

              alert(data)

                if(data==0){

                    swal({
                      title: "Can't Duplication !",
                      text: "Request",
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

    function editForm(id){
        window.location.href = "request.php?view_id=" + id;
        //window.location.href = "request.php";
    }

    function cancelForm(){

        window.location.href = "request.php";
    }

    function customerForm(){
        $('#myModal').modal('show');
    }

    /////////////////////////////////////////////////// Form Submit Add  

    $(function () {

        $('#customerAdd').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '../controller/customer_controller.php',
            data: $('#customerAdd').serialize(),
            success: function (data) {
                  if(data==0){

                    swal({
                      title: "Can't Duplication !",
                      text: "Customer",
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


    ///////////// delete jobs ///////////////////////////
    function confirmation(e,id) {
        var answer = confirm("Are you sure, you want to permanently delete this record?")
      if (!answer){
        e.preventDefault();
        return false;
      }else{
        myFunDelete(id)
      }
    }

    function myFunDelete(id){

      $.ajax({
            url:"../controller/request_controller.php",
            method:"POST",
            data:{removeID:id},
            success:function(data){
                swal({
                title: "Good job !",
                text: "Successfully Removerd",
                icon: "success",
                button: "Ok !",
                });
                setTimeout(function(){ location.reload(); }, 2500);
                window.location.href = "request.php";
            }
      });
    }

     /////////////////////////////////////////////////////////////////


  </script>


 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          <h4 class="modal-title">Customer</h4>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-body">
            <h4 class="card-title">Customer Register</h4>
            <!-- <p class="card-description"> Basic form elements </p> -->
            <form class="forms-sample" id="customerAdd">
                <div class="form-group">
                <label for="exampleInputName1">Name</label>
                <input type="text" class="form-control" name="name" placeholder="customer name here.." required>
                </div>
                <div class="form-group">
                <label for="exampleTextarea1">Address</label>
                <textarea class="form-control" name="address" rows="2" placeholder="customer address here.."></textarea>
                </div>
                <div class="form-group">
                <label for="exampleInputName1">Contact</label>
                <input type="text" class="form-control" name="contact" placeholder="+94 00-0000-000" required>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail3">Email</label>
                <input type="email" class="form-control" name="email" placeholder="sample@gmail.com" required>
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



