<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <title></title>
  </head>
  <body>
   <?php
   if(isset($_POST['update'])){
     $conn=mysqli_connect('localhost','root','','login_form');
     $a=$_SESSION['user'];
     $b=$_SESSION['password'];
     $query1="SELECT email_ID,password from r_form where email_ID='$a' and password='$b'";
     $res=mysqli_fetch_assoc(mysqli_query($conn,$query1));
     if($a==$res['email_ID'] && $b=$res['password']){
       ?>
       <div class="box5">
       <form class="" action="details.php" method="post">
         <h2>Enter Login details here</h2>
         Email id   <br> <input type="text" name="email_ID" value=""><br>
          Password   <br> <input type="password" name="password" value=""><br>
         <hr>
         First Name <br> <input type="text" name="first_name" value=""><br>
         Last name <br>  <input type="text" name="last_name" value=""><br>
         Phone No   <br> <input type="number" name="phone_no" value=""><br>
         DOB        <br> <input type="date" name="DOB" value=""><br>
                     <input type="submit" name="update" value="Update"><br>
       </form>
       </div>
<?php
     }
   }
    ?>
  </body>
</html>
