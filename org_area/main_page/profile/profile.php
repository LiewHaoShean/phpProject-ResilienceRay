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
            <a href="">Profile</a>
            <a href="../events/add_event.php">Events</a>
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
                    <a class="" href="../../logout.php">Logout</a>
                </li>
            </ul>
        </div>
        <div class="profile-content">
        <?php
            if(isset($_GET['my_events'])){
                include("myEvents.php");
            } else {
                if(isset($_SESSION['orgId'])){
                    $session_orgId = $_SESSION['orgId'];
                    $session_org_name = $_SESSION['org_name'];
                    $select_org_query = "Select * from `organization` where organization_id='$session_orgId' and name='$session_org_name'";
                    $result_query = mysqli_query($con, $select_org_query);
                    $row_fetch = mysqli_fetch_assoc($result_query);
                    $org_email = $row_fetch['email_address'];
                    $org_contact = $row_fetch['contact_num'];
                    $org_des = $row_fetch['description'];
                    $org_address = $row_fetch['address'];
                    echo "
                        <h1>Account Details</h1>
                        <form action='' method='post' enctype='multipart/form-data' class='profile-details'>
                            <div class='name'>
                                <input type='text' name='new_name' value='$session_org_name'>
                            </div>
                            <div class='email'>
                                <input type='text' name='new_email' value='$org_email'>
                            </div>
                            <div class='contact_num'>
                                <input type='text' name='new_contact' value='$org_contact'>
                            </div>
                            <div class='choose-image'>
                                <input type='file' required name='org_image' class='file-style'>
                            </div>
                            <div class='address'>
                                <input type='text' name='new_address' value='$org_address'>
                            </div>
                            <div class='description'>
                                <input type='text' name='new_des' value='$org_des'>
                            </div>
                            <div class='button-container'>
                                <button class='submit-button' type='submit' name='edit_account'>Submit</button>
                            </div>
                        </form>
                    ";
                    if(isset($_POST['edit_account'])){
                        $new_name = $_POST['new_name'];
                        $new_email = $_POST['new_email'];
                        $new_contact = $_POST['new_contact'];
                        $new_des = $_POST['new_des'];
                        $new_address = $_POST['new_address'];
                        $new_org_image = $_FILES['org_image']['name'];
                        $tmp_org_img = $_FILES['org_image']['tmp_name'];
                        move_uploaded_file($tmp_org_img, "../../org_images/$new_org_image");

                        $alter_query = "Update `organization` Set name='$new_name', email_address='$new_email', address='$new_address', contact_num='$new_contact', description='$new_des', organization_img='$new_org_image' where organization_id='$session_orgId'";
                        $result_alter_query = mysqli_query($con, $alter_query);
                        if($result_alter_query){
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

            <div class="footer-content">
                <img src="../logo.png" class="rrlogo">
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