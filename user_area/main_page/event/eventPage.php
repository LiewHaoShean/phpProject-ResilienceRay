<?php
    include('../../../connect_sql/connect.php');
    session_start();
?>


<html lang="en" class="hydrated">
    <head>
        <meta charset="UTF-8"><style data-styles="">ion-icon{visibility:hidden}.hydrated{visibility:inherit}</style>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="eventPage.css">
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

        <div class="top-bar-wrap">
            <div class="top-bar-grid">
                <div class="top-bar-contact-wrap">
                    <div class="top-bar-phone-num">
                        <ion-icon name="call-outline"></ion-icon>
                        <a href="">+6012 345 6789</a>
                    </div>
                    <div class="top-bar-gmail">
                        <ion-icon name="mail-outline"></ion-icon>
                        <a href="">resilienceray@gmail.com</a>
                    </div>
                </div>
                <div class="top-bar-sosial-wrap">
                    <ion-icon name="logo-instagram"></ion-icon>
                    <ion-icon name="logo-facebook"></ion-icon>
                    <ion-icon name="logo-twitter"></ion-icon>
                    <ion-icon name="logo-pinterest"></ion-icon>
                </div>
            </div>
        </div>

        <div class="content">
            <img src="volunteer.jpg" class="image">
            <div class="overlay">
                <h1 class="h1">Empowering Humanity: <br>The Impact of Volunteerism</h1>
                <p>Through volunteerism, individuals not only make a tangible difference in the lives of others but also cultivate empathy, understanding, and a profound sense of interconnectedness, thereby enriching both the giver and the recipient.</p>
                <button class="button-80" role="button" id="navigate-btn" href="#event" onclick="navigateEventsBtn()">View Events!</button>
            </div>
        </div>
        
        <div class="event" id="event">
            <h1>#Events</h1>
            <div class="event-container">
                <?php
                    $select_query = "Select * from `event`";
                    $result = mysqli_query($con, $select_query);
                    while ($row_fetch = mysqli_fetch_assoc($result)){
                        $eventId = $row_fetch['eventId'];
                        $event_name = $row_fetch['title'];
                        $event_des = substr($row_fetch['description'], 0, 1000);
                        $event_participant = $row_fetch['num_of_participants'];
                        $event_img = $row_fetch['event_img'];
                        $start_date = $row_fetch['date_start'];
                        $orgId = $row_fetch['organizationId'];
                        $select_org_query = "Select * from `organization` where organization_id='$orgId'";
                        $run_select_org_query = mysqli_query($con, $select_org_query);
                        $org_row_fetch = mysqli_fetch_assoc($run_select_org_query);
                        $org_name = $org_row_fetch['name'];
                        echo "
                            <a href='./eventDetails.php?eventId=$eventId' class='container-link'>
                                <div class='event-content'>
                                    <div class='event-des'>
                                        <h2>$event_name</h2>
                                        <p>$event_des.......</p>
                                    </div>
                                    <div class='event-statistic'>
                                        <div class='author statistic'>
                                            <ion-icon name='person-circle-outline'></ion-icon>
                                            <p>$org_name</p>
                                        </div>
                                        <div class='supporter statistic'>
                                            <ion-icon name='people-circle-outline'></ion-icon>
                                            <p>$event_participant</p>
                                        </div>
                                        <div class='date statistic'>
                                            <ion-icon name='mail-outline'></ion-icon>
                                            <p>$start_date</p>
                                        </div>
                                    </div>
                                    <div class='event-img'>
                                        <img src=\"data:image/jpg;base64,".base64_encode($event_img)."\" >
                                    </div>
                                </div>
                            </a>";
                    }
                ?>
            </div>
        </div>
                
        
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
                <a href="../petition/petitionPage.php">Petitions</a>
                <a href="#">Events</a>
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
    </body>
<script src="../js/javascript2.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule="" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>