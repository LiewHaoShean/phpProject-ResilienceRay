<?php
    include('../../../connect_sql/connect.php');
    session_start();
?>

<html lang="en" class="hydrated">
    <head>
        <meta charset="UTF-8"><style data-styles="">ion-icon{visibility:hidden}.hydrated{visibility:inherit}</style>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="eventDetails.css">
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
                <a href="../donation/donationPage.php">Donations</a>
                <a href="../petition/petitionPage.php">Petitions</a>
                <a href="#events">Events</a>
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
            if(isset($_GET['eventId'])){
                $eventId = $_GET['eventId'];
                $select_query = "Select * from `event` where eventId='$eventId'";
                $result = mysqli_query($con, $select_query);
                $row_fetch = mysqli_fetch_assoc($result);
                $eventId = $row_fetch['eventId'];
                $event_name = $row_fetch['title'];
                $event_des = substr($row_fetch['description'], 0, 1000);
                $event_participant = $row_fetch['num_of_participants'];
                $event_img = $row_fetch['event_img'];
                $start_date = $row_fetch['date_start'];
                $start_time = $row_fetch['time_start'];
                $end_date = $row_fetch['date_end'];
                $end_time = $row_fetch['time_end'];
                $location = $row_fetch['location'];
                $orgId = $row_fetch['organizationId'];
                $select_org_query = "Select * from `organization` where organization_id='$orgId'";
                $run_select_org_query = mysqli_query($con, $select_org_query);
                $org_row_fetch = mysqli_fetch_assoc($run_select_org_query);
                $orgId = $org_row_fetch['organization_id'];
                $org_name = $org_row_fetch['name'];
                echo "
                    <div class='event_details'>
                        <div class='left-container'>
                            <h2>$event_name</h2>
                            <img src=\"data:image/jpg;base64,".base64_encode($event_img)."\" >
                        </div>
                        <div class='right-container'>
                            <div class='event-statistic'>
                                <div class='event-data'>
                                    <div class='event-volunteers center'>
                                        <h2>$start_date</h2>
                                        <p>Starting Date</p>
                                    </div>
                                    <div class='event-shares center'>
                                        <h2>$end_date</h2>
                                        <p>Ending Date</p>
                                    </div>
                                    <div class='event-shares center'>
                                        <h2>$start_time</h2>
                                        <p>From</p>
                                    </div>
                                    <div class='event-shares center'>
                                        <h2>$end_time</h2>
                                        <p>To</p>
                                    </div>
                                </div>
                                <div class='progress-div'>
                                    <div class='progress-container'>
                                        <div class='progress-bar' id='myProgressBar'></div>
                                    </div>
                                </div>
                                <div class='progress-bar-des'>
                                    <p id='total_supporters'>$event_participant</p>
                                    <p class='volunteer'>Volunteers</p>
                                    <p id='targeted_supporters'>1000</p>
                                </div>
                                <a href='./addVolunteer.php?eventId=$eventId'><ion-icon name='hand-left-outline'></ion-icon> I'll Join Now!</a>
                                <a href='./eventPage.php'><ion-icon name='exit-outline'></ion-icon>I'll Look Around First!</a>
                            </div>
                        </div>
                    </div>
                    <div class='event-des-container'>
                        <div class='event-des'>
                            <h1>Event Description</h1>
                            <div class='organizer'>
                                <ion-icon name='person-circle-sharp'></ion-icon>
                                <h2>Organized by <em><a id='org-tag' style='text-decoration:underline; color:black;' href='./orgDetails.php?orgId=$orgId'>$org_name</a></em></h2>
                            </div>
                            <div class='location'>
                                <h2><em>Location</em> : $location</h2>
                            </div>
                            <p>$event_des</p>
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
                <a href="#">Donations</a>
                <a href="../petition/petitionPage.php">Petitions</a>
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
<script src="./eventProgressBar.js"></script>
<script src="../js/javascript2.js"></script>
</html>