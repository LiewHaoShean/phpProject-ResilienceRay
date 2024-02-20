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
    <link rel="stylesheet" href="addPetition.css">
  </head>
  <body>
    <section class="container">
        <header>Petition Details</header>
        <form action="#" class="form" method="POST" enctype="multipart/form-data">
          <div class="input-box">
            <label>Title</label>
            <input type="text" placeholder="Enter title of the petition" name="title">
          </div>

          <div class="input-box">
              <label>Description</label>
              <textarea name="description" placeholder="Enter description of the petition"  cols="30" rows="10" style="height: 250px;"></textarea>
          </div>

          <div class="column">
              <div class="input-box">
                  <label>Targeted Supporters</label>
                  <input type="number" placeholder="Enter targeted supporters" name="targeted_supporters">
              </div>

              <div class="input-box">
                  <label>Image</label>
                  <input id="petition_img" type="file" required="" name="petition_img">
              </div>
          </div>
        
          <button name="addPetition" type="submit">Submit</button>
      </form>
    </section>          
  </body>
</html>

<?php
  if (!isset($_SESSION['username'])){
    echo "<script>alert('Please proceed to login first!')</script>";
    echo "<script>window.open('../../../loginPage.php', '_self')</script>";
  } else {
    if (isset($_POST['addPetition'])){
      $petition_title = $_POST['title'];
      $petition_description = $_POST['description'];
      $targeted_supporters = $_POST['targeted_supporters'];
      $num_of_suporters = 0;
      $petition_shares = 0;
      $petition_img = $_FILES['petition_img']['name'];
      $temp_petition_img = $_FILES['petition_img']['tmp_name'];
      $userId = $_SESSION['userId'];
      if($petition_title == '' or $petition_description == '' or $targeted_supporters == '' or $petition_img == ''){
        echo "<script>alert('Please fill in all the available field!')</script>";
      } else {
        move_uploaded_file($temp_petition_img, "./petition_images/$petition_img");
        $insert_query = "insert into petition(title, description, targeted_supporters, userId, petition_img, shares) values ('$petition_title', \"$petition_description\", '$targeted_supporters', '$userId', '$petition_img', '$petition_shares')";
        $result_query = mysqli_query($con, $insert_query);
        if ($result_query){
          echo "<script>alert('Petition details uploaded sucessfully!')</script>";
          echo "<script>window.open('./petitionPage.php', '_self')</script>";
        }
      }
    }
  }
?>