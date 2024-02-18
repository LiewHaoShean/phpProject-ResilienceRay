<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="myDonation.css">
</head>
<body>
<div class="container">
  <h2>My Donations</h2>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col">Donation Id</div>
      <div class="col">Donation Type</div>
      <div class="col">Amount Due</div>
      <div class="col">Payment Method</div>
    </li>
    <!-- <li class="table-row">
      <div class="col" data-label="Donation Id">42235</div>
      <div class="col" data-label="Donation Type">John Doe</div>
      <div class="col" data-label="Amount">$350</div>
      <div class="col" data-label="Payment Status">Pending</div>
    </li> -->
    <?php
        $session_userId = $_SESSION['userId'];
        $select_donation_query = "Select * from `donors` where userId=$session_userId";
        $run_query = mysqli_query($con, $select_donation_query);
        while ($result = mysqli_fetch_assoc($run_query)){
            $donorId = $result['donorId'];
            $donation_amount = $result['amount'];
            $donation_type = $result['type'];
            $payment_method = $result['payment_method'];
            echo "
                <li class='table-row'>
                    <div class='col' data-label='Donation Id'><h3>$donorId</h3></div>
                    <div class='col' data-label='Donation Type'><h3>$donation_type</h3></div>
                    <div class='col' data-label='Amount'><h3>$$donation_amount</h3></div>
                    <div class='col' data-label='Payment Method'><h3>$payment_method</h3></div>
                </li>";
        }
    ?>
  </ul>
</div>
</body>
</html>