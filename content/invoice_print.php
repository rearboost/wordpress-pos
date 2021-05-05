<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<style>
body{
  font-family: sans-serif;
  font-size: 30px;
  font-color: black;
}
.invoice{
  width: 760px;
  /* height:700px; */
  /*width:1240px;
  height:874px;*/
  display: flex;
}
.left{
  width:20%;
  background-color: #ffffff;
}
.img-center {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
.right{
  width:100%;
  padding-top: 80px;
}
h1{
  text-align: center;
  font-weight: 500;
  color:#282365;
}
.row1{
  display: flex;
  padding: 0px 0px 10px 0px;
  border-bottom: 1px double black;
}
.col1{
  width:65%;
}
.col2{
  width:35%;
  padding-left: 10%;
  padding-top: 10px;
  font-weight: 600;
}
table, td, th {
   border: 1px solid black; 
}
td{
  line-height: 20px;
}
td.customer{
  font-weight: 600;
  padding-left: 5px;
}

table {
  width: 100%;
  border-collapse: collapse;
}
.row2{
  display: flex;
  padding: 10px 0px 10px 0px;
}
.row3{
  display: flex;
  padding: 10px 0px 10px 0px;
}
.row4{
  display: flex;
  padding: 10px 0px 10px 0px;
}

.font-print{
  font-size: 14px;
  line-height: 20px;
}
</style>
<body>
<?php
  // Database Connection
  require '../include/config.php';
  $id = $_GET['id']; // get id through query string

  $qry = mysqli_query($conn,"SELECT * FROM jobs WHERE jobId=$id "); // select query

  $data = mysqli_fetch_array($qry); // fetch data
      
  $date = new DateTime(null, new DateTimeZone('Asia/Colombo'));

  $jobNo =  $data['jobNo'];
  $customerId =  $data['customerId'];
  $jobID =  $data['jobId'];
  $accessory =  $data['accessory'];
  $service_cost =  $data['service_cost'];



  // $check= mysqli_query($conn, "SELECT * FROM invoice WHERE job_id='$job_no'");
  // $count = mysqli_num_rows($check);

  // if($count ==0){

  //   $check_get= mysqli_query($conn, "SELECT * FROM invoice ORDER BY invoice_id DESC LIMIT 1");
  //   $row = mysqli_fetch_array($check_get);
  //   $invoice_id= $row['invoice_id']+1;

  //   //Insert 
  //   $insert = "INSERT INTO invoice (job_id) VALUES ('$job_no')";
  //   $result = mysqli_query($conn,$insert);

  // }else{

  //    $row = mysqli_fetch_array($check);
  //    $invoice_id= $row['invoice_id'];
  // }

  // $invoice_id = str_pad($invoice_id, 5, '0', STR_PAD_LEFT);

?>
<div class="invoice">

  <div class="left">
    <img src="../assets/images/light_logo.png" style="padding-left: 4%; width:40%;"><br>

  </div><!--column 1-->

  <div class="right">
    <!-- <h1><i>INVOICE</i></h1> -->

    <div class="row1">

      <div class="col1">
        <span><b>SHAD Computers</b></span><br>
        <label class="font-print">No:4/29, Agalawatta road, Mathugama.</label><br>
        <label class="font-print">Tel : 034-4931353 / 071-8035689</label><br>
        <label class="font-print">Email : ShadComputers@gmail.com</label>
      </div> 

    </div>

    <div class="row2 font-print">
      <div class="col1">
        <table>
          <tr>
            <th>Customer</th>
          </tr>
          <tr>
            <td class="customer">
              <?php
              $client = mysqli_query($conn, "SELECT * FROM customer WHERE id='$customerId'");
              $person = mysqli_fetch_assoc($client);
              ?>
              <span><?php echo $person['name']; ?></span><br>
              <span><?php echo $person['address']; ?></span><br>
              <span><?php echo $person['contact']; ?></span><br>
            </td>
          </tr>
        </table>
      </div>

      <div class="col2 font-print">
        <label>Date : </label><span><?php echo $date->format('Y-m-d'); ?> </span><br>
        <label>Time : </label><span><?php echo $date->format('H:i:s:a'); ?> </span><br>
        <label>Invoice # : <?php echo $jobNo; ?></label><br>
        <!-- <label>Invoice # : 1035</label> -->
      </div> 
    </div>

    <div class="row3 font-print">
      <table>
        <tr>
          <th>Qty</th>
          <th>Description</th>
          <th>Serial #</th>
          <th>Unit Price</th>
          <th>Amount</th>
        </tr>
        
          <?php

          //$check1 = mysqli_query($conn, "SELECT * FROM parts WHERE jobID='$jobID'");
          $check1 = mysqli_query($conn, "SELECT qty,parts,price,imei,SUM(qty*price) AS total FROM parts WHERE jobID='$jobID'");
          $count1 = mysqli_num_rows($check1);

          if($service_cost>0 && $count1>0){
            $qty = 1;
            echo '<tr>';
            echo '<td style="text-align:center;">'. $qty .'</td>';
            echo '<td>'. 'Service cost of '. $accessory .'</td>';
            echo '<td>'. '' .'</td>';
            echo '<td style="text-align:right;">'. $service_cost .'</td>';
            echo '<td style="text-align:right;">'. number_format($qty*$service_cost,2,'.',',')  .'</td>';
            '</tr>';
            $cost1 = $qty*$service_cost;
            $cost2 = $row['total'];
            $total = number_format($cost1+$cost2,2,'.',',');

            while($row = mysqli_fetch_assoc($check1)){
              $p_qty = $row['qty'];
              $parts = $row['parts'];
              $price = $row['price'];
              $imei = $row['imei'];

              echo '<tr>';
              echo '<td style="text-align:center;">'. $p_qty .'</td>';
              echo '<td>'. $parts .'</td>';
              echo '<td>'. $imei .'</td>';
              echo '<td style="text-align:right;">'. $price .'</td>';
              echo '<td style="text-align:right;">'. number_format($p_qty*$price,2,'.',',') .'</td>';
              '</tr>';
            }

          }else if($service_cost>0){
            $qty = 1;
            echo '<tr>';
            echo '<td style="text-align:center;">'. $qty .'</td>';
            echo '<td>'. 'Service cost of '. $accessory .'</td>';
            echo '<td>'. '' .'</td>';
            echo '<td style="text-align:right;">'. $service_cost .'</td>';
            echo '<td style="text-align:right;">'. number_format($qty*$service_cost,2,'.',',')  .'</td>';
            '</tr>';
            $total = number_format($qty*$service_cost,2,'.',',');

          }else if($count1>0){
            while($row = mysqli_fetch_assoc($check1)){
              $p_qty = $row['qty'];
              $parts = $row['parts'];
              $price = $row['price'];
              $imei = $row['imei'];

              echo '<tr>';
              echo '<td style="text-align:center;">'. $p_qty .'</td>';
              echo '<td>'. $parts .'</td>';
              echo '<td>'. $imei .'</td>';
              echo '<td style="text-align:right;">'. $price .'</td>';
              echo '<td style="text-align:right;">'. number_format($p_qty*$price,2,'.',',') .'</td>';
              '</tr>';
              $total = number_format($row['total'],2,'.',',');
            }
          }
          ?>
        
        <tr>
          <th colspan="3"></th>
          <th>Total</th>
          <th style="text-align:right;"><?php echo $total; ?></th>
        </tr>
      </table>
    </div><!--row 3-->

    <div class="row4"></div><!--row 4-->

  </div><!--column 2-->
</div><!--invoice-->

</body>
  <!--   Print JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>

  <script>
  ////////////////  Print  ///////////////////////
  $(document).ready(function(){
     setTimeout(function(){ window.print(); }, 1500);
     // setTimeout(window.close, 3000);
  });
  ///////////////////////////////////////////
  </script>

              


