<?php  
  include('../include/config.php');
  
  include('../include/head.php'); 
  date_default_timezone_set("Asia/Colombo");

   // Get Print ID Data
    if(isset($_GET['id'])){

        $print_id = $_GET['id'];

        $sql=mysqli_query($conn,"SELECT * FROM invoice  WHERE id='$print_id'");  
        $numRows = mysqli_num_rows($sql); 
        if($numRows > 0) {
          while($row = mysqli_fetch_assoc($sql)) {

            $invoice_id  = $row['id'];
            $total  = $row['total'];
            $discount   = $row['discount'];
            $payment   = $row['payment'];
          }
        }
    }
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="print-size">
  
   <div class="col-sm-12 row">
      <!------------------- Head Left Area -->
      <div class="col-sm-6">
          <img src="../assets/images/logo.jpeg" style="width: 170px;" class="bill-logo" alt="bill  logo">
          <span class="web-url" style="padding: 0px 0px 0px 5px; font-size: 18px; "><b>www.shadcomputers.lk</b></span>
          <form style="margin-top: 10px;">
            <div class=" row">
              <label for="staticEmail" style="font-size: 12px; margin-bottom: -7px;" class="col-sm-3 col-form-label"><b>ADDRESS</b>   </label>
              <div class="col-sm-9 row">
                 <span class="col-form-label"  style="font-size: 12px; margin-bottom: -7px;">: NO, 390, NEGOMBO ROAD , SEEDUWA  </span>
              </div>
            </div>
            <div class=" row">
              <label for="staticEmail"  style="font-size: 12px; margin-bottom: -7px;" class="col-sm-3 col-form-label"><b>TEL</b>  </label>
              <div class="col-sm-9 row">
                <span class="col-form-label" style="font-size: 12px; margin-bottom: -7px;">: +94 77 609 1137  </span>
              </div>
            </div>
            <div class=" row">
              <label for="staticEmail"  style="font-size: 12px; margin-bottom: -7px;" class="col-sm-3 col-form-label"><b>EMAIL</b> </label>
              <div class="col-sm-9 row">
              <span class="col-form-label" style="font-size: 12px; margin-bottom: -7px;">: SHADcomputersinfo@gmail.com <br> <span style="padding-left: 5px;">info@shadcomputers.lk</span>  </span>
              </div>
            </div>
           
          </form>
      </div>
      <!------------------- Head Rigth Area -->
      <div class="col-sm-6">
          <form style="margin-top: 40px; margin-left: 60px;">
            <div class=" row">
              <label for="staticEmail"  style="font-size: 12px; margin-bottom: -7px;" class="col-sm-5 col-form-label">DATE  </label>
              <div class="col-sm-7 row">
                <span class="col-form-label" style="font-size: 13px; margin-bottom: -7px;">: <?php echo date("Y-m-d").' | '.date("h:i:sa");  ?> </span>
              </div>
            </div>
            <div class=" row">
              <label for="staticEmail"  style="font-size: 12px; margin-bottom: -7px;" class="col-sm-5 col-form-label">USER  </label>
              <div class="col-sm-7 row">
                <span class="col-form-label" style="font-size: 13px; margin-bottom: -7px;">: <?php echo $_SESSION['username']; ?> </span>
              </div>
            </div>
            <div class=" row">
              <label for="staticEmail"  style="font-size: 12px; margin-bottom: -7px;" class="col-sm-5 col-form-label">INVOICE NO </label>
              <div class="col-sm-7 row">
              <span class="col-form-label" style="font-size: 13px; margin-bottom: -7px;">:  <?php echo sprintf('%05d', $invoice_id); ?> </span>
              </div>
            </div>
            <div class=" row">
              <label for="staticEmail"  style="font-size: 12px; margin-bottom: -7px;" class="col-sm-5 col-form-label">PAYMENT METHOD</label>
              <div class="col-sm-7 row">
              <span class="col-form-label" style="font-size: 13px; margin-bottom: -7px;">: CSAH  </span>
              </div>
            </div>
            <div class=" row">
              <label for="staticEmail"  style="font-size: 12px; margin-bottom: -7px;" class="col-sm-5 col-form-label">CUSTOMER</label>
              <div class="col-sm-7 row">
              <span class="col-form-label" style="font-size: 13px; margin-bottom: -7px;">: WORKING CUSTOMER   </span>
              </div>
            </div>
           
          </form>
      </div>
   </div>

   <!------------------- Main Item Table Area -->
   <div  class="col-sm-12">
      <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">Description</th>
              <th scope="col">Warranty</th>
              <th scope="col">Qty</th>
              <th scope="col">Unit Price</th>
              <th scope="col">Amount</th>
            </tr>
          </thead>
          <tbody>

           <?php  
           
              $sql_get=mysqli_query($conn,"SELECT * FROM invoice_items WHERE invoice_id='$print_id'");  
              $numRows_get = mysqli_num_rows($sql_get); 
              if($numRows_get > 0) {
                while($row_get = mysqli_fetch_assoc($sql_get)) {

                  $totalAMT = 0;

                  $product  = $row_get['product'];
                  $qty  = $row_get['qty'];
                  $price   = $row_get['price'];
                  $amount   = $row_get['amount'];

                  echo '
                  <tr>
                      <td>'.$product.'</td>
                      <td>360 days</td>
                      <td>'.$qty.'</td>
                      <td>'.$price.'</td>
                      <td>'.$amount.'</td>
                  </tr>
                  ';

                  $totalAMT = $totalAMT + $amount;
                }
              }
                
           ?>
  
          </tbody>
        </table>
   </div>
   <br>

  
   <div class="col-sm-12 row">
       <!------------------- Item and warranty Conditions Area -->
       <div class="col-sm-9">
           <ul style="font-size: 13px;">
              <li>Please submit the orginal invoice for warranty claims.</li>
              <li>No warranty on key board , mouse cartridge and other no warranty items.</li>
              <li>Warranty covers only manufcatures defects, damages or due to other <br><b> </b> casues as negkigence, misuse , improper opertion, power fluctuation , lightening or <br> natural disaster , sabotage or Accident etc. are NOT included under this warranty.</li>
              <li>1 Year warranty less than 14 working day. ( -350 days/2 year-700/3 year- 1050 days ).</li>
              <li> Goods sold once not returnable.</li>
           
           </ul>
           <div class="col-sm-12 row">
              <!-- Authorized Signature -->
              <div class="col-sm-5">
                  <span>..................................</span><br>
                  <p>Authorized Signature</p>
              </div>
              <!-- Customer Signature( Agree and Accept ) -->
              <div class="col-sm-7">
                  <span>..................................</span><br>
                  <p>Customer Signature( Agree and Accept )</p>
              </div>
           </div>
       </div>
       <!-- Bill Final details  -->
        <div class="col-sm-3">
            <table class="table table-bordered">
             <tr>
                <td  class="botton-table"><b>AMOUNT</b></td>
                <td  class="botton-table"><?php echo number_format($totalAMT,2,'.',','); ?></td>
              </tr>
              <tr>
                <td class="botton-table"><b>ADVANCED</b></td>
                <td class="botton-table"><?php echo number_format(0,2,'.',','); ?></td>
              </tr>
              <tr>
                <td class="botton-table"><b>DISCOUNT</b></td>
                <td class="botton-table"><?php echo number_format($discount,2,'.',','); ?></td>
              </tr>
              <tr>
                <td class="botton-table"><b>CASH PAY</b></td>
                <td class="botton-table"><?php echo number_format($payment,2,'.',','); ?></td>
              </tr>
              <tr>
                <td class="botton-table"><b>CREDIT</b></td>
                <td class="botton-table"><?php echo number_format(0,2,'.',','); ?></td>
              </tr>
            </table>
       </div>
   </div>
</div>

<script>

  ///////////////////////////////////////  Print  
  $(document).ready(function(){
      setTimeout(function(){ window.print(); }, 2000);
     // setTimeout(window.close, 3000);
  });
  ///////////////////////////////////////////


  </script>