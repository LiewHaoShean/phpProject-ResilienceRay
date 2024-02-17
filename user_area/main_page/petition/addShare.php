<?php
    include('../../../connect_sql/connect.php');
    session_start();
    if(isset($_GET['petitionId'])){
        $petitionId = $_GET['petitionId'];
        $select_query = "Select * from `petition` where petitionId='$petitionId'";
        $run_query = mysqli_query($con, $select_query);
        $row_fetch = mysqli_fetch_assoc($run_query);
        $total_shares = $row_fetch['shares'];
        $add_total_shares = $total_shares += 1;
        $alter_query = "Update `petition` SET shares='$add_total_shares' where petitionId='$petitionId'";
        $run_alter_query = mysqli_query($con, $alter_query);
        echo "<script>window.open('./petitionPage.php', '_self')</script>";
    }
?>