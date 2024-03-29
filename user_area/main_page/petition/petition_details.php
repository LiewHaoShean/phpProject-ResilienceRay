<?php
    include('../../../connect_sql/connect.php');
    session_start();
?>

<html lang="en" class="hydrated">
    <head>
        <meta charset="UTF-8"><style data-styles="">ion-icon{visibility:hidden}.hydrated{visibility:inherit}</style>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="petition_details.css">
        <title>Resilience Ray</title>
    </head>
    <body>
    <!--header section starts-->
        <header>
            <input type="checkbox" name="" id="toggler">
            <label for="toggler" class="fas fa-bars"></label>
        
            <a href="#" class="logo">Resilience Ray</a>
        
            <nav class="navbar">
                <a href="../index.php">Home</a>
                <a href=".././donation/donationPage.php">Donations</a>
                <a href="./petitionPage.php">Petitions</a>
                <a href="../event/eventPage.php">Events</a>
            </nav>
        
            <div class="tools">
                <div class = "search">
                    <div class ="search_icon">
                        <ion-icon name="search-outline" class="searchbtn" onclick="toggleSearchBar()"></ion-icon>
                    </div>
                    <div class = "search_bar">
                        <input type="text" name="search" id="search" placeholder="Search Events" >
                        <ion-icon name="close-outline" class="closebtn" onclick="clearSearchBar()"></ion-icon>
                    </div>
                </div>

                <?php
                    if (isset($_SESSION['username'])){
                        echo'<div class="user">
                                <div class ="user_icon">
                                    <a href="../profile/profile.php"><ion-icon name="person-outline"></ion-icon></a>
                                </div>
                            </div>';
                    }
                ?>
            </div>
        
            <?php
                if (!isset($_SESSION['username'])){
                    echo '<a class="loginbtn" href="../../../loginPage.php">Login</a>';
                } else {
                    echo '<a class="loginbtn" href="../../logout.php">Logout</a>';
                }
            ?>
    
        </header>
    <!--header section ends-->

        <?php
            if(isset($_GET['petitionId'])){
                $petitionId = $_GET['petitionId'];
                $select_query = "Select * from `petition` where petitionId='$petitionId'";
                $run_query = mysqli_query($con, $select_query);
                $row_fetch = mysqli_fetch_assoc($run_query);
                $petition_title = $row_fetch['title'];
                $petition_des = $row_fetch['description'];
                $petition_targeted_supporters = $row_fetch['targeted_supporters'];
                $petition_num_supporters = $row_fetch['num_of_supporters'];
                $petition_img = $row_fetch['petition_img'];
                $petition_shares = $row_fetch['shares'];
                $petition_date = $row_fetch['date'];
                $plaintiffId = $row_fetch['userId'];
                $select_user_query = "Select * from `user` where userId='$plaintiffId'";
                $run_select_user_query = mysqli_query($con, $select_user_query);
                $result = mysqli_fetch_assoc($run_select_user_query);
                $plaintiff_name = $result['name'];
                echo "
                    <div class='petition_details'>
                        <div class='left-container'>
                            <h2>$petition_title</h2>
                            <img src='./petition_images/$petition_img' alt=''>
                        </div>
                        <div class='right-container'>
                            <div class='petition-statistic'>
                                <div class='petition-data'>
                                    <div class='petition-signs'>
                                        <h2>$petition_num_supporters</h2>
                                        <p>Signs</p>
                                    </div>
                                    <div class='petition-shares'>
                                        <h2>$petition_shares</h2>
                                        <p>Shares</p>
                                    </div>
                                </div>
                                <div class='progress-div'>
                                    <div class='progress-container'>
                                        <div class='progress-bar' id='myProgressBar'></div>
                                    </div>
                                </div>
                                <div class='progress-bar-des'>
                                    <p id='total_supporters'>$petition_num_supporters</p>
                                    <p class='goal'>Goals</p>
                                    <p id='targeted_supporters'>$petition_targeted_supporters</p>
                                </div>
                                <a href='./chipIn.php?petitionId=$petitionId'><ion-icon name='hand-left-outline'></ion-icon> I'll Support Now!</a>
                                <a href='./petitionPage.php'><ion-icon name='exit-outline'></ion-icon>I'll Look Around First!</a>
                            </div>
                        </div>
                    </div>
                    <div class='petition-des-container'>
                        <div class='petition-des'>
                            <h1>Why This Petition Matters?</h1>
                            <div class='author'>
                                <ion-icon name='person-circle-sharp'></ion-icon>
                                <h2>Started by <em>$plaintiff_name</em></h2>
                            </div>
                            <p>$petition_des</p>
                        </div>
                    </div>
                ";
            }
        ?>
    
    <!--footer section starts-->
    <section class="footer">
        <div class="footer-content">
            <img src="../logo.png" class="rrlogo">
        </div>


        <div class="footer-content quick-link">
            <h3>Quick Links</h3>
            <a href="../index.php">Home</a>
            <a href="../profile/profile.php">Profile</a>
            <a href="../donation/donationPage.php">Donations</a>
            <a href="#">Petitions</a>
            <a href="../event/eventPage.php">Events</a>
        </div>

        <div class="footer-content">
            <h3>Address</h3>
                <li><a href="#">12,217,Technology Park Malaysia, <br>57000 Kuala Lumpur, <br>Federal Territory of Kuala Lumpur</a></li>
        </div>

        <div class="footer-content">
            <div class="contact">
                <h3>Contact Us</h3>
                <li><span><i class="fa-solid fa-phone"></i></span><p><a href="#">+03 1234 8576</a></p></li>
                <li><span><i class="fa-solid fa-envelope"></i></span><p><a href="#">resilienceray@gmail.com</a></p></li>
                <div class="socialmedia">
                    <a href="#"><i class="fa-brands fa-facebook"></i></i></a>
                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!--footer section ends-->
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule="" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  
    </body>
<script src="./progress-bar.js"></script>
<script src="../js/javascript2.js"></script>
</html>