<?php 
    include('../../../connect_sql/connect.php');
    session_start();
    if(isset($_SESSION['username'])){
        if(isset($_GET['petitionId'])){
            $petitionId = $_GET['petitionId'];
            $userId = $_SESSION['userId'];
            $insert_query = "Insert into `chips`(petitionId, userId, amount) values ('$petitionId', '$userId', 58)";
            $run_query = mysqli_query($con, $insert_query);
            if($run_query){
                echo "<script>alert('You chip in successfuly!')</script>";
                echo "<script>window.open('share_petition.php?petitionId=$petitionId', '_self')</script>";
            }else{
                echo "<script>alert('Hailat')</script>";
            }
        }
    } else {
        echo "<script>alert('Please proceed to login first!')</script>";
        echo "<script>window.open('../../../loginPage.php', '_self')</script>";
    }
?>