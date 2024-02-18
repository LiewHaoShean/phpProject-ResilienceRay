<?php 
    include('../../../connect_sql/connect.php');
    session_start();
    if(isset($_SESSION['username'])){
        if(isset($_GET['petitionId'])){
            $petitionId = $_GET['petitionId'];
            $userId = $_SESSION['userId'];
            $payment_method = 'pending';
            $insert_query = "Insert into `chips`(petitionId, userId, amount, payment_method) values ('$petitionId', '$userId', 58, '$payment_method')";
            $run_query = mysqli_query($con, $insert_query);
            $select_chipId_query = "SELECT * FROM `chips` ORDER BY chipId DESC LIMIT 1";
            $run_select_chipId_query = mysqli_query($con, $select_chipId_query);
            $chipId_row = mysqli_fetch_assoc($run_select_chipId_query);
            $chipId = $chipId_row['chipId'];
            if($run_query){
                echo "<script>window.open('../../payment.php?chips_amount=58&chipId=$chipId&petitionId=$petitionId', '_self')</script>";
            }else{
                echo "<script>alert('Hailat')</script>";
            }
        }
    } else {
        echo "<script>alert('Please proceed to login first!')</script>";
        echo "<script>window.open('../../../loginPage.php', '_self')</script>";
    }
?>