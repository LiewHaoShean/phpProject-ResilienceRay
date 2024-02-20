<?php
    include('../../../connect_sql/connect.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="donationPage.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<body>
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
            <a href="../index.php">Home</a>
            <a href="../profile/profile.php">Profile</a>
            <a href="../donation/donationPage.php">Donations</a>
            <a href="../petition/petitionPage.php">Petitions</a>
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

    <section>
        <div class="content">
            <img src="./donation.jpeg" class="image">
            <div class="overlay">
                <h1 class="h1">Make a difference<br> today.</h1>
                <p>Welcome to "Resilience Ray," a platform dedicated to making a positive impact in the world. Your contribution, big or small, can transform lives and communities. Join us in our mission to spread hope, support, and resources where they're needed most.Together, let's create a brighter future for all. Donate now and be the change you wish to see in the world!</p>
                <button class="button-80" role="button" id="navigate-btn" onclick="navigateDonationBtn()">Donate Now!</button>
            </div>
        </div>
        <div class="donation" id="donation">
            <div class="main-container">
                <div class="left-container">
                    <h2>Donation</h2>
                    <div id="donation-toggle-buttons">
                      <button type="button" onclick="toggleDonationType('one-off')" id="one-off-button" class="toggle-button">One-off</button>
                      <button type="button" onclick="toggleDonationType('monthly')" id="monthly-button" class="toggle-button">Monthly</button>
                    </div>
              
                    <form id="donation-form-one-off" method="post">
                        <div class="donation-selection">
                            <a class="donation-amount first-container" id="fifty-containerL" name="50" onclick="toggleDonationAmountL('fifty'); setValue('50');"><span>MRY</span><span>50</span></a>
                            <a class="donation-amount " id="hundred-containerL" name="100" onclick="toggleDonationAmountL('hundred'); setValue('100');"><span>MRY</span><span>100</span></a>
                            <a class="donation-amount last-container" id="hundredfifty-containerL" name="150" onclick="toggleDonationAmountL('hundredfifty'); setValue('150');"><span>MRY</span><span>150</span></a>
                        </div>
                        <div class="donation-input">
                            <input type="number" name="one_off_donation_amount" id="selectedOption1" onclick="toggleDonationAmountL('other')" placeholder="OTHER AMOUNT (MYR)">
                        </div>
                        <p>"Your single donation today creates ripples of change that touch countless lives tomorrow."</p>
                        <button class="button-55" role="button" name="one-off-donation" type="submit">Submit Donation</button>
                    </form>
                    <script>
                        function setValue(option) {
                            document.getElementById('selectedOption1').value = option;
                            console.log(option);
                        }
                    </script>

                    <form id="donation-form-monthly" style="display: none;" method="post">
                        <div class="donation-selection">
                            <a class="donation-amount first-container" id="fifty-containerR" name="50" onclick="toggleDonationAmountR('fifty'); setValueR('50');"><span>MRY</span><span>50</span></a>
                            <a class="donation-amount " id="hundred-containerR" name="100" onclick="toggleDonationAmountR('hundred'); setValueR('100');"><span>MRY</span><span>100</span></a>
                            <a class="donation-amount last-container" id="hundredfifty-containerR" name="150" onclick="toggleDonationAmountR('hundredfifty'); setValueR('150');"><span>MRY</span><span>150</span></a>
                        </div>
                        <div class="donation-input">
                            <input type="number" name="monthly_donation_amount" id="selectedOption2" onclick="toggleDonationAmountR('other')" placeholder="OTHER AMOUNT (MYR)">
                        </div>
                        <p>"Transform lives every month with a recurring donation. Together, we can build a brighter future for all."</p>
                        <button class="button-55" role="button" name="monthly-donation">Submit Donation</button>
                    </form>
                    <script>
                        function setValueR(option) {
                            document.getElementById('selectedOption2').value = option;
                        }
                    </script>
                </div>
                <div class="right-container">
                    <h1>How are <br>we using <br>your <br>donations?</h1>
                    <div class="data-container cross">
                        <div class="section" id="section1">
                          <div class="counter statistic" id="statistic" data-end-value="15">0</div><span>%</span>
                          <p>Basic Needs</p>
                        </div>
                        <div class="section" id="section2">
                          <div class="counter statistic" id="statistic" data-end-value="30">0</div><span>%</span>
                          <p>Healthcare Services</p>
                        </div>
                        <div class="section" id="section3">
                          <div class="counter statistic" id="statistic" data-end-value="25">0<span>%</span></div><span>%</span>
                          <p>Education and Skills Development</p>
                        </div>
                        <div class="section" id="section4">
                          <div class="counter statistic" id="statistic" data-end-value="40">0<span>%</span></div><span>%</span>
                          <p>Research and Innovation</p>
                        </div>
                    </div>
                </div>
                <script>
                    function updateStatistics() {
                        let statistics = document.querySelectorAll('.statistic');

                        statistics.forEach(statistic => {
                            let endValue = parseInt(statistic.getAttribute('data-end-value'));
                            let currentValue = 0;

                            function update() {
                                if (currentValue <= endValue) {
                                    statistic.textContent = currentValue++;
                                    setTimeout(update, 80)
                                }
                            }
                            update();
                        });
                    }

                    // Event listener for scroll
                    document.addEventListener('scroll', function () {
                        updateStatistics();
                    });
                </script>
            </div>
        </div>
        <div class="donor-container">
            <div class="container-header">
                <h2>Our donors are people like you, who are doing what they can to ensure we have a bright, sustainable future.</h2>
            </div>
            <div class="donor-content">
                <div class="slide-container">
                    <div class="slide-content swiper">
                        <div class="card-wrapper swiper-wrapper">
                            <div class="card swiper-slide">
                                <div class="image-content">
                                    <div class="card-image">
                                        <img src="potraits/emma.jpg" alt="" class="card-img">
                                        <div class="card-header">
                                            <h2>Emma Sanchez</h2>
                                            <p>A dedicated nurse with over a decade experience.</p>
                                            <p>Donor for 3 years.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="description">Emma is a dedicated nurse with a passion for helping others. She donates regularly to healthcare charities and organizations that provide medical assistance to underserved communities.</p>
                                </div>
                            </div>
                            <div class="card swiper-slide">
                                <div class="image-content">
                                    <div class="card-image">
                                        <img src="potraits/donor2.jpg" alt="" class="card-img">
                                        <div class="card-header">
                                            <h2>Michael Johnson</h2>
                                            <p>A 15 years of experience in investment banking.</p>
                                            <p>Donor for 6 years.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="description">Michael is a successful entrepreneur who believes in giving back to his community. He supports various education initiatives, particularly those focused on providing scholarships to disadvantaged students.</p>
                                </div>
                            </div>
                            <div class="card swiper-slide">
                                <div class="image-content">
                                    <div class="card-image">
                                        <img src="potraits/sophia.jpg" alt="" class="card-img">
                                        <div class="card-header">
                                            <h2>Sophia Patel</h2>
                                            <p>A seasoned environmental scientist</p>
                                            <p>Donor for 5 years.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="description">Sophia is a philanthropist and environmentalist committed to preserving the planet. She donates to environmental conservation projects and advocates for sustainable living practices.</p>
                                </div>
                            </div>
                            <div class="card swiper-slide">
                                <div class="image-content">
                                    <div class="card-image">
                                        <img src="potraits/david.jpg" alt="" class="card-img">
                                        <div class="card-header">
                                            <h2>David Chen</h2>
                                            <p>A seasoned software engineer with over a decade experience</p>
                                            <p>Donor for 6 years.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="description">David is a tech executive who values innovation and technology education. He donates to STEM programs that empower young minds to pursue careers in science, technology, engineering, and mathematics.</p>
                                </div>
                            </div>
                            <div class="card swiper-slide">
                                <div class="image-content">
                                    <div class="card-image">
                                        <img src="potraits/rajesh.jpg" alt="" class="card-img">
                                        <div class="card-header">
                                            <h2>Rajesh Sharma</h2>
                                            <p>A successful entrepreneur with a background real estate development</p>
                                            <p>Donor for 8 years.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="description">Rajesh is a successful entrepreneur with a background in real estate development. He has over 15 years of experience in the industry, overseeing projects ranging from residential complexes to commercial buildings. Rajesh believes in the importance of community development and donates to initiatives that focus on poverty alleviation, sustainable development, and infrastructure improvement in underprivileged areas, aiming to create thriving and inclusive communities.</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-button-next" style="color: black;"></div>
                        <div class="swiper-button-prev" style="color: black;"></div>
                        <div class="swiper-pagination" style="--swiper-theme-color: black"></div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <script>
        const oneOffButton = document.getElementById('one-off-button');
        oneOffButton.classList.add('active');
    </script>

    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>Quick Links</h3>
                <a href="../index.php">Home</a>
                <a href="../profile/profile.php">Profile</a>
                <a href="#">Donations</a>
                <a href="../petition/petitionPage.php">Petitions</a>
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
</body>
<script src="../js/javascript2.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="../js/swipper.js"></script>
</html>

<?php
    include('../../../connect_sql/connect.php');
    if (isset($_POST['one-off-donation'])){
        if(!isset($_SESSION['username'])){
            echo "<script>alert('Please proceed to login first!')</script>";
            echo "<script>window.open('../../../loginPage.php', '_self')</script>";
        } else {
            $donation_type = 'one-off';
            $user_userId = $_SESSION['userId'];
            $donation_amount = $_POST['one_off_donation_amount'];
            $payment_method = "pending";
            $insert_query = "insert into `donors` (userId, amount, type, payment_method) values ('$user_userId', '$donation_amount', '$donation_type', '$payment_method')";
            $result_query = mysqli_query($con, $insert_query);
            $select_donorId_query = "SELECT * FROM `donors` ORDER BY donorId DESC LIMIT 1";
            $run_select_donorId_query = mysqli_query($con, $select_donorId_query);
            $donorId_row = mysqli_fetch_assoc($run_select_donorId_query);
            $donorId = $donorId_row['donorId'];
            if ($result_query){
                echo "<script>window.open('../../payment.php?donation_amount=$donation_amount&donorId=$donorId','_self')</script>";
            }
        }
    } elseif (isset($_POST['monthly-donation'])){
        if(!isset($_SESSION['username'])){
            echo "<script>alert('Please proceed to login first!')</script>";
            echo "<script>window.open('../../../loginPage.php', '_self')</script>";
        } else {
            $donation_type = 'monthly';
            $user_userId = $_SESSION['userId'];
            $donation_amount = $_POST['monthly_donation_amount'];
            $insert_query = "insert into `donors`(userId, amount, type) values ('$user_userId', '$donation_amount', '$donation_type')";
            $result_query = mysqli_query($con, $insert_query);
            $select_donorId_query = "SELECT * FROM `donors` ORDER BY donorId DESC LIMIT 1";
            $run_select_donorId_query = mysqli_query($con, $select_donorId_query);
            $donorId_row = mysqli_fetch_assoc($run_select_donorId_query);
            $donorId = $donorId_row['donorId'];
            if ($result_query){
                echo "<script>window.open('../../payment.php?donation_amount=$donation_amount&donorId=$donorId','_self')</script>";
            }
        }
    }
?>