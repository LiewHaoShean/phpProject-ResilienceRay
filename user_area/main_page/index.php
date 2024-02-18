<?php
    include('../../connect_sql/connect.php');
    session_start();
?>

<html lang="en" class="hydrated">
    <head>
        <meta charset="UTF-8"><style data-styles="">ion-icon{visibility:hidden}.hydrated{visibility:inherit}</style>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="stylesheet" href="index.css">
        <title>Resilience Ray</title>
    </head>
    <body>
    <!--header section starts-->
        <header>
            <input type="checkbox" name="" id="toggler">
            <label for="toggler" class="fas fa-bars"></label>
        
            <a href="#" class="logo">Resilience Ray</a>
        
            <nav class="navbar">
                <a href="#home">Home</a>
                <a href="./profile/profile.php">Profile</a>
                <a href="./donation/donationPage.php">Donations</a>
                <a href="./petition/petitionPage.php">Petitions</a>
                <a href="#events">Events</a>
            </nav>
        
            <div class="search">
                <div class="icon">
                    <ion-icon name="search-outline" class="searchbtn md hydrated" role="img"></ion-icon>
                </div>
                <div class="search_bar">
                    <input type="text" name="search" id="search" placeholder="Search Events">
                    <ion-icon name="close-outline" class="closebtn md hydrated" role="img"></ion-icon>
                </div>
            </div>
            <?php
                if (!isset($_SESSION['username'])){
                    echo '<a class="loginbtn" href="../../loginPage.php">Login</a>';
                } else {
                    echo '<a class="loginbtn" href="../logout.php">Logout</a>';
                }
            ?>
        </header>
    <!--header section ends-->
    
        <!--home section starts-->
        <section class="home" id="home">
            <div class="content">
                <h3>Welcome~</h3>
                <p>You can find love in a smile or helping hand, in a thoughtful gesture or a kind word. It is all around, if you just look for it.</p>
                <a href="#" class="button">Donate Now</a>
            </div>
        </section>
        <!--home section ends-->
    
    <!--about us section starts-->
        <section class="about" id="about">
            <h1 class="heading"><span> About </span> Us </h1>
        
            <div class="row">
                <div class="image">
                    <img src="#">
                </div>
            </div>
        </section>
    <!--about us section ends-->
    
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
        
        <script>
        
            let search = document.querySelector(".searchbtn");
            let close = document.querySelector(".closebtn");
            
        
            search.onclick = function(){
                document.querySelector(".search").classList.toggle('active');
            }
        
            close.onclick = function(){
                document.getElementById("search").value = "";
            }
        </script>
  
    </body>
</html>