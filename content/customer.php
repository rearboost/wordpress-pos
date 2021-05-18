<!DOCTYPE html>
<html lang="en">
  <?php
    // Database Connection
    require '../include/config.php';
    
    // Get Update Form Data
    if(isset($_GET['edit_id'])){

        $edit_id = $_GET['edit_id'];
        $sql=mysqli_query($conn,"SELECT * FROM customer WHERE id='$edit_id'");  
        $numRows = mysqli_num_rows($sql); 
        if($numRows > 0) {
          while($row = mysqli_fetch_assoc($sql)) {
            $edit_name  = $row['name'];
            $edit_address   = $row['address'];
            $edit_contact = $row['contact'];
            $edit_email = $row['email'];
          }
        }
    }

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
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
              <div class="col-12">
                <div class="page-header">
                  <h4 class="page-title">Dashboard</h4>
                  <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                    <ul class="quick-links">
                      <li><a href="#"> | CUSTOMER</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- Page Title Header Ends-->
           <div class="col-6 stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Customer Info</h4>
                        <form class="forms-sample" id="customerForm">
                          <div class="form-group">
                          <label for="exampleInputName">Name</label>
                              <input type="text" class="form-control" value="<?php if(isset($_GET['edit_id'])){ echo $edit_name;} ?>" name="name" placeholder="customer name here.." required>
                          </div>

                          <div class="form-group">
                          <label for="exampleInputAddress">Address</label>
                              <input type="text" class="form-control" value="<?php if(isset($_GET['edit_id'])){ echo $edit_address;} ?>" name="address" placeholder="customer address here.." required>
                          </div>

                          <div class="form-group">
                          <label for="exampleInputContact">Contact</label>
                              <input type="number" class="form-control" name="contact" value="<?php if(isset($_GET['edit_id'])){ echo $edit_contact;} ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "9" placeholder="Ex: 771234567" required>
                          </div>

                          <div class="form-group">
                          <label for="exampleInputEmail">Email</label>
                              <input type="email" class="form-control" value="<?php if(isset($_GET['edit_id'])){ echo $edit_email;} ?>" name="email" placeholder="sample@gmail.com" required>
                          </div>

                           <?php if (isset($_GET['edit_id'])): ?>
                              <input type="hidden" class="form-control" name="edit_id" value="<?php if(isset($_GET['edit_id'])){ echo $edit_id;} ?>" />
                              <input type="hidden" class="form-control" name="update" value="update" />
                              <button type="submit" class="btn btn-info btn-fw">Update</button>
                              <button type="button" onclick="cancelForm()" class="btn btn-primary btn-fw">Cancel</button>
                          <?php else: ?>
                              <input type="hidden" class="form-control" name="add" value="add" />
                              <button type="submit" class="btn btn-success mr-2">Save</button>
                          <?php endif ?>
                          <!-- <button class="btn btn-light">Cancel</button> -->
                      </form>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Customer Data</h4>
                     
                    <div class="table-responsive">         
                    <table class="table table-bordered" id="myTable">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th>Customer name </th>
                          <th>Address </th>
                          <th>Contact </th>
                          <th>Email </th>
                          <th>Edit</th>
                          <!-- <th>SMS</th> -->
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sql=mysqli_query($conn,"SELECT * FROM customer");
                          
                          $numRows = mysqli_num_rows($sql); 
                    
                          if($numRows > 0) {
                            $i = 1;
                            while($row = mysqli_fetch_assoc($sql)) {

                              $name    = $row['name'];
                              $address = $row['address'];
                              $contact = $row['contact'];
                              $email   = $row['email'];

                              echo ' <tr>';
                              echo ' <td>'.$i.' </td>';
                              echo ' <td>'.$name.' </td>';
                              echo ' <td>'.$address.' </td>';
                              echo ' <td>'.$contact.' </td>';
                              echo ' <td>'.$email.' </td>';
                              echo '<td class="td-center"><button type="button" onclick="editForm('.$row["id"].')" class="btn btn-info btn-fw">Edit</button></td>';

                              //echo '<td class="td-center"><button type="button" id="'.$row["id"].'" name="'.$row["id"].'" class="btn btn-primary btn-fw view_data" data-toggle="modal" data-target="#myModal" >Send SMS</button></td>';

                              echo '<td class="td-center"><button type="button" onclick="confirmation(event,'.$row["id"].')" class="btn btn-secondary btn-fw">Delete</button></td>';
                              echo ' </tr>';
                              $i++;
                            }
                          }
                        ?>
                      </tbody>
                    </table>
                    </div>
                  </div>
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
    $(document).ready( function () {
      $('#myTable').DataTable();
    });
  
    /////////////////////////////////////////////////// Form Submit Add  

    $(function () {

        $('#customerForm').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '../controller/customer_controller.php',
            data: $('#customerForm').serialize(),
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
                    //window.location.href = "customer.php";
                    
                  }
               }
          });

        });

      });

   /////////////////////////////////////////////////// Form Submit Add  

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
            url:"../controller/customer_controller.php",
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
                window.location.href = "customer.php";
            }
      });
    }

    function editForm(id){
        window.location.href = "customer.php?edit_id=" + id;
    }

    function cancelForm(){
        window.location.href = "customer.php";
    }

    /////// Message Form ////////////

    $(document).on('click', '.view_data', function(){

    var view_id = $(this).attr("name");

    $.ajax({
         url:"../controller/customer_controller.php",
         method:"POST",
         data:{view_id:view_id},
         success:function(data){
           //alert(data)

           var data =JSON.parse(data);

           $('#id').val(data['id']);
           $('#name').val(data['name']);
           $('#contact').val(data['contact']);
         }
      });
    });


    //// submitting sms /////
    $(function () {

        $('#msgForm').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '../controller/customer_controller.php',
            data: $('#msgForm').serialize(),
            success: function (data) {
                    swal({
                    title: "Good job !",
                    text: "Successfully Send",
                    icon: "success",
                    button: "Ok !",
                    });
                    setTimeout(function(){ location.reload(); }, 2500);
                                      
               }
          });
        });
      });

  </script>


   <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Message Form</h4>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-body">
            <h4 class="card-title">Send SMS</h4>
            <form class="forms-sample" id="msgForm">
                <input type="hidden" class="form-control" name="id" id="id">

                <div class="form-group row">
                <label class="col-sm-2 col-form-label">To</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="contact" id="contact">
                </div>
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" name="name" id="name">
                </div>
                </div>

                <div class="form-group">
                <label for="exampleInputName1">Message</label>
                <textarea class="form-control" name="msg" placeholder="Text in here.." rows="6"  required></textarea>
                </div>
                <input type="hidden" class="form-control" name="send" value="send" />
                <button type="submit" class="btn btn-success mr-2">Submit</button>
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