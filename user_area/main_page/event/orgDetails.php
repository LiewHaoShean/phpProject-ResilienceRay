<?php
    include('../../../connect_sql/connect.php');
    session_start();
?>

<html lang="en" class="hydrated">
    <head>
        <meta charset="UTF-8"><style data-styles="">ion-icon{visibility:hidden}.hydrated{visibility:inherit}</style>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="orgDetails.css">
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
                <a href=".././donation/donationPage.php">Donations</a>
                <a href="./petitionPage.php">Petitions</a>
                <a href="#events">Events</a>
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
        <!--header section ends-->
        <?php
            if(isset($_GET['orgId'])){
                $orgId = $_GET['orgId'];
                $select_query = "Select * from `organization` where organization_id='$orgId'";
                $result_query = mysqli_query($con, $select_query);
                $row = mysqli_fetch_assoc($result_query);
                $org_name = $row['name'];
                $org_email = $row['email_address'];
                $org_contact = $row['contact_num'];
                $org_address = $row['address'];
                $org_img = $row['organization_img'];
                $org_des = $row['description'];
                echo "
                    <div class='org-container'>
                        <div class='org-details-container'>
                            <div class='container-header'>
                                <h1>Organization Details</h1>
                            </div>
                            <div class='main-details'>
                                <img src='../../../org_area/org_images/$org_img' alt=''>
                                <div class='org-name-div'>
                                    <h1>$org_name</h1>
                                </div>
                                <h2><ion-icon name='mail-outline'></ion-icon> $org_email</h2>
                                <h2><ion-icon name='call-outline'></ion-icon> $org_contact</h2>
                                <h2><ion-icon name='home-outline'></ion-icon> $org_address</h2>
                            </div>
                            <div class='org-description'>
                                <h1>About Them</h1>
                                <p>$org_des</p>
                            </div>
                            <div class='org-events'>
                                <div class='list-container'>
                                    <h1>Events</h1>
                                    <ul>";
                $select_event_query = "Select * from `event` where organizationId='$orgId'";
                $run_select_event_query = mysqli_query($con, $select_event_query);
                while($result_event_query=mysqli_fetch_assoc($run_select_event_query)){
                    $event_name = $result_event_query['title'];
                    $eventId = $result_event_query['eventId'];
                    echo "<li><a id='event-tag' href='./eventDetails.php?eventId=$eventId'>$event_name</a></li>";
                }   
                echo                "</ul>
                                </div>
                            </div>
                        </div>
                    </div>";
            }
        ?>
        
        <!--footer section starts-->
        <section class="footer">
            <div class="box-container">
                <div class="box">
                    <h3>Quick Links</h3>
                    <a href="home#">Home</a>
                    <a href="about#">Profile</a>
                    <a href="./donation/donationPage.html">Donations</a>
                    <a href="petitions#">Petitions</a>
                    <a href="events#">Events</a>
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
<script src="./eventProgressBar.js"></script>
<script src="../js/javascript2.js"></script>
</html>