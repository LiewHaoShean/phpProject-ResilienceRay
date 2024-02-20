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
  <h2>Events</h2>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1">Event Id</div>
      <div class="col col-2">Title</div>
      <div class="col col-3">Location</div>
      <div class="col col-4">Date</div>
      <div class="col col-5">Time</div>
    </li>
    <?php
        $session_userId = $_SESSION['userId'];
        $select_volunteer_query = "Select * from `volunteer` where userId=$session_userId";
        $run_query = mysqli_query($con, $select_volunteer_query);
        while ($result = mysqli_fetch_assoc($run_query)){
          $eventId = $result['eventId'];
          $select_event_query = "Select * from `event` where eventId='$eventId'";
          $run_select_event_query = mysqli_query($con, $select_event_query);
          $event_result = mysqli_fetch_assoc($run_select_event_query);
          $event_title = $event_result['title'];
          $event_location = $event_result['location'];
          $event_start_date = $event_result['date_start'];
          $event_end_date = $event_result['date_end'];
          $event_start_time = $event_result['time_start'];
          $event_end_time = $event_result['time_end'];
          echo "
              <li class='table-row'>
                  <div class='col col-1' data-label='Event Id'><h3>$eventId</h3></div>
                  <div class='col col-2' data-label='Event Title'><h3>$event_title</h3></div>
                  <div class='col col-3' data-label='Event Location'><h3>$event_location</h3></div>
                  <div class='col col-4' data-label='Event Date'><h3>$event_start_date-$event_end_date</h3></div>
                  <div class='col col-4' data-label='Event Time'><h3>$event_start_time-$event_end_time</h3></div>
              </li>";
        }
    ?>
  </ul>
</div>
</body>
</html>