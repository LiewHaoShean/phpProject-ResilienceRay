<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="loginPage.css">
</head>
<body>
    <div class="container" id="container">
        <div class="form-container org-login-form">
            <form action="" method="post">
                <h2>Login</h2>
                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="email" name="org_email" required>
                    <label for="">Email</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="eye-off-outline" id="eye_icon_L" onclick="showPassword_L()"></ion-icon>
                    <input type="password" id="password_L" name="org_password" required>
                    <label for="">Password</label>
                </div>
                <div class="forget">
                    <label for=""><input type="checkbox">Remember Me  <a href="forget_pass.html">Forget Password</a></label>
                </div>
                <button class="btn btn-white btn-animated" name="org_login">Log in</button>
                <div class="register">
                    <p>Don't have an account?  <a href=".\org_area\registration_page\resgisterPage.php">Register</a></p>
                </div>
            </form>
        </div>
        <div class="form-container user-login-form">
            <form action="" method="post">
                <h2>Login</h2>
                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="email" name="user_email" required>
                    <label for="">Email</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="eye-off-outline" id="eye_icon_R" onclick="showPassword_R()"></ion-icon>
                    <input type="password" id="password_R" name="user_password" required>
                    <label for="">Password</label>
                </div>
                <div class="forget">
                    <label for=""><input type="checkbox">Remember Me  <a href="forget_pass.html">Forget Password</a></label>
                </div>
                <button class="btn btn-white btn-animated" name="user_login">Log in</button>
                <div class="register">
                    <p>Don't have an account?  <a href="./user_area/register_page/registerPage.php">Register</a></p>
                </div>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Volunteer!</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Commodo elit at imperdiet dui accumsan sit.</p>
                    <button class="hidden switch-btn" id="organization">Login As Organizations</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Welcome Organzation!</h1>
                    <p>Pulvinar etiam non quam lacus suspendisse faucibus interdum posuere lorem. Elit duis tristique sollicitudin nibh sit amet.</p>
                    <button class="hidden switch-btn" id="user">Login As User</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="javascript.js"></script>
<script src="javascript.js"></script>
<script src="switch.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<?php
    include('./connect_sql/connect.php');
    if(isset($_POST['user_login'])){
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $select_query = "Select * from `user` where gmail='$user_email'";
        //check num_of_row to ensure the gmail alrdy exist 
        $results = mysqli_query($con,$select_query);
        $row_count = mysqli_num_rows($results);
        //get the gmail and pass from database
        $row_data = mysqli_fetch_assoc($results);
        $user_username = $row_data['name'];
        $user_userId = $row_data['userId'];
        if($row_count > 0){
            if(password_verify($user_password, $row_data['password'])){
                $_SESSION['username'] = $user_username;
                $_SESSION['userId'] = $user_userId;
                echo "<script>alert('Login sucessfully!')</script>";
                echo "<script>window.open('./user_area/main_page/index.php', '_self')</script>";
            } else {
                echo "<script>alert('Invalid Credentials')</script>";
            }
        } else {
            echo "<script>alert('Invalid Credentials!')</script>";
        }
    } elseif (isset($_POST['org_login'])){
        $org_email = $_POST['org_email'];
        $org_password = $_POST['org_password'];
        $select_query = "Select * from `organization` where email_address='$org_email'";
        $results = mysqli_query($con, $select_query);
        $row_count = mysqli_num_rows($results);
        $row_data = mysqli_fetch_assoc($results);
        $org_orgId = $row_data['organization_id'];
        $org_name = $row_data['name'];
        if ($row_count > 0){
            if (password_verify($org_password, $row_data['password'])){
                $_SESSION['org_name'] = $org_name;
                $_SESSION['orgId'] = $org_orgId;
                echo "<script>alert('Login sucessfully!')</script>";
                echo "<script>window.open('./org_area/main_page/index.php', '_self')</script>";
            } else {
                echo "<script>alert('Invalid Credentials!')</script>";
            }
        }
    }
?>
</html>