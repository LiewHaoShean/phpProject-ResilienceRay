<!DOCTYPE html>
<html>
  <head>
    <title>New Member Registration</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="registerPage.css">
    </style>
  </head>
  <body>
    <div class="testbox">
      <form method="POST" enctype="multipart/form-data" class="form-area">
        <div class="banner">
          <h1>Organization Registration</h1>
        </div>
        <div class="colums">
          <div class="item">
            <label for="Orgname"> Organization Name<span>*</span></label>
            <input id="fname" type="text" name="org_name" required/>
          </div>
          <div class="item">
            <label for="lname">Address<span>*</span></label>
            <input id="lname" type="text" name="org_addr" required/>
          </div>
          <div class="item">
            <label for="address1">Email Address<span>*</span></label>
            <input id="address1" type="text"   name="org_email" required/>
          </div>
          <div class="item">
            <label for="address2">Contact Number<span>*</span></label>
            <input id="address2" type="text" name="org_contact" required/>
          </div>
          <div class="item">
            <label for="city">Password<span>*</span></label>
            <input id="city" type="password" name="org_pass" required/>
          </div>
          <div class="item">
            <label for="address">Confirm Password<span>*</span></label>
            <input id="address" type="password" name="org_c_pass" required/>
          </div>
          <div class="item">
            <label for="phone">Organization Description<span>*</span></label>
            <textarea name="org_des" cols="30" rows="10"></textarea>
          </div>
          <div class="item">
            <label for="org_image">Organization Image<span>*</span></label>
            <input id="org_image" type="file" name="org_image" required/>
          </div>
        </div>
        <h2>Terms and Conditions</h2>
        <label>You consent to receive communications from us electronically. We will communicate with you by e-mail or phone. You agree that all agreements, notices, disclosures and other communications that we provide to you electronically satisfy any legal requirement that such communications be in writing.</label>
        <div class="btn-block">
          <button type="submit" name="org_form">Submit</button>
        </div>
      </form>
    </div>
  </body>
  <?php
    include('../../connect_sql/connect.php');
    if (isset($_POST['org_form'])){
      $org_name = $_POST['org_name'];
      $org_addr = $_POST['org_addr'];
      $org_email = $_POST['org_email'];
      $org_contact = $_POST['org_contact'];
      $org_password = $_POST['org_pass'];
      $org_c_password = $_POST['org_c_pass'];
      $hash_password = password_hash($org_password, PASSWORD_DEFAULT);
      $org_des = $_POST['org_des'];
      $org_img = $_FILES['org_image']['name'];
      $temp_org_img = $_FILES['org_image']['tmp_name'];
      
      if($org_name == '' or $org_addr == '' or $org_email == '' or $org_contact == '' or $org_password == '' or $org_c_password == '' or $org_des == '' or $org_img == ''){
        echo "<script>alert('Please fill in all the available field!')</script>";
        exit();
      } elseif ($org_password !== $org_c_password) {
          echo "<script>alert('Please ensure that the passsword entered in both field are the same!')</script>";
          exit();
      } else {
        $select_query = "SELECT * FROM `organization` WHERE email_address = '$org_email' or name = '$org_name'";
        $result = mysqli_query($con, $select_query);
        $row_count = mysqli_num_rows($result);
        if ($row_count > 0){
          echo "<script>alert('Username or gmail already exist.')</script>";
        } else {
          move_uploaded_file($temp_org_img, "../org_images/$org_img");
          $insert_query = "INSERT INTO `organization`(`name`, `email_address`, `address`, `contact_num`, `description`, `password`, `organization_img`) VALUES ('$org_name','$org_email','$org_addr','$org_contact',\"$org_des\",'$hash_password','$org_img')";
          $result_query = mysqli_query($con, $insert_query);
          if ($result_query){
            echo "<script>alert('Data inserted sucessfully!')</script>";
            echo "<script>window.open('../../../loginPage.php', '_self')</script>";
          }
        }
      }

    }
  ?>
</html>