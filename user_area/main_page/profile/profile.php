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
    <link rel="stylesheet" href="profile.css">
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

    <div class="content-container">
        <div class="profile-navbar">
            <ul class="navbar-list">
                <li class="navbar-item nav-header-container">
                    <h1 class="nav-header">Your Profile</h1>
                </li>
                <li class="navbar-item">
                    <?php
                        $session_userId = $_SESSION['userId'];
                        $select_img_query = "Select * from `user` where userId='$session_userId'";
                        $run_query = mysqli_query($con, $select_img_query);
                        $img_row_fetch = mysqli_fetch_assoc($run_query);
                        $user_profile_img = $img_row_fetch['user_img'];
                        echo "<img src=\"data:image/jpg;base64,".base64_encode($user_profile_img)."\" class='profile-img'>"
                    ?>
                </li>
                <li class="navbar-item nav-name-container">
                    <h2><?php echo $_SESSION['username'];?></h2>
                </li>
                <li class="navbar-item">
                    <a class="" href="profile.php?my_donations">My Donations</a>
                </li>
                <li class="navbar-item">
                    <a class="" href="profile.php?my_petitions">My petitions</a>
                </li>
                <li class="navbar-item">
                    <a class="" href="profile.php?pending_payment">Pending Payment</a>
                </li>
                <li class="navbar-item">
                    <a class="" href="profile.php">Edit Account</a>
                </li>
                <li class="navbar-item">
                    <a class="" href="profile.php?my_events">Events</a>
                </li>
            </ul>
        </div>
        <div class="profile-content">
        <?php
            if(isset($_GET['my_donations'])){
                include("myDonation.php");
            }elseif(isset($_GET['my_petitions'])){
                include("myPetition.php");
            }elseif(isset($_GET['pending_payment'])){
                include("myPendingPayment.php");
            } elseif(isset($_GET['my_events'])){
                include("myEvents.php");
            }else {
                if(isset($_SESSION['userId'])){
                    $session_userId = $_SESSION['userId'];
                    $session_username = $_SESSION['username'];
                    $select_user_query = "Select * from `user` where userId='$session_userId' and name='$session_username'";
                    $result_query = mysqli_query($con, $select_user_query);
                    $row_fetch = mysqli_fetch_assoc($result_query);
                    $user_age = $row_fetch['age'];
                    $user_gender = $row_fetch['gender'];
                    $user_email = $row_fetch['gmail'];
                    $user_address = $row_fetch['address'];
                    $user_contactNum = $row_fetch['contact_num'];
                    echo "
                        <h1>Account Details</h1>
                        <form action='' method='post' enctype='multipart/form-data' class='profile-details'>
                            <div class='name'>
                                <input type='text' name='new_name' value='$session_username'>
                            </div>
                            <div class='age'>
                                <input type='text' name='new_age' value='$user_age'>
                            </div>
                            <div class='gender'>
                                <input type='text' name='new_gender' value='$user_gender'>
                            </div>
                            <div class='choose-image'>
                                <input type='file' required name='image' class='file-style'>
                            </div>
                            <div class='contact_num'>
                                <input type='text' name='new_contact_num' value='$user_contactNum'>
                            </div>
                            <div class='address'>
                                <input type='text' name='new_address' value='$user_address'>
                            </div>
                            <div class='gmail'>
                                <input type='text' name='new_gmail' value='$user_email'>
                            </div>
                            <div class='button-container'>
                                <button class='submit-button' type='submit' name='edit_account'>Submit</button>
                            </div>
                        </form>
                    ";
                    if(isset($_POST['edit_account'])){
                        $new_name = $_POST['new_name'];
                        $new_age = $_POST['new_age'];
                        $new_gender = $_POST['new_gender'];
                        $new_contact_num = $_POST['new_contact_num'];
                        $new_address = $_POST['new_address'];
                        $new_gmail = $_POST['new_gmail'];
                        $tmp_new_image = $_FILES['image']['tmp_name'];
                        $new_image = file_get_contents($tmp_new_image);
                        $alter_query = "Update `user` Set name='$new_name', age='$new_age', gender='$new_gender', gmail='$new_gmail', address='$new_address', contact_num='$new_contact_num', user_img=? where userId='$session_userId'";
                        $stmt = mysqli_prepare($con, $alter_query);
                        mysqli_stmt_bind_param($stmt, "s", $new_image);
                        mysqli_stmt_execute($stmt);
                        $check = mysqli_stmt_affected_rows($stmt);
                        if($check ==1){
                            echo "<script>alert('Account details updated successfully!')</script>";
                            echo "<script>window.open('profile.php', '_self')</script>";
                        }
                    }
                } else {
                    echo "<script>alert('Please proceed to login first!')</script>";
                    echo "<script>window.open('../../../loginPage.php', '_self')</script>";
                }
            }
        ?> 
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