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
        <header>
            <input type="checkbox" name="" id="toggler">
            <label for="toggler" class="fas fa-bars"></label>
        
            <a href="#" class="logo">Resilience Ray</a>
        
            <nav class="navbar">
                <a href="#home">Home</a>
                <a href="./profile/profile.php">Profile</a>
                <a href="./events/add_event.php">Events</a>
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
                if (!isset($_SESSION['org_name'])){
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
                <h3>Initiate the Movement: <br>Welcome to Humanity in Action!</br></h3>
                <p> Whether you're passionate about environmental conservation, community development, or social justice, our platform connects you with meaningful ways to contribute your time and skills for the betterment of humanity.</p>
                <a href="./events/add_event.php" class="button">Create Event Now!</a>
            </div>
        </section>
        <!--home section ends-->
    
    <!--footer section starts-->
    <section class="footer">
        <div class="footer-content">
            <img src="./logo.png" class="rrlogo">
        </div>

        <div class="footer-content quick-link">
            <h3>Quick Links</h3>
            <a href="#home">Home</a>
            <a href="./donation/donationPage.php">Donations</a>
            <a href="./petition/petitionPage.php">Petitions</a>
            <a href="./event/eventPage.php">Events</a>
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

<div class="copyright">
<p>Copyright @2024 <span>Developers of Resilience Ray</span> | All Rights Reserved.</p>
</div>
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