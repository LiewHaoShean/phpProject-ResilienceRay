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
      <div class="col col-1">Event Id</div>
      <div class="col col-2">Event title</div>
      <div class="col col-3">Volunteers</div>
      <div class="col col-4">Date</div>
    </li>
    <?php
        $session_orgId = $_SESSION['orgId'];
        $select_events_query = "Select * from `event` where organizationId=$session_orgId";
        $run_query = mysqli_query($con, $select_events_query);
        while ($result = mysqli_fetch_assoc($run_query)){
            $eventId = $result['eventId'];
            $event_title = $result['title'];
            $event_volunteers = $result['num_of_participants'];
            $event_date = $result['date_start'];
            $participants_count_query = "Select * from `volunteer` where eventId=$eventId";
            $run_participants_count_query = mysqli_query($con, $participants_count_query);
            $row_count = mysqli_num_rows($run_participants_count_query);

            echo "
                <li class='table-row'>
                    <div class='col col-1' data-label='Event Id'><h3>$eventId</h3></div>
                    <div class='col col-2' data-label='Event Type'><h3>$event_title</h3></div>
                    <div class='col col-3' data-label='Amount'><h3><a id='supporters' href='volunteer_details.php?eventId=$eventId'>$row_count</a></h3></div>
                    <div class='col col-4' data-label='Payment Method'><h3>$event_date</h3></div>
                </li>";
        }
    ?>
  </ul>
</div>
</body>
</html>