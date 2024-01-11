<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="register_page.css">
</head>
<body>
    <div id="main-container">
        <div id="left-container">
            <div class="slider">
                <img src="volunteer1.jpeg" alt="Image 1" class="image">
                <img src="volunteer2.jpeg" alt="Image 2"  class="image">
                <img src="volunteer3.jpeg" alt="Image 3" class="image">
                <img src="volunteer4.jpeg" alt="Image 4" class="image">
            </div>
        </div>
        <div id="right-container">
            <form id="myForm" method="post">
                <h2 class="header">Registration Form</h2>
                <input type="text" class="input-field" placeholder="Name" id="name" name="user_name" required >
                <input type="number" class="input-field" placeholder="Age" id="age" name="user_age" required>
                <label for="gender" class="gender-label">Gender:</label>
                <div class="gender-option">
                    <div class="gender">
                        <input type="radio" id="check-male" name="user_gender" value="Male"/>
                        <label for="check-male" class="radio">Male</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-female" name="user_gender" value="Female" />
                        <label for="check-female" class="radio">Female</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-other" name="user_gender" value="NA" />
                        <label for="check-other" class="radio">Prefer Not to say</label>
                    </div>
                </div>
                <input type="email" class="input-field" placeholder="Email" id="email" name="user_email" required>
                <textarea placeholder="Address" id="address" rows="5" cols="50" required name="user_address"></textarea>
                <input type="password" placeholder="Password" class="input-field" id="password" name="user_password" required>
                <input type="password" placeholder="Confirm Password" class="input-field" id="confirmPassword" name="user_confirm_password"required>
                <input type="tel" placeholder="Contact Number" class="input-field" id="contactNumber" name="user_contact"required>
                <div class="terms">
                    <input type="checkbox" id="checkbox"name="checkbox" required>
                    <label for="checkbox">I agree to Terms & Conditions</label>
                </div>
                <button class="btn" type="submit" name="user_register">Register</button>
            </form>
        </div>
    </div>
</body>
<?php
    include('../../connect_sql/connect.php');
    if (isset($_POST['user_register'])){
        $user_name = $_POST['user_name'];
        $user_age = $_POST['user_age'];
        $user_gender = $_POST['user_gender'];
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];
        $user_password = $_POST['user_password'];
        $user_confirm_password = $_POST['user_confirm_password'];
        $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
        $user_contact = $_POST['user_contact'];

        if($user_name=='' or $user_age=='' or $user_gender=='' or $user_email=='' or $user_address=='' or $user_password=='' or $user_confirm_password=='' or $user_contact==''){
            echo "<script>alert('Please fill in all the available field!')</script>";
            exit();
        }elseif($user_password !== $user_confirm_password){
            echo "<script>alert('Please ensure the password entered in both field is the same!";
            exit();
        }else{
            $select_query="Select * from `user` where gmail='$user_email' or name='$user_name'";
            $result=mysqli_query($con, $select_query);
            $row_count=mysqli_num_rows($result);
            if($row_count>0){
                echo "<script>alert('Username or gmail already exist.')</script>";
            } else {
                $insert_query = "INSERT INTO `user` (name, age, gender, gmail, address, password, contact_num) values ('$user_name', '$user_age', '$user_gender', '$user_email', '$user_address', '$hash_password', '$user_contact')";
                $result_query = mysqli_query($con, $insert_query);
                if($result_query){
                    echo "<script>alert('Data inserted successfully')</script>";
                }
            }
        }
        
    }
?>
</html>
