<!DOCTYPE html>
<html lang="en">
  <?php
    // Database Connection
    require '../include/config.php';

  ?>
  <!-- include head code here -->
   <?php  include('../include/head.php');   ?>

   <link rel="stylesheet" href="../assets/css/jquery.dataTables.css">

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
                      <li><a href="#"> | INVOICE</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Invoice Data</h4>
                     
                    <div class="table-responsive">         
                    <table class="table table-bordered" id="myTable">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th>Invoice No </th>
                          <th>Bill Total</th>
                          <th>Payment </th>
                          <th>Date</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sql=mysqli_query($conn,"SELECT * FROM invoice ORDER BY id DESC");
                          
                          $numRows = mysqli_num_rows($sql); 
                    
                          if($numRows > 0) {
                            $i = 1;
                            while($row = mysqli_fetch_assoc($sql)) {

                              $id    = sprintf('%05d', $row['id']);
                              $total = number_format($row['total'],2,'.',',');
                              $date = $row['date'];  
                              $payment   =  number_format($row['payment'],2,'.',',');
                              echo ' <tr>';
                              echo ' <td>'.$i.' </td>';
                              echo ' <td>'.$id.' </td>';
                              echo ' <td>'.$total.' </td>';
                              echo ' <td>'.$payment.' </td>';
                              echo ' <td>'.$date.' </td>';
                              echo '<td class="td-center"><button type="button" onclick="printForm('.$id.')" class="btn btn-info btn-fw">Print</button></td>';
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

    function printForm(id){

       setTimeout(function(){window.open('print?id='+id, '_blank'); }, 100);

       setTimeout(function(){ location.reload(); }, 2500);
    }

  </script>
