<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="myPendingPayment.css">
</head>
<body>
<div class="container">
  <h2>My Payment Payment</h2>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col">Activity Id</div>
      <div class="col">Activity Type</div>
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
        $select_donation_query = "Select * from `donors` where userId=$session_userId and payment_method='pending'";
        $run_query = mysqli_query($con, $select_donation_query);
        while ($result = mysqli_fetch_assoc($run_query)){
            $donorId = $result['donorId'];
            $donation_amount = $result['amount'];
            $activity_type = 'Donation';
            $payment_method = $result['payment_method'];
            echo "
                <li class='table-row'>
                    <div class='col col-1' data-label='Activity Id'><h3>$donorId</h3></div>
                    <div class='col col-2' data-label='Activity Type'><h3>$activity_type</h3></div>
                    <div class='col col-3' data-label='Amount'><h3>$$donation_amount</h3></div>
                    <div class='col col-4' data-label='Payment Method'><h3><a href='../../payment.php?donation_amount=$donation_amount?&donorId=$donorId'' id='pending'>$payment_method</a></h3></div>
                </li>";
        };
        $select_chips_query = "Select * from `chips` where userId=$session_userId and payment_method='pending'";
        $run_select_chips_query = mysqli_query($con, $select_chips_query);
        while ($chips_result = mysqli_fetch_assoc($run_select_chips_query)){
          $petition_id = $chips_result['petitionId'];
          $chipsId = $chips_result['chipId'];
          $chips_amount = $chips_result['amount'];
          $activity_type = 'Chip In';
          $payment_method = $chips_result['payment_method'];
          echo "
                <li class='table-row'>
                    <div class='col col-1' data-label='Activity Id'><h3>$chipsId</h3></div>
                    <div class='col col-2' data-label='Activity Type'><h3>$activity_type</h3></div>
                    <div class='col col-3' data-label='Amount'><h3>$$chips_amount</h3></div>
                    <div class='col col-4' data-label='Payment Method'><h3><a href='../../payment.php?chips_amount=$chips_amount&chipId=$chipsId&petitionId=$petition_id' id='pending'>$payment_method</a></h3></div>
                </li>";
        };
    ?>
  </ul>

</div>
</body>
</html>