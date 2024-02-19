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
  <h2>My Petitions</h2>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1">Petition Id</div>
      <div class="col col-2">Title</div>
      <div class="col col-3">Date</div>
      <div class="col col-4">Suppoters</div>
    </li>
    <?php
        $session_userId = $_SESSION['userId'];
        $select_petition_query = "Select * from `petition` where userId=$session_userId";
        $run_query = mysqli_query($con, $select_petition_query);
        while ($result = mysqli_fetch_assoc($run_query)){
            $petitionId = $result['petitionId'];
            $petition_title = $result['title'];
            $petition_date = $result['date'];
            $petition_supporters = $result['num_of_supporters'];
            echo "
                <li class='table-row'>
                    <div class='col col-1' data-label='Donation Id'><h3>$petitionId</h3></div>
                    <div class='col col-2' data-label='Donation Type'><h3>$petition_title</h3></div>
                    <div class='col col-3' data-label='Amount'><h3>$petition_date</h3></div>
                    <div class='col col-4' data-label='Payment Method'><h3>$petition_supporters</h3></div>
                </li>";
        }
    ?>
  </ul>
</div>
</body>
</html>