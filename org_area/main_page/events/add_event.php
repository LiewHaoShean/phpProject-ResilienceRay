<?php
    include('../../../connect_sql/connect.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
    <link rel="stylesheet" href="add_event.css">
  </head>
  <body>
    <section class="container">

        <div class="add-event">
          <header>Add Event</header>
        </div>

        <form action="#" class="form" method="POST" enctype="multipart/form-data">
          <div class="main-container">
            <div class="container-left">
              <div class="container2">
                <div class="eventname">
                  <label>Event Name</label>
                </div>
                <div class="input-box">
                  <input type="text" placeholder="Event's Name" name="event_name" required>
                </div>
              </div>
              <div class="container3">
                <div>
                  <label>Event Description</label>
                </div>
                <div class="input-box">
                  <textarea name="description" placeholder="Enter description for the event"  cols="30" rows="40" style="height: 300px; resize:none;" required></textarea>
                </div>
              </div>
              <div class="location-container">
                <div class="location">
                  <label>Location</label>
                </div>
                <div class="input-box">
                  <input type="text" placeholder="Location" name="event_location" required>
                </div>
              </div>
            </div>
            <div class="container-right">
              <div class="container4">
                <div>
                  <label>Date Start</label>
                </div>
                <div class="start-date">
                  <input type="date" name="start_date" required>
                </div>
                <div>
                  <label>Time Start</label>
                </div>
                <div class="start-time">
                  <input type="time" name="start_time" required>
                </div>
              </div>

              <div class="container5">
                <div>
                  <label>Date End</label>
                </div>
                <div class="end-date">
                  <input type="date" name="end_date" required>
                </div>

                <div>
                  <label>Time End</label>
                </div>
                <div class="end-time">
                  <input type="time" name="end_time" required>
                </div>
              </div>

              <div class="container6">
                <div>
                  <label>Image</label>
                </div>
                <div class="input-box2">
                  <input id="event_img" type="file" required="" name="event_img">
                </div>
              </div>
            </div>
          </div>

          <div class="addEventBtn">
            <button name="addEvent" type="submit">Submit</button>
          </div>
      </form>
    </section>          
  </body>
</html>

<?php
  if (!isset($_SESSION['org_name'])){
    echo "<script>alert('Please proceed to login first!')</script>";
    echo "<script>window.open('../../../loginPage.php', '_self')</script>";
  } else {
    if (isset($_POST['addEvent'])){
      $event_name = $_POST['event_name'];
      $event_description = $_POST['description'];
      $event_img = $_FILES['event_img']['name'];
      $temp_event_img = $_FILES['event_img']['tmp_name'];
      $start_date = $_POST['start_date'];
      $start_time = $_POST['start_time'];
      $end_date = $_POST['end_date'];
      $end_time = $_POST['end_time'];
      $orgId = $_SESSION['orgId'];
      $participants = 0;
      $location = $_POST['event_location'];
      $images = file_get_contents($temp_event_img);

      if($event_name == '' or $event_description == '' or $event_img == ''){
        echo "<script>alert('Please fill in all the available field!')</script>";
      } else {
        $insert_query = "insert into event(title, description, date_start, time_start, date_end, time_end, location, num_of_participants, organizationId, event_img) values ('$event_name', '$event_description', '$start_date', '$start_time', '$end_date', '$end_time', '$location', '$participants', '$orgId', ?)";
        $stmt = mysqli_prepare($con, $insert_query);
        mysqli_stmt_bind_param($stmt, "s", $images);
        mysqli_stmt_execute($stmt);
        move_uploaded_file($temp_event_img, "./event_images/$event_img");
        $check = mysqli_stmt_affected_rows($stmt);
        if ($check == 1){
          echo "<script>alert('Event added sucessfully!')</script>";
          echo "<script>window.open('../profile/profile.php', '_self')</script>";
        }
      }
    }
  }
?>