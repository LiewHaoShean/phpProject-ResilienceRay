<?php
    include('../../../connect_sql/connect.php');
    session_start();
?>


<html lang="en" class="hydrated">
    <head>
        <meta charset="UTF-8"><style data-styles="">ion-icon{visibility:hidden}.hydrated{visibility:inherit}</style>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="petitionPage.css">
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
                <a href="../profile/profile.php">Profile</a>
                <a href="../donation/donationPage.php">Donations</a>
                <a href="#">Petitions</a>
                <a href="../event/eventPage.php">Events</a>
            </nav>
        
            <div class="search">
                <div class="icon">
                    <ion-icon name="search-outline" class="searchbtn md hydrated" role="img" onclick="toggleSearchBar()"></ion-icon>
                </div>
                <div class="search_bar">
                    <input type="text" name="search" id="search" placeholder="Search Events">
                    <ion-icon name="close-outline" class="closebtn md hydrated" role="img" onclick="clearSearchBar()"></ion-icon>
                </div>
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
            <img src="petition.jpeg" class="image">
            <a href="./addPetition.php"><img src="addPetitionBtn.png" alt="" class="addPetitionBtn"></a>
            <div class="overlay">
                <h1 class="h1">Support Causes<br>You Care About</h1>
                <p>Looking to make a difference? Explore these petition websites that allow you to contribute to various causes through donations.Whether you're passionate about human rights, animal welfare, or environmental sustainability, these websites provide a platform for you to make an impact and support the issues you care about most. Join the movement for change today by donating to petitions on these platforms.</p>
                <button class="button-80" role="button" id="navigate-btn" onclick="navigatePetitionBtn()">View Petitions!</button>
            </div>
        </div>
        <div class="petition" id="petition">
            <h1>#Petitions</h1>
            <div class="petition-container">
                <?php
                    $select_query = "Select * from `petition`";
                    $result = mysqli_query($con, $select_query);
                    while ($row_fetch = mysqli_fetch_assoc($result)){
                        $petitionId = $row_fetch['petitionId'];
                        $petition_title = $row_fetch['title'];
                        $petition_des = substr($row_fetch['description'], 0, 1000);
                        $petition_targeted_supporters = $row_fetch['targeted_supporters'];
                        $petition_supporters = $row_fetch['num_of_supporters'];
                        $petition_img = $row_fetch['petition_img'];
                        $petition_date = $row_fetch['date'];
                        $petition_shares = $row_fetch['shares'];
                        $plaintiffId = $row_fetch['userId'];
                        $select_user_query = "Select * from `user` where userId=$plaintiffId";
                        $run = mysqli_query($con, $select_user_query);
                        $row = mysqli_fetch_assoc($run);
                        $plaintiff_name =  $row['name'];
                        echo "
                            <a href='./petition_details.php?petitionId=$petitionId' class='container-link'>
                                <div class='petition-content'>
                                    <div class='petition-des'>
                                        <h2>$petition_title</h2>
                                        <p>$petition_des.......</p>
                                    </div>
                                    <div class='petition-statistic'>
                                        <div class='author statistic'>
                                            <ion-icon name='person-circle-outline'></ion-icon>
                                            <p>$plaintiff_name</p>
                                        </div>
                                        <div class='supporter statistic'>
                                            <ion-icon name='people-circle-outline'></ion-icon>
                                            <p>$petition_supporters</p>
                                        </div>
                                        <div class='date statistic'>
                                            <ion-icon name='mail-outline'></ion-icon>
                                            <p>$petition_date</p>
                                        </div>
                                    </div>
                                    <div class='petition-img'>
                                        <img src='./petition_images/$petition_img' alt=''>
                                    </div>
                                </div>
                            </a>";
                    }
                ?>
                <!-- <a href="./petition_details.php?" class="container-link">
                    <div class="petition-content">
                        <div class="petition-des">
                            <h2>Save Gunung Raya Langkawi</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nulla pellentesque dignissim enim sit amet venenatis urna cursus eget. Egestas dui id ornare arcu. Amet purus gravida quis blandit turpis cursus in. Quam vulputate dignissim suspendisse in est ante in nibh. 
                                Velit ut tortor pretium viverra suspendisse. Non pulvinar neque laoreet suspendisse interdum consectetur libero. Tristique risus nec feugiat in. Tincidunt id aliquet risus feugiat in ante metus dictum at. Turpis massa tincidunt dui ut ornare lectus sit amet. Venenatis urna cursus eget nunc scelerisque viverra mauris. 
                                Eget mauris pharetra et ultrices neque. Arcu cursus euismod quis viverra....
                            </p>
                        </div>
                        <div class="petition-statistic">
                            <div class="author statistic">
                                <ion-icon name="accessibility-outline"></ion-icon>
                                <p>Chong Jia Jun</p>
                            </div>
                            <div class="supporter statistic">
                                <ion-icon name="people-circle-outline"></ion-icon>
                                <p>125462</p>
                            </div>
                            <div class="date statistic">
                                <ion-icon name="mail-outline"></ion-icon>
                                <p>31/12/2024</p>
                            </div>
                        </div>
                        <div class="petition-img">
                            <img src="./petition_images/petition1.jpg" alt="">
                        </div>
                    </div>
                </a>
                <a href="" class="container-link">
                    <div class="petition-content">
                        <div class="petition-des">
                            <h2>Pardon the death sentence of an intellectually disabled man</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nulla pellentesque dignissim enim sit amet venenatis urna cursus eget. Egestas dui id ornare arcu. Amet purus gravida quis blandit turpis cursus in. Quam vulputate dignissim suspendisse in est ante in nibh. 
                                Velit ut tortor pretium viverra suspendisse. Non pulvinar neque laoreet suspendisse interdum consectetur libero. Tristique risus nec feugiat in. Tincidunt id aliquet risus feugiat in ante metus dictum at. Turpis massa tincidunt dui ut ornare lectus sit amet. Venenatis urna cursus eget nunc scelerisque viverra mauris. 
                                Eget mauris pharetra et ultrices neque. Arcu cursus euismod quis viverra....
                            </p>
                        </div>
                        <div class="petition-statistic">
                            <div class="author statistic">
                                <ion-icon name="person-circle-outline"></ion-icon>
                                <p>Lai Zu Wei</p>
                            </div>
                            <div class="supporter statistic">
                                <ion-icon name="people-circle-outline"></ion-icon>
                                <p>245625</p>
                            </div>
                            <div class="date statistic">
                                <ion-icon name="mail-outline"></ion-icon>
                                <p>15/2/2024</p>
                            </div>
                        </div>
                        <div class="petition-img">
                            <img src="./petition_images/petition2.webp" alt="">
                        </div>
                    </div>
                </a> -->
            </div>
        </div>
    <!--footer section starts-->
        <section class="footer">
            <div class="box-container">
                <div class="box">
                    <h3>Quick Links</h3>
                    <a href="../index.php">Home</a>
                    <a href="../profile/profile.php">Profile</a>
                    <a href="../donation/donationPage.php">Donations</a>
                    <a href="#">Petitions</a>
                    <a href="../event/eventPage.php">Events</a>
                </div>
        
                <div class="box">
                    <h3>Address</h3>
                    <a href="#">12,217,Technology Park Malaysia, 57000 Kuala Lumpur, Federal Territory of Kuala Lumpur</a>
                </div>
        
                <div class="box">
                    <h3>Email</h3>
                    <a href="#">resilienceray@gmail.com</a>
                </div>
        
                <div class="box">
                    <h3>Contact Info</h3>
                    <a href="#">+03 1234 8576</a>
                    <img src="#" alt="">
                </div>
        
                <div class="credit">Created by<span> Developers of Resilience Ray </span> | All Rights Reserved</div>
            </div>
        </section>
    <!--footer section ends-->
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule="" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
<script src="../js/javascript2.js"></script>
</html>