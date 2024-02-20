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
    <link rel="stylesheet" href="volunteer_details.css">
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
            <a href="#">Profile</a>
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
            if (!isset($_SESSION['org_name'])){
                echo '<a class="loginbtn" href="../../../loginPage.php">Login</a>';
            } else {
                echo '<a class="loginbtn" href="../../logout.php">Logout</a>';
            }
        ?>
    </header>

    <div class="content-container">
        <div class="profile-navbar">
            <ul class="navbar-list">
                <li class="navbar-item nav-header-container">
                    <h1 class="nav-header">Your Profile</h1>
                </li>
                <li class="navbar-item">
                    <?php
                        $session_orgId = $_SESSION['orgId'];
                        $select_img_query = "Select * from `organization` where organization_id='$session_orgId'";
                        $run_query = mysqli_query($con, $select_img_query);
                        $img_row_fetch = mysqli_fetch_assoc($run_query);
                        $org_profile_img = $img_row_fetch['organization_img'];
                        echo "<img class='profile-img' src='../../org_images/$org_profile_img'>"
                    ?>
                </li>
                <li class="navbar-item nav-name-container">
                    <h2><?php echo $_SESSION['org_name'];?></h2>
                </li>
                <li class="navbar-item">
                    <a class="" href="profile.php?my_events">My Events</a>
                </li>
                <li class="navbar-item">
                    <a class="" href="profile.php">Edit Account</a>
                </li>
                <li class="navbar-item">
                    <a class="" href="../logout.php">Logout</a>
                </li>
            </ul>
        </div>
        <div class="profile-content">
            <div class="container">
            <h2>Event's Volunteeers</h2>
            <ul class="responsive-table">
                <li class="table-header">
                <div class="col col-1">VolunteerId</div>
                <div class="col col-2">Name</div>
                <div class="col col-3">Gender</div>
                <div class="col col-4">Age</div>
                <div class="col col-5">Email</div>
                <div class="col col-6">Contact Number</div>
                </li>
                <?php
                    if(isset($_GET['eventId'])){
                        $eventId = $_GET['eventId'];
                        $select_volunteer_query = "Select * from `volunteer` where eventId='$eventId'";
                        $run_select_volunteer_query = mysqli_query($con, $select_volunteer_query);
                        while($volunteer_result_query = mysqli_fetch_assoc($run_select_volunteer_query)){
                            $userId = $volunteer_result_query['userId'];
                            $volunteerId = $volunteer_result_query['volunteerId'];
                            $select_user_query = "Select * from `user` where userId=$userId";
                            $run_select_user_query = mysqli_query($con, $select_user_query);
                            while ($user_result_query = mysqli_fetch_assoc($run_select_user_query)) {
                                $user_name = $user_result_query['name'];
                                $user_gender = $user_result_query['gender'];
                                $user_age = $user_result_query['age'];
                                $user_email = $user_result_query['gmail'];
                                $user_contact = $user_result_query['contact_num'];
                                echo "
                                    <li class='table-row'>
                                        <div class='col col-1' data-label='Volunteer Id'><h3>$volunteerId</h3></div>
                                        <div class='col col-2' data-label='Volunteer Name'><h3>$user_name</h3></div>
                                        <div class='col col-3' data-label='Volunteer Gender'><h3>$user_gender</h3></div>
                                        <div class='col col-4' data-label='Volunteer Age'><h3>$user_age</h3></div>
                                        <div class='col col-5' data-label='Volunteer Email'><h3>$user_email</h3></div>
                                        <div class='col col-6' data-label='Volunteer Contact'><h3>$user_contact</h3></div>
                                    </li>";
                            }

                        }
                    }
                ?>
            </ul>
    </div> 
            </div>
        </div>

    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>Quick Links</h3>
                <a href="home#">Home</a>
                <a href="profile#">Profile</a>
                <a href="donations#">Donations</a>
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
</body>
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
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="../js/swipper.js"></script>
</html>