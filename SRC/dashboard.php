<?php
session_start();
 ?>
<!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>Dashboard</title>
      <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
      <?php
      $conn=mysqli_connect('localhost','root','','login_form');
      $a=$_SESSION['user'];
      $query="SELECT * from r_form where email_ID='$a'";
      $res=mysqli_query($conn,$query);
      while($ans=mysqli_fetch_assoc($res)){?>
        <div class="box7">
        <h2>Your Details :</h2>
        <?php
        print_r("First name    :   " .$ans['first_name']."<br>");
        print_r("Last name     :   ".$ans['last_name']."<br>");
        print_r("Phone no      :   ".$ans['phone_no']."<br>");
        print_r("Email ID      :   ".$ans['email_ID']."<br>");
        print_r("Date of birth :   ".$ans['DOB']."<br>");
      }
       ?>
     </div>
     <br>
      <form action="image.php" method="post"  enctype="multipart/form-data">
        <input type="file" name="my_image" value="1234567">
        <input type="submit" name="upload" value="upload">
      </form>

    </body>
  </html>
