<?php
    include('../connect_sql/connect.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="payment.css">
  <title>Document</title>
</head>
<body>
  <div class="payment-container">
    <div class="payment-toggle"> 
      <button class="toggle-btn visa-btn active" id="visa-btn" href="#visa" onclick="togglePaymentType('visa')"> <img src="https://i.imgur.com/sB4jftM.png" width="80"> </button> 
      <button class="toggle-btn paypal-btn" id="paypal-btn" href="#paypal" onclick="togglePaymentType('paypal')"> <img src="https://i.imgur.com/yK7EDD1.png" width="80"> </button> 
    </div>
    <form id="visa-container" method="post">
      <div class="card-container">
        <h5>Credit card</h5>
        <div class="input-field">
          <div class="inputbox name"> 
            <input type="text" name="" class="form-control" required> <span>Cardholder Name</span> 
          </div> 
          <div class="inputbox card-num"> 
            <input type="text" name="" min="1" max="9999999999999999" class="form-control" required> <span>Card Number</span> 
          </div> 
          <div class="inputbox exp-date"> 
            <input type="text" name="" min="1" max="999" class="form-control" required> <span>Expiration Date</span> 
          </div> 
          <div class="inputbox cvv"> 
            <input type="password" name="ccv" min="1" max="999" class="form-control cvv-input" required> <span>CVV</span> 
          </div>
          <?php if(isset($_GET['donation_amount']) and isset($_GET['donorId'])){
                $payment_amount = $_GET['donation_amount'];
          } else {
                $payment_amount = 0;
          }?>
          <div class="inputbox amount"> 
            <input type="number" name="amount" class="form-control" value=<?php echo $payment_amount?> required> <span>Amount(RM)</span> 
          </div>
        </div>
        <div class="pay"> 
          <button class=""  type="submit" name="visa-pay">Pay</button> 
        </div> 
      </div>
    </form>
    <form id="paypal-container" style="display: none;" method="post">
      <div class="paypal-container">
        <div class="inputbox"> 
          <input type="email" name="name" class="form-control" required="required"> <span class="paypal-span">Paypal Email Address</span> 
        </div> 
        <div class="pay paypal-pay"> 
          <button class="" type="submit" name="paypal-pay">Pay</button> 
        </div> 
      </div>
    </form>
  </div>
</body>
<script src="./payment.js"></script>
</html>

<?php
    if(isset($_GET['donation_amount'])){
        if(isset($_POST['visa-pay'])){
            $donorId = $_GET['donorId'];
            $payment_method = "visa";
            $alter_query = "Update `donors` Set payment_method='$payment_method' where donorId='$donorId'";
            $run_query = mysqli_query($con, $alter_query);
            echo "<script>alert('Thank you for your kind donation!')</script>";
            echo "<script>window.open('main_page/donation/donationPage.php', '_self')</script>";
        } elseif(isset($_POST['paypal-pay'])) {
            $donorId = $_GET['donorId'];
            $payment_method = "paypal";
            $alter_query = "Update `donors` Set payment_method='$payment_method' where donorId='$donorId'";
            $run_query = mysqli_query($con, $alter_query);
            echo "<script>alert('Thank you for your kind donation!')</script>";
            echo "<script>window.open('main_page/donation/donationPage.php', '_self')</script>";
        }
    } elseif(isset($_GET['chips_amount'])){
        if(isset($_POST['visa-pay'])){
            $payment_method = "visa";
            $alter_query = "Update `donors` Set payment_method='$payment_method'";
            $run_query = mysqli_query($con, $alter_query);
        } elseif(isset($_POST['paypal-pay'])) {
            $payment_method = "paypal";
            $alter_query = "Update `donors` Set payment_method='$payment_method'";
            $run_query = mysqli_query($con, $alter_query);
        }
    } else {
        echo "<script>alert('You don't any payment to complete!')</script>";
    }
?>


