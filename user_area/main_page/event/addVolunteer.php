<?php
    include('../../../connect_sql/connect.php');
    session_start();
    if(isset($_SESSION['username'])){
        if(isset($_GET['eventId'])){
            $eventId = $_GET['eventId'];
            $userId = $_SESSION['userId'];
            $check_exist_query = "Select * from `volunteer` where userId='$userId' and eventId='$eventId'";
            $run_check_query = mysqli_query($con, $check_exist_query);
            $row_count = mysqli_num_rows($run_check_query);
            if($row_count === 0){
                $select_query = "Select * from `event` where eventId='$eventId'";
                $run_query = mysqli_query($con, $select_query);
                $row_fetch = mysqli_fetch_assoc($run_query);
                $total_participants = $row_fetch['num_of_participants'];
                $add_total_participants = $total_participants += 1;
                $alter_query = "Update `event` SET num_of_participants='$add_total_participants' where eventId='$eventId'";
                $run_alter_query = mysqli_query($con, $alter_query);
                $insert_volunteer_query = "INSERT INTO `volunteer` (userId, eventId) VALUES ('$userId', '$eventId')";
                $run_insert_volunteer_query = mysqli_query($con, $insert_volunteer_query);
                echo "<script>alert('You join the event sucessfully!')</script>";
                echo "<script>window.open('../profile/profile.php?my_events', '_self')</script>";
            } else {
                echo "<script>alert('You already joined the event as a volunteer!')</script>";
                echo "<script>window.open('../profile/profile.php?my_events', '_self')</script>";
            };
        }
    } else {
        echo "<script>alert('Please proceed to login first!')</script>";
        echo "<script>window.open('../../../loginPage.php', '_self')</script>";

    }
?>