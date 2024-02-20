<?php
    include('../../connect_sql/connect.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
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

            <a href= "#" class = "logo">Resilience Ray</a>

            <nav class = "navbar">
                <a href="#home">Home</a>
                <a href="./donation/donationPage.php">Donations</a>
                <a href="./petition/petitionPage.php">Petitions</a>
                <a href="./event/eventPage.php">Events</a>
            </nav>

            <div class="tools">
                <div class = "search">
                    <div class ="search_icon">
                        <ion-icon name="search-outline" class="searchbtn"></ion-icon>
                    </div>
                    <div class = "search_bar">
                        <input type="text" name="search" id="search" placeholder="Search Events" >
                        <ion-icon name="close-outline" class="closebtn"></ion-icon>
                    </div>
                </div>

                <?php
                    if (isset($_SESSION['username'])){
                        echo'<div class="user">
                                <div class ="user_icon">
                                    <a href="./profile/profile.php"><ion-icon name="person-outline"></ion-icon></a>
                                </div>
                            </div>';
                    }
                ?>
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

            <div class="slider">
                <div class="content fade" style="display: block;">
                    <div class="text">
                        <h1>Change the world together!</h1>
                        <p>Be a donor</p>
                        <button><a href ="./donation/donationPage.php">Donate Now</a></button>
                    </div>
                    <img src="charitypic1.jpg" style="width: 100%; height: 100%;">
                </div>

                <div class="content fade">
                    <div class="text">
                        <h1>Become a volunteer today</h1>
                        <p>Click the below button to join us now!!!</p>
                        <button><a href ="./event/eventPage.php">Join Us Now</a></button>
                    </div>
                    <img src="charitypic2.jpg" style="width: 100%; height: 100%;">
                </div>

                <div class="content fade">
                    <div class="text">
                        <h1>Take your first step toward changes!!!</h1>
                        <p>To all who care about Humanity's future.</p>
                        <button><a href ="./petition/petitionPage.php">Drop Your Petition</a></button>
                    </div>
                    <img src="charitypic3.jpg" style="width: 100%; height: 100%;">
                </div>

                <div class="content fade">
                    <div class="text">
                        <h1>About us</h1>
                        <p>Come and learn more about us!</p>
                        <button><a href="#about">Learn More</a></button>
                    </div>
                    <img src="charitypic4.jpg" style="width: 100%; height: 100%;">
                </div>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

                <div class="dotsbox">
                    <span class="dot" onclick="selectedSlide(1)"></span>
                    <span class="dot" onclick="selectedSlide(2)"></span>
                    <span class="dot" onclick="selectedSlide(3)"></span>
                    <span class="dot" onclick="selectedSlide(4)"></span>
                </div>

            </div>

        </section>
        <!--home section ends-->

        <!--about section starts-->
        <section class="about" id="about">

            <h1 data-text="About Us">About Us</h1>

            <div class="abtrow">

                <div class="abtimage">
                    <img src="abtusttl.jpg" alt="">
                </div>

                <div class="abtcontent">
                    <p>Welcome to Resilience Ray, a beacon of hope and support dedicated to fostering strength and empowerment in the face of life's challenges.
                    At Resilience Ray, we believe in the transformative power of resilience -- the ability to bounce back, grow, and thrive despite adversity.
                    Together, we illuminate the path to strength, hope, and a brighter future. 
                    Join us on this journey of resilience, compassion, and positive change.</p>
                    <a href ="#msvs" class="abtbtn">Read More</a>
                </div>
            
            </div>
        </section>

        <div class="msvs" id="msvs">
            <h2>Our Mission</h2>
            <p>At Resilience Ray, we believe in the power of collective action to bring about positive change in the world.<br>
            Established in 2024, our organization is dedicated to help those who are in need. <br>
            Our commitment to change the worse situation is unwavering, and we strive to create a lasting impact on the lives of those we serve.</p>

            <div id="card_area">
                <div class="wrapper">
                    <div class="box_area">
                        <div class="box">
                            <img src="transparency.jpg" alt="">
                            <div class="overlay">
                                <h3>Transparency</h3>
                                <p>We believe in openness and transparency. Our financial records are readily available for public scrutiny, and we ensure that every donor understands the impact their contribution makes.</p>
                            </div>
                        </div>

                        <div class="box">
                            <img src="community.jpg" alt="">
                            <div class="overlay">
                                <h3>Community-Centric Approach</h3>
                                <p>We deeply rooted in the communities we serve. We work closely with local partners and stakeholders to address specific needs and create sustainable solutions.</p>
                            </div>
                        </div>

                        <div class="box">
                            <img src="empowerment.jpg" alt="">
                            <div class="overlay">
                                <h3>Empowerment</h3>
                                <p>We empower individuals and communities to become agents of change. Through education, skill-building programs, and advocacy, we strive to create a ripple effect that extends beyond our immediate initiatives.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <h2>Our Vision</h2>
            <p>We envision a future where every individual, regardless of their circumstances, has the opportunity to thrive and lead a life of dignity.<br>
            Our vision is anchored in the belief that collective efforts can transform communities, break down barriers, and create a world where compassion, equality, and justice prevail.</p>
            
            <div class="visimage">
                <img src="vision.jpg" alt="">
            </div>

            <h2>Our Value</h2>
            <ul>
                <li>Compassion and Empathy</li>
                <li>Collaboration and Inclusivity</li>
                <li>Accountability and Stewardship</li>
                <li>Innovation and Adaptability</li>
                <li>Continuous Learning and Growth</li>
            </ul>
            
        </div>

        <!--about section ends-->

        <!--footer section starts-->
        <section class="footer">

            <div class="footer-content">
                <img src="logo/logo.png" class="rrlogo">
            </div>


            <div class="footer-content">
                <h3>Quick Links</h3>
                <li><a href="#home">Home</a></li>
                <li><a href="./donation/donationPage.html">Donations</a></li>
                <li><a href="#petitions">Petitions</a></li>
                <li><a href="#events">Events</a></li>
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
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

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
        <script src = "index.js"></script>
    </body>
</html>