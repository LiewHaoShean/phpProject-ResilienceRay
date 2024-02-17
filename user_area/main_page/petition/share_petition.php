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
    <link rel="stylesheet" href="share_petition.css">
</head>
<body>
    <div class="progress-container">
        <h2>Complete Your Support</h2>
        <div class="progress-steps">
            <div class="first-step">
                <ion-icon name="checkmark-circle"></ion-icon>
            </div>
            <div class="line">
            </div>
            <div class="second-step">
                <ion-icon name="checkmark-circle"></ion-icon>
            </div>
            <div class="line2">
            </div>
            <div class="third-step">
                <span>3</span>
            </div>
        </div>
    </div>

    <div class="share-container">
        <div class="main-container">
            <img src="./petition_images/petition1.jpg" alt="">
            <h1>Help this petition by sharing multiple times.</h1>
            <p>Share this petition because it matters to you, and you may be surprised by how many others around you care too.</p>
            <div class="share-selection">
                <a href="" class="copy-link"><ion-icon name="link-outline"></ion-icon> Copy Link</a>
                <a href="https://www.facebook.com/" class="fb"><ion-icon name="logo-facebook"></ion-icon> Facebook</a>
                <a href="https://www.instagram.com/?hl=en" class="ig"><ion-icon name="logo-instagram"></ion-icon> Instagram</a>
                <a href="https://twitter.com/x" class="twitter"><ion-icon name="logo-twitter"></ion-icon> Twitter</a>
                <a href="https://web.whatsapp.com/" class="whatsapp"><ion-icon name="logo-whatsapp"></ion-icon> WhatsApp</a>
                <a href="https://mail.google.com/" class="gmail"><ion-icon name="mail-unread-outline"></ion-icon> Gmail</a>
            </div>
        <?php
            if(isset($_GET['petitionId'])){
                $petitionId = $_GET['petitionId'];
                echo"
                    <div class='skip'>
                        <a href='./addShare.php?petitionId=$petitionId'>Skip for now</a>
                    </div>";
            }
        ?>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>