<?php
    include('../../../connect_sql/connect.php');
    session_start();
    if(isset($_SESSION['username'])){
        if(isset($_GET['petitionId'])){
            $petitionId = $_GET['petitionId'];
            $select_query = "Select * from `petition` where petitionId='$petitionId'";
            $run_query = mysqli_query($con, $select_query);
            $row_fetch = mysqli_fetch_assoc($run_query);
            $total_supporters = $row_fetch['num_of_supporters'];
            $add_total_supporters = $total_supporters += 1;
            $alter_query = "Update `petition` SET num_of_supporters='$add_total_supporters' where petitionId='$petitionId'";
            $run_alter_query = mysqli_query($con, $alter_query);
            echo "<script>alert('You support the petition sucessfully!')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="chipIn.css">
</head>
<body>
    <div class="progress-container">
        <h2>Complete Your Support</h2>
        <div class="progress-steps">
            <div class="first-step">
                <ion-icon name="checkmark-circle"></ion-icon>
            </div>
            <div class="line">
            </div>
            <div class="second-step">
                <span>2</span>
            </div>
            <div class="line2">
            </div>
            <div class="third-step">
                <span>3</span>
            </div>
        </div>
    </div>

    <div class="chipIn-container">
        <?php
            if(isset($_SESSION['username'])){
                if(isset($_GET['petitionId'])){
                    $petitionId = $_GET['petitionId'];
                    $select_query = "Select * from `petition` where petitionId='$petitionId'";
                    $run_query = mysqli_query($con, $select_query);
                    $row_fetch = mysqli_fetch_assoc($run_query);
                    $petition_img = $row_fetch['petition_img'];
                    $username = $_SESSION['username'];
                    echo "
                        <div class='left-container'>
                            <img src='./petition_images/$petition_img' alt=''>
                            <h1>$username can Chip In to get this petition on Agenda?</h1>
                            <p>Getting support in a timely manner is critical to a petition's success.</p>
                            <p>Your contribution can help Change.org reach new potential supporters in a matter of hours.</p>
                            <p class='highlight'>Chipping in allows us to promote the petition on other platform and through email.</p>
                            <div class='impact'>
                                <h3>I M P A C T</h3>
                                <p>People who've already chipped in have helped this petition gather <strong>300 additional signatures.</strong></p>
                            </div>
                            <a href='./addchips.php?petitionId=$petitionId'><ion-icon name='cash-outline'></ion-icon>Yes I'll chip in RM58 to distribute this petition</a>
                            <a href='./share_petition.html' class='share'><ion-icon name='share-outline'></ion-icon>No I'll share instead</a>
                        </div>
                        <<div class='right-container'>
                    ";
                    $chips_select_query = "Select * from `chips`where petitionId=$petitionId";
                    $chips_run_query = mysqli_query($con, $chips_select_query);
                    while ($chips_row_fetch = mysqli_fetch_assoc($chips_run_query)){
                        $chipId = $chips_row_fetch['chipId'];
                        $userId = $chips_row_fetch['userId'];
                        $chips_amount = $chips_row_fetch['amount'];
                        $select_user_query = "Select * from `user` where userId='$userId'";
                        $run_select_user_query = mysqli_query($con, $select_user_query);
                        $user_row_fetch = mysqli_fetch_assoc($run_select_user_query);
                        $user = $user_row_fetch['name'];
                        echo "
                                <div class='chips'>
                                    <div class='chips-detail'>
                                        <ion-icon name='person-circle-outline'></ion-icon>
                                        <h2><strong>$user</strong> chipped in RM$chips_amount</h2>
                                    </div>
                                </div>";
                        echo "<div>";
                    }
                }
            } else {
                echo "<script>alert('Please proceed to login first!')</script>";
                echo "<script>window.open('../../../loginPage.php', '_self')</script>";
            }
        ?>
        <!-- <div class="left-container">
            <img src="./petition_images/petition1.jpg" alt="">
            <h1>#Name can Chip In to get this petition on Agenda?</h1>
            <p>Getting support in a timely manner is critical to a petition's success.</p>
            <p>Your contribution can help Change.org reach new potential supporters in a matter of hours.</p>
            <p class="highlight">Chipping in allows us to promote the petition on Change.org and through email.</p>
            <div class="impact">
                <h3>I M P A C T</h3>
                <p>People who've already chipped in have helped this petition gather <strong>4,701 additional signatures.</strong></p>
            </div>
            <a href=""><ion-icon name="cash-outline"></ion-icon>Yes I'll chip in to distribute this petition</a>
            <a href="./share_petition.html" class="share"><ion-icon name="share-outline"></ion-icon>No I'll share instead</a>
        </div> -->
        <!-- <div class="right-container">
            <div class="chips">
                <div class="chips-detail">
                    <ion-icon name="person-circle-outline"></ion-icon>
                    <h2><strong>Liew Hao Shean</strong> chipped in RM22</h2>
                </div>
                <div class="chips-detail">
                    <ion-icon name="person-circle-outline"></ion-icon>
                    <h2><strong>Liew Hao Shean</strong> chipped in RM22</h2>
                </div>
                <div class="chips-detail">
                    <ion-icon name="person-circle-outline"></ion-icon>
                    <h2><strong>Liew Hao Shean</strong> chipped in RM22</h2>
                </div>
                <div class="chips-detail">
                    <ion-icon name="person-circle-outline"></ion-icon>
                    <h2><strong>Liew Hao Shean</strong> chipped in RM22</h2>
                </div>
                <div class="chips-detail">
                    <ion-icon name="person-circle-outline"></ion-icon>
                    <h2><strong>Liew Hao Shean</strong> chipped in RM22</h2>
                </div>
                <div class="chips-detail">
                    <ion-icon name="person-circle-outline"></ion-icon>
                    <h2><strong>Liew Hao Shean</strong> chipped in RM22</h2>
                </div>
                <div class="chips-detail">
                    <ion-icon name="person-circle-outline"></ion-icon>
                    <h2><strong>Liew Hao Shean</strong> chipped in RM22</h2>
                </div>
                <div class="chips-detail">
                    <ion-icon name="person-circle-outline"></ion-icon>
                    <h2><strong>Liew Hao Shean</strong> chipped in RM22</h2>
                </div>
                <div class="chips-detail">
                    <ion-icon name="person-circle-outline"></ion-icon>
                    <h2><strong>Liew Hao Shean</strong> chipped in RM22</h2>
                </div>
                <div class="chips-detail">
                    <ion-icon name="person-circle-outline"></ion-icon>
                    <h2><strong>Liew Hao Shean</strong> chipped in RM22</h2>
                </div>
                <div class="chips-detail">
                    <ion-icon name="person-circle-outline"></ion-icon>
                    <h2><strong>Liew Hao Shean</strong> chipped in RM22</h2>
                </div>
                <div class="chips-detail">
                    <ion-icon name="person-circle-outline"></ion-icon>
                    <h2><strong>Liew Hao Shean</strong> chipped in RM22</h2>
                </div>
                <div class="chips-detail">
                    <ion-icon name="person-circle-outline"></ion-icon>
                    <h2><strong>Liew Hao Shean</strong> chipped in RM22</h2>
                </div>
                <div class="chips-detail">
                    <ion-icon name="person-circle-outline"></ion-icon>
                    <h2><strong>Liew Hao Shean</strong> chipped in RM22</h2>
                </div>
            </div>
        </div> -->
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>