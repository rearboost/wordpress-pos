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
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
              <div class="col-12">
                <div class="page-header">
                  <h4 class="page-title">Dashboard</h4>
                  <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                    <ul class="quick-links">
                      <li><a href="#"> | REPORT</a></li>
                      <li><a href="#"> | MONTHLY INCOME REPORT</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- Page Title Header Ends-->
            <div class="col-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Profit Report</h4>
                    <!-- <p class="card-description"> Horizontal form layout </p> -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Year</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="year" id="year" required>
                                            <option value="" Selected>--Select Year--</option>
                                            <?php
                                                $year = "SELECT DISTINCT(year) as year FROM summary ORDER BY year DESC";
                                                $result = mysqli_query($conn,$year);
                                                $numRows = mysqli_num_rows($result); 
                                
                                                if($numRows > 0) {
                                                while($row = mysqli_fetch_assoc($result)) {
                                                  echo '<option value ="'.$row["year"].'">' . $row["year"] . '</option>';
                                                    
                                                }
                                                }
                                            ?>
                                        </select>
                                    </div>   
                                </div>
                                <button type="button" onclick="cancelForm()" class="btn btn-warning btn-fw">Cancel</button>                        
                            </div>
                        </div>
                  </div>
                </div>
            </div>
            <br>

            <?php if (isset($_GET['view_id'])): ?>
            
            <form class="forms-sample" id="profit_form">

                <input type="hidden" value ='<?php echo $_GET['view_id']; ?>' name="year">

                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                        <center><b><h5>Year - <?php echo $_GET['view_id']; ?></h5></b></center>
                        <br>
                    
                    
                        <div class="row">
                    
                        <?php 

                          $year = $_GET['view_id'];

                          $sql=mysqli_query($conn,"SELECT * FROM summary WHERE year='$year' ORDER BY month ASC"); 
                    
                        ?>

                       <!-- <h4 class="card-title">Materials</h4> -->
                        <div class="table-responsive">
                            <div id="printablediv">
                            <table class="table table-bordered" id="costing_bom_table">
                                <thead>
                                    <tr>
                                    <th style="display:none;"> # </th>
                                    <th>Month</th>
                                    <th>Income</th>
                                    <th>Purchase</th>
                                    <th>Gross Profit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                    $numRows = mysqli_num_rows($sql); 
                                
                                    if($numRows > 0) {
                                        $i = 1;

                                        while($row = mysqli_fetch_assoc($sql)) {

                                        $month  = $row['month'];

                                        if($month=='01'){
                                          $month_text = 'January';
                                        }else if($month=='02'){
                                          $month_text = 'February';
                                        }else if($month=='03'){
                                          $month_text = 'March';
                                        }else if($month=='04'){
                                          $month_text = 'April';
                                        }else if($month=='05'){
                                          $month_text = 'May';
                                        }else if($month=='06'){
                                          $month_text = 'June';
                                        }else if($month=='07'){
                                          $month_text = 'July';
                                        }else if($month=='08'){
                                          $month_text = 'August';
                                        }else if($month=='09'){
                                          $month_text = 'September';
                                        }else if($month=='10'){
                                          $month_text = 'Octomber';
                                        }else if($month=='11'){
                                          $month_text = 'November';
                                        }else if($month=='12'){
                                          $month_text = 'Descember';
                                        }  

                                        $income   = $row['income'];
                                        $outgoing = $row['outgoing'];

                                        $profit = $income-$outgoing;

                                        echo ' <tr>';
                                        echo ' <td style="display:none;">'.$i.' </td>';
                                        echo ' <td>'.$month_text.' </td>';
                                        echo ' <td>'.number_format($income,2,'.',',').' </td>';
                                        echo ' <td>'.number_format($outgoing,2,'.',',').' </td>';
                                        echo ' <td>'.number_format($profit,2,'.',',').' </td>';
                                        echo ' </tr>';
                                        $i++;
                                        }
                                    }
                                    ?>
                                </tbody>
                                </tbody>
                            </table>
                            </div>
                            <br>
                             
                            <button type="button"  onclick="javascript:printDiv('printablediv');" class="btn btn-info btn-fw" >PRINT</button>                          
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
   
    ////////////// bpo_no get  ///////////////////////
    $("#year").on('change',function(){

      var year = $(this).val();
      if(year){     
        window.location.href = "monthly_report.php?view_id=" + year;
      }
    });

    function cancelForm(){

        window.location.href = "monthly_report.php";
    }

    function printDiv(divID)
    {
     
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;

        //Reset the page's HTML with div's HTML only
        document.body.innerHTML =
            "<html><head><title></title></head><body>" +
            divElements + "</body>";

        //Print Page
        window.print();

        //Restore orignal HTML
        document.body.innerHTML = oldPage;

    }


  </script>