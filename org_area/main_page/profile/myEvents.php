<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="myEvents.css">
</head>
<body>
<div class="container">
  <h2>My Events</h2>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1">Activity Id</div>
      <div class="col col-2">Activity title</div>
      <div class="col col-3">Volunteers</div>
      <div class="col col-4">Date</div>
    </li>
    <?php
        $session_orgId = $_SESSION['orgId'];
        $select_events_query = "Select * from `activity` where organizationId=$session_orgId";
        $run_query = mysqli_query($con, $select_events_query);
        while ($result = mysqli_fetch_assoc($run_query)){
            $activityId = $result['activityId'];
            $activity_title = $result['title'];
            $activity_volunteers = $result['num_of_participants'];
            $activity_date = $result['date'];
            echo "
                <li class='table-row'>
                    <div class='col col-1' data-label='Donation Id'><h3>$activityId</h3></div>
                    <div class='col col-2' data-label='Donation Type'><h3>$activity_title</h3></div>
                    <div class='col col-3' data-label='Amount'><h3><a id='supporters' href='volunteer_details.php?activityId=$activityId'>$activity_volunteers</a></h3></div>
                    <div class='col col-4' data-label='Payment Method'><h3>$activity_date</h3></div>
                </li>";
        }
    ?>
  </ul>
</div>
</body>
</html>