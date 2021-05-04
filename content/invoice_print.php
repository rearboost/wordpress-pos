<?php
require '../include/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<?php  include('../include/head.php');   ?>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">

          <?php

          $id = $_GET['id']; // get id through query string

          // $qry = mysqli_query($con,"SELECT * FROM  WHERE "); // select query

          // $data = mysqli_fetch_array($qry); // fetch data

          // $l_type = $data['l_type'];
          // if($l_type=="weekly"){

          //   $duration = 'W - '.$data['duration']/7;
          // }else{
          //   $duration = 'D - '.$data['duration'];
          // }
                       
          ?>

          <div class="print_form">
            <form >
              <div>
                <br>
                <img src="../assets/images/light_logo.png" style="padding-left: 4%; width:40%;"><br>
                 <span style="padding-left: 40px; font-size: 45px; color: black;"><b>SHAD Computers</b></span><br>
                 <span style="font-size: 43px; color: black;"><b>Invoice</b></span><br>
                 <span style="font-size: 43px; color: black; font-family: sans-serif;">Tel : 076 0364 350 / 070 3625 796</span><br>
                 <span style="font-size: 43px; color: black; font-family: sans-serif;">Bill Date : 
                 <?php 
                    $date = new DateTime(null, new DateTimeZone('Asia/Colombo'));
                            echo $date->format('Y-m-d h:i: sA'); ?>       
                  </span><br>
              </div>
              <b><span style="color: black;">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</span> <br></b>

              <span style="font-size: 43px; color: black; font-family: sans-serif;">Job no : 
              <b>
              <?php
              echo $id;
                 // $name_id = $data['cust_id'];
                 // $custom = "SELECT * FROM customer WHERE cust_id = '$name_id' ";
                 // $result1 = mysqli_query($con,$custom);
                 // $dataName = mysqli_fetch_array($result1);
                 // echo $dataName['name'];
              ?>
              </b>
              </span><br>
              <span style="padding-left: 83px; font-size: 43px;"><b><?php 
              //echo "( ".$dataName['reg_no']." )" 
              ?></b></span> <br>

              <span style="font-size: 43px; color: black; font-family: sans-serif;">Loan Amount : 
              <b>
              <?php 
                //$amount = $data['amount'];
                //echo number_format($amount,2,".",",") 
              ?>
              </b>
              </span><br>

              <span style="font-size: 43px; color: black; font-family: sans-serif;">Rental : 
              <b>
              <?php 
                //$rental = $data['rental'];
                //echo number_format($rental,2,".",",")  
              ?>
              </b>
              </span><br>

              <span style="font-size: 43px; color: black; font-family: sans-serif;">Duration :
              <b>
              <?php 
              //echo $duration; 
              ?>
              </b>
              </span><br>

              <span style="font-size: 43px; color: black; font-family: sans-serif;">Start Date : 
              <b>
              <?php 
              //echo $data['l_date'] 
              ?>
              </b>
              </span><br>

              <span style="font-size: 43px; color: black; font-family: sans-serif;">End Date : 
              <b>
              <?php 
              //echo $data['end_date'] 
              ?>
              </b>
              </span><br>

              <b><span style="color: black;">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</span> <br></b>

              <span style="font-size: 43px; color: black; font-family: sans-serif;">Today paid : 
              <b>
              <?php 
                //$paid = $data['paid'];
                //echo number_format($paid,2,".",",") 
              ?>
              </b>
              </span><br>

              <span style="font-size: 43px; color: black; font-family: sans-serif;">Arreares/Additional : 
              <b>
              <?php 
                //$arrears = $data['arrears'];
                //echo number_format($arrears,2,".",",") 
              ?>
              </b>
              </span><br>

              <span style="font-size: 43px; color: black; font-family: sans-serif;">Total paid : 
              <b>
              <?php 
                //$total_paid = $data['total_paid'];
                //echo number_format($total_paid,2,".",",")  
              ?>
              </b>
              </span><br>

              <span style="font-size: 43px; color: black; font-family: sans-serif;">Brought forward : 
              <b>
              <?php 
                //$brought_forward =$data['brought_forward'];
                //echo number_format($brought_forward,2,".",",") ?>
               </b>
              </span><br>

              <b><span style="color: black;">----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</span> <br></b><br>
              <h5 style="padding-left: 18%; font-size: 40px; color: black;"><b>THANK YOU!</b></h5>
              <br>
             </form> 
           </div>

        </div>
      </div>
    </div>
  </div>

  <!--   Print JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>

  <script>

  /////  Print  
  $(document).ready(function(){
      setTimeout(function(){ window.print(); }, 1500);
     // setTimeout(window.close, 3000);
  });
  ///////////////////////////////////////////


  </script>
</body>

</html>
